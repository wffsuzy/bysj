<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="/bysj/Public/Home/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/bysj/Public/Home/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="/bysj/Public/Home/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="/bysj/Public/Home/css/application.css">
<script src="/bysj/Public/Home/js/jquery-1.7.2.min.js"></script>
<script src="/bysj/Public/Home/js/bootstrap.min.js"></script>
</head>
<style>
	img{
	width:200px;
	height:32px;
	}
</style>

<body>
	<div id="wrap">
		<div id="topbar">
			<div class="container">
				<div id="top-nav">
					<ul>
						<li><?php echo date('Y年m月d日',time())?></li>
					</ul>
					<ul class="pull-right">
						<li><a href="javascript:;"><i class="icon-user"></i>&nbsp;<?php echo ($admin_info['username']); ?></a></li>
				<li><a href="<?php echo U(MODULE_NAME . '/Public/logout');?>">退出</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="header">
			<div class="container">
			<a href="<?php echo U(MODULE_NAME . '/Index/index');?>" class="brand">LOGO</a>
		<a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<i class="icon-reorder"></i>
      	</a>
				<div class="nav-collapse">
					<ul id="main-nav" class="nav pull-right">
						<li class="nav-icon <?php if($index) echo 'active';?>">
							<a href="<?php echo U(MODULE_NAME . '/Index/index');?>">
							<i class="icon-home"></i>
							<span>首页</span>        					
							</a>
						</li>
						<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="nav-icon <?php if($vo['active']) echo 'active1';?>"">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                           			 <i class="icon-th"></i>
                            		<span><?php echo ($vo["title"]); ?></span>
                            		<b class="caret"></b>
                        			</a>
                        			<ul class="dropdown-menu">
										<?php if(is_array($vo['child'])): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a tabindex="-1" href="<?php echo (U($vv['url'])); ?>"><?php echo ($vv["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		
<div id="content">
	<div class="container">
		<div class="row">
			<div class="span12"></div>
		</div>
	</div>
</div>

	</div>
</body>
</html>