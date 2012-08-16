<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>{$title}</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="__PUBLIC__/admin/images/admin_login.css">
<SCRIPT type=text/javascript src="__PUBLIC__/js/jquery.js"></SCRIPT>
</HEAD>
<BODY style="MARGIN: 0px" scroll=no>
<DIV class=login_title>{$title}</DIV>
<DIV class=login_main>
     <DIV class=login_box>
	  <DIV class="login_do" id="tips" style="display:none"> </DIV>
      <DIV style="padding:15px 20px;">
		  <TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
			  <TR>
				<TH>用户名：</TH>
				<TD><INPUT id="username" class="login_input" type="text"></TD>
			  </TR>
			  <TR>
				<TH>密&nbsp;&nbsp;&nbsp;码：</TH>
				<TD><INPUT id="password" class="login_input" type="password"></TD>
			  </TR>
			  <TR>
				<TH>验证码：</TH>
				<TD><div>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="120"><INPUT id='checkcode' class="login_yz" type="text"></td>
						<td><img src="{url('index/verify')}" width="100" height="32" title="如果您无法识别验证码，请点图片更换"  id="verifyImg" style="cursor:pointer"></td>
					  </tr>
					</table>
				  </div></TD>
			  </TR>
			  <TR>
				<TH>&nbsp;</TH>
				<TD><A class=button href="javascript:;" id="btn_submit">登录</A></TD>
			  </TR>
			</TBODY>
		  </TABLE>
		</DIV>
    </DIV>
</DIV>
<DIV class=login_footer>
  <P>{$footer}</P>
</DIV>
<script type="text/javascript">
$(function(){
	if(self != top){
		parent.location.href = "{url('index/login')}";
	}
	
	//刷新验证码
	$("#verifyImg").click(function(){
		var url = $(this).attr('src');
		url = url + ((/\?/.test(url)) ? '&' : '?' ) + new Date().getTime();
		$(this).attr('src', url)
	});
	
	//登录处理
	function submitLogin(){
		var username = $.trim( $("#username").val() );
		var password = $.trim( $("#password").val() );
		var checkcode = $.trim( $("#checkcode").val() );
		$('#tips').show();
		if( "" == username){
			$('#tips').html('请输入用户名');		
			return false;
		}	
		if( "" == password){
			$('#tips').html('请输入密码');
			return false;
		}
		if( "" == checkcode){
			$('#tips').html('请输入验证码');
			return false;
		}		
		$('#tips').html('正在登录中……');
		
		$.post("{url('index/login')}",
				{'username':username, 'password':password, 'checkcode':checkcode},
				function(json){
					if(json.status ==1){
						window.location.href = "{url('index/index')}";
					}else{
						$('#tips').html(json.msg);
						$('#tips').show();
					}
				},
				'json'
		);
	}
	
	//点击登录
	$("#btn_submit").click(function(){
		return submitLogin();
	});
	
	//输完验证码或焦点在登录按钮上，按回车登录
	$("#checkcode, #btn_submit").keydown(function(e){
		if(e.keyCode==13){
			return submitLogin();
		}
	});
	
	//输入框聚焦，则隐藏错误tips
	$("#username, #password, #checkcode").focus(function(){
		$('#tips').hide("slow");
	});

});
</script>
</BODY>
</HTML>
