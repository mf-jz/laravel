@extends('admin.layout.main')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">增加单位</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="/admin/hearts/store" method="POST">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">专场</label>
                                    <input type="text" class="form-control" name="special" placeholder="请输入专场名称">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">名称</label>
                                    <input type="text" class="form-control" name="name" placeholder="请输入名称">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">星指数</label>
                                    <input type="text" class="form-control" name="stars" placeholder="请输入星指数数量">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">数额</label>
                                    <input type="text" class="form-control" name="amount" placeholder="数额">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">备注</label>
                                    <textarea class="form-control" name="remarks" placeholder="备注"></textarea>
                                </div>
                            </div>
                            @include('layout.error')
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection