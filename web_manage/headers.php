<?php
require './include/common.inc.php';
require WEB_ROOT.'./include/chkuser.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理页面</title>
<link href="images/common.css" rel="stylesheet" type="text/css" />
<link href="images/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.3.min.js" language="javascript"></script>
<script src="js/js.js" language="javascript"></script>
</head>

<body>
	<!--header-->
	<div class="header">
    	<div class="logo fl">
        	<img src="images/logo.png" />
        </div>

        <div class="daohang fl" style="width: 850px;">
			<? if ($_SESSION['Admin_BigMyMenu']=="super"){?>

        	<a href="mains.php"  class="on" target="righthtml">
            	<img src="images/bug1.png" />
                <p>工作台</p>
            </a>
            <a href="news_cat.php" target="righthtml">
            	<img src="images/bug2.png" />
                <p>栏目管理</p>
            </a>
              <a href="person.php" target="righthtml">
            	<img src="images/bug4.png" />
                <p>修改密码</p>
            </a>
            <a href="manager.php" target="righthtml">
            	<img src="images/bug5.png" />
                <p>用户管理</p>
            </a>
            <a href="db_expore.php" target="righthtml">
            	<img src="images/bug6.png" />
                <p>数据备份</p>
            </a>
            <a href="log.php" target="righthtml">
            	<img src="images/bug7.png" />
                <p>操作日志</p>
            </a>
            <a href="config.php" target="righthtml">
                <img src="images/bug8.png" />
                <p>系统设置</p>
            </a>

            <a style="opacity:.8;border:2px solid rgba(0,0,0,.1)"  href="goods.php" target="righthtml">
                <img src="images/bug2.png" />
                <p>所有商品</p>
            </a>
                <a href="order.php" target="righthtml" style="height:21px;width: 150px;">
                    <p style="color:orange;border:red solid 1px; line-height: 21px;">所有订单（<?php echo M('order')->count();?>）</p>
                </a>
                <a href="order.php?order_status=0&shipping_status=0" target="righthtml" style="height:21px;width: 150px;">
                    <p style="color:orange;border:red solid 1px; line-height: 21px;">未配送（<?php echo M('order')->where("order_status=0 and shipping_status=0")->count();?>）</p>
                </a>

                <a href="order.php?order_status=0&shipping_status=1" target="righthtml" style="height:21px;width: 150px;">
                    <p style="color:orange;border:red solid 1px; line-height: 21px">已配送未完成（<?php echo M('order')->where("order_status=0 and shipping_status=1")->count();?>）</p>
                </a>
                <a href="order.php?order_status=1&shipping_status=1" target="righthtml" style="height:21px;width: 150px;">
                    <p style="color:orange;border:red solid 1px; line-height: 21px;">已完成（<?php echo M('order')->where("order_status=1 and shipping_status=1")->count();?>）</p>
                </a>

            <? }elseif($_SESSION['Admin_BigMyMenu']=="guwen"){}else{?>
        	<a href="mains.php" style="background:url(images/hover.png) 0 0 repeat-x;" target="righthtml">
            	<img src="images/bug1.png" />
                <p>工作台</p>
            </a>
              <a href="person.php" target="righthtml">
            	<img src="images/bug4.png" />
                <p>修改密码</p>
            </a>
	<? }?>
        </div>
        <style>
            .daohang a.on{
                background:url(images/hover.png) 0 0 repeat-x;
            }
        </style>
        <script>
            $(function(){
                $(".daohang a").click(function(){
                    $(".daohang a").removeClass('on')
                    $(this).addClass("on")
                })
            })
        </script>

        <div class="guanlizhe fr">
        	<div class="fr caozuo">
                <a href="../" class="fl" target="_blank">网站首页</a>
                <span class="fl">|</span>
                <a href="logout.php?action=logout" target="_top" onClick="return confirm('确定退出系统吗？\n\n退出后自动关闭窗口！');" class="fl">退出</a>
            </div>
            <div class="guanli fr">
            	<span>管理员：<?=$_SESSION['Admin_UserName']?></span>
                <span>管理级别：<?  if($_SESSION['Admin_BigMyMenu']=="super"){ echo "超级管理员";}elseif($_SESSION['Admin_BigMyMenu']=="guwen"){ echo "顾问";}else{ echo "普通管理员";}?></span>
            </div>
        </div>


    </div>

</body>
</html>