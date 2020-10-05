/**
 * To get data from the backend API
 */
function getApiData(){
   $.ajax({
        type: 'GET',
        url:  apiurl,
        success: function (result, textStatus, xhr){
            var data = "";
            if((result.data) && xhr.status == 200){
                data = result.data;
                localStorage.setItem("localData",JSON.stringify(data));
            }else {
                data = JSON.parse(localStorage.getItem('localData'));
            }
            assignValues(data);
        },
        error: function() {
            var data = JSON.parse(localStorage.getItem('localData'));
            assignValues(data);
        }
    });
}

/**
 * To assign API values to HTML elements
 * @param data
 */
function assignValues(data) {

    $('#global-examined').text(data.total_tested);
    $('#global-confirmed').text(data.total_confirmed);
    $('#global-recovered').text(data.total_recovered);
    $('#global-deaths').text(data.total_deaths);
    $('.last-updated-text').text(data.updated_at);

    $('#daily-examined').text(data.current_day.tested);
    $('#daily-confirmed').text(data.current_day.confirmed);
    $('#daily-recovered').text(data.current_day.recovered);
    $('#daily-deaths').text(data.current_day.deaths);


    prepareChart(data.daily_records);
}

/**
 * To generate Google chart from the daily records
 * @param dataArray
 */
function prepareChart(dataArray){

    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', '');
        data.addColumn('number', 'Examined');
        data.addColumn('number', 'Confirmed');
        data.addColumn('number', 'Recovered');
        data.addColumn('number', 'Deaths');

        //Getting ost recent 7 days for the google chart
        data.addRows(dataArray.slice(-7));

        var options = {
            backgroundColor: 'transparent',
            series: {
                0: { color: '#00bcd4' },
                1: { color: '#ff9800' },
                2: { color: '#4caf50' },
                3: { color: '#f44336' }
            }
        };

        var chart = new google.charts.Line(document.getElementById('linechart_material'));

        chart.draw(data, google.charts.Line.convertOptions(options));

    }

}


