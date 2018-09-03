@extends("index")
@section("head")

    <!-- select2 -->
    <link href="css/select/select2.min.css" rel="stylesheet">
@endsection

@section("body")
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Data Group</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li style="float: right"><a href="/dataGroup"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" novalidate action="/dataGroupForm" method="post">
                {{ csrf_field() }}
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Group Name</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                               name="name" placeholder="Name"
                               required="required" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" rows="3" placeholder='Description' name="description"></textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Accuracy Level</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="number" name="accuracy" required="required" data-validate-minmax="0,100" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0px" >
                            <input type="number" id="number" name="time_period" required="required" data-validate-minmax="0,100" class="form-control col-md-7 col-xs-12">
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12" style="padding-right: 4px">
                            <select class="select2_group form-control" name="time_unit" >
                                <option value="Second">Second</option>
                                <option value="Minute">Minute</option>
                                <option value="Hour">Hour</option>
                                <option value="Day">Day</option>
                                <option value="Week">Week</option>
                                <option value="Month">Month</option>
                                <option value="Year">Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Action</label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                        <select class="select2_group form-control" name="action">
                            <option value="Second">Blacklist Device</option>
                            <option value="Minute">Mark Data Model as Malfunctioning</option>
                            <option value="Hour">None</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Multiple</label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                        <select class="select2_group form-control" multiple name="dataTypes[]">
                            @foreach($datas as $data)
                                <option value="{{$data->_id}}">name : {{$data->data_type_name}}, description : {{$data->data_type_unit}} </option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section("script")


    <!-- switchery -->
    <script src="js/switchery/switchery.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>

    <!-- select2 -->
    <script src="js/select/select2.full.js"></script>
    <!-- select2 -->

    <!-- form validation -->
    <script src="js/validator/validator.js"></script>

    <!-- pace -->
    <script src="js/pace/pace.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
            $(".select2_group").select2({});
        });
    </script>
    <!-- /select2 -->
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