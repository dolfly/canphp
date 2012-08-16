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
<li class="on">2.环境监测</li>
<li>3.安装设置</li>
<li>4.安装状态</li>
</ul>
</div>
<DIV class=install_right>
  <DIV class=install_box>
<h2>系统检测</h2>
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="jc_table">
                  <tr>
                    <td width="18%"><strong>检查项目</strong></td>
                    <td width="36%"><strong>当前环境</strong></td>
                    <td width="28%"><strong>安装建议</strong></td>
                    <td width="18%"><strong>功能影响</strong></td>
                  </tr>
                  <tr>
                    <td>操作系统</td>
                    <td><?php $os = explode(" ", php_uname());?><?php echo $os[0];?>&nbsp;(内核版本：<?php echo $os[2]?>)</td>
                    <td>Windows_NT/Linux/Freebsd</td>
                    <td><font color="green">√</font></td>
                  </tr>
                  <tr>
                    <td>web 服务器</td>
                    <td><?php echo strtoupper(php_sapi_name())?></td>
                    <td>Apache/IIS</td>
                    <td><font color="green">√</font></td>
                  </tr>
                  <tr>
                    <td>php 版本</td>
                    <td>php <?php echo PHP_VERSION?></td>
                    <td>php 5.0.0 及以上</td>
                    <td><font color="green">√</font></td>
                  </tr>
                  <tr>
                    <td>支持 mysql</td>
                    <td><?php echo $ifMysql?$yes:$no; ?>支持Mysql</td>
                    <td>必须支持</td>
                    <td><?php echo $ifMysql?$yes:$no; ?></td>
                  </tr>
                  <tr>
                    <td>gd 扩展</td>
                    <td><?php echo $ifGd?$yes:$no; ?>支持GD库</td>
                    <td>建议开启</td>
                    <td><font color="green">√</font></td>
                  </tr>
                  <tr>
                    <td>zlib 扩展</td>
                    <td><?php echo $ifGzip?$yes:$no; ?>支持Gzip压缩</td>
                    <td>建议开启</td>
                    <td><font color="green">√</font></td>
                  </tr>

                  <tr>
                    <td>iconv 扩展</td>
                    <td><?php echo $ifIconv?$yes:$no; ?>支持iconv拓展</td>
                    <td>必须支持</td>
                    <td><?php echo $ifIconv?$yes:$no; ?></td>
                  </tr>
                  <tr>
                    <td>allow_url_fopen</td>
                    <td><?php echo $ifFopen?$yes:$no; ?>支持allow_url_fopen</td>
                    <td>建议打开</td>
                    <td><font color="green">√</font></td>
                  </tr>
                </table>
  </DIV>
<div class="install_btn"> <INPUT class="button" value="上一步" type="button" onClick="window.location.href = '{url('index/index')}'"> <INPUT class="button" value="下一步" type="button" onClick="window.location.href = '{url('index/db')}'"></div>
</DIV>


</div>

</BODY></HTML>
