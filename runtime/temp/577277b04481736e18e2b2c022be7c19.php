<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\www11\gamebeta01\public/../application/admin\view\init\index.html";i:1494409817;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/static/css/Login_style.css" />
<script type="text/javascript" src="/static/javascript/Login_javascript.js"></script>
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
</head>
<body>
<h2 align="center">管理员登录</h2>
<div class="login_frame"></div>
<div class="LoginWindow">
  <div>
    <div class="login">
    <p>
      <label for="login">帐号:</label>
      <input type="text" name="id" id="id" value="">
    </p>

    <p>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">登录</button>
    </p>
    </div>
  </div>
</div>

<div id="timeArea"><script> LoadBlogParts();</script></div>
<script>
$('.login-button').click(function(){
    $.post(
        "<?php echo Url('init/index'); ?>",
        {id:$('#id').val(),password:$('#password').val()},
        function(data){
            if(data['status']!=1){
                layer.msg(data['msg']);
            }else{
                layer.msg(data['msg']);
                setTimeout(function(){location.href="<?php echo Url('index/index'); ?>";},2000);
            }
        },
        'json'
    );
});
</script>
</body>
</html>