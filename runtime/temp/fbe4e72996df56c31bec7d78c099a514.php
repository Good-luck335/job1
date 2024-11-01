<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"template/substation/diankalog/index.html";i:1659537214;s:63:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_header.html";i:1655346642;s:60:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_top.html";i:1655179780;s:63:"/www/wwwroot/c1.vvbbh.cn/template/substation/common_footer.html";i:1655179778;}*/ ?>
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
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-body">
              <div class="layui-box">
			<?php if(!empty($webinfo['text7'])): ?><a class="layui-btn layuiadmin-btn-tags" href="<?php echo $webinfo['text7']; ?>" target="_blank">功能说明</a><?php endif; ?>
			 </div>
			<div class="layui-box layui-laypage layui-laypage-molv"><?php echo $page; ?></div>
			<div class="layui-form" lay-filter="component-form-element">
            <table class="layui-table" lay-even="" lay-skin="nob">
            <thead>
              <tr>
                <th width="35">序号</th>
				<th>扣点费用</th>
                <th>扣点时间</th>
				<th>订单号</th>
				<th>订单金额</th>
              </tr> 
            </thead>
            <tbody>
             <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr id="tr_<?php echo $vo['dkl_id']; ?>">
					<td class="text-center"><?php echo $vo['dkl_id']; ?></td>
                    <td class="text-center"><?php echo $vo['dkl_money']; ?></td>
                    <td><?php echo $vo['dkl_addtime']; ?></td>
                    <td><?php echo $vo['bl_sncode']; ?></td>
                    <td><?php echo $vo['bl_money']; ?></td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table> 
		  </div>
		  <div class="layui-box layui-laypage layui-laypage-molv"><?php echo $page; ?></div>
          </div>
        </div>
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
</body>
</html>