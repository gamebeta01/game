<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"F:\WWW\gamebeta01\public/../application/admin\view\menu\save_menu.html";i:1494847827;s:67:"F:\WWW\gamebeta01\public/../application/admin\view\public\head.html";i:1494075466;s:67:"F:\WWW\gamebeta01\public/../application/admin\view\public\foot.html";i:1493534056;}*/ ?>
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

<title>添加按钮</title>
</head>
<body>
<article class="cl pd-20">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>按钮名称：</label>
			<div class="formControls col-xs-8 col-sm-5">
				<input type="text" class="input-text" value="" placeholder="" id="menu_name" name="menu_name" datatype="*4-16" nullmsg="按钮名称不能为空">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>按钮级别：</label>
			<div class="formControls col-xs-8 col-sm-5">
				<input type="text" class="input-text" value="1" placeholder="" id="menu_level" name="menu_level" datatype="*4-16" nullmsg="按钮级别不能为空">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">按钮类别：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:300px;">
				<select class="select" name="menu_pid" size="1">

					<option value="0">一级按钮</option>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['menu_id']; ?>"><?php echo $vo['menu_name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>
<!--_footer 作为公共模版分离出去-->
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去--> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	
	$("#form-admin-role-add").validate({
		rules:{
			menu_name:{
				required:true,
			},
			menu_level:{
				required:true,
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit(function(data){
				
				var index = parent.layer.getFrameIndex(window.name);
				if(data['status'] == 1){
					parent.layer.msg(data['msg']);
					setTimeout(function(){parent.layer.close(index);},1000);
				}else if(data['status'] == -1){
					parent.layer.msg(data['msg']);
				}else if(data['status'] == -5){
					parent.layer.msg(data['msg']);
				}
			});
					
		}
	});
});

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>