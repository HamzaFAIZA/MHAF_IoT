@extends("index")
@section("head")
    <link href="css/select/select2.min.css" rel="stylesheet">
@endsection

@section("body")
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Trigger</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="GET", action='{{route('chart')}}', class="form-horizontal form-label-left">
                {{ csrf_field() }}
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Type Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                            <select class="select2_group form-control" name="dataTypes[]">
                                @foreach($datatype as $data)
                                    <option value="{{$data->_id}}">{{$data->data_type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Threshold</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="number" name="accuracy" required="required" data-validate-minmax="0,100" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Action</label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right: 0px">
                        <select class="select2_group form-control" name="action">
                            <option value="Warning">Warning</option>
                            <option value="Mail" disabled>Mail</option>
                            <option value="SMS" disabled>SMS</option>
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
@endsection