<div id="globalDiv">
    <div id="repeatDiv">

        <div id="warningBlock" class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="wawa" data-value="lala"></div>
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                </div>
                <div class="count" id="warning">0</div>

                <h3 style="color: red">Warnings<small> condition ( == {{$warningValue}})</small></h3>
                <p></p>
            </div>
        </div>

        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-calculator"></i>
                </div>
                <div class="count" id="warning">{{$pred}}</div>

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
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 50%">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                <span></span> <b class="caret"></b>

                            </div>
                            <input id="btntest" type="submit" value="Apply" onclick="test()" class="btn btn-info btn-xs" />
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="demo-container" style="height:250px">
                            <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="mydata" data-field-id="{{$devicedata}}"></div>
        <div id="warningValue" data-field-id="{{$warningValue}}"></div>

