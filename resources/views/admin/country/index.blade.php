@extends('admin.layout.main')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">县区列表</h3>
                    </div>
                    <a type="button" class="btn " href="/admin/countries/create" >增加县区</a>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>时间</th>
                                <th>县区</th>
                                <th>参与干部</th>
                                <th>观看人数(万人)</th>
                                <th>销售金额(万人)</th>
                            </tr>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$country->id}}</td>
                                    <td>{{$country->date_time}}</td>
                                    <td>{{$country->country_name}}</td>
                                    <td>{{$country->cadre}}</td>
                                    <td>{{$country->person_time}}</td>
                                    <td>{{$country->sales_amount}}</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-default country-audit" country-id="{{$country->id}}">删除</button>
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
