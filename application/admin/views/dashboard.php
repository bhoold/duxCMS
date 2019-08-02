<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html dir="ltr" lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>网站后台管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">

  <link rel="stylesheet" href="<?php echo getUrl('base')?>assets/admin/layui/css/layui.css"  media="all">
  <link rel="stylesheet" href="<?php echo getUrl('base')?>assets/admin/css/layout.css"  media="all">




</head>
<body>
<div id="header">
	<div class="logo"><a href="">网站后台管理</a></div>
	<div class="nav">
		<div class="item">
			<a href="">系统</a>
		</div>
		<div class="item">
			<a href="">后台用户</a>
		</div>
		<div class="item">
			<a href="">内容</a>
		</div>
		<div class="item">
			<a href="">文件</a>
		</div>
	</div>
	<!--
	<div class="icon-container">
	<button class="name layui-btn" title="设置"><i class="layui-icon layui-icon-set-fill"></i></button>
	<button class="name layui-btn" title="帮助"><i class="layui-icon layui-icon-help"></i></button>
	</div>
	-->
	<div class="person">
		<button class="name layui-btn" title="账户">我是大佬虎</button>
	</div>
</div>
<div id="body">
	<div id="page-header">
		<div class="title">全局配置</div>
		<div class="tooles btn-containe">
			<div class="left">
				<button class="layui-btn layui-btn-primary">新建</button>
				<button class="layui-btn">编辑</button>
				<button class="layui-btn">删除</button>
			</div>
			<div class="right">
				<button class="layui-btn">设置</button>
			</div>
		</div>
	</div>
	<div id="page-content">
		<div id="left-menu">
			<div class="list">
				<div class="item">全局配置</div>
				<div class="item">操作日志</div>
				<div class="item">广告管理</div>
				<div class="item">缓存管理</div>
				<div class="item">数据签入</div>
				<div class="item">联系方式</div>
				<div class="item">文章管理</div>
			</div>
		</div>
		<div id="main">
			<div class="list-filter"></div>
			<table class="layui-hide2" id="listTable" lay-filter="listTable">
				<thead>
					<tr>
					<th lay-data="{type:'checkbox', fixed: 'left'}"></th>
					<th lay-data="{field:'id', width:80}">ID</th>
					<th lay-data="{field:'username', width:150}">账号</th>
					<th lay-data="{field:'sex', width:80}">性别</th>
					<th lay-data="{field:'email', width:250}">电子邮箱</th>
					<th lay-data="{field:'state', width:80}">状态</th>
					<th lay-data="{field:'regtime', width:200}">注册时间</th>
					<th lay-data="{field:'regip', width:150}">注册IP</th>
					<th lay-data="{field:'lastlogintime', width:200}">最后登录时间</th>
					<th lay-data="{field:'lastloginip', width:150}">最后登录IP</th>
					<th lay-data="{field:'createbyadmin', width:150}">是否后台注册</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $item):?>
					<tr>
					<td></td>
					<td><?php echo $item['id'];?></td>
					<td><?php echo $item['username'];?></td>
					<td><?php if($item['sex']==='1'){echo '男';}elseif($item['sex']==='0'){echo '女';}else{echo '保密';}?></td>
					<td><?php echo $item['email'];?></td>
					<td><?php echo $item['state'] ? '启用' : '停用';?></td>
					<td><?php echo $item['regtime'];?></td>
					<td><?php echo $item['regip'];?></td>
					<td><?php echo $item['lastlogintime'];?></td>
					<td><?php echo $item['lastloginip'];?></td>
					<td><?php echo $item['createbyadmin'] ? '是' : '否';?></td>
					<td></td>
					</tr>
					<?php endforeach;?>
				</tbody>
    		</table>
			<div id="pager"></div>
		</div>
	</div>

</div>
<div id="footer">

</div>









<script src="<?php echo getUrl('base')?>assets/admin/layui/layui.js" charset="utf-8"></script>
<script>
layui.config({
  base: '<?php echo mybase_url()?>assets/admin/layui/component/' //假设这是你存放拓展模块的根目录
}).extend({ //设定模块别名
  alert: 'alert/alert'
});

layui.use(['form', 'table','laypage','layer','alert'], function(){
  var form = layui.form;

  //监听提交
  form.on('submit(*)', function(data){

    //layer.msg(JSON.stringify(data.field));
    return true;
  });




	//转换静态表格
	table.init('listTable', {
		//height: 315 //设置高度
		//,limit: 10 //注意：请务必确保 limit 参数（默认：10）是与你服务端限定的数据条数一致
		//支持所有基础参数
		page: false
	});

  laypage.render({
		elem: 'pager',
		layout: ['prev', 'page', 'next', 'count', 'limit', 'skip'],
		count: 100,
		curr: 5,
		limit: 10,
		//limits: [10,12],
		jump: function(obj, first){
			//首次不执行
			if(!first){
				$('#form-filter input[name="pageNum"]').val(obj.curr);
				$('#form-filter input[name="pageSize"]').val(obj.limit);
				$('#form-filter').data('isSavePage', true);
				$('#form-filter button[lay-submit]').trigger('click');
			}
		}
  });






});
</script>
</body>
</html>
