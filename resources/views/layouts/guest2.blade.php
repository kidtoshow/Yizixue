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
    <!-- broccoli style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/broccoli-color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artical.css') }}">

</head>

<body>
<!-- Responsive navbar-->
<div >
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('uploads/images/logo.png')}}" alt="logo" class="w-25" id="logo">
        </a>
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <li class="nav-item"><a class="nav-link text-white" href="{{route('senior')}}">學長姐|快找</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('study-abroad')}}">留學誌|推薦</a></li>
                    @if(auth()->check())
                        <li class="nav-item"><a class="nav-link scrollFunction" href="{{route('home')}}">易子學系統</a></li>
                        <li class="nav-item">
                            <a href="{{route('home')}}">
                                <svg height="80" width="80" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <pattern id="image" patternUnits="userSpaceOnUse" height="80" width="80">
                                            @if(!is_null(auth()->user()->avatar))
                                                <image x="0" y="0" xlink:href="{{asset('uploads/'.auth()->user()->avatar)}}" width="80" height="80"></image>
                                            @else
                                                <image x="0" y="0" xlink:href="{{asset('uploads/images/default_avatar.png')}}" width="80" height="80"></image>
                                            @endif
                                        </pattern>
                                    </defs>
                                    <circle cx="40" cy="40" r="30" fill="url(#image)"/>
                                </svg>
                            </a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link scrollFunction" href="{{route('login')}}">註冊  |登入</a></li>
                        <li class="nav-item">
                            <svg height="80" width="80" xmlns="http://www.w3.org/2000/svg">
                                <circle r="30" cx="40" cy="40" fill="#C1C1C1" />
                            </svg>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid px-5 adjOnSingleArticle adjOnIntroduction">
    @yield('content')
</div>

<!-- Footer-->
    <footer class="py-5 bg-dark footer">
        <div class="row text-center text-white">
            <div class="col-md-4">
                <img src="{{asset('uploads/images/yzl-footer-logo.png')}}" alt="footer logo">
                <p class="copyright">@2022行家在線有限公司. All Right Reservec. | Powered by Match 19</p>
                <p>統一編號：83453577</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <h6>加入 | 易子學</h6>
                        <div>
                            <a href="{{route('login')}}">登入/註冊</a>
                            <a href="">聯絡我們</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6>關於 | 會員</h6>
                        <div>
                            <a href="{{route('senior')}}">找學長姐</a>
                            <a href="{{route('university-list')}}">找學校</a>
                            <a href="{{route('qna')}}">問與答</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6>關於 | 學長姐</h6>
                        <div>
                            <a href="{{route('pay-product-list')}}">成為學長姐</a>
                            <a href="">教戰手則</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6>關於 | 易子學</h6>
                        <div>
                            <a href="">關於我們</a>
                            <a href="">前輩網</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(".owl-carousel").owlCarousel({
        loop: true, // 循環播放
        margin: 10, // 外距 10px
        nav: false, // 顯示點點
        responsive: {
            0: {
                items: 1 // 螢幕大小為 0~600 顯示 1 個項目
            },
            600: {
                items: 2 // 螢幕大小為 600~1000 顯示 3 個項目
            },
            1000: {
                items: 4 // 螢幕大小為 1000 以上 顯示 5 個項目
            },
            1400: {
                items: 5 // 螢幕大小為 1000 以上 顯示 5 個項目
            }
        }
    });

    //broccoli toggle bar function
    function toggle() {
        var burger = $("#burger");
        var togglebar = $("#toggleBar");
        burger.toggleClass("burgerTurn");
        togglebar.toggleClass("noShow");
    }

    // join yzl function
    function joinYZL(togglebar){
        target = $("#joinYZL");
        target.toggleClass("d-flex flex-column align-items-center");
    }
</script>
<!-- cards click function -->
<script>
function cardClickable(id) {
    // console.log(id);
    location.href = document.location.origin + "/introduction/" + id;
}

function uniCardClick(uni){
    location.href = document.location.origin + "/senior?university=" + encodeURIComponent(uni);
}
</script>
<!-- end of cards click function -->
<script src="{{ asset('js/broccoli-sideBar.js')}}"></script>
</body>

</html>
