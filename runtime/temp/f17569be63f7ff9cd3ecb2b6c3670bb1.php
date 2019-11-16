<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:57:"D:\AppServ\www/application/wap/view/first/my\address.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\container.html";i:1559178278;s:58:"D:\AppServ\www\application\wap\view\first\public\head.html";i:1555899697;s:59:"D:\AppServ\www\application\wap\view\first\public\style.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\requirejs.html";i:1573697136;s:58:"D:\AppServ\www\application\wap\view\first\public\foot.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\right_nav.html";i:1555899697;}*/ ?>
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
    <title>地址管理</title>
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
        baseUrl: '//' + location.hostname + ':'+location.port+'/public/',
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
            'reg-verify':"static/plug/reg-verify",
            'baiduMap':"static/plug/baiduMap"
        }
    });
</script>
    
    <script type="text/javascript" src="/public/wap/first/crmeb/js/common.js"></script>
</head>
<body>

<div id="address-list" class="user-addresslist">
    <section>
        <form action="" method="post">
            <?php $isDefault = ''; if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="address-item">
            <div class="user-info">
                <p>收货人：<?php echo $vo['real_name']; ?> <span> <?php echo $vo['phone']; ?></span></p>
                <p>收货地址：<?php echo $vo['province']; ?> <?php echo $vo['city']; ?> <?php echo $vo['district']; ?> <?php echo $vo['detail']; ?></p>
            </div>
            <div class="address-btn flex">
                <div class="switch-btn">
                    <label class="well-check">
                        <input class="ckecks" v-model="isDefault" type="radio" <?php if($vo['is_default'] == '1'): ?>checked="checked" <?php $isDefault = $vo['id']; endif; ?> value="<?php echo $vo['id']; ?>"><i class="icon"></i>
                        设为默认地址
                    </label>
                </div>
                <div class="action-btn">
                    <span class="edit" @click="redirect('<?php echo $vo['id']; ?>')">编辑</span>
                    <span class="delete" @click="remove('<?php echo $vo['id']; ?>',$event)">删除</span>
                </div>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
        <a class="address-add" href="<?php echo Url('edit_address'); ?>">
            新增地址
        </a>
    </section>
</div>
<script>
    (function(){
        requirejs(['vue','lodash','store','helper'],function(Vue,_,storeApi,$h){
            new Vue({
                el:"#address-list",
                data:{
                    isDefault:"<?=$isDefault?>"
                },
                watch:{
                    isDefault:_.debounce(function(v){
                        $h.loadFFF();
                        storeApi.setUserDefaultAddress(v,function(){
                            $h.loadClear();
                        },function(){
                            $h.loadClear();
                            return true;
                        })
                    },300)
                },
                methods:{
                    remove:function(addressId,e){
                        storeApi.removeUserAddress(addressId,function(){
                            $(e.target).parents('.address-item').remove();
                        })
                    },
                    redirect:function(addressId){
                        location.href = $h.U({
                            c:"my",
                            a:"edit_address",
                            p:{addressId:addressId}
                        });
                    }
                }
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
