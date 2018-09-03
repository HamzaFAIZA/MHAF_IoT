@extends("index")
@section("head")
@endsection

@section("body")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Data Type <small> edit the DataType that maches sensor's data</small></h2>
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
                </div>
                <div class="clearfix"></div>
                <form  data-parsley-validate class="form-horizontal form-label-left" action="{{ URL::to('/updatedatatype/'.$datatypes->id)}}"  method="get">
                    <div class="x_content">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_type_name"> DataType Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="data_type_name" class="form-control col-md-7 col-xs-12" name="data_type_name" placeholder="Enter the DataType Name " required="required" type="text" value="  {{$datatypes->data_type_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Unit" class="control-label col-md-3 col-sm-3 col-xs-12">Unit</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="data_type_unit"  name="data_type_unit"  class="form-control col-md-7 col-xs-12" placeholder="Enter the DataType Unit "  type="text"  value=" {{$datatypes->data_type_unit }}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Type" class="control-label col-md-3 col-sm-3 col-xs-12">Type <span class="required">*</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select   class="form-control col-md-7 col-xs-12" placeholder="Enter the DataType Type " id="data_type_type"  name="data_type_type" required="required" type="text" >
                                    <option> {{$datatypes->data_type_type }}</option>
                                    <option value="Integer">Integer</option>
                                    <option value="Long">Long</option>
                                    <option value="Float">Float</option>
                                    <option value="Double">Double</option>
                                    <option value="Short">Short</option>
                                    <option value="Boolean">Boolean</option>
                                    <option value="Text">Text</option>
                                    <option value="TimeStamp">TimeStamp</option>
                                    <option value="Char">Char</option>
                                    <option value="Binary">Binary</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button id="send" type="submit"  class="btn btn-success">Submit</button>
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