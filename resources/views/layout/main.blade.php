<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Google Tag Manager -->
        <script>
        (
            function(w,d,s,l,i){
                w[l]=w[l]||[];
                w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
                var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),
                dl=l!='dataLayer'?'&l='+l:'';
                j.async=true;
                j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
                f.parentNode.insertBefore(j,f);
            }
            )
            (window,document,'script','dataLayer','GTM-KLWDDWL');
        </script>
        <!-- End Google Tag Manager -->

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="format-detection" content="telephone=no" />
        <title> @yield('title') Future Art Broadcast Trading</title>
        <link rel="icon" type="image/svg+xml" href="{{URL::asset('assets/logo/fabt.svg')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,regular,500,600,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"/>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/owl-carousel/assets/owl.carousel.min.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/photoswipe/photoswipe.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/photoswipe/default-skin/default-skin.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/select2/css/select2.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('layerslider/css/layerslider.css') }}" type="text/css">
        {{-- <script src="{{ URL::asset('layerslider/js/jquery.js') }}" type="text/javascript"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
        <script src="{{ URL::asset('layerslider/js/layerslider.utils.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
        @yield('stylesheet')
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.header-classic-variant-four.css') }}" media="(min-width: 1200px)"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.mobile-header-variant-one.css') }}" media="(max-width: 1199px)"/>
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fontawesome/css/all.min.css') }}" />
        <style>
        .ls-thumbnail-wrapper{
            display: none;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            /* change if the mask should have another color then white */
            z-index: 1099;
            /* makes sure it stays on top */
        }

        #status {
            width: 100%;
            height: 100vh;
            position: absolute;
            background: #fff url('/assets/loader/pageloader.gif') no-repeat center center;
            background-size: 30%;
        }

        @media only screen and (max-width: 600px) {
            #status {
                background-size: 70%;
            }
        }

      
        div#th{
            height:30px;
        }


        </style>

        {!! RecaptchaV3::initJs() !!}
  
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLWDDWL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->

        <div id="app">
            <div id="preloader">
                <div id="status">&nbsp;</div>
            </div>
            <div class="site" style="background-color: white">

                @include('layout.header')

                <!-- <div class="site__body"> -->
                    @yield('content')
                <!-- </div> -->
                @include('layout.footer')
            </div>
            @include('layout.mobilemenu')
        </div>

        <!--Start of Tawk.to Script-->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{},
        Tawk_LoadStart=new Date();
        (function(){
                var s1=document.createElement("script"),
                s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5dee92a543be710e1d2149c0/1drqbcuko';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->

        <script>
            $(window).on('load', function() {
                $('#status').fadeOut();
                $('#preloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow':'visible'});
            })
        </script>

        <!-- <script src="{{ public_path('js/app.js') }}"></script> -->
        <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/photoswipe/photoswipe.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/shipping.js') }}"></script>
        @yield('scripts')
        <script src="{{ URL::asset('assets/js/number.js') }}"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    </body>
</html>
