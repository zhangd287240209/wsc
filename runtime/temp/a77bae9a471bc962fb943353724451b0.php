<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:64:"D:\AppServ\www/application/wap/view/first/store\combination.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\container.html";i:1559178278;s:58:"D:\AppServ\www\application\wap\view\first\public\head.html";i:1555899697;s:59:"D:\AppServ\www\application\wap\view\first\public\style.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\requirejs.html";i:1555899697;s:58:"D:\AppServ\www\application\wap\view\first\public\foot.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\right_nav.html";i:1555899697;}*/ ?>
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
    <title>拼团列表</title>
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

<div class="buyspell-list product-sort" id="product-list">
    <div class="search-wrapper" style=" padding: 0.12rem 0.2rem;">
        <form action="" method="post" @submit.prevent="search">
            <input type="text" placeholder="商品搜索: 请输入商品关键词" ref='search'>
        </form>
    </div>
    <div class="price-select flex">
        <div class="item" @click='order("default")' :class='{on:where.on=="default"}'>默认</div>
        <div class="item"
             @click='order("price")'
             :class='{"selected-up":where.on=="price" && where.price==1,"selected-down":where.on=="price" && where.price==2,"on":where.on=="price"}'
        >价格<i class="icon"></i></div>
        <div class="item"
             @click='order("sales")'
             :class='{"selected-up":where.on=="sales" && where.sales==1,"selected-down":where.on=="sales" && where.sales==2,"on":where.on=="sales"}'
        >销量<i class="icon"></i></div>
        <div class="item" @click='order("people")' :class="{on:where.on=='people'}">人气</div>
    </div>
    <div class="bslist-box" v-cloak="">
        <div class="bs-item flex" v-for='item in list.data'>
            <div class="picture">
                <img :src="item.image" :alt="item.title">
            </div>
            <div class="bs-item-info flex">
                <div class="info-title">{{item.title}}</div>
                <div class="count-wrapper">
                    <span class="price">￥{{item.price}}</span>
                    <span class="old-price">￥{{item.product_price}}</span>
                    <span class="count">已拼{{item.sales}}单</span>
                </div>
                <a class="people-num" :href="'combination_detail/id/'+item.id">
                    <span class="numbers">{{item.people}}人团</span>
                    <span class="peo-txt">去开团</span>
                    <i class="index-icon people-icon"></i>
                </a>
            </div>
        </div>
        <p class="loading-line" v-show="load == false && list.loading==true"><i></i>正在加载中<i></i></p>
        <p class="loading-line" v-show='load == true' @click="getList"><i></i>点击加载<i></i></p>
        <p class="loading-line" v-show='load == false && list.loadEnd==true'><i></i>没有更多了<i></i></p>
    </div>
</div>
<script type="text/javascript">
    var product_list =<?php echo json_encode($list);?>;
    requirejs(['vue', 'store', 'helper'], function (Vue, storeApi, $h) {
        new Vue({
            el: "#product-list",
            data: {
                load: true,
                list: {
                    loading: false,
                    loadEnd: false,
                    data: product_list
                },
                where: {
                    page: 1,
                    search: '',
                    people: 0,
                    sales: 0,
                    price: 0,
                    default: 0,
                    on: 'default',
                    key: false
                },
                keyorder: ''
            },
            methods: {
                search: function (e) {
                    e.preventDefault();
                    this.list.loadEnd = false;
                    var search = this.$refs.search.value;
                    if (this.$refs.search.value == '') {
                        this.order('default');
                        return;
                    } else if (this.$refs.search.value == this.keyorder) {
                        this.list.loadEnd = true;
                        return;
                    } else {
                        this.keyorder = search;
                    }
                    if (search != '') {
                        this.where.search = search;
                    }
                    this.where.on = 'search';
                    this.where.sales = 0;
                    this.where.price = 0;
                    this.where.page = 0;
                    this.where.default = 0;
                    this.where.people = 0;
                    this.where.key = true;
                    this.getList();
                },
                order: function (info) {
                    this.list.loadEnd = false;
                    if (info == 'people') {
                        if (this.where.people == 1) {
                            if (this.list.data.length < 4) {
                                this.list.loadEnd = true;
                            }
                            return;
                        }
                        this.where.on = info;
                        this.where.page = 0;
                        if (this.where.people == 0) {
                            this.where.people = 1;
                        } else {
                            this.where.people = 0;
                        }

                        this.where.sales = 0;
                        this.where.price = 0;
                        this.where.default = 0;
                    } else if (info == 'sales') {
                        this.where.on = info;
                        this.where.page = 0;
                        if (this.where.sales == 0 || this.where.sales == 2) {
                            this.where.sales = 1;
                        } else {
                            this.where.sales = 2;
                        }

                        this.where.people = 0;
                        this.where.price = 0;
                        this.where.default = 0;
                    } else if (info == 'price') {
                        this.where.on = info;
                        this.where.page = 0;
                        if (this.where.price == 0 || this.where.price == 2) {
                            this.where.price = 1;
                        } else {
                            this.where.price = 2;
                        }

                        this.where.people = 0;
                        this.where.sales = 0;
                        this.where.default = 0;
                    } else if (info == 'default') {
                        if (this.where.default == 1) {
                            if (this.list.data.length < 4) {
                                this.list.loadEnd = true;
                            }
                            return false;
                        }
                        this.$refs.search.value = '';
                        this.where.search = '';
                        this.keyorder = '';
                        this.where.on = info;
                        this.where.page = 0;
                        this.where.default = 1;
                        this.where.search = '';
                        this.where.people = 0;
                        this.where.sales = 0;
                    }

                    this.where.key = true;
                    this.getList();
                },
                getList: function () {
                    var this_ = this;
                    this_.list.loading = true;
                    this_.load = false;
                    storeApi.basePost('<?php echo url('wap/store/get_list'); ?>',
                        {
                            'where': this_.where
                        },
                        function (msg) {
                            this_.list.loading = false;
                            var _length = msg.data.data.list.length;
                            if (_length == 0) {
                                if (this_.keyorder != '' && this_.where.key == true) {
                                    this_.list.data = [];
                                } else {
                                    this_.list.loadEnd = true;
                                }
                            } else {
                                if (this_.where.key == true && this_.where.on != '' && this_.where.page == 0) {
                                    this_.list.data = msg.data.data.list;
                                } else {
                                    for (var i = 0; i < _length; i++) {
                                        this_.list.data.push(msg.data.data.list[i]);
                                    }
                                }
                                this_.load = true;
                            }
                            if (_length < 4) {
                                this_.load = false;
                                this_.list.loadEnd = true;
                            }
                            this_.where.page = msg.data.data.page;
                        },
                        function (error) {
                            this_.list.loading = false;
                            $h.pushMsg('网络异常!');
                        });
                }
            },
            mounted: function () {
                if (this.list.data.length < 4) {
                    this.load = false;
                    this.list.loadEnd = true;
                }
            }
        })
    })

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
