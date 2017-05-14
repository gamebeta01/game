<?php
/**
 * 设置密码规则
 */
function setPwd($salt,$pwd){
	$pass = md5(md5($salt.$pwd).md5($salt).md5($pwd));
	return $pass;
}
/**
 * 自定义跳转返回
 * @param [type]  $info [跳转信息]
 * @param integer $time [默认返回时间]
 */
function JumpBack($info="未知错误",$time=3){
	$str = <<<EOF
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<body style="position:absolute;width:100%;height:100%;z-index:1;background:#ccc;">
		<dl style="width:300px;height:200px;position:fixed;top:45%;left:50%;margin-left:-150px;z-index:2;background:#fff;padding:0;">
			<dt style="width:90%;padding:5px 5%;background:#1196EE;border:0;color:#fff">错误信息</dt>
			<dd style="width:90%;height:160px;padding:20px 5%;border:0;margin:0;font-size:16px;">
				$info!<br><br>
				<span id="dingshiqi" style="color:red">$time</span>秒后返回。。。
			</dd>
		</dl>
		</body>
		<script>
			var time = $time;
		    setInterval(function(){
		    	
				if(time == 0){  
			        window.history.back();
			    }  
			    document.getElementById('dingshiqi').innerHTML = time-- ;  
		    },1000); 
		</script>
EOF;
	echo $str;
}
function exit_json($data){
	exit(json_encode($data));
}
