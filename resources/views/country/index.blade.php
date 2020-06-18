<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>晋品晋味 助农益农</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #091633;
            background-image: url("./images/bg.jpg");
            background-size: 100% auto;
            background-repeat: no-repeat;
        }

        .title {
            width: 100%;
            text-align: center;
            margin-top: 80px;
        }

        .table {
            color: rgba(255, 255, 255, 0.9);
            font-size: 24px;
            border-collapse: collapse;
        }

        .table tr td {
            text-align: center;
            padding: 20px 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #box {
            width: 93%;
            height: 1200px;
            overflow: hidden;
            margin: 0 auto;
        }

        .frame {
            background-image: url("./images/frame.png");
            background-size: 95% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        #list1 {
            width: 100%;
        }

        #list1 tr td {
            width: 20%;
        }
    </style>
</head>
<body>
<div class="title">
    <img src="./images/county_title.png" alt="标题" width="50%">
</div>
<div class="frame">
    <table class="table" style="width: 93%; height: 150px; margin: 50px auto 0 auto; font-size: 28px; color: #ffffff">
        <tr>
            <td width="20%">时间</td>
            <td width="20%">县区</td>
            <td width="20%">参与干部</td>
            <td width="20%">
                <p>观看人数</p>
                <p>(万人)</p>
            </td>
            <td width="20%">
                <p>销售金额</p>
                <p>(万元)</p>
            </td>
        </tr>
    </table>
    <div id="box">
        <table id="list1" class="table">
            @foreach($countries as $country)
            <tr>
                <td>{{$country->date_time}}</td>
                <td>{{$country->country_name}}</td>
                <td>{{$country->cadre}}</td>
                <td>{{$country->person_time}}</td>
                <td>{{$country->sales_amount}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>