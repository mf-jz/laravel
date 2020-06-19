<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>助农爱心榜</title>
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
            font-size: 20px;
            border-collapse: collapse;
        }

        .table tr td {
            text-align: left;
            padding: 20px 25px;
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

        .base-color {
            background-color: rgba(255, 255, 255, 0.15);
            font-size: 34px;
        }

        .center {
            text-align: center !important;
        }

        #list1, #list2 {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="title">
    <img src="./images/title.png" alt="标题" width="50%">
</div>
<div class="frame">
    <table class="table" style="width: 90%; height: 150px; margin: 50px auto 0 auto; font-size: 34px; color: #ffffff">
        <tr>
            <td width="38%">名称</td>
            <td width="20%">星指数</td>
            <td width="25%">数额</td>
            <td>备注</td>
        </tr>
    </table>
    <div id="box">
        <table id="list1" class="table">
            @foreach($specials as $special)
                <tr class="base-color">
                    <td colspan="4">{{$special->special}}</td>
                </tr>
                @foreach($hearts as $heart)
                    @if($heart->special == $special->special)
                        <tr>
                            @if($heart->num != 0)
                                <td width="38%"
                                    @if($heart->num != 1) rowspan="{{$heart->num}}" @endif>{{$heart->name}}</td>
                            @endif
                            @if($heart->num != 0)
                                <td class="center" width="20%" @if($heart->num != 1) rowspan="{{$heart->num}}" @endif>
                                    @for($i = 0; $i < $heart->stars; $i++)
                                        <img src="./images/star.png" alt="心">
                                    @endfor
                                </td>
                            @endif
                            <td width="25%">{{$heart->amount}}</td>
                            <td>{{$heart->remarks}}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
        <table id="list2" class="table"></table>
    </div>
</div>
</body>
<script type="text/javascript">
    var box = document.getElementById("box");
    var l1 = document.getElementById("list1");
    var l2 = document.getElementById("list2");
    l2.innerHTML = l1.innerHTML;//克隆list1的数据，使得list2和list1的数据一样
    function scrollup() {
        if (box.scrollTop >= l1.offsetHeight) { //滚动条距离顶部的值恰好等于list1的高度时，达到滚动临界点，此时将让scrollTop=0,让list1回到初始位置，实现无缝滚动
            box.scrollTop = 0;
        } else {
            box.scrollTop++;
        }
    }

    var scrollMove = setInterval(scrollup, 30);//数值越大，滚动速度越慢

    //鼠标经过时，滚动停止
    box.onmouseover = function () {
        clearInterval(scrollMove)
    }

    //鼠标离开时，滚动继续
    box.onmouseout = function () {
        scrollMove = setInterval(scrollup, 30);
    }
</script>
</html>