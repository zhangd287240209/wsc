<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:66:"D:\AppServ\www/application/wap/view/first/store\seckill_index.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\container.html";i:1559178278;s:58:"D:\AppServ\www\application\wap\view\first\public\head.html";i:1555899697;s:59:"D:\AppServ\www\application\wap\view\first\public\style.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\requirejs.html";i:1555899697;s:64:"D:\AppServ\www\application\wap\view\first\public\store_menu.html";i:1555899697;s:58:"D:\AppServ\www\application\wap\view\first\public\foot.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\right_nav.html";i:1555899697;}*/ ?>
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
    <title>秒杀产品列表</title>
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

<div class="page-index" id="app-index">
    <section>
        <div class="main">
            <!-- 限时秒杀 -->
            <?php if(!(empty($seckillProduct) || (($seckillProduct instanceof \think\Collection || $seckillProduct instanceof \think\Paginator ) && $seckillProduct->isEmpty()))): ?>
            <div class="spike-time">
                <div class="page-tit">
                    <p style="color: #ec0707;">商品限时秒杀</p>
                </div>
                <ul class="product-list">
                    <?php if(is_array($seckillProduct) || $seckillProduct instanceof \think\Collection || $seckillProduct instanceof \think\Paginator): $i = 0; $__LIST__ = $seckillProduct;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a class="flex" href="<?php echo Url('store/seckill_detail',['id'=>$vo['id']]); ?>">
                            <div class="product"><img src="<?php echo $vo['image']; ?>" /></div>
                            <div class="info-box">
                                <p class="tit"><?php echo $vo['title']; ?></p>
                                <p class="count-wrappr"><span>限量<?php echo $vo['stock']; ?>件</span>  <span class="old-price">市场价：<?php echo $vo['ot_price']; ?></span></p>
                                <div class="time-wrapper">
                                    <div class="countdown" data-time="<?php echo date('Y/m/d H:i:s',$vo['stop_time']); ?>">
                                        <span class="days" style="background-color: #ec0707; width:.40rem;">00</span>
                                        <i>:</i>
                                        <span class="hours" style="background-color: #ec0707; width:.40rem;">00</span>
                                        <i>:</i>
                                        <span class="minutes" style="background-color: #ec0707; width:.40rem;">00</span>
                                        <i>:</i>
                                        <span class="seconds" style="background-color: #ec0707; width:.40rem;">00</span>
                                    </div>
                                    <p class="new-price">￥<?php echo $vo['price']; ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <div style="height:.92rem;"></div>
<?php
$request = \think\Request::instance();
$now_c = $request->controller();$now_a = $request->action();
$menu = [
    ['c'=>'Index','a'=>'index','name'=>'店铺主页','class'=>'home'],
    ['c'=>'Store','a'=>'category','name'=>'商品分类','class'=>'sort'],
    ['c'=>'Store','a'=>'cart','name'=>'购物车','class'=>'car'],
    ['c'=>'Service','a'=>'service_list','name'=>'联系卖家','class'=>'server'],
    ['c'=>'My','a'=>'index','name'=>'我的','class'=>'user'],
];
?>
<footer class="common-footer flex border-1px" ref="storeMenu" @touchmove.prevent>
    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;
        if(strtolower($now_c) == strtolower($vo['c']) && strtolower($now_a) == strtolower($vo['a'])){
            $href = 'javascript:void(0);';
            $checked = true;
        }else{
            $href = Url($vo['c'].'/'.$vo['a']);
            $checked = false;
        }
    ?>
    <a class="<?php echo $vo['class']; if($checked){echo' on ';} ?>" href="<?php echo $href; ?>">
        <span class="footer-icon icon"></span>
        <p><?php echo $vo['name']; ?></p>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</footer>
</div>
<script type="text/javascript" src="/public/wap/first/crmeb/js/jquery.downCount.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('.countdown').each(function() {
            var _this = $(this);
            var count =  _this.attr('data-time');
            _this.downCount({
                date: count,
                offset: +8
            }, function () {
                _this.find('span').html('00');
            });
        });
    });
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
