@extends("index")
@section("head")
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Device data </title>

    <!-- Bootstrap core CSS -->

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{URL::asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/maps/jquery-jvectormap-2.0.3.css')}}" />
    <link href="{{URL::asset('css/icheck/flat/green.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('css/floatexamples.css')}}" rel="stylesheet" type="text/css" />


    <script src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="{{URL::asset('//cdn.jsdelivr.net/jquery/1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('//cdn.jsdelivr.net/momentjs/latest/moment.min.js')}}"></script>


    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="{{URL::asset('//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css')}}" />



    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- bootstrap progress js -->
    <script src="{{URL::asset('js/progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{URL::asset('js/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <!-- icheck -->
    <script src="{{URL::asset('js/icheck/icheck.min.js')}}"></script>
    <!-- gauge js -->
    <script type="text/javascript" src="{{URL::asset('js/gauge/gauge.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/gauge/gauge_demo.js')}}"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="{{URL::asset('js/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/datepicker/daterangepicker.js')}}"></script>
    <!-- chart js -->
    <script src="{{URL::asset('js/chartjs/chart.min.js')}}"></script>
    <!-- sparkline -->
    <script src="{{URL::asset('js/sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{URL::asset('js/custom.js')}}"></script>
    <!-- skycons -->
    <script src="{{URL::asset('js/skycons/skycons.min.js')}}"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="{{URL::asset('js/excanvas.min.js')}}"></script><![endif] 'js/excanvas.min.js'  -->
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.pie.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.orderBars.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.time.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/date.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.spline.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.stack.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/curvedLines.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/flot/jquery.flot.resize.js')}}"></script>
    <!-- pace -->
    <script src="{{URL::asset('js/pace/pace.min.js')}}"></script>
@endsection
@section("body")
    <div id="datatypeC" data-field-id="{{$dtCount}}"></div>
    @for($i = 0; $i < $dtCount; $i++)
        <div id="repeatDiv" style="padding-bottom: 30px;">

            <div id="warningBlock" class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="wawa" data-value="lala"></div>
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                    </div>
                    {{--<div class="count" id="warning" style="color: red">Warning</div>--}}
                    <h1 style="color: red; font-family: Arial; padding-left: 5px">Warning</h1>

                    <h3 >{{$triggers[$i]->count()}}<small style="padding-left: 5px">actif triggers</small></h3>
                    <p></p>
                </div>
            </div>

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-calculator"></i>
                    </div>
                    <div class="count" id="pred">sklearn</div>

                    <h3 style="color: orange">Prediction<small> accuracy: 94.33%</small></h3>
                    <p></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph x_panel">
                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>Device data<small>  </small></h3>
                            </div>
                            <div class="col-md-6">
                                <div  class="reportrange-{{$i}} pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 50%">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                    <span></span> <b class="caret"></b>
                                </div>
                                <input type="submit" value="Predict a future values" onclick="window.open('/predict/{{$dtids[$i]}}');" class="btn btn-info btn-xs" style="background-color: darkorange; border: darkorange; height: 30px; width: 200px;"/>
                                <input id="btntest" type="submit" value="Apply date filter" onclick="test{{$i}}()" class="btn btn-info btn-xs" style="margin-left: 315px;"/>
                            </div>
                        </div>
                        <div class="x_content">
                            <div class="demo-container" style="height:250px">
        
                                <div class="placeholder3xx3-{{$i}}" class="demo-placeholder" style="width: 50%; height:300px; float: left"></div>

                                <div class="row" style="float: right; width: 50%; padding-left: 80px ">
                                    <div class="col-md-4" style="overflow-y:scroll; height:300px; width: 500px">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2 style="color: red">Warnings<small>{{$labelList[$i]}}</small></h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                @php
                                                    $valuess = array();
                                                @endphp
                                                @for($tr = 0; $tr < $triggers[$i]->count(); $tr++)
                                                    @php
                                                        $trigg = 0;
                                                        $op = ($triggers[$i])[$tr]->condition;

                                                    @endphp
                                                    @for($jj = 0; $jj < $devicesArray[$i]->count(); $jj++)
                                                        @php
                                                            eval('$res = ('.($devicesArray[$i])[$jj]->value. $op .($triggers[$i])[$tr]->value . ');');
                                                        @endphp
                                                        {{--<h1>res = {!! $res !!}</h1>--}}
                                                        @if($res == 1)
                                                            @php
                                                                $trigg++;
                                                            @endphp
                                                        @endif
                                                    @endfor
                                                    @php
                                                        $valuess[$tr] = $trigg;
                                                    @endphp
                                                @endfor
                                                @for($cp = 0; $cp < ($triggers[$i])->count(); $cp++)
                                                    <article class="media event">
                                                        <a class="pull-left date">
                                                            <p class="month">Actif</p>
                                                            <p class="day">{!! $valuess[$cp] !!}</p>
                                                        </a>
                                                        <div class="media-body">
                                                            <a class="title" href="#">Condition</a>
                                                            <p> When {{($triggers[$i])[$cp]->condition}} {{($triggers[$i])[$cp]->value}}</p>
                                                        </div>
                                                    </article>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mydataDivided-{{$i}}" data-myval="{{$devicesArray[$i]}}"></div>
            <div id="mydata" data-myval="{{$devicedata}}"></div>
            <div id="mydata2{{$i}}" data-myval="{{$labelList[$i]}}"></div>
            <div id="myTriggers{{$i}}" data-myval="{{$triggers[$i]}}"></div>
            <input id="warningValue" type="button" value="{{$warningValue}}" hidden />
        </div>

    @endfor

        <div id="repeatDivScript">
            @for($i = 0; $i < $dtCount; $i++)

                <script type="text/javascript">

                    var w = $('#warningValue').data("value");
                    var d2{!! $i !!} = $('#mydataDivided-{!! $i !!}').data("myval");
                    var lblList{!! $i !!} = $('#mydata2{!! $i !!}').data("myval");

                    var d1 = [[0,1]];
                    var i = 0;
                    var sum = 0;
                    d2{!! $i !!}.forEach(function(entry) {
                        d1[i] = [i, entry.value];
                        if (entry.value == w) {
                            sum = sum + 1;
                        }
                        //document.getElementById("warning").innerHTML = sum;
                        i = i + 1;
                    });

                    var options = {
                        series: {
                            curvedLines: {
                                apply: true,
                                active: true,
                                monotonicFit: true
                            }
                        },
                        colors: ["#26B99A"],
                        grid: {
                            borderWidth: {
                                top: 0,
                                right: 0,
                                bottom: 1,
                                left: 1
                            },
                            borderColor: {
                                bottom: "#7F8790",
                                left: "#7F8790"
                            }
                        }
                    };
                    var plot = $.plot($(".placeholder3xx3-{!! $i !!}"), [{
                        label: lblList{!! $i !!},
                        data: d1,
                        lines: {
                            fillColor: "rgba(150, 202, 89, 0.12)"
                        }, //#96CA59 rgba(150, 202, 89, 0.42)
                        points: {
                            fillColor: "#fff"
                        }
                    }], options);

                    var start;
                    var end;

                    $(function() {

                        start = moment().subtract(29, 'days');
                        end = moment();

                        function cb(s, e) {
                            $('.reportrange-{!! $i !!} span').html(s.format('MMMM D, YYYY') + ' - ' + s.format('MMMM D, YYYY'));
                            start = s;
                            end = e;
                        }


                        $('.reportrange-{!! $i !!}').daterangepicker({
                            startDate: start,
                            endDate: end,
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            }
                        }, cb);
                        cb(start, end);

                    });

                    function convertDate(inputFormat) {
                        function pad(s) { return (s < 10) ? '0' + s : s; }
                        var d = new Date(inputFormat);
                        return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/');
                    }

                    function test{!! $i !!}() {
                        var j = 0;
                        var date2 = new Date(start);
                        d1 = [[0,1]];
                        d2{!! $i !!}.forEach(function(entry) {
                            var date1 = new Date(entry.created_at.substr(0,10));
                            if(date1.getTime() >= date2.getTime() ){
                                d1[j] = [j,entry.value];
                            }
                            if(entry.value == w){
                                sum = sum + 1;
                            }
                            j = j+1;
                        });

                        var plot = $.plot($(".placeholder3xx3-{!! $i !!}"), [{
                            label: lblList{!! $i !!},
                            data: d1,
                            lines: {
                                fillColor: "rgba(150, 202, 89, 0.12)"
                            }, //#96CA59 rgba(150, 202, 89, 0.42)
                            points: {
                                fillColor: "#fff"
                            }
                        }], options);

                        window.onbeforeunload = function() {
                            return "Dude, are you sure you want to leave? Think of the kittens!";
                        }
                    }

                </script>
            @endfor
            </div>

    <script src="{{URL::asset('js/moris/raphael-min.js')}}"></script>
    <script src="{{URL::asset('js/moris/morris.min.js')}}"></script>
@endsection