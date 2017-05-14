<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:78:"G:\www11\gamebeta01\public/../application/admin\view\manager\list_manager.html";i:1494565738;s:69:"G:\www11\gamebeta01\public/../application/admin\view\public\head.html";i:1494075465;s:71:"G:\www11\gamebeta01\public/../application/admin\view\public\header.html";i:1494566479;s:69:"G:\www11\gamebeta01\public/../application/admin\view\public\menu.html";i:1494690192;s:69:"G:\www11\gamebeta01\public/../application/admin\view\public\foot.html";i:1493534055;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/lib/html5.js"></script>
<script type="text/javascript" src="/static/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->
<style>
.breadcrumb{height:50px;padding-top:10px;}
</style>


<title>角色管理 - 管理员管理</title>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
	<div class="container-fluid cl"> 
	<a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">引爆</a> 
	<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">引爆</a> 
	<span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> 
	<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
	<nav class="nav navbar-nav">
		<ul class="cl">
			<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
				<ul class="dropDown-menu menu radius box-shadow">
					<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
					<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
					<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
					<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
		<ul class="cl">

			<li><?php echo \think\Session::get('manager_name'); ?> </li>
			<li class="dropDown dropDown_hover"> 
				<a href="#" class="dropDown_A">
					<?php echo \think\Session::get('manager_account'); ?> 
					<i class="Hui-iconfont">&#xe6d5;</i>
				</a>
				<ul class="dropDown-menu menu radius box-shadow">
					<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
					<li><a href="#">切换账户</a></li>
					<li><a href="<?php echo Url('Init/loginout'); ?>">退出</a></li>
				</ul>
			</li>
			<li id="Hui-msg"> 
				<a href="#" title="消息">
					<span class="badge badge-danger">1</span>
					<i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i>
				</a> 
			</li>
			<li id="Hui-skin" class="dropDown right dropDown_hover"> 
				<a href="javascript:;" class="dropDown_A" title="换肤">
					<i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i>
				</a>
				<ul class="dropDown-menu menu radius box-shadow">
					<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
					<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
					<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
					<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
					<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
					<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
