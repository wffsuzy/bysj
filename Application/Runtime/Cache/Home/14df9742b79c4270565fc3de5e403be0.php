<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>呆呆鼠借贷平台</title>
<link rel="stylesheet" href="/bysj/Public/Home/css/font-awesome.min.css"/>
<link rel="stylesheet" href="/bysj/Public/Home/css/loginMy.css"/>
<script src="/bysj/Public/Home/js/jquery-1.7.2.min.js"></script>
<script src="/bysj/Public/Home/js/layer.js"></script>

<style>
	html,body{width:100%;}
	i.fa{
	color:#fff;
	padding-left:5px;
	}
	
</style>
</head>
<body>
	<div class="main">

	<div class="center">
	<h2 style="text-align:center;font-weight:400;font-family:'微软雅黑'">呆呆鼠网贷系统后台管理</h2>
		<form action="<?php echo U('login');?>"  method="post" >
			<i class="fa fa-user Cone">  | </i>
			<input type="text" name="username" id="username" placeholder="用户名"onblur="checkUser()"/>
			<span id="user_pass"></span>
			<br/>
			<i class="fa fa-key Cone">  | </i>
			<input type="password" name="password" id="password" placeholder="密码"onblur="checkUser1()"/>
			<span id="pwd_pass"></span>
			<br/>
		</form>
			<input type="text" readonly="readonly" id="login" value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登录'>
			<br/>
	</div>
	
</div>
<script type="text/javascript" src="/bysj/Public/Home/js/loginMy.js"></script>
<script src="/bysj/Public/Home/js/common.js" type="text/javascript"></script>

<script>
	$(function(){	
		$('#login').click(function(){
		var $form=$('form');
		var $url=$form.attr('action');
		$.post($url,$form.serialize(),function(data){
				if(data.status==1){
				
					success_jump(data.info,data.url);
				}else{
					show_error(data.info);
				}
		});
	});
		
		
	})
	
</script>
</body>
</html>