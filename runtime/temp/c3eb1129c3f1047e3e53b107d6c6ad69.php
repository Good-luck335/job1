<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:32:"template/website/dianka/add.html";i:1657958312;s:60:"/www/wwwroot/c1.vvbbh.cn/template/website/common_header.html";i:1655179768;s:57:"/www/wwwroot/c1.vvbbh.cn/template/website/common_top.html";i:1655179768;s:60:"/www/wwwroot/c1.vvbbh.cn/template/website/common_footer.html";i:1655179766;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
  <title><?php echo $subweb['oaname']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="/template/layuiadmin/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/template/layuiadmin/style/admin.css" media="all">
<link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.1/css/all.css" rel="stylesheet">
<script src="https://cdn.bootcdn.net/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group">
        
        
        
        <div class="layui-form-item">
            <label class="layui-form-label">分站帐号</label>
            <div class="layui-input-block">
              <input name="title" type="text" class="layui-input" id="title"   placeholder="分站帐号">
            </div>
          </div>  
          
          <div class="layui-form-item">
            <label class="layui-form-label">充值点数</label>
            <div class="layui-input-block">
              <input name="money" type="number" class="layui-input" id="money"   placeholder="充值点数" >
            </div>
          </div> 
          
	  
         <div class="layui-form-item layui-layout-admin">
              <div class="layui-footer" style="left: 0;">
                <div class="layui-btn sub">立即提交</div>
                <button type="reset" class="layui-btn layui-btn-primary ">重置</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="/template/layuiadmin/layui/layui.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/template/showjs.js"></script>
<script>
  layui.config({
    base: '/template/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index','util','form', 'laydate','set','layer']);
</script> 
<script>
$(".sub").click(function(){
	//if(!$(".btn").hasClass("sub")){return false;}
	var title   = $("#title").val();
	var money     = $("#money").val();

	if(title==""){
		show_error("分站帐号不能为空!");
		return false;
	}
	
	if(money==""){
		show_error("充值点数不能为空!");
		return false;
	}
	
	$.ajax({
		type:"POST",
		url:"<?php echo url('dianka/add'); ?>",
		dataType:"json",
		data:{
			title:title,
			money:money,
		},
		success:function(res){
			if(res.status == 1){
				window.parent.layer.closeAll();//关闭弹窗
				window.parent.location.reload();
				//show_toast_callurl(res.data,"<?php echo url('device/index'); ?>","success");
			}else{
				show_error(res.msg);
			}
		},
		error:function(jqXHR){
			console.log("Error: "+jqXHR.status);
		},
	});
	
});
</script>
</body>
</html>
