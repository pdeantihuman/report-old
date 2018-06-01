<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>报修系统</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css"/>
    <script src="/static/js/jquery-2.1.4.min.js" type="application/javascript"></script>
    <script src="/static/js/bootstrap.js" type="application/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/static/css/logo.css"/>

</head>
<body>
<div class="container">
    <div class="container">
        <div id="img" class="col-xs-2"><img src="/static/img/tianjin.jpg"/></div>
        <div id="title" class="col-xs-10">请选择你所遇到的问题:</div>
    </div>

    <p id="select-question">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td><a href="repair?id=0"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 机柜打开后控制面板所有指示灯均不亮</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=1"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 机柜打开后控制面板指示灯连续闪烁</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=2"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 机柜打开后系统不能自动启动</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=3"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 计算机启动后显示器黑屏</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=4"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 计算机启动后投影幕蓝屏无信号</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=5"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 无线麦克串线进入其他教室</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=6"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 教室声音出现尖锐啸叫或轰鸣</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=7"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 计算机启动后不能正常进系统</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=8"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 关闭的投影机无法再次启动</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="repair?id=9"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"> 计算机按电源按钮后黑屏不启动</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </p>
</div>

</body>
</html>