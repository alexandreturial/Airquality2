@extends('layouts.dashboard')

@section('page_heading')



    <!-- Modal -->
    <div class="modal fade" id="tmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Temperatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">
                    </div>
                    <script>
                        Highcharts.chart('container', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data1: 1, // Parâmetro 1 enviado
                                                }
                                            })
                                                .then(response => {
                                                    console.log(response);
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 170
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -19; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 100,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="umi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container2" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container2', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data2: 2, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -19; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container3" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container3', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data3: 3, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lpg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container4" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container4', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data4: 4, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="fumo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container5" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container5', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data5: 5, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="co" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container6" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container6', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data6: 6, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="co2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container7" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container7', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data7: 7, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="nh4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container8" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container8', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data8: 8, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container9" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container9', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data9: 9, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container10" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container10', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data10: 10, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="eta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container11" style="min-width: 310px;
                    height: 400px;
                    width: 600px;
                    margin: 0 auto;">

                    </div>
                    <script>
                        Highcharts.chart('container11', {
                            chart: {
                                type: 'spline',
                                animation: Highcharts.svg, // don't animate in old IE
                                marginRight: 10,
                                events: {
                                    load: function () {

                                        // set up the updating of the chart each second
                                        var series = this.series[0];
                                        setInterval(function () {

                                            axios({
                                                method: 'post', // verbo http
                                                url: 'http://127.0.0.1:8000/grafico', // url
                                                data: {
                                                    data11: 11, // Parâmetro 1 enviado
                                                }

                                            })
                                                .then(response => {
                                                    var x = (new Date()).getTime(); // current time
                                                    var y =  response.data;
                                                    console.log(response.data);
                                                    series.addPoint([x, y], true, true);
                                                })
                                                .catch(error => {
                                                    console.log(error)
                                                });
                                        }, 1000);
                                    }
                                }
                            },

                            time: {
                                useUTC: false
                            },

                            title: {
                                text: 'Live random data'
                            },
                            xAxis: {
                                type: 'datetime',
                                tickPixelInterval: 150
                            },
                            yAxis: {
                                title: {
                                    text: 'Value'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br/>',
                                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
                            },
                            legend: {
                                enabled: false
                            },
                            exporting: {
                                enabled: false
                            },
                            series: [{
                                name: 'Random data',
                                data: (function () {

                                    // generate an array of random data
                                    var data = [],
                                        time = (new Date()).getTime(),
                                        i;

                                    for (i = -100; i <= 0; i += 1) {
                                        data.push({
                                            x: time + i * 1000,
                                            y: 0
                                        });
                                    }
                                    return data;
                                }())
                            }]
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection
