@extends('layouts.plane')
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script type="text/javascript"></script>

@section('body')
    <div id="page-wrapper" style="margin-top: 10px; margin-right: 10px">
    <div id="container" style="height: 300px; width: 1000px"></div>

    </div>
    <script>
        teste =
        Highcharts.stockChart('container', {
            chart:{
                methods: {
                    load: function () {
                        // set up the updating of the chart each second
                        setInterval(function () {
                            axios({
                                method: 'post', // verbo http
                                url: 'http://127.0.0.1:8000/chart', // url
                                data: {
                                    data1: 1, // Parâmetro 1 enviado
                                }
                            })
                                .then(response => {
                                    console.log(response);
                                    var x = (new Date()).getTime(); // current time
                                    var y =  response.data;
                                    console.log(response.data);
                                    data.addPoint([x, y], true, true);
                                })
                                .catch(error => {
                                    console.log(error)
                                });
                        });
                    }
                }
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    second: '%Y-%m-%d<br/>%H:%M:%S',
                    minute: '%Y-%m-%d<br/>%H:%M',
                    hour: '%Y-%m-%d<br/>%H:%M',
                    day: '%Y-%m-%d<br/>%H:%M',
                    week: '%Y<br/>%m-%d',
                    month: '%Y-%m',
                    year: '%Y'
                }
            },
            rangeSelector: {
                selected: 1
            },

            series: [{
                name: '',
                data: [
                    [Date.UTC(1970, 10, 25), 1],
                    [Date.UTC(1970, 11,  6), 0.25],
                    [Date.UTC(1970, 11, 20), 1.41],
                    [Date.UTC(1970, 11, 25), 1.64],
                    [Date.UTC(1971, 0,  4), 1.6],
                    [Date.UTC(1971, 0, 17), 2.55],
                    [Date.UTC(1971, 0, 24), 2.62],
                    [Date.UTC(1971, 1,  4), 2.5],
                    [Date.UTC(1971, 1, 14), 2.42],
                    [Date.UTC(1971, 2,  6), 2.74],
                    [Date.UTC(1971, 2, 14), 2.62],
                    [Date.UTC(1971, 2, 24), 2.6],
                    [Date.UTC(1971, 3,  1), 2.81],
                    [Date.UTC(1971, 3, 11), 2.63],
                    [Date.UTC(1971, 3, 27), 2.77],
                    [Date.UTC(1971, 4,  4), 2.68],
                    [Date.UTC(1971, 4,  9), 2.56],
                    [Date.UTC(1971, 4, 14), 2.39],
                    [Date.UTC(1971, 4, 19), 2.3],
                    [Date.UTC(1971, 5,  4), 2],
                    [Date.UTC(1971, 5,  9), 1.85],
                    [Date.UTC(1971, 5, 14), 1.49],
                    [Date.UTC(1971, 5, 19), 1.27],
                    [Date.UTC(1971, 5, 24), 0.99],
                    [Date.UTC(1971, 5, 29), 0.67],
                    [Date.UTC(1971, 6,  3), 0.18],
                    [Date.UTC(1971, 6,  4), 1]
                ]
            }]
        });
    </script>
@endsection