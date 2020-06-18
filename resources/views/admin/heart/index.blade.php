@extends('admin.layout.main')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">爱心榜单</h3>
                    </div>
                    <a type="button" class="btn " href="/admin/hearts/create" >增加单位</a>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>名称</th>
                                <th>专场</th>
                                <th>星指数</th>
                                <th>数额</th>
                                <th>备注</th>
                            </tr>
                            @foreach($hearts as $heart)
                                <tr>
                                    <td>{{$heart->id}}</td>
                                    <td>{{$heart->special}}</td>
                                    <td>{{$heart->name}}</td>
                                    <td>{{$heart->stars}}</td>
                                    <td>{{$heart->amount}}</td>
                                    <td>{{$heart->remarks}}</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-default heart-audit" heart-id="{{$heart->id}}">删除</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
