<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>后台管理</TITLE>
<META content=IE=8 http-equiv=X-UA-Compatible>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="__PUBLIC__/admin/images/admin_box.css">
<SCRIPT type="text/javascript" src="__PUBLIC__/js/jquery.js"></SCRIPT>
<SCRIPT type="text/javascript" src="__PUBLIC__/js/kindeditor/kindeditor-min.js"></SCRIPT>
<SCRIPT type="text/javascript" src="__PUBLIC__/js/artDialog/jquery.artDialog.js?skin=default"></SCRIPT>
<script type="text/javascript">
function setTab(id, num, n){
	for(var i=1; i<=n; i++){
		$("#"+id+i).removeClass('hover');
	}
	$("#"+id+num).addClass('hover');
}
</script>
</HEAD>
<BODY>
<SCRIPT>
KindEditor.ready(function(K) {
	K.create('#editor', {
		width: '99%',
		height: '460px',
		resizeType: 1,
		themeType: 'simple',
		urlType: 'relative',
		allowFileManager : true
	});
});
</SCRIPT>
<DIV id=contain>
  <DIV class=admin_title>
  <div class=on>添加文章</div>
  <A class=history href="javascript:history.back(-1)">返回上一页</A>
  </DIV>
  <FORM encType="multipart/form-data" onSubmit="return check_form(document.add);" method="post" action="#">
    <DIV class=from_box>
      <UL>
        <LI id=one1 class="hover" onClick="setTab('one',1,2)">基本信息</LI>
        <LI id=one2 onClick="setTab('one',2,2)">附加设置</LI>
      </UL>
      <DIV id=con_one_1 class="admin_from">
        <TABLE width="100%">
            <TR>
              <TH>栏目：</TH>
              <TD>
			  <SELECT name=cid reg="^.+$">
                  <OPTION selected value="">选择分类</OPTION>
                  <OPTION value=1>企业要闻</OPTION>
                  <OPTION value=2>饮酒文化</OPTION>
                </SELECT>
               </TD>
            </TR>
            <TR>
              <TH>属性：</TH>
              <TD>
			   <SELECT id=recommend name=recommend>
                  <OPTION selected value=1>普通内容</OPTION>
                  <OPTION style="COLOR: #090" value=2>热门推荐</OPTION>
                  <OPTION style="COLOR: #f63" value=3>重点推荐</OPTION>
                </SELECT>
				
                <SELECT id=top name=top>
                  <OPTION selected value=2>不置顶</OPTION>
                  <OPTION style="COLOR: #f63" value=1>置顶</OPTION>
                </SELECT>
				
                <SELECT id=state name=state>
                  <OPTION selected value=1>正常显示</OPTION>
                  <OPTION style="COLOR: #f63" value=2>关闭显示</OPTION>
                </SELECT>
                常规属性,如果不是特殊内容可以不用设置</TD>
            </TR>
            <TR>
              <TH>标题：</TH>
              <TD><DIV>
                  <INPUT class="input measure-input w400" type=text name=title reg="^.+$">
                  <SPAN name="easyTip">必须填写</SPAN></DIV></TD>
            </TR>
            <TR>
              <TH>缩图：</TH>
              <TD>
			  	<DIV>
                  <INPUT id=thumb class="input w300" type=text name=thumb>
                  <A class=submits onClick="window.art.dialog({id:'add',iframe:'http://www.canphp.com', title:'上传缩图', width:'600', height:'380', lock:true})" href="javascript:void(0);">上传缩图</A>
				  </DIV>
				  </TD>
            </TR>
            <TR>
              <TH>内容</TH>
              <TD>
			  	<TEXTAREA style="WIDTH: 99%; HEIGHT: 460px" id=editor name="content"></TEXTAREA>
              </TD>
            </TR>
        </TABLE>
      </DIV>
      <DIV id=con_one_2 class="from_tab admin_from" style="DISPLAY: none">
        <TABLE width="100%">
            <TR>
              <TH>关联内容：</TH>
              <TD><DIV>
                  <INPUT class="input w400" type=text name=reid>
                  <A class=submits onClick="window.art.dialog({id:'add',iframe:'/shiji/public/swfup/', title:'上传缩图', width:'600', height:'380', lock:true})" href="javascript:void(0);">上传缩图</A></DIV></TD>
            </TR>
            <TR>
              <TH>SEO关键字：</TH>
              <TD>
			  <INPUT id=keywords class="input w400" type=text name=keywords>
                请使用全角逗号分隔。</TD>
            </TR>
            <TR>
              <TH>SEO描述： </TH>
              <TD>
			  	<TEXTAREA class="textarea w400 h80" onkeyup=value=value.substr(0,110); name=intro></TEXTAREA>
                长度不能超过110个字符，留空将自动提取文章前110个字符 </TD>
            </TR>
            <TR>
              <TH>发布时间：</TH>
              <TD colSpan=3><INPUT class="input date w150" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" value="2012-07-31 10:04:59" type=text name=create_time></TD>
            </TR>
            <TR>
              <TH>点击数：</TH>
              <TD colSpan=3>
			  	<INPUT id=clickcount class="input w150" value=0 type=text name=clickcount>
              </TD>
            </TR>
            <TR>
              <TH>内容页模版：</TH>
              <TD><INPUT class="input w150" type=text name=temp>
                不带文件后缀，留空为默认模板 
                格式为show_</TD>
            </TR>
        </TABLE>
      </DIV>

      <DIV class=btn>
        <INPUT type=hidden name=id>
        <INPUT value=yes type=hidden name=do>
        <INPUT class=button value="确 定" type=submit name=dosubmit>
        <INPUT class=button value="重 置" type=reset name=reset>
      </DIV>
      
    </DIV>
  </FORM>
</DIV>
</BODY>
</HTML>
