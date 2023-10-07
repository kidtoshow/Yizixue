@extends('layouts.sbadmin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ asset('sb-admin/img/undraw_profile.svg') }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-1">{{ Auth::user()->role == 'normal' ? '一般用戶' : 'VIP用戶' }}</p>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">您感興趣的話題</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink" style="">
                                            <a class="dropdown-item" data-toggle="modal" 
                                            data-target="#edit-post-tag" href="#">編輯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="checkbox">
                                        @foreach ($Data['post_tags'] as $key => $value)
                                            <label>
                                                <input type="checkbox" name="variety" value="{{ $value->slug }}"
                                                    checked="checked" /><span
                                                    class="round button">{{ $value->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <style>
                                        #checkbox input[type="checkbox"] {
                                            display: none;
                                        }

                                        #checkbox input:checked+.button {
                                            background: #5e7380;
                                            color: #fff;
                                        }

                                        #checkbox .button {
                                            display: inline-block;
                                            margin: 0 5px 10px 0;
                                            padding: 5px 10px;
                                            background: #f7f7f7;
                                            color: #333;
                                            cursor: pointer;
                                        }

                                        #checkbox .button:hover {
                                            background: #bbb;
                                            color: #fff;
                                        }

                                        #checkbox .round {
                                            border-radius: 5px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">基本資料</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-profile"
                                            href="#" href="#">編輯</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">姓名</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">電話</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Line</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->line }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">地址</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">簡介</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink" style="">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#edit-description" href="#">編輯</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            {!! Auth::user()->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal 用戶簡介-->
        <div class="modal fade" id="edit-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的簡介</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value={{ Auth::user()->id }} name="uid" class="form-control"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <textarea id="article-ckeditor" name="description">{{ Auth::user()->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶簡介-->

        <!-- Modal 用戶基本資料-->
        <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的資料</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value="{{ Auth::user()->id }}" name="uid"
                                    class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="uname" class="form-label">姓名</label>
                                <input type="text" value="{{ Auth::user()->name }}" name="uname"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" value="{{ Auth::user()->email }}" name="email"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">電話</label>
                                <input type="text" value="{{ Auth::user()->phone }}" name="phone"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="line" class="form-label">Line Id</label>
                                <input type="text" value="{{ Auth::user()->line }}" name="line"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">地址</label>
                                <input type="text" value="{{ Auth::user()->address }}" name="address"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶基本資料-->

        <!-- Modal 用戶簡介-->
        <div class="modal fade" id="edit-post-tag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您感興趣的話題</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="checkbox">
                                @foreach ($Data['post_tags'] as $key => $value)
                                    <label>
                                        <input type="checkbox" name="variety" value="{{ $value->slug }}"
                                            checked="checked" /><span class="round button">{{ $value->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶簡介-->

    </div>
    <!-- /.container-fluid -->
@endsection
