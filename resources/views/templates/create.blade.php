@extends("index")
@section("head")
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <br/>
@endsection

@section("body")
    <form method="post", action='{{route('storethis')}}', class="form-horizontal form-label-left", novalidate>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Choose your device position </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="map"></div>
                    </br>
                    <span class="section">Template Info</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Device template name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="name", placeholder = 'Device template name', class = 'form-control col-md-7 col-xs-12', data-validate-length-range = '6', required = "required" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Location <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="location" placeholder = 'Location' id = 'loc' class = 'form-control col-md-7 col-xs-12' data-validate-length-range = '6' data-validate-words = "2" required />
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Time zone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="timeZone" required class ="form-control col-md-7 col-xs-12">
                                <option value="UTC-12:00" selected>UTC-12:00</option>
                                <option value="UTC-11:00">UTC-11:00</option>
                                <option value="UTC-10:00">UTC-10:00</option>
                                <option value="UTC-9:00">UTC-9:00</option>
                                <option value="UTC-8:00">UTC-8:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="description" placeholder="Description" required class="form-control col-md-7 col-xs-12" ></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">N° of packets <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="NoPackets" placeholder="'N° of packets" required class = "form-control col-md-7 col-xs-12"/>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Time Period <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="timePeriod" placeholder="Time Period" class="optional form-control col-md-7 col-xs-12" />
                            <select name="unity" class="optional form-control col-md-7 col-xs-12" >
                                <option value="Second" selected>Second</option>
                                <option value="Minute">Minute</option>
                                <option value="Hour">Hour</option>
                                <option value="Day">Day</option>
                                <option value="Week">Week</option>
                                <option value="Month">Month</option>
                                <option value="">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3">Data Source</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="dataSource" class="form-control col-md-7 col-xs-12" required >
                                <option value="HTTP, JSON">HTTP, JSON</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Login <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="lg" value="login_auto_generated" class="form-control col-md-7 col-xs-12" />
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" placeholder="password" type="password" class="form-control col-md-7 col-xs-12" required />
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >MQTT Topic <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="mqtttopic" value="mqtttopic_auto_generated" class="form-control col-md-7 col-xs-12"  />
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Data group list <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select multiple class ="form-control col-md-7 col-xs-12" name="datagrps[]">
                                @foreach($datagrp as $g)
                                    <option value="{{$g->_id}}">{{$g->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>-->
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
                            <input type="submit" class="btn btn-primary" value="sub"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section("script")

    <script>
        function initMap() {
            console.log("init maaaap");
            var uluru = {lat: 36.8992047, lng: 10.1875152};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });

            google.maps.event.addListener(map, 'mousedown', function(event) {
                placeMarker(event.latLng);
            });

            marker.addListener('click', function() {

            });

            function placeMarker(location) {
                marker.setPosition(location);
                var elem = document.getElementById("loc");
                elem.value = marker.getPosition();
            }
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdMuqgrGkkWa4qRl7l5WqZzZi09JtC3xg&callback=initMap">
    </script>

    <script src="js/bootstrap.min.js"></script>

    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- pace -->
    <script src="js/pace/pace.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- form validation -->
    <script src="js/validator/validator.js"></script>
    <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
                .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                .on('change', 'select.required', validator.checkField)
                .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
                .on('keyup blur', 'input', function() {
                    validator.checkField.apply($(this).siblings().last()[0]);
                });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function(e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function() {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function() {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
@endsection