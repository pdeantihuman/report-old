<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>解决方法</title>
    <link rel="stylesheet" type="text/css" href="/static/css/logo.css"/>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css"/>
    <!--<script src="js/jquery-2.1.4.min.js" type="application/javascript"></script>-->
    <!--<script src="js/bootstrap.js" type="application/javascript"></script>-->
    <style>
        input {
            width: 80px;
        }
    </style>
</head>

<body>
<div class="container">

    <div class="container">
        <div class="row">
            <div class="container">
                <div id="img" class="col-xs-2"><img src="/static/img/tianjin.jpg"/></div>
                <div id="title" class="col-xs-10">故障解决方法:</div>
            </div>
        </div>
        <div class="row">
            <div class="alert alert-success" id="solution">
                <?php echo $content ?>
            </div>
        </div>
        <div class="row text-center" style="margin-bottom: 20px;">
            <input class="btn btn-info" type="button" value="是" onclick="yes()"/>
            <input class="btn btn-info" type="button" value="否" onclick="no()"/>
        </div>

    </div>
    <script type="text/javascript">
        function yes() {
            document.location.href = "<?php echo $leftChild?>";
        }

        function no() {
            document.location.href = "<?php echo $rightChild?>";
        }
    </script>
</body>
</html>
