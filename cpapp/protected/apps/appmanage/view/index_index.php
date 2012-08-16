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
  <div class=on>APP管理</div>
  <A href="{url('index/import')}">导入APP</A>
  <A class=history href="javascript:history.back(-1)">返回上一页</A>
  </DIV>
  
  <FORM method="post" action="" target="_self">
  <div class="admin_list">
    <TABLE width="100%">
        <TR>
          <th width=100>ID</th>
          <th>APP名称</th>
          <th width=120>管理操作</th>
        </TR>
      
      <TBODY>
      {loop $appNames $k $app}
        <TR>         
          <TD>{$k}</TD>
          <TD><A href="###" target="_blank"><SPAN>{$app['name']}</SPAN></A> &nbsp;&nbsp; </TD>
          <TD>
            {if $app['state'] == 1}
              <A href="{url('index/export', array('app'=>$k))}" target=_self>导出</A>
              | <A href="{url('index/uninstall', array('app'=>$k))}" onClick="return confirm('卸载将会删除所有数据表和文件,确定要卸载吗？')" target=_self><font color="red">卸载</font></A>
              | <A href="{url('index/state', array('app'=>$k,'state'=>2))}" target=_self><font color="red">停用</font></A> 
            {elseif $app['state'] == 2}
              <A href="{url('index/export', array('app'=>$k))}" target=_self>导出</A>
              | <A href="{url('index/uninstall', array('app'=>$k))}" onClick="return confirm('卸载将会删除所有数据表和文件,确定要卸载吗？')" target=_self><font color="red">卸载</font></A>
              | <A href="{url('index/state', array('app'=>$k,'state'=>1))}" target=_self><font color="green">启用</font></A>            {else}
              <A href="{url('index/install', array('app'=>$k))}" target=_self><font color="green">安装</font></A>            {/if}
        </TD>
      {/loop}
       
       </TR>
     </TBODY>
    </TABLE>
	</DIV>
  </FORM>
</DIV>
</BODY>
</HTML>
