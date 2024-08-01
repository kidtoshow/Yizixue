@extends('layouts.guest2')
@section('content')


<div class="l-aboutUs">
    <!-- swiper carousel -->
    <div class="l-aboutUs__aboutSwiper s-bannerSwiperCustom">
        <div class="c-bannerCarousel swiper aboutUsSwiper">
            <div class="swiper-wrapper">
                @forelse($carousels as $carousel)
                    <div class="swiper-slide">
                        <!-- put the picture resource here -->
                        <span class="c-bannerCarousel__slide"
                              style="background-image: url('{{asset('uploads/'.$carousel->image_path)}}') ;">&nbsp;</span>
                    </div>
                @empty
                <div class="swiper-slide">
                    <!-- put the picture resource here -->
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-1.jpg')}}') ;">&nbsp;</span>
                </div>
                <!-- these slides are just DEMOs, you can delete them after back-end setting -->
                <div class="swiper-slide">
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-2.jpg')}}') ;">&nbsp;</span>
                </div>
                <div class="swiper-slide">
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-3.jpg')}}') ;">&nbsp;</span>
                </div>
                <div class="swiper-slide">
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-4.jpg')}}') ;">&nbsp;</span>
                </div>
                @endforelse
                <!-- end of the DEMOs -->
            </div>
            <div class="aboutUsPagi paginationCustom"></div>
        </div>
    </div>

    <!-- sponsor section -->
    <div class="l-aboutUs__sponsor">
        <div class="container">
            <div class="row">
                <div class="col-md-3 p-5">
                    <img src="{{asset('uploads/images/goals.png')}}" alt="">
                </div>
                <div class="col-md-6 p-5">
                    <div class="row l-aboutUs__centerBorder p-5">
                        <!-- put the picture resource here -->
                        <img class="col-md-4" src="{{asset('uploads/images/about_sponsor_2.png')}}" alt="">
                        <img class="col-md-4" src="{{asset('uploads/images/quality-icon.png')}}" alt="">
                        <img class="col-md-4" src="{{asset('uploads/images/decent-icon.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-3 p-5">
                    <img src="{{asset('uploads/images/csr.png')}}" alt="">
                </div>
            </div>
            <div class="row p-5">
                @if(empty($content))
                    <p></p>
                @else
                    <p>
                        {!! $content->content !!}
                    </p>
                @endif
            </div>
        </div>
    </div>

    <!-- student swiper carousel -->
    <div class="l-aboutUs__team mt-5">
        <h2 class="o-subTitle w-25">經營團隊</h2>
        <div class="l-aboutUs__teamSwiper">
            <div class="s-swiperCustom">
                <div class="swiper teamSwiper">
                    <div class="swiper-wrapper">
                        <!-- the following card are just a demo, please replace it with the new back-end ver you made, thx ;) -->
                        @forelse($managers as $user)
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper" onclick="cardClickable({{ $user->id }})">
                                <!-- img div -->
                                @if(is_null($user->avatar))
                                    <span class="c-studentCardSwiper_studentImg"
                                          style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                @else
                                    <span class="c-studentCardSwiper_studentImg"
                                          style="background-image: url('/uploads/{{ $user->avatar }}');">&nbsp;</span>
                                @endif
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset($user->universityItem->image_path)}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">{{ ($user->name) ? \Illuminate\Support\Str::limit($user->name,10): "" }}</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">{{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->english_name, 15) : '' }}</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">{{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->chinese_name, 10) : '' }}</h6>
                                <!-- react icons -->
                                @if(auth()->check())
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi @if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) bi-heart-fill @else bi-heart @endif like-user"
                                       style="color:
                                       @if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif"
                                       data-id="{{$user->id}}">
                                            <span>{{$user->likedUser->count()}}</span>
                                    </i>
                                    <i class="bi @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) bi-bookmark-fill @else bi-bookmark @endif collect-user"
                                       style="color:
                                       @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif"
                                       data-id="{{$user->id}}">
                                            <span>{{$user->collectedUser->count()}}</span>
                                    </i>
                                </div>
                                @else
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart like-user" data-id="{{$user->id}}">
                                        <span>{{$user->likedUser->count()}}</span>
                                    </i>
                                    <i class="bi bi-bookmark collect-user" data-id="{{$user->id}}">
                                        <span>{{$user->collectedUser->count()}}</span>
                                    </i>
                                </div>
                                @endif
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    @forelse ($user->postCategory as $count => $cate)
                                        @if ($count < 3) <a href="{{route('senior', ['category' => $cate->postCategory->id])}}" class="text-white">
                                            {{ $cate->postCategory->name }}
                                        </a>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        <!-- end of the demo -->
                    </div>
                    <div class="teamPagi paginationCustom"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- read more -->
                <a class="o-readMore" href="/senior">查看更多 &gt;</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
<script>
    $('.like-user').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('like-user')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart-fill').css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart').css('color', 'black');
                    that.children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    })

    $('.collect-user').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('collect-user')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark-fill').css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark').css('color', 'black');
                    that.children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });

    })
</script>
@endsection