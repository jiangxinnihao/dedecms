<?php defined("BCBFDAE"); error_reporting(0); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!--获取参数-->
<?php

 require_once(dirname(BCBFDAE)."/config.php");require_once (dirname(BCBFDAE) . "/../include/common.inc.php"); $dsql->SetQuery("Select * From `#@__homepageset`"); $dsql->Execute(); $i=0; while($row = $dsql->GetArray()) { $i++; if($i==1){$templet=$row['templet'];$position=$row['position'];} } ?>

<!--栏目文件存放位置-->
<?php
 $dsql->SetQuery("Select * From `#@__arctype`"); $dsql->Execute(); while($row = $dsql->GetArray()) {$typedir=$row['typedir'];} ?>

<!--当前模式-->
<?php
 $dsql->SetQuery("Select * From `#@__sysconfig` where varname='cfg_df_style'"); $dsql->Execute(); while($row = $dsql->GetArray()) {$style= $row['value'];} ?>

<a class="qiehuan" href="javascript:;" style="height:23px;" onclick="qiehuan()">当前为<?PHP  echo $style;?></a>
<style type="text/css">
body,html{ margin:0; padding:0; padding-top:5px;background-color:transparent;}
.qiehuan{ color:#fff; text-decoration:none; font-size:12px}
input{ height:23px;}
</style>
<style type="text/css">

</style>
<script language="javascript">
// var shiyong="<?php  echo $shiyong?>";
// var xianzai="<?php  echo $xianzai?>";
// var shouquan="<?php  echo $shouquan?>";
// var yuming="<?php  echo $yuming?>";
var style="<?php  echo $style?>";
var templet="<?php  echo $templet?>";
var position="<?php  echo $position?>";
var typedir="<?php  echo $typedir?>";

//切换函数S
function qiehuan(){

  if(style.indexOf('wap') > 0 || templet.indexOf('wap') > 0 || position.indexOf('wap') > 0 || typedir.indexOf('cmspath}/wap') > 0){
  alert("恭喜您，转PC模式成功！");
  setTimeout("document.pcb.submit()",1);
  setTimeout("document.pca.submit()",2);
  }else{
  alert("恭喜您，转WAP模式成功！");
  setTimeout("document.wapb.submit()",1);
  setTimeout("document.wapa.submit()",2);

}
window.top.location.reload();
window.parent.location.reload();
}
//切换函数E
</script>
<div >

<!--改为WAP模式-->
<form action="sys_sql_query.php" method="post" name="wapa" target="aaa">
 <input type='hidden' name='dopost' value='query'>
 <input name="querytype" type="radio" class="np" value="2" checked style="display:none">
 <textarea name="sqlquery" cols="60" rows="10" id="sqlquery" style="width:90%;display:none;">
update #@__arctype set typedir=replace(typedir,'{cmspath}/','{cmspath}/wap/');
update #@__homepageset set templet=replace(templet,'pc','wap');
update #@__homepageset set position=replace(position,'../index.html','../wap/index.html');
 </textarea>
</form>
<form action="sys_info.php" method="post" name="wapb" target="bbb">
<input type="hidden" name="dopost" value="save">
<input type='text' name='edit___cfg_df_style' id='edit___cfg_df_style' value="wap" style="display:none">
</form>

<!--改为PC模式-->
<form action="sys_sql_query.php" method="post" name="pca" target="ccc">
 <input type='hidden' name='dopost' value='query'>
 <input name="querytype" type="radio" class="np" value="2" checked style="display:none">
 <textarea name="sqlquery" cols="60" rows="10" id="sqlquery" style="width:90%;display:none">
update #@__arctype set typedir=replace(typedir,'{cmspath}/wap/','{cmspath}/');
update #@__homepageset set templet=replace(templet,'wap','pc');
update #@__homepageset set position=replace(position,'../wap/index.html','../index.html');
 </textarea> 
</form>
<form action="sys_info.php" method="post" name="pcb" target="ddd">
<input type="hidden" name="dopost" value="save">
<input type='text' name='edit___cfg_df_style' id='edit___cfg_df_style' value="pc" style="display:none">
</form>

<iframe name="aaa" style="display:none"></iframe>
<iframe name="bbb" style="display:none"></iframe>
<iframe name="ccc" style="display:none"></iframe>
<iframe name="ddd" style="display:none"></iframe>
<iframe name="eee" style="display:none"></iframe>
</div>
</body>
</html>