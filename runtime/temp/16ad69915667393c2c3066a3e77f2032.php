<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:60:"D:\AppServ\www/application/wap/view/first/article\index.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\container.html";i:1559178278;s:58:"D:\AppServ\www\application\wap\view\first\public\head.html";i:1555899697;s:59:"D:\AppServ\www\application\wap\view\first\public\style.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\requirejs.html";i:1573114115;s:58:"D:\AppServ\www\application\wap\view\first\public\foot.html";i:1555899697;s:63:"D:\AppServ\www\application\wap\view\first\public\right_nav.html";i:1555899697;}*/ ?>
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
    <title><?php echo $title; ?></title>
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
            'reg-verify':"static/plug/reg-verify"
        }
    });
</script>
    
    <script type="text/javascript" src="/public/wap/first/crmeb/js/common.js"></script>
</head>
<body>

<style type="text/css">body{background:#f5f5f5;}</style>
<div class="page-list" id="guide">
    <section>
        <div ref="bsDom">
            <div>
                <div class="new-list" v-show="type == 'article'" v-cloak="">
                    <ul>
                        <li class="clearfix" v-for="item in article.list">
                            <a :href="getArticleUrl(item)">
                                <div class="picture fl"><img :src="item.image_input" /></div>
                                <div class="text-info fr flex">
                                    <p class="tit" v-text="item.title"></p>
                                    <p class="content" v-text="item.synopsis"></p>
                                    <div class="time-wrapper">
                                        <span class="time"  v-text="item.add_time"></span>
                                        <span class="count">浏览: {{item.visit}}次</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="loading-line" v-show="loading == true"><i></i><span>正在加载中</span><i></i></p>
                <p class="loading-line" v-show="loading == false && loaded == false" v-cloak=""><i></i><span>向上滑动加载更多</span><i></i></p>
                <p class="loading-line" v-show="loading == false && loaded == true" v-cloak=""><i></i><span>没有更多了</span><i></i></p>
            </div>
        </div>
    </section>
</div>
<script>
    require(['vue','axios','better-scroll','helper','store'],function(Vue,axios,BScroll,$h,storeApi){
        $cid = '<?=$cid?>' || '';
            new Vue({
            el:"#guide",
            data:{
                type:'article',
                article:{
                    first:0,
                    limit:8,
                    list:[],
                    loaded:false,
                    top:0
                },
                loading: false,
                scroll:null
            },
            watch:{
                type:function(v,old){
                    this[old].top = this.scroll.startY;
                    this[v].list.length || this.getList();
                    this.$nextTick(function(){
                        this.scroll.scrollTo(0,this[v].top);
                        this.scroll.refresh();
                    });
                }
            },
            computed:{
                loaded:function(){
                    return this[this.type].loaded;
                }
            },
            methods:{
                getArticleUrl:function(article){
                    return article.url ? article.url : $h.U({c:'article',a:'visit',p:{id:article.id}});
                },
                getList:function(){
                    if(this.loading) return;
                    this.getArticleList();
                },
                getArticleList:function(){
                    var that = this,type = this.type,group = that[type];
                    if(group.loaded) return ;
                    this.loading = true;
                    storeApi.getArticleList({
                        cid:$cid||0,
                        first:group.first,
                        limit:group.limit
                    },function(res){
                        var list = res.data.data;
                        group.loaded = list.length < group.limit;
                        group.first += list.length;
                        group.list = group.list.concat(list);
                        that.$set(that,type,group);
                        that.loading = false;
                        that.$nextTick(function(){
                            if(list.length) that.bScrollInit();
                            that.scroll.finishPullUp();
                        });
                    },function(){that.loading = false});
                },
                bScrollInit:function () {
                    var that = this;
                    if(this.scroll === null){
                        this.$refs.bsDom.style.height = (document.documentElement.clientHeight)+'px';
                        this.$refs.bsDom.style.overflow = 'hidden';
                        this.scroll = new BScroll(this.$refs.bsDom,{click:true,probeType:1,cancelable:false,deceleration:0.005,snapThreshold:0.1});
                        this.scroll.on('pullingUp',function(){
                            that.loading == false && that.getList();
                        })
                    }else{
                        this.scroll.refresh();
                    }

                }
            },
            mounted:function(){

                this.getList();
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
