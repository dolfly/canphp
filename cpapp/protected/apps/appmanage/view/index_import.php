<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>后台管理</TITLE>
<META content=IE=8 http-equiv=X-UA-Compatible>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="__PUBLIC__/admin/images/admin_box.css">
</HEAD>
<BODY>
<DIV id=contain>
  <DIV class=admin_title>
   <div class="on">APP导入</div>
   <A class=history href="javascript:history.back(-1)">返回上一页</A>
   </DIV>
  <FORM encType="multipart/form-data" method="post" action="{url('index/import')}">
    <DIV class=from_box>
      <DIV class="admin_from">
        <TABLE width="100%">
            <TR>
              <TH>APP：</TH>
              <TD><INPUT class="input_file w400" type=file name=file id=file></TD>
            </TR>
        </TABLE>
      </DIV>
      <DIV class=btn>
        <INPUT value=yes type=hidden name=do>
        <INPUT class=button value="确 定" type=submit name=dosubmit>
      </DIV>
    </DIV>
  </FORM>
</DIV>
</BODY>
</HTML>
