<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\AppServ\www/application/wap/view/first/store\cut_list.html";i:1555899697;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
    <meta name="browsermode" content="application"/>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- 禁止百度转码 -->
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!-- uc强制竖屏 -->
    <meta name="screen-orientation" content="portrait">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="portrait">
    <link rel="stylesheet" href="/public/wap/first/bargain/css/reset.css">
    <link rel="stylesheet" href="/public/wap/first/bargain/css/base.css">
    <link rel="stylesheet" href="font/iconfont.css">
    <link rel="stylesheet" href="/public/wap/first/bargain/css/swiper.min.css">
    <link rel="stylesheet" href="/public/wap/first/bargain/css/style.css">
    <script src="/public/wap/first/bargain/js/media.js"></script>
    <script src="/public/wap/first/bargain/js/jquery-2.1.4.min.js"></script>
    <script src="/public/wap/first/bargain/js/swiper.min.js"></script>
    <title>砍价列表</title>
</head>
<body>
<div class="cut-list">
    <div class="header-bg"></div>
    <div class="swiper-container swiper-text swiper-no-swiping">
        <div class="swiper-wrapper">
            <?php if(is_array($bargainUser) || $bargainUser instanceof \think\Collection || $bargainUser instanceof \think\Paginator): $i = 0; $__LIST__ = $bargainUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="swiper-slide acea-row row-wrap-all">
                    <img src="<?php echo $vo['avatar']; ?>">
                    <span class="ovf"><?php echo $vo['info']; ?></span>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <ul class="cut-ul">
        <?php if(is_array($bargain) || $bargain instanceof \think\Collection || $bargain instanceof \think\Paginator): $i = 0; $__LIST__ = $bargain;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="cut-item">
                <a href="<?php echo Url('Store/cut_con',array('id'=>$vo['id'],'bargainUid'=>0)); ?>">
                    <div class="picture"><img src="<?php echo $vo['image']; ?>"></div>
                    <div class="acea-row row-wrap-all cut-text">
                        <div class="cut-con">
                            <p class="name"><?php echo $vo['title']; ?></p>
                            <div class="text"><i class="icon"></i><?php echo $vo['userInfoCount']; ?>人正在参加</div>
                        </div>
                        <div class="cut-but"><i class="cut-but-icon"></i>最低￥<?php echo $vo['min_price']; ?></div>
                    </div>
                </a>
            </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<script>
    var swiper1 = new Swiper('.swiper-text', {
        direction : 'vertical',
        autoplayDisableOnInteraction: false,
        loop : true,
        noSwiping:true,
        spaceBetween:10,
        autoplay:2000
    });
</script>
</body>
</html>