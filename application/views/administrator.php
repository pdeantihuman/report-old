<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/static/css/layui.css"/>
    <script src="/static/js/jquery-2.1.4.min.js" type="application/javascript"></script>
    <script src="/static/js/bootstrap.js" type="application/javascript"></script>
    <script type="text/javascript" src="/static/js/layui.js"></script>
    <style type="text/css">
        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
<div class="container">
    <div id="top-head">
        <div class="container">
            <div class="row">
                <h2 class="text-center">故障：</h2>
            </div>
        </div>
    </div>
</div>

<div class="container table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <td>序号</td>
            <td>教学楼</td>
            <td>教室</td>
            <td>故障详情</td>
            <td>报修时间</td>
            <td>处理</td>
        </tr>

        <?php foreach ($list as $item): ?> <!--需要一个$list-->
            <tr>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['build'] ?></td>
                <td><?php echo $item['room'] ?></td>
                <td><?php echo $item['description'] ?></td>
                <td><?php echo $item['time'] ?></td>
                <td>
                    <button class="btn <?php if ($item['state'] == 0) echo 'btn-success'; else echo 'btn-disabled'; ?>"
                            onclick="finish('<?php echo $item['id'] ?>')" <?php if ($item['state'] == 1) echo 'disabled'; ?>>
                        解决
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
<div class="container">
    <div id="page" class="col-md-5 col-md-offset-7">
    </div>
</div>

<script type="text/javascript">
    var timer = setTimeout('window.location.reload()',5000);
    layui.use(['laypage', 'layer'], function () {
        var laypage = layui.laypage,
            layer = layui.layer;
        //自定义每页条数的选择项
        laypage.render({
            elem: 'page'
            , count: <?php echo $count; ?>
            , curr:<?php echo $page;?>
            , limit: 20 /*默认条数为20*/
            , jump: function (obj, first) {
                if (!first) {
                    location.href = '/admin?page=' + obj.curr + '&limit=20';
                }

            }


        });

    });

    function finish(num) {//点击解决按钮
        layer.confirm('确定已解决？', {icon: 3, title: '提示',success: function(layero, index){
                window.clearTimeout(timer);
            },end:function () {
                timer=setTimeout('window.location.reload()',5000);
            }}, function (index) {
            var $ = layui.jquery;
            $.ajax({
                url: "/api/deal",//TODO: 提交‘解决’的api
                type: "post",
                data: {
                    id: num
                },
                dataType: "json",
                success: function (data) {
                    if (data.state == 0) { /*TODO: 0代表成功，1代表失败*/
                        layer.msg(data.message, {
                            icon: 1,
                            time: 1000
                        }, function () {
                            location.reload();

                            /* TODO: 电教提交成功页面 */
                        });
                    } else {
                        layer.alert(data.message);
                    }
                }
            });
            layer.close(index);
        });
    }


</script>
</body>

</html>