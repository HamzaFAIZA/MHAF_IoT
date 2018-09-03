@extends("index")
@section("head")
    <title>MHAF IOT | Add a device</title>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>

@endsection

@section("body")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add a new device <small>Fill out the device's information</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div id="map"></div>
                    <div class="ln_solid"></div>
                    <form id="add_form" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('devices_add') }}">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location <br /><small>(Please select a location from the map above)</small></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="location" name="location" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="description" name="description" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-maxlength="100"
                                          data-parsley-validation-threshold="10">

                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Template</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="template[]" class="select2_single form-control" tabindex="-1">
                                    @foreach($templates as $t)
                                        <option value="{{$t->_id}}">{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
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
                var elem = document.getElementById("location");
                elem.value = marker.getPosition();
            }
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAdMuqgrGkkWa4qRl7l5WqZzZi09JtC3xg&callback=initMap">
    </script>
@endsection