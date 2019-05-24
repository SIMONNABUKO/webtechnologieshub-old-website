<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CeRLS Library') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('OwlCarousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('OwlCarousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    
        @include('inc.nav')
        <div class="container">
            @include('inc.messages')
            
            @yield('content')
             </div>
       
  
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script src="{{ asset('OwlCarousel/dist/owl.carousel.min.js') }}"></script>
    
      <script>$(document).ready(function() {
 
        $(".owl-carousel").owlCarousel({
       
            navigation : true, // Show next and prev buttons
       
            slideSpeed : 300,
            paginationSpeed : 400,
       
            items : 2, 
            itemsDesktop : false,
            itemsDesktopSmall : false,
            itemsTablet: true,
            itemsMobile : true,
            loop:true,
    margin:10,
    autoplay:true
       
        });
       
      });</script>

      <script>
      // Open the full screen search box 
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

// Close the full screen search box 
function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
      </script>
      
      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bfcbd4279ed6453ccab4513/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
      
</body>
</html>
