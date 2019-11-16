<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:65:"D:\AppServ\www/application/wap/view/first/store\issue_coupon.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\container.html";i:1559178278;s:58:"D:\AppServ\www\application\wap\view\first\public\head.html";i:1555899697;s:59:"D:\AppServ\www\application\wap\view\first\public\style.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\requirejs.html";i:1555899697;s:58:"D:\AppServ\www\application\wap\view\first\public\foot.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\right_nav.html";i:1555899697;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<meta name="browsermode" content="application"/>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- 禁止百度转码 -->
<meta http-equiv="Cache-Control" content="no-siteapp">
<!-- uc强制竖屏 -->
<meta name="screen-orientation" content="portrait">
<!-- QQ强制竖屏 -->
<meta name="x5-orientation" content="portrait">
    <title>领取优惠劵</title>
    <link rel="stylesheet" type="text/css" href="/public/static/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="/public/wap/first/crmeb/font/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/public/wap/first/crmeb/css/style.css?2"/>
<script type="text/javascript" src="/public/static/js/media.js"></script>
<script type="text/javascript" src="/public/static/plug/jquery-1.10.2.min.js"></script>

    
    <script type="text/javascript" src="/public/static/plug/wxApi.js"></script>
    <?php
        $wechat_share_img = app\core\util\SystemConfigService::get('wechat_share_img');
        $wechat_share_img = str_replace('\\','/',$wechat_share_img);
    ?>
    <script>
        $jssdk = function(){return <?=\app\core\util\WechatService::jsSdk()?>;}
        window.wechat_share_title="<?=\app\core\util\SystemConfigService::get('wechat_share_title')?>";
        window.wechat_share_synopsis="<?=\app\core\util\SystemConfigService::get('wechat_share_synopsis')?>";
        window.wechat_share_img="<?=$wechat_share_img?>";
        mapleWx($jssdk(), function () {
            this.onMenuShareAll({
                title: wechat_share_title || $('title').text(),
                desc: wechat_share_synopsis || $('title').text(),
                imgUrl: location.origin +wechat_share_img,
                link:location.href,
            });
        });
    </script>
    <script type="text/javascript" src="/public/static/plug/requirejs/require.js"></script>
<script>
    requirejs.config({
        urlArgs: "v=15615616515616556",
        map: {
            '*': {
                'css': '/public/static/plug/requirejs/require-css.js'
            }
        },
        shim: {
            'iview': {
                deps: ['css!iviewcss']
            },
            'layer': {
                deps: ['css!layercss']
            },
            'ydui': {
                deps: ['css!yduicss']
            },
            'vant': {
                deps: ['css!vantcss']
            },
            'cityselect': {
                deps: ['css!yduicss']
            }
        },
        baseUrl: '//' + location.hostname + '/public/',
        paths: {
            'static': 'static',
            'vue': 'static/plug/vue/dist/vue.min',
            'axios': 'static/plug/axios.min',
            'iview': 'static/plug/iview/dist/iview.min',
            'iviewcss': 'static/plug/iview/dist/styles/iview',
            'lodash': 'static/plug/lodash',
            'layer': 'static/plug/layer/layer',
            'layercss': 'static/plug/layer/theme/default/layer',
            'jquery': 'static/plug/jquery-1.10.2.min',
            'moment': 'static/plug/moment',
            'sweetalert': 'static/plug/sweetalert2/sweetalert2.all.min',
            'helper':'static/plug/helper',
            'store':'/public/wap/first/crmeb/module/store',
            'better-scroll':"static/plug/better-scroll",
            'ydui':"static/plug/ydui/ydui",
            'yduicss':"static/plug/ydui/ydui-px",
            'vant':"static/plug/vant/vant.min",
            'vantcss':"static/plug/vant/vant",
            'cityselect':"static/plug/ydui/cityselect",
            'reg-verify':"static/plug/reg-verify"
        }
    });
</script>
    
    <script type="text/javascript" src="/public/wap/first/crmeb/js/common.js"></script>
</head>
<body>

<div class="discount-list" >
    <section>
        <header class="flex coupon-menu" style="z-index: 999;">
            <a class="item on" data-type="" href="javascript:void(0);">全部</a>
            <a class="item" data-type="new" href="javascript:void(0);">未领取</a>
            <a class="item" data-type="overdug" href="javascript:void(0);">已领取</a>
        </header>
        <div class="list-box" style="margin-bottom: .3rem;">
            <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
            <div class="empty">
                <img src="/public/wap/first/crmeb/images/empty_coupon.png">
                <p>暂无有效优惠券</p>
            </div>
            <?php else: ?>
            <ul>
                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['is_get'] == '1'): ?>
                <li class="coupon-item overdug">
                    <div class="txt-info">
                        <div class="con-cell">
                            <p>满<?php echo floatval($vo['use_min_price']); ?>元可用现金券</p>
                        </div>
                    </div>
                    <div class="price">
                        <span>￥</span><?php echo floatval($vo['coupon_price']); ?>
                        <p><a href="javascript:void(0);">已领取</a></p>
                    </div>
                </li>
                <?php else: ?>
                <li class="coupon-item new">
                    <div class="txt-info">
                        <div class="con-cell">
                            <p>满<?php echo floatval($vo['use_min_price']); ?>元可用现金券</p>
                        </div>
                    </div>
                    <div class="price">
                        <span>￥</span><?php echo floatval($vo['coupon_price']); ?>
                        <p><a class="j-issue-coupon" data-id="<?php echo $vo['id']; ?>" href="javascript:void(0);">领取</a></p>
                    </div>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; ?>
        </div>
    </section>
</div>
<script>
    (function(){
        $('.coupon-menu .item').on('click',function(){
            var that = $(this),type = that.data('type');
            $('.list-box .coupon-item').hide();
            type != '' ? $('.list-box .coupon-item.'+type).show() : $('.list-box .coupon-item').show();
            that.addClass('on').siblings().removeClass('on');
        });
        requirejs(['store','helper'],function(storeApi,$h){
            var gettingCoupon = false;
            $('.j-issue-coupon').on('click',function(){
                if(gettingCoupon) return ;
                gettingCoupon = true;
                var that = $(this),id = that.data('id');
                storeApi.goLogin() && storeApi.userGetCoupon(id,function(){
                    $h.pushMsgOnce('领取成功!');
                    that.text('已领取');
                    that.parents('li').removeClass('new').addClass('overdug');
                    setTimeout(function(){
                        gettingCoupon = false;
                    },300);
                },function(){
                    setTimeout(function(){
                        gettingCoupon = false;
                    },300);
                    return true;
                });
            });
        });

    })();
</script>


<!--crmEb-->
<?php /*  <section id="right-nav" class="right-barnav" >
      <a class="rb-home" href="<?php echo Url('Index/index'); ?>"></a>
      <a class="rb-car" href="<?php echo Url('Store/cart'); ?>"></a>
      <a class="rb-server" href="<?php echo Url('Service/service_list'); ?>"></a>
  </section>  */ ?>
<section id="right-nav" class="right-menu-wrapper">
    <a class="home" href="<?php echo Url('Index/index'); ?>"></a>
    <a class="buy-car" href="<?php echo Url('Store/cart'); ?>"></a>
</section>


</body>
</html>
