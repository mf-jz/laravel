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
                            <h3 class="box-title">增加县区</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="/admin/countries/store" method="POST">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">时间</label>
                                    <input type="text" class="form-control" name="date_time" placeholder="请输入时间">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">县区</label>
                                    <input type="text" class="form-control" name="country_name" placeholder="请输入县区名称">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">干部</label>
                                    <input type="text" class="form-control" name="cadre" placeholder="请输入干部名字，多个名字用'，'逗号隔开">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">观看人数</label>
                                    <input type="text" class="form-control" name="person_time" placeholder="请输入观看人数，单位（万人）">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">销售金额</label>
                                    <input type="text" class="form-control" name="sales_amount" placeholder="请输入销售金额，单位（万元）">
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