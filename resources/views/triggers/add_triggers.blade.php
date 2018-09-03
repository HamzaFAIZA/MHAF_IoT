
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 3/5/2018
 * Time: 9:23 PM
 */



@extends("index")
@section("head")
@endsection

@section("body")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>TRIGGERS <small> create a Trigger </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
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
                </div>

                <div class="clearfix"></div>
                <form  data-parsley-validate class="form-horizontal form-label-left" action="{{ URL::to('/inserttrigger') }}"  method="get">
                    <div class="x_content">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Trigger Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="data_type_name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Enter the Trigger Name " required="required" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Type" class="control-label col-md-3 col-sm-3 col-xs-12">  DataType Type <span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select   class="form-control col-md-7 col-xs-12" placeholder="Enter the DataType  " id="datatype"  name="datatype" required="required" type="text" >
                                    @foreach($datatypes as $data)
                                        <option value="{{$data->_id}}">{{$data->data_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="condition" class="control-label col-md-3 col-sm-3 col-xs-12">  condition </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{--<input id="condition"  name="condition"  class="form-control col-md-7 col-xs-12" placeholder="Enter the DataType Condition"  type="text" >--}}
                                <select id="condition"  name="condition" class="form-control col-md-7 col-xs-12">
                                    <option value="==">==</option>
                                    <option value=">=">>=</option>
                                    <option value="<="><=</option>
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value" class="control-label col-md-3 col-sm-3 col-xs-12">  value </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="value"  name="value"  class="form-control col-md-7 col-xs-12" placeholder="Enter  value"  type="text" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="action" class="control-label col-md-3 col-sm-3 col-xs-12">  action </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="action"  name="action"  class="form-control col-md-7 col-xs-12" placeholder="Enter the action"  type="text" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer content -->
    <footer>
        <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->


@endsection

@section("script")
@endsection