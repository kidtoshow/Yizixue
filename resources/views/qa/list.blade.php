@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">您的所有QA</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 93px;">QA問題</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 136px;">內容</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 68px;">分類</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 31px;">時間</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 31px;">動作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($Data['QandA'] as $key => $qa)
                                        <tr>
                                            <td>{{$qa->title}}</td>
                                            <td>{!!substr($qa->body, 0, 300)!!}...</td>
                                            <td>{{$qa->category}}</td>
                                            <td>{{$qa->created_at}}</td>
                                            <td>
                                            <a href="/view-qa/{{$qa->uuid}}" type="button" class="btn btn-success" data-dismiss="modal">查看QA</a>
                                            <a href="/edit-qa/{{$qa->uuid}}" type="button" class="btn btn-primary" data-dismiss="modal">編輯QA</a>
                                            <a href="/delete-qa/{{$qa->uuid}}" type="button" class="btn btn-danger" data-dismiss="modal">刪除QA</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
