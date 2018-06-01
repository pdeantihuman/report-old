<html>
<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 17-12-13
 * Time: 下午2:19
 */
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <title></title>
    <link href="/static/css/mui.css" rel="stylesheet"/>
    <style>
        #li {
            padding-top: 8px;
            padding-bottom: 3px;
        }

        html,
        body {
            background-color: #efeff4;
        }

        .mui-views,
        .mui-view,
        .mui-pages,
        .mui-page,
        .mui-page-content {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: #efeff4;
        }

        .mui-pages {
            top: 46px;
            height: auto;
        }

        .mui-scroll-wrapper,
        .mui-scroll {
            background-color: #efeff4;
        }

        .mui-page.mui-transitioning {
            -webkit-transition: -webkit-transform 300ms ease;
            transition: transform 300ms ease;
        }

        .mui-page-left {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .mui-ios .mui-page-left {
            -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
        }

        .mui-navbar {
            position: fixed;
            right: 0;
            left: 0;
            z-index: 10;
            height: 44px;
            background-color: #f7f7f8;
        }

        .mui-navbar .mui-bar {
            position: absolute;
            background: transparent;
            text-align: center;
        }

        .mui-android .mui-navbar-inner.mui-navbar-left {
            opacity: 0;
        }

        .mui-ios .mui-navbar-left .mui-left,
        .mui-ios .mui-navbar-left .mui-center,
        .mui-ios .mui-navbar-left .mui-right {
            opacity: 0;
        }

        .mui-navbar .mui-btn-nav {
            -webkit-transition: none;
            transition: none;
            -webkit-transition-duration: .0s;
            transition-duration: .0s;
        }

        .mui-navbar .mui-bar .mui-title {
            display: inline-block;
            width: auto;
        }

        .mui-page-shadow {
            position: absolute;
            right: 100%;
            top: 0;
            width: 16px;
            height: 100%;
            z-index: -1;
            content: '';
        }

        .mui-page-shadow {
            background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
            background: linear-gradient(to right, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
        }

        .mui-navbar-inner.mui-transitioning,
        .mui-navbar-inner .mui-transitioning {
            -webkit-transition: opacity 300ms ease, -webkit-transform 300ms ease;
            transition: opacity 300ms ease, transform 300ms ease;
        }

        .mui-page {
            display: none;
        }

        .mui-pages .mui-page {
            display: block;
        }

        .mui-page .mui-table-view:first-child {
            margin-top: 15px;
        }

        .mui-page .mui-table-view:last-child {
            margin-bottom: 30px;
        }

        .mui-table-view {
            margin-top: 20px;
        }

        .mui-table-view span.mui-pull-right {
            color: #999;
        }

        .mui-table-view-divider {
            background-color: #efeff4;
            font-size: 14px;
        }

        .mui-table-view-divider:before,
        .mui-table-view-divider:after {
            height: 0;
        }

        .mui-fullscreen {
            position: fixed;
            z-index: 20;
            background-color: #000;
        }

        .mui-ios .mui-navbar .mui-bar .mui-title {
            position: static;
        }
    </style>

</head>
<body class="mui-fullscreen">
<div class="mui-page-content">
    <div class="mui-scroll-wrapper">
        <div class="mui-scroll">
            <ul class="mui-card mui-table-view">
                <li class="mui-table-view-cell">
                    <a>报修时间<span class="mui-pull-right"><?php echo $time ?></span></a>
                </li>

                <li class="mui-table-view-cell">
                    <a>报修地点<span class="mui-pull-right"><?php echo $build . '教学楼 ' . $room . ' 室 ' ?></span></a>
                    <!--TODO: 需要php拼接字符串-->
                </li>
            </ul>
            <ul class="mui-card mui-table-view">
                <li class=" mui-table-view-cell mui-collapse">
                    <a class="mui-navigate-right" href="#">报修详情</a>
                    <div class="mui-collapse-content">
                        <p><?php echo $description ?></p>
                    </div>
                </li>
            </ul>

            <ul class="mui-card mui-table-view">

                    <form action="/api/mobile/deal" method="post">
                        <div class="mui-input-row" hidden>
                            <label>id</label>
                            <input type="text" name="id" class="mui-input-clear" value="<?php echo $id ?>">
                        </div>

                        <div class="mui-button-row">
                            <input class="mui-btn mui-btn-primary" type="submit" value="完成" <?php if ($state==1) echo 'disabled'; ?>/>
                        </div>
                    </form>

            </ul>

        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="/static/js/mui.min.js"></script>
<script type="text/javascript">
    (function ($) {
        $('#scroll').scroll({
            indicators: false //是否显示滚动条
        });
        mui('.mui-scroll-wrapper').scroll({
            deceleration: 0.0005 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
        });
    })(mui);
</script>
</html>