</div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
	<dl id="menu-system">
		<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="<?php echo Url('System/index'); ?>" title="系统设置">系统设置</a></li>
				<li><a href="system-category.html" title="栏目管理">栏目管理</a></li>
				<li><a href="system-data.html" title="数据字典">数据字典</a></li>
				<li><a href="system-shielding.html" title="屏蔽词">屏蔽词</a></li>
				<li><a href="system-log.html" title="系统日志">系统日志</a></li>
				<li><a href="<?php echo Url('Menu/list_menu'); ?>" title="系统日志">按钮管理</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-admin">
		<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="<?php echo Url('Manager/list_role'); ?>" title="角色管理">角色管理</a></li>
				<li><a href="<?php echo Url('Manager/list_power'); ?>" title="权限管理">权限管理</a></li>
				<li><a href="<?php echo Url('Manager/list_manager'); ?>" title="管理员列表">管理员列表</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-article">
		<dt><i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="article-list.html" title="资讯管理">资讯管理</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-picture">
		<dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="picture-list.html" title="图片管理">图片管理</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-product">
		<dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="product-brand.html" title="品牌管理">品牌管理</a></li>
				<li><a href="product-category.html" title="分类管理">分类管理</a></li>
				<li><a href="product-list.html" title="产品管理">产品管理</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-comments">
		<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="http://h-ui.duoshuo.com/admin/" title="评论列表">评论列表</a></li>
				<li><a href="feedback-list.html" title="意见反馈">意见反馈</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-member">
		<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="member-list.html" title="会员列表">会员列表</a></li>
				<li><a href="member-del.html" title="删除的会员">删除的会员</a></li>
				<li><a href="member-level.html" title="等级管理">等级管理</a></li>
				<li><a href="member-scoreoperation.html" title="积分管理">积分管理</a></li>
				<li><a href="member-record-browse.html" title="浏览记录">浏览记录</a></li>
				<li><a href="member-record-download.html" title="下载记录">下载记录</a></li>
				<li><a href="member-record-share.html" title="分享记录">分享记录</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-tongji">
		<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="charts-1.html" title="折线图">折线图</a></li>
				<li><a href="charts-2.html" title="时间轴折线图">时间轴折线图</a></li>
				<li><a href="charts-3.html" title="区域图">区域图</a></li>
				<li><a href="charts-4.html" title="柱状图">柱状图</a></li>
				<li><a href="charts-5.html" title="饼状图">饼状图</a></li>
				<li><a href="charts-6.html" title="3D柱状图">3D柱状图</a></li>
				<li><a href="charts-7.html" title="3D饼状图">3D饼状图</a></li>
			</ul>
		</dd>
	</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	
	<div class="Hui-article">
		<article class="cl pd-20">
			
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> <a href="javascript:;" onclick="admin_add('添加管理员','<?php echo Url('Manager/save_manager'); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a> </span>
				<span class="r">共有数据：<strong><?php echo $all_count; ?></strong> 条</span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="9">员工列表</th>
					</tr>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="40">ID</th>
						<th width="150">登录名</th>
						<th width="90">手机</th>
						<th width="150">邮箱</th>
						<th>角色</th>
						<th width="130">加入时间</th>
						<th width="100">是否已启用</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<tr class="text-c">
						<td  class="destory_input"><input type="checkbox" value="1" name=""></td>
						<td><?php echo $vo['manager_id']; ?></td>
						<td><?php echo $vo['manager_account']; ?></td>
						<td><?php echo $vo['manager_mobile']; ?></td>
						<td><?php echo $vo['manager_email']; ?></td>
						<td><?php echo $vo['role']; ?></td>
						<td><?php echo date("Y-m-d H:i:s",$vo['manager_jointime']); ?></td>
						<td class="td-status">
							<?php if($vo['manager_status'] == '1'): ?>
							<span class="label label-success radius">已启用</span>
							<?php else: ?>
							<span class="label radius">已停用</span>
							<?php endif; ?>
						</td>
						<td class="td-manage">
						<?php if($vo['manager_status'] == '1'): ?>
						<a style="text-decoration:none" onClick="admin_stop(this,'<?php echo $vo['manager_id']; ?>','<?php echo Url('Manager/manager_stop'); ?>')" href="javascript:;" title="停用">
							<i class="Hui-iconfont">&#xe631;</i>
						</a> 
						<?php else: ?>
						<a style="text-decoration:none" onClick="admin_start(this,'<?php echo $vo['manager_id']; ?>','<?php echo Url('Manager/manager_start'); ?>')" href="javascript:;" title="启用">
							<i class="Hui-iconfont">&#xe615;</i>
						</a>
						
						<?php endif; ?>
						<a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo Url('Manager/edit_manager',array('id'=>$vo['manager_id'])); ?>','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_del('<?php echo Url('Manager/del_manager'); ?>','<?php echo $vo['manager_id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="text-c"><?php echo $list->render(); ?></div>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去-->
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去--> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id,url){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.post(
			url,
			{id:id},
			function(data){
				if(data['status'] == 1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 6,time:1000});
				}else{
					layer.msg('停用失败!', {icon: 5,time:1000});
				}
			}
		);
					
	});
}

/*管理员-启用*/
function admin_start(obj,id,url){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.post(
			url,
			{id:id},
			function(data){
				if(data['status'] == 1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
					$(obj).remove();
					layer.msg('已启用!', {icon: 6,time:1000});
				}else{
					layer.msg('启用失败!', {icon: 5,time:1000});
				}
			}
		);
					
	});
}
/*管理员-权限-删除*/
function admin_del(url,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(){
		$.post(
			url,
			{id:id},
			function(data){
				if(data['status'] == 1){
					layer.msg(data['msg'],{icon:1,time:1000});
				}else if(data['status'] == -1){
					layer.msg(data['msg'],{icon:-1,time:1000});
				}
			}
		)
		
	});
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>