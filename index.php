<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="Assets/img/covid.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        COVID-19 Analytics Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="Assets/css/material-dashboard.css?v=2.1.2">
    <script>
        var apiurl = 'http://covidapp-env.eba-ypa7utfe.us-east-2.elasticbeanstalk.com/api/stats-overview';
    </script>
</head>

<body class="">

<style>

</style>

<div class="wrapper ">

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="dashboard-header">
                                    <img class="float-left" src="Assets/img/covid.png" style="float: left;">
                                    <h3 >COVID-19 : Live Situational Analysis Dashboard</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Total Examined</p>
                                <h3 id="global-examined" class="card-title text-info"></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>Last updated:&nbsp;<span class="last-updated-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-ambulance" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Confirmed</p>
                                <h3 id="global-confirmed" class="card-title text-warning"></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>Last updated:&nbsp;<span class="last-updated-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Recovered</p>
                                <h3 id="global-recovered" class="card-title text-success"></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>Last updated:&nbsp;<span class="last-updated-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </div>
                                <p class="card-category">Deaths</p>
                                <h3 id="global-deaths" class="card-title text-danger"></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>Last updated:&nbsp;<span class="last-updated-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                <h4 class="card-title">Daily figures</h4>
                                <p class="card-category"><?php echo date('F j, Y') ?></p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">

                                    <tbody>
                                    <tr>
                                        <td>
                                            <i class="fa fa-stethoscope fa-2x text-info" aria-hidden="true"></i>
                                        </td>
                                        <td>Total Examined</td>
                                        <td><h3 id="daily-examined" class="text-info"></h3></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-ambulance fa-2x text-warning" aria-hidden="true"></i>
                                        </td>
                                        <td>Confirmed</td>
                                        <td><h3 id="daily-confirmed" class="text-warning"></h3></td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-smile-o fa-2x text-success" aria-hidden="true"></i>
                                        </td>
                                        <td>Recovered</td>
                                        <td><h3 id="daily-recovered" class="text-success"></h3></td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-bed fa-2x text-danger" aria-hidden="true"></i>
                                        </td>
                                        <td>Deaths</td>
                                        <td><h3 id="daily-deaths" class="text-danger"></h3></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>Last updated:&nbsp;<span class="last-updated-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card card-chart">
                            <div class="card-header card-header-tabs card-header-warning">
                                <h4 class="card-title">Daily figures</h4>
                                <p class="card-category">Last 7 days</p>
                            </div>
                            <div class="card-body">
                                <div class="ct-chart" id="linechart_material" style="width:100%; height:auto; min-height:400px;"></div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>Last updated:&nbsp;<span class="last-updated-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Demo API project developed for
                    <a href="https://www.wiley.com/en-lk" target="_blank">Wiley Sri Lanka</a>.
                </div>
            </div>
        </footer>
    </div>
</div>

<!--   Core JS Files   -->
<script src="Assets/js/core/jquery.min.js"></script>
<script src="Assets/js/core/popper.min.js"></script>
<script src="Assets/js/core/bootstrap-material-design.min.js"></script>
<script src="Assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="Assets/js/plugins/moment.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="Assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

<!-- Retrieving API data -->
<script src="Assets/js/api-data.js"></script>
<!-- Google charts -->
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>

<script>
    $(document).ready(function() {
        //Function to retrieve dashboard data from the API
        getApiData();
        // Javascript method's body can be found in assets/js/demos.js
        // md.initDashboardPageCharts();

    });
</script>
</body>

</html>