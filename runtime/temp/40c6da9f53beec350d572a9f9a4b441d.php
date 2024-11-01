<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"template/website/index/index.html";i:1655179776;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $subweb['title']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/template/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/template/layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" href="/template/layuiadmin/style/login.css" media="all">
</head>
<body>
  <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
    <div class="layadmin-user-login-main">
      <div class="layadmin-user-login-box layadmin-user-login-header">
        <h2><?php echo $subweb['oaname']; ?></h2>
      </div>
      <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
          <input type="text" name="username" id="username" lay-verify="required" placeholder="手机号" class="layui-input">
        </div>
        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
          <input type="password" name="password" id="password" lay-verify="required" placeholder="密码" class="layui-input">
        </div>
        
        
        <div class="layui-form-item">
          <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
        </div>
        
      </div>
    </div>
	
	
	
	
	


    <div class="layui-trans layadmin-user-login-footer">
		<p><?php echo $subweb['copyright']; ?></p>
		<p><?php echo $subweb['softname']; ?> <?php echo $subweb['version']; ?></p>
	</div>
  </div>
<script src="/template/layuiadmin/layui/layui.js"></script>   
<script>
layui.config({
	base: '/template/layuiadmin/' //静态资源所在路径
}).extend({
	index: 'lib/index' //主入口模块
}).use(['index', 'user'], function(){
	var $ = layui.$
    ,setter = layui.setter
    ,admin = layui.admin
    ,form = layui.form
    ,router = layui.router()
    ,search = router.search;
    form.render();
    //提交
    form.on('submit(LAY-user-login-submit)', function(obj){
		var username = $("#username").val();
		var password = $("#password").val();
		
		$.ajax({
			type:"POST",
			url:"<?php echo url('index/login'); ?>",
			dataType:"json",
			data:{
				username:username,
				password:password,
			},
			success:function(res){
				if(res.status == 1){
					layer.msg(res.msg, {offset: '15px',icon: 1,time: 1000}, function(){location.href = '<?php echo url('center/index'); ?>';});
				}else{
					layer.msg(res.msg, {offset: '15px',icon: 2});
				}
				
			},
			error:function(jqXHR){
				console.log("Error: "+jqXHR.status);
			},
		});
      
    });    
  });
  </script>
</body>
</html>