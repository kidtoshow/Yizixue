@extends('layouts.guest')
@section('content')
        <!-- Header-->
        <header>
            <div class="headerCard">
                <div class="banner">
                    <img id="bannerImg" src="{{asset('uploads/images/banner_p1.jpg')}}">
                </div>
                <div class="slogan">
                    <h1 id="topic" class="display-5 fw-bolder text-white mb-2">海外留學，</h1>
                    <h1 class="display-5 fw-bolder text-white mb-5">先找學長姐罩</h1>
                    <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 me-sm-3"
                        href="{{route('senior')}}">學長姐 | 快找</a>
                </div>
            </div>

        </header>
        <!-- Features section-->
        <!-- Ucard Section -->
        <section class="py-5 border-bottom" id="features">
            <div class="uCardSection">
                <div class="row gx-5">
                    <div style="text-align:center; margin-bottom:100px">
                        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="{{route('university-list')}}">關注
                            | 學校</a>
                    </div>
                    <div class="owl-carousel owl-theme cards">

                        @foreach ($Data['University'] as $key => $university)
                            <div class="item">
                                <div>
                                    <div class="card">
                                        <div>
                                            <img src="{{asset($university->image_path)}}" width="200" height="200" alt="Card image cap">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name-card">
                                            <h6 class="ellipsis text-white">{{ \Illuminate\Support\Str::limit($university->chinese_name, 10) }}</h6>
                                            <small class="ellipsis"><a class="text-decoration-none text-white" href="{{route('senior', ['university' => $university->slug])}}">{{ \Illuminate\Support\Str::limit($university->english_name, 20) }}</a></small>
                                        </div>
                                        <div class="info">
                                            <h5>目前有<a href="{{route('senior', ['university' => $university->slug])}}">{{$university->vip->count()}}</a>位在校學長姐</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

            </div>
            </div>
        </section>

        <!-- Features section-->
        <!-- Student Card Section -->
        <section class="bg-light py-5 border-bottom" id="features">
            <div class="studentSection">
                <div class="row gx-5">
                    <div style="text-align:center; margin-bottom:100px">
                        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="{{route('senior')}}">關注
                            | 學長姐</a>
                    </div>

                    <div class="owl-carousel owl-theme studentNav">
                        @foreach ($Data['Users'] as $key => $user)
                            <!-- student card -->
                            <div class="item studentC">
                                <div>
                                    <div class="cards">
                                        <!-- <a href="{{ url('introduction/'.$user->id) }}"> -->
                                        <!-- student profile pic -->
                                        <div class="studentProfile">
                                            <div class="studentImg">
                                                @if(is_null($user->avatar))
                                                    <img src="{{asset('uploads/images/default_avatar.png')}}" alt="Card image cap" width="200" height="200">
                                                @else
                                                    <img src="/uploads/{{ $user->avatar }}" alt="Card image cap" width="200" height="200">
                                                @endif

                                            </div>
                                            <!-- video Btn -->
                                            <div class="videoBtn">
                                                @if(is_null($user->profile_video))
                                                    <a class="text" onClick="alert('學長姐尚未上傳影音');">
                                                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                                    </a>
                                                @else
                                                    <a href="{{ $user->profile_video }}" class="text" target="_blank">
                                                        <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                                    </a>
                                                @endif
                                            </div>
                                            <!-- react icons -->
                                            <div class="react">
                                                @if(auth()->check())
                                                    <i class="fa fa-heart"
                                                       style="
                                                       color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                                       "
                                                      data-id="{{$user->id}}"
                                                    >
                                                        <span class="text-black">{{$user->likedUser->count()}}</span>
                                                    </i>
                                                    <i class="fa fa-bookmark" data-id="{{$user->id}}"
                                                    style="
                                                        color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                                    "
                                                    >
                                                        <span class="text-black">{{$user->collectedUser->count()}}</span>
                                                    </i>
                                                @else
                                                    <i class="fa fa-heart" style="color: black;" data-id="{{$user->id}}">
                                                        <span class="text-black">{{$user->likedUser->count()}}</span>
                                                    </i>
                                                    <i class="fa fa-bookmark" data-id="{{$user->id}}">
                                                        <span class="text-black">{{$user->collectedUser->count()}}</span>
                                                    </i>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- name card -->
                                        <div class="name-card">
                                            <h4>{{ $user->name }}</h4>
                                            <h6>{{ !is_null($user->universityItem) ? $user->universityItem->english_name : '' }}</h6>
                                        </div>
                                        <!-- post tag -->
                                        <div class="postTags">
                                            @forelse ($user->postCategory as $count => $cate)
                                                @if ($count < 3)
                                                    <span href="#">#{{ $cate->postCategory->name }}</span>
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                        <?php
                                        $UserSkillRelation = $Data['UserSkillRelation']->where('user_id', $user->id)->get();
                                        ?>
                                        <!-- skill tag -->
                                        <div class="skillTags">
                                            @foreach ($UserSkillRelation as $key => $cateId)
                                                <?php
                                                $cate = $Data['Skills']->where('id', $cateId->skill_id)->first();
                                                ?>

                                                @if($key<6)
                                                    <span href="#">#{{ $cate->name }}</span>
                                                    @if($key==2)
                                                        <br>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- </a> -->
                                    </div>
                                    <p><a href="{{route('get-introduction',$user->id)}}" class="text-decoration-none text-black">點擊查看更多</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>


        <!-- QA section -->
        <section class="py-5" id="Qa">
            <div>
                <div style="text-align:center; margin-bottom:100px;">
                    <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 text-white" href="{{route('qna')}}">
                        諮詢｜問與答
                    </a>
                </div>
            </div>
            <div class="row">
                <!-- QA section 1 -->
                <div class="qaSection">
                    @foreach($Data['QaCategory']->take(4) as $category)
                        <div class="card">
                            <svg width="70" height="70">
                                <rect width="70" height="70" x="0" y="0" fill="gray"/>
                            </svg>
                            <div>
                                <h5>
                                    <a href="{{route('qna', ['category_id'=> $category->id])}}" class="text-decoration-none text-white" style="font-size: 1rem;">
                                        {{$category->name}}
                                    </a>
                                </h5>
                            </div>
                            @for($int=0;$int<3; $int++)
                                @if(!is_null($category->QACategoryRelation->get($int)))
                                    <p>
                                        <a href="{{route('qna.show', $category->QACategoryRelation->get($int)->qa->id)}}" class="text-decoration-none text-primary" style="font-size: 0.8rem; letter-spacing: normal">{{$category->QACategoryRelation->get($int)->qa->title}}</a>
                                    </p>
                                @else
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </p>
                                @endif
                            @endfor
                        </div>
                    @endforeach
                </div>
                <!-- QA section 2 -->
                <div class="qaSection">
                    @foreach($Data['QaCategory']->take(-4) as $category)
                        <div class="card">
                            <svg width="70" height="70">
                                <rect width="70" height="70" x="0" y="0" fill="gray"/>
                            </svg>
                            <div>
                                <h5>
                                    <a href="{{route('qna', ['category_id'=> $category->id])}}" class="text-decoration-none text-white" style="font-size: 1rem;">{{$category->name}}</a>
                                </h5>
                            </div>
                            @for($int=0;$int<3; $int++)
                                @if(!is_null($category->QACategoryRelation->get($int)))
                                    <p>
                                        <a href="{{route('qna.show', $category->QACategoryRelation->get($int)->qa->id)}}" class="text-decoration-none text-primary" style="font-size: 0.8rem; letter-spacing: normal">{{$category->QACategoryRelation->get($int)->qa->title}}</a>
                                    </p>
                                @else
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </p>
                                @endif
                            @endfor
                        </div>
                    @endforeach
                </div>
{{--                <a href="{{route('qna')}}" class="text-center text-decoration-none text-black">查看更多問答</a>--}}
            </div>
        </section>

        <!-- join -->
        <section class="joinSection">
            <div>
                <p>親身經驗</p>
                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="{{route('login')}}">加入 ｜ 易子學</a>
                <p>專業變現</p>
            </div>
        </section>


        <!-- news -->
        <section class="newsSection">
            <div style="text-align:center;">
                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="{{route('study-abroad')}}">最新 ｜ 消息</a>
            </div>
            <div class="bg-light">
                <div class="newsCard">
                    @if(!is_null($Data['Post']))
                    <img src="{{asset('uploads/'.$Data['Post']->image_path)}}" alt="news-pic">
                    <div class="info">
                        <h5 id="newsTopic">{{$Data['Post']->title}}</h5>
                        <p class="tag">
                            @forelse($Data['Post']->category as $relation)
                                #{{$relation->postCategory->name}}
                            @empty

                            @endforelse
                        </p>
                        <p class="meta">{{$Data['Post']->title}}</p>
                        <p class="brief">{!!  \Illuminate\Support\Str::limit(strip_tags($Data['Post']->body)) !!}</p>
                        <a href="{{route('article', $Data['Post']->id)}}">閱讀完整文章</a>
                    </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="localOlder">
            <h6>地區找學長姐</h6>
            <div>
                <p>
                    <a href="{{route('university-list', ['country'=>'USA'])}}" class="text-decoration-none text-black">美國</a>｜
                    <a href="{{route('university-list', ['country'=>'CANADA'])}}" class="text-decoration-none text-black">加拿⼤</a>｜
                    <a href="{{route('university-list', ['country'=>'UK'])}}" class="text-decoration-none text-black">英國</a>｜
                    <a href="{{route('university-list', ['country'=>'AUSTRALIA'])}}" class="text-decoration-none text-black">澳洲</a>｜
                    <a href="{{route('university-list', ['country'=>'NEW ZEALAND'])}}" class="text-decoration-none text-black">紐⻄蘭</a>｜
                    其他英語系國家
                </p>
                <p>
                    <a href="{{route('university-list', ['country'=>'FRANCE'])}}" class="text-decoration-none text-black">法國</a>｜
                    <a href="{{route('university-list', ['country'=>'GERMANY'])}}" class="text-decoration-none text-black">德國</a>｜
                    義大利｜
                    其他歐語系國家
                </p>
                <p>
                    <a href="{{route('university-list', ['country'=>'TAIWAN'])}}" class="text-decoration-none text-black">台灣</a>｜
                    <a href="{{route('university-list', ['country'=>'JAPAN'])}}" class="text-decoration-none text-black">⽇本</a>｜
                    <a href="{{route('university-list', ['country'=>'KOREA'])}}" class="text-decoration-none text-black">韓國</a>｜
                    其他亞洲
                </p>
                <p>
                    中國|
                    <a href="{{route('university-list', ['country'=>'SINGAPORE'])}}" class="text-decoration-none text-black">新加坡</a>
                    <a href="{{route('university-list', ['country'=>'HONG KONG'])}}" class="text-decoration-none text-black">香港</a>｜
                    <a href="{{route('university-list', ['country'=>'MACAU'])}}" class="text-decoration-none text-black">澳⾨</a>
                </p>
            </div>
        </section>


    <script>
        $('.fa-heart').click(function(){
            let that = $(this);
            $.ajax({
                url: 'like-user/' + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if(res.operator === 'no') {
                        alert(res.message);
                    } else if(res.operator === 'add') {
                        that.css('color', 'red');
                        that.children('span').text(res.total);
                    } else if(res.operator === 'reduce') {
                        that.css('color', 'black');
                        that.children('span').text(res.total);
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        })

        $('.fa-bookmark').click(function(){
            let that = $(this);
            $.ajax({
                url: 'collect-user/' + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if(res.operator === 'no') {
                        alert(res.message);
                    } else if(res.operator === 'add') {
                        that.removeClass('text-gray').addClass('text-danger');
                    } else if(res.operator === 'reduce') {
                        that.removeClass('text-danger').addClass('text-black');
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });

        })
    </script>

@endsection