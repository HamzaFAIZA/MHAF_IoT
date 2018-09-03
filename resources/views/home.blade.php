@extends("index")
@section("head")

@endsection

@section("body")

    <a href="{{ route('predict') }}"><i class="fa fa-home"></i>prediction</a>
    <input type="submit" value="cliick" onclick="window.open('predict');" />
@endsection

@section("script")
@endsection