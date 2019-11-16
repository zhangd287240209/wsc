<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\AppServ\www/application/wap/view/first/store\category.html";i:1558433574;s:63:"D:\AppServ\www\application\wap\view\first\public\right_nav.html";i:1555899697;}*/ ?>
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
    <title>分类列表</title>
    <link rel="stylesheet" type="text/css" href="/public/wap/first/sx/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="/public/wap/first/sx/css/style.css" />
    <script type="text/javascript" src="/public/wap/first/sx/js/media.js"></script>
    <script type="text/javascript" src="/public/wap/first/sx/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/public/wap/first/crmeb/js/common.js"></script>
</head>
<body style="background:#fff;">
<div class="product-sort-list">
    <section>
        <div class="list-wrapper">
            <div class="list-item"><a class="parent-link" href="<?php echo url('store/index'); ?>">全部商品</a></div>
            <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="list-item">
                <a class="parent-link" href="<?php echo url('store/index',['cid'=>$vo['id']]); ?>"><?php echo $vo['cate_name']; ?></a>
                <?php if(!(empty($vo['child']) || (($vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator ) && $vo['child']->isEmpty()))): ?>
                <ul class="child-list clearfix">
                    <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo url('store/index',['sid'=>$st['id']]); ?>"><?php echo $st['cate_name']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </section>
</div>
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