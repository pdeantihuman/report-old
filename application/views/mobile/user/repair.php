<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>解决方法</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css"/>
    <script src="/static/js/jquery-2.1.4.min.js" type="application/javascript"></script>
    <script src="/static/js/bootstrap.js" type="application/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/static/css/logo.css"/>
</head>
<body>
<div class="container">
    <div id="top-head">
        <div class="container">
            <div class="row">
                <div id="img" class="col-xs-2"><img src="/static/img/tianjin.jpg"/></div>
                <div id="title" class="col-xs-10">解决方法:</div>
            </div>
            <div class="row">
                <div class="alert alert-success" id="solution"></div>
            </div>
            <div class="row">
                <em>问题没有解决？你可以进一步<a href="/m/user">故障申报</a></em>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var span = "<span class='glyphicon glyphicon-wrench'></span>&nbsp";
    		
    var id = window.location.href.match(/id=[0-9]/);
    id = String(id);    switch (id) {
        case "id=0":
            document.getElementById("solution").innerHTML
                = span + "检查教室供电总闸是否接通（教师总电闸在教室前门门后）。";
            break;
        case "id=1":
            document.getElementById("solution").innerHTML
                = span + "打开电教讲台右手侧小柜门，重启银白色WISE中控主机电源。";
            break;
        case "id=2":
            document.getElementById("solution").innerHTML
                = span + "打开电教讲台右手侧小柜门，重启银白色WISE中控主机电源。";
            break;
        case "id=3":
            document.getElementById("solution").innerHTML
                = span + "检查显示器面板上电源灯是否亮起，接通显示器电影。";
            break;
        case "id=4":
            document.getElementById("solution").innerHTML
                = span + "检查控制面板上信号源提示灯是否切换为计算机，如使用外接笔记本电脑需切换为笔记本。";
            break;
        case "id=5":
            document.getElementById("solution").innerHTML
                = span + "请严格遵循先启动教室电教系统后打开麦克连入教室音频系统的操作步骤，如发生串线请关闭无线麦克风电源再重新启动麦克连接即可。";
            break;
        case "id=6":
            document.getElementById("solution").innerHTML
                = span + "请按无线麦克上的音量调节按钮，降低音量。该问题是由于麦克音量调整过大所致。";
            break;
        case "id=7":
            document.getElementById("solution").innerHTML
                = span + "因计算机使用年限较长所致，请重启计算机即可正常完成启动。";
            break;
        case "id=8":
            document.getElementById("solution").innerHTML
                = span + "由于投影机有启动保护模块，刚关闭的投影机需散热后待机指示灯为橙色后，方可再次启动。散热等待时间大约两分钟。";
            break;
        case "id=9":
            document.getElementById("solution").innerHTML
                = span + "由于计算机老化所导致启动电压过低，重启计算机即可排除故障。";
            break;
    }
</script>
</body>
</html>
