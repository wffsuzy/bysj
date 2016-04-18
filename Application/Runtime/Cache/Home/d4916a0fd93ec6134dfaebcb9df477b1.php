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

	<style>
	.search input{
		margin-top:5px;
	}
	
	.search label{
		display:inline-block;
		margin-left:15px;
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
				<div class="span12 search">
					<?php $statuses=C('status'); ?>
					<form action="<?php echo U('index');?>" method="get">
						<h4 style="color:deepskyblue">
							<i class="icon-record"></i>
							  筛选条件
						</h4>
						<label>
							用户名：
							<input type="text" placeholder="用户名" name="username"/>
						</label>
						<label>
							真实姓名：
							<input type="text" placeholder="真实姓名" name="truename"/>
						</label>
						<label>
							 状态:
							 <select name="status">
								<?php if(is_array($statuses)): $i = 0; $__LIST__ = $statuses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key==$status) echo 'selected'?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							 </select>
						</label>
						<label>
							<input type="submit" class="btn btn-success" value="搜索" style="margin-top:-8px"/>
						</label>
					</form>
					
					<section id="tables">
						<h4 style="color:deepskyblue">
							<i class="icon-record"></i>
							 用户数据展示
						</h4>
						
						<table class="table table-bordered table-striped table-highlight">
						<thead>
							<tr>
								<th>#</th>
								<th>用户名</th>
								<th>真实姓名</th>
								<th>可用余额</th>
								<th>冻结金额</th>
								<th>待收金额</th>
								<th>状态</th>
								<th>注册时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($vo["id"]); ?></td>
									<td><?php echo ($vo["username"]); ?></td>
									<td><a href="javascript:" class="more"><?php echo ($vo["truename"]); ?></a></td>
									<td><?php echo ($vo["balance"]); ?></td>
									<td><?php echo ($vo["bind_money"]); ?></td>
									<td><?php echo ($vo["out_money"]); ?></td>
									<td>
										<?php if($vo['status'] == 1): ?>正常
											<?php else: ?> 冻结<?php endif; ?></td>
									<td><?php echo (date("Y-m-d",$vo['create_time'])); ?></td>
									<td>
										<a href="<?php echo U('change_money',array('id'=>$vo['id']));?>" class="btn btn-success">调整金额</a>
										<a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="btn btn-warning">修改信息</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					</section>
				</div>
			</div>
		</div>
	</div>

	</div>
</body>
</html>