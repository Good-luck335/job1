<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:47:"template/substation/distributiongroup/edit.html";i:1655179782;s:63:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_header.html";i:1655346642;s:60:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_top.html";i:1655179780;s:63:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_footer.html";i:1655179778;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
  <title><?php echo session("su_title"); ?> <?php echo $subweb['oaname']; ?></title>
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
            <label class="layui-form-label">群组名称</label>
            <div class="layui-input-block">
              <input name="title" type="text" class="layui-input" id="title"   placeholder="群组名称" value="<?php echo $info['dg_title']; ?>">
            </div>
          </div>  
          
          <div class="layui-form-item">
            <label class="layui-form-label">分销比例</label>
            <div class="layui-input-block">
              <input name="count" type="number" class="layui-input" id="count"   placeholder="分销比例" value="<?php echo $info['dg_count']; ?>">
            </div>
          </div> 
          

          <div class="layui-form-item">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
              <input name="content" type="text" class="layui-input" id="content"   placeholder="备注" value="<?php echo $info['dg_content']; ?>">
            </div>
          </div> 
          
          
          <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
              <input type="radio" name="status" value="1" title="启用" <?php if($info['dg_status']==1): ?>checked=""<?php endif; ?>>
              <input type="radio" name="status" value="2" title="禁用" <?php if($info['dg_status']==2): ?>checked=""<?php endif; ?>>
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
	var count   = $("#count").val();
	var content = $("#content").val();
	var status  = $("input[name='status']:checked").val();
 
	if(title==""){
		show_error("群组名称不能为空!");
		return false;
	}
	
	if(count==""){
		show_error("分销比例不能为空!");
		return false;
	}

	$.ajax({
		type:"POST",
		url:"<?php echo url('Distributiongroup/edit'); ?>",
		dataType:"json",
		data:{
			id:"<?php echo $info['dg_id']; ?>",
			title:title,
			count:count,
			content:content,
			status:status,
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