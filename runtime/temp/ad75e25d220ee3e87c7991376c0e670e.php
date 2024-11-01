<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:35:"template/substation/dianka/add.html";i:1663161886;s:63:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_header.html";i:1655346642;s:60:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_top.html";i:1655179780;s:63:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_footer.html";i:1655179778;}*/ ?>
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
        <?php if(!empty($info['dkgg_content'])): ?>
        <blockquote class="layui-elem-quote"><?php echo $info['dkgg_content']; ?></blockquote>
        <?php endif; ?>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <?php if($info['wxopen']==1): ?>
              <input type="radio" name="types" value="1" title="微信支付" checked="">
              <?php endif; if($info['zfbopen']==1): ?>
              <input type="radio" name="types" value="2" title="支付宝支付" <?php if($info['wxopen']==2): ?>checked=""<?php endif; ?>>
              <?php endif; ?>
            </div>
          </div>
          
          
        <div class="layui-form-item">
            <label class="layui-form-label">充值金额</label>
            <div class="layui-input-block">
              <input name="money" type="number" class="layui-input" id="money" placeholder="充值金额">
            </div>
          </div>   
 

        <div class="layui-form-item" style="display:none" id="kkk">
            <div class="layui-input-block">
              <img id="img">
              <div style="height:30px; margin-top:20px;" id="orderid"></div>
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
    var money = $("#money").val();
	var types  = $("input[name='types']:checked").val();
	if(money<=0){
	    show_error("充值金额不能为空!");
		return false;
	}
	
	$.ajax({
		type:"POST",
		url:"<?php echo url('dianka/pay'); ?>",
		dataType:"json",
		data:{
			money:money,
			types:types,
		},
		success:function(res){
			if(res.status == 1){
			    //dataURL = "https://api.qrserver.com/v1/create-qr-code/?size=290x290&data=" + res.msg;
			    $('#kkk').css("display",'block');
				$("#img").attr('src',res.msg);
				$("#orderid").html("订单号："+res.id+"<br>支付完成后，请刷新页面！");
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
