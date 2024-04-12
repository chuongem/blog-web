<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    @php
        $descriptions = [];
        $keywords = [];
        $title = [];
    @endphp

    @forelse ($nav as $item)
        @if ($item['meta_description'] ?? false)
            @php $descriptions[] = $item['meta_description']; @endphp
        @endif

        @if ($item['meta_keyword'] ?? false)
            @php $keywords[] = $item['meta_keyword']; @endphp
        @endif

        @if ($item['meta_title'] ?? false)
            @php $title[] = $item['meta_title']; @endphp
        @endif
    @empty
    @endforelse

    @if (!empty($descriptions))
        <meta name="description" content="{{ implode(', ', $descriptions) }}">
    @endif

    @if (!empty($keywords))
        <meta name="keywords" content="{{ implode(', ', $keywords) }}">
    @endif
    @if (!empty($keywords))
        <title>{{ implode(' ', $title) }}</title>
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- other meta -->
    @yield('meta')

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Josefin+Sans%3A400%2C500%2C600%2C700%7CSource+Serif+Pro%3A400%2C400i%2C600%2C700%2C700i&subset=latin%2Clatin-ext&display=swap"
        rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>

    <!-- Css Styles -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/font-awesome.min.css">
    <link rel="stylesheet" href="/front/css/themify-icons.css">
    <link rel="stylesheet" href="/front/css/elegant-icons.css">
    <link rel="stylesheet" href="/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/front/css/nice-select.css">
    <link rel="stylesheet" href="/front/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/front/css/slicknav.min.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <link rel="stylesheet" href="/front/css/header/index.css">
    @php
            foreach($nav as $item) {
                if (str_contains(url()->current(), $item['slug'])) {
                    $itemCurrent = $item;
                }
            }
        @endphp
    <!-- Head Contents -->
</head>

<body>
    <!-- Start coding here -->
    <div class="menu-overlay"></div>

    <div id="wrapper">
        <!-- Header Section Begin -->

        <div class="wrapper-header">
            <nav class="navbar navbar-expand-lg navbar-light container">
                <a class="navbar-brand" href={{ route('home') }}>LogoZone</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach ($nav as $item)
                        <li class="nav-item">
                            <a @class([
                                'item', 
                                'active' => str_contains(url()->current(), $item['slug'])
                            ]) href={{ route('detail_feature', ['slug' => $item['slug']]) }}>{{ $item['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <div><i class="fa fa-search" aria-hidden="true"></i></div>
                </div>
            </nav>
        </div>

        {{-- Body here --}}
        <div class="container">
            @yield('body')
        </div>

        <!-- Footer Section Begin -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-left">
                            <div class="footer-logo">
                                <a href="index.html">
                                    {{-- <img src="front/img/footer-logo.png" height="25" alt=""> --}}
                                </a>
                            </div>
                            <ul>
                                <li>xã Tân Hiệp, Hóc Môn</li>
                                <li>Phone: +84 987654321</li>
                                <li>Email: shop@gmail.com</li>
                            </ul>
                            <div class="footer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="footer-widget">
                            <h5>Information</h5>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Serivius</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>My account</h5>
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Shopping Cart</a></li>
                                <li><a href="#">Shop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="newslatter-item">
                            <h5>Join Our Newsletter Now</h5>
                            <p>Get E-mail updates about our lastest shop and special offers.</p>
                            <form action="#" class="subscribe-form">
                                <input type="text" placeholder="Enter Your Mail">
                                <button type="button">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-reserved">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright-text">
                                Copyright @
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#"
                                    target="_blank">TeamChuong</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Footer Section End -->


    <!-- Js Plugins -->
    <script src="/front/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/front/js/plugins/bootstrap.min.js"></script>
    <script src="/front/js/plugins/jquery-ui.min.js"></script>
    <script src="/front/js/plugins/jquery.countdown.min.js"></script>
    <script src="/front/js/plugins/jquery.nice-select.min.js"></script>
    <script src="/front/js/plugins/jquery.zoom.min.js"></script>
    <script src="/front/js/plugins/jquery.dd.min.js"></script>
    <script src="/front/js/plugins/jquery.slicknav.js"></script>
    <script src="/front/js/plugins/owl.carousel.min.js"></script>
    <script src="/front/js/main.js"></script>
    <script src="/front/js/header/index.js"></script>
    <script>
        // $(document).ready(function () {
        //     $('.menu-link').click(function (e) {
        //         e.preventDefault();
        //         var imageUrl = $(this).data('image');

        //         // Show the container only if an image is associated
        //         if (imageUrl) {
        //             e.preventDefault(); // Prevent default behavior only if there's an associated image
        //             $('#feature-container').show();
        //             $('#feature-image').attr('src', imageUrl);
        //         } else {
        //             // Hide the container if there's no associated image
        //             $('#feature-container').hide();
        //         }
        //     });
        // });
    </script>
    @yield('scripts')
</body>

</html>
