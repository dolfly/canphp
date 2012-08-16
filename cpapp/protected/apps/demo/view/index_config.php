<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>后台管理</TITLE>
<META content=IE=8 http-equiv=X-UA-Compatible>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="__PUBLIC__/admin/images/admin_box.css">
<SCRIPT type=text/javascript src="__PUBLIC__/js/jquery.js"></SCRIPT>
</HEAD>
<BODY>
<DIV id=contain>

  <DIV class=admin_title>
  <div class=on>系统设置</div>
  <A class=history href="javascript:history.back(-1)">返回上一页</A>
  </DIV>
  
  <FORM method="post" action="#">
    <DIV class=from_box>
      <DIV class="admin_from">
        <TABLE width="100%">
            <TR>
              <TH>站点名称：</TH>
              <TD><INPUT class="input w200" value="CPAPP" type=text name=title></TD>
            </TR>
            <TR>
              <TH>站点域名：</TH>
              <TD><INPUT class="input w200" value="http://www.canphp.com" type=text name=url></TD>
            </TR>
            <TR>
              <TH>标题附加字：</TH>
              <TD><INPUT class="input w400" value=CPAPP type=text name=seotitle>
                建议用 
                "|"、","(不含引号) 等符号分隔</TD>
            </TR>
            <TR>
              <TH>站点关键字：</TH>
              <TD><INPUT class="input w400" value=CPAPP type=text name=keywords>
                若有多个，用“,”分割</TD>
            </TR>
            <TR>
              <TH>网站描述：</TH>
              <TD><TEXTAREA class="textarea w400 h80" name=description>CPAPP</TEXTAREA>
                出现在页面头部的 Meta 标签中，用于记录本页面的概要与描述</TD>
            </TR>
            <TR>
              <TH>网站版权：</TH>
              <TD><TEXTAREA class="textarea w400 h80" name=copyright>CPAPP</TEXTAREA>
                出现在页面头部的 Meta 标签中，用于记录本页面的概要与描述</TD>
            </TR>
            <TR>
              <TH>电子邮箱：</TH>
              <TD><INPUT class="input w200" value=999@qq.com type=text name=email></TD>
            </TR>
            <TR>
              <TH>ICP域名备案：</TH>
              <TD><INPUT class="input w200" value=版权信息 type=text name=icp></TD>
            </TR>
            <TR>
              <TH>模板方案：</TH>
              <TD><SELECT name=tpl_type>
                  <OPTION selected value=shiji>CPAPP</OPTION>
                </SELECT>
                请不要随便改动模板方案 </TD>
            </TR>
        </TABLE>
      </DIV>
      <DIV class=btn>
        <INPUT value=yes type=hidden name=do>
        <INPUT class=button value="确 定" type=submit name=dosubmit>
        <INPUT class=button value="重 置" type=reset name=reset>
      </DIV>
      
    </DIV>
  </FORM>
</DIV>
</BODY>
</HTML>
