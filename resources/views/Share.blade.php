@extends("index")
@section("head")
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
@endsection
@section("body")
    <div id="social-links" style=" padding-left: 100px">
        <ul>
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.MHAF-IoT.com" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
        </ul>
        <ul>
            <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
        </ul>
        <ul>
            <li><a href="https://plus.google.com/share?url=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-google-plus"></span></a></li>
        </ul>
        <ul>
            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
        </ul>
        <textarea style="width: 1000px; height: 700px; padding-left: 20px" id="myInput"></textarea>
    </div>

@endsection
@section("script")



@endsection