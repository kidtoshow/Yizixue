<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>易子學</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/sbf-style.css') }}" rel="stylesheet" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <style>
        .middle {
            width: 50px;
            position: absolute;
            top: 10%;
            left: 10%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .name-card {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 50px;
            padding-right: 50px;
            background: #BD9EBE;
            text-align: center;
        }
        footer a {
            text-decoration: none;
            color: white;
        }
        footer .col-md-3 p {
            font-size: 1.5rem;
        }
    </style>

</head>

<body>
<!-- Responsive navbar-->
<div class="container-fluid px-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand p-5" href="{{url('/')}}">
            <img src="{{asset('uploads/images/logo.png')}}" alt="logo" class="w-25" id="logo">
        </a>
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    @if(auth()->check())
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('senior')}}">學長姐|快找</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('study-abroad')}}">留學誌|推薦</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('login')}}">註冊  |登入</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid px-5">
    @yield('content')
</div>

<!-- Footer-->
<div class="container-fluid px-5 mt-3">
    <footer class="py-5 bg-dark footer">
        <div class="row text-center text-white">
            <div class="col-md-4">
                <p style="font-size: 3.5rem;">行 家 在 線</p>
                <p class="text-uppercase"><span style="font-size: 1.5rem;">H</span>ANG <span style="font-size:1.5rem;">J</span>IA</p>
                <p>@2022行家在線有限公司. All Right Reservec. | Powered by Match 19</p>
                <p>統一編號：83453577</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <p style="font-size: 1.5rem;">加入 | 易子學</p>
                        <a href="{{route('login')}}" style="text-decoration: none; color:white; pb-5">登入/註冊</a>
                        <br>
                        <a href="">聯絡我們</a>
                    </div>
                    <div class="col-md-3">
                        <p>關於 | 會員</p>
                        <a href="{{route('senior')}}">找學長姐</a>
                        <br>
                        <a href="">找學校</a>
                        <br>
                        <a href="">問與答</a>
                    </div>
                    <div class="col-md-3">
                        <p>關於 | 學長姐</p>
                        <a href="">成為學長姐</a>
                        <br>
                        <a href="">教戰手則</a>
                    </div>
                    <div class="col-md-3">
                        <p>關於 | 易子學</p>
                        <a href="">關於我們</a>
                        <br>
                        <a href="">前輩網</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(".owl-carousel").owlCarousel({
        loop: true, // 循環播放
        margin: 10, // 外距 10px
        nav: true, // 顯示點點
        responsive: {
            0: {
                items: 1 // 螢幕大小為 0~600 顯示 1 個項目
            },
            600: {
                items: 3 // 螢幕大小為 600~1000 顯示 3 個項目
            },
            800: {
                items: 4 // 螢幕大小為 1000 以上 顯示 5 個項目
            },
            1500: {
                items: 4 // 螢幕大小為 1000 以上 顯示 5 個項目
            }
        }
    });
</script>
</body>

</html>
