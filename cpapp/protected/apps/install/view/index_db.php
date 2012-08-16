<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<TITLE>{$title}</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="__PUBLICAPP__/images/install.css">
</HEAD>
<BODY>
<div class="install_main">
<div class="install_title">{$title}</div>
<div class="install_left">
<ul>
<li>1.协议</li>
<li>2.环境监测</li>
<li class="on">3.安装设置</li>
<li>4.安装状态</li>
</ul>
</div>
<DIV class=install_right>
  <DIV class=install_box>
<h2>输入数据库相关信息。若您不清楚，请咨询主机提供商。</h2>
<TABLE class=form-table>
<form action="{url('index/db',array('do'=>'yes'))}" method="post" >
  <TBODY>
  <TR>
    <TD width="15%"><LABEL for=dbname>数据库名</LABEL></TD>
    <TD width="34%"><INPUT name="DB_NAME" type="text" class="install_input"></TD>
    <TD width="51%"> 使用哪个数据库运行</TD></TR>
  <TR>
    <TD><LABEL for=uname>用户名</LABEL></TD>
    <TD><INPUT name="DB_USER" type="text" class="install_input"></TD>
    <TD>您的 MySQL 用户名</TD></TR>
  <TR>
    <TD><LABEL for=pwd>密码</LABEL></TD>
    <TD><INPUT type="text"  name="DB_PWD" class="install_input"></TD>
    <TD>... 以及 MySQL 密码。</TD></TR>
  <TR>
    <TD><LABEL for=dbhost>数据库主机</LABEL></TD>
    <TD><INPUT name="DB_HOST" type="text" value="localhost" class="install_input"></TD>
    <TD>通常情况下，应填写 <CODE>localhost</CODE>，若测试连接失败，</TD></TR>
  <TR>
    <TD><LABEL for=dbport>端口</LABEL></TD>
    <TD><INPUT name="DB_PORT" type="text" value="3306" class="install_input"></TD>
    <TD>默认3306</TD></TR>
  <TR>
    <TD><LABEL for=prefix>表名前缀</LABEL></TD>
    <TD><INPUT name="DB_PREFIX" type="text" value="cp_" class="install_input"></TD>
    <TD>单个不要修改。</TD></TR></TBODY></TABLE>
  </DIV>
<div class="install_btn"><INPUT class="button" value="上一步" type="button" onClick="window.location.href = '{url('index/env')}'"> <INPUT class="button" value="开始安装" type="submit" ></div>
</DIV>
</form>

</div>

</BODY></HTML>
