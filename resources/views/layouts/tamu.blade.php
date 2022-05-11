<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ isset($title) ? $title.' | '.config('app.name') : config('app.name')}}</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/myland/css/bootstrap.css">
        <link rel="stylesheet" href="/myland/vendors/linericon/style.css">
        <link rel="stylesheet" href="/myland/css/font-awesome.min.css">
        <link rel="stylesheet" href="/myland/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/myland/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/myland/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/myland/vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="/myland/css/style.css">
        <link rel="stylesheet" href="/myland/css/responsive.css">
        <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="/scss/style.css">
    </head>
    <body>
        <!--================Header Area =================-->
        @include('layouts.inc_tamu.navbar')
        <!--================Header Area =================-->
        
        <!--================Banner Area =================-->
        @include('layouts.inc_tamu.banner')
        <!--================Banner Area =================-->
        
        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap">
            @yield('content')
        </section>
        <!--================ Accomodation Area  =================-->
        
        <!--================ Facilities Area  =================-->
        @yield('content_fasilitas')
        <!--================ Facilities Area  =================-->
        
        <!--================ start footer Area  =================-->	
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About</h6>
                            <p>Hotel kami berdiri sejak 2021 awal januari hingga sekarang kami masih mengembangkan hotel kami.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Alamat</h6>
                            <p>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.679866530494!2d115.21999346445686!3d-8.816115143668663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd25ccdc33d4bab%3A0xc10b8c22a6bfc3f6!2sMulia%20Resort%20-%20Nusa%20Dua%20Bali!5e0!3m2!1sid!2sid!4v1648030877844!5m2!1sid!2sid" width="512" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </p>   
                        </div>
                     
                    </div>												
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">The Mulia Bali</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/myland/js/jquery-3.2.1.min.js"></script>
        <script src="/myland/js/popper.js"></script>
        <script src="/myland/js/bootstrap.min.js"></script>
        <script src="/myland/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/myland/js/jquery.ajaxchimp.min.js"></script>
        <script src="/myland/js/mail-script.js"></script>
        <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/adminlte/dist/js/adminlte.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="/myland/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="/myland/vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="/myland/js/mail-script.js"></script>
        <script src="/myland/js/stellar.js"></script>
        <script src="/myland/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="/myland/js/custom.js"></script>
        @stack('js')
    </body>
</html>