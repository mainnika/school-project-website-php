<?php include('inc/login'); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>МОУСОШ №1 г. Верхнеуральска</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr >
        <td width="15%" height="110" align="center" valign="middle" background="site_img/top_bcgr.png" bgcolor="#fecc0b"><img src="site_img/top_logo_mini.png" alt="Школа №1"/></td>
        <td width="70%" height="110" align="center" valign="middle" background="site_img/top_bcgr.png" bgcolor="#fecc0b"><p>&nbsp;</p>          </td>
        <td width="15%" align="center" valign="middle" background="site_img/top_bcgr.png" bgcolor="#fecc0b"><img src="site_img/school_gerb.gif" alt="Герб Школы" /></td>
      </tr>
      <tr>
        <td height="20" colspan="3" align="center" valign="middle" background="site_img/top_bcgr1.png" bgcolor="#569d63">
		
		
<?php
if (isset($_SESSION['admin']))
{
print('<a href="?go=admin">Запущен сеанс администратора</a>');
};
?>

	    
		</td>
        </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td width="15%" align="left" valign="top" bgcolor="#fecc0b"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="navigtab">
      <tr>
        <td width="3%" valign="top">&nbsp;</td>
        <td width="97%" valign="top">
<?php

$navfile='inc/navig';
$i=0;
if (file_exists($navfile))
{

print('<img alt=">" src="site_img/linkimg.png"><font id="navmain"> Навигация</font><hr>');
$fs=file($navfile);

for ($i=0; $i<count($fs); $i=$i+1)
 {
  print('<img alt=">" src="site_img/linkimg.png"> <a href="'.substr($fs[$i],strrpos($fs[$i],'|')+1).'">'.substr($fs[$i],0,strrpos($fs[$i],'|')).'</a><br>');
 }; 
 
print('<hr>');
}
else
{
print('Error 404');
};
?>    </td>
        </tr>
    </table></td>
    <td width="1%" rowspan="2" align="left" valign="top" bgcolor="#F8F8F8">&nbsp;</td>
    <td width="73%" rowspan="2" align="left" valign="top" bgcolor="#F8F8F8">
<?php
print('<br>');
if (isset($_GET['go']))
{

 if ((file_exists('index/'.$_GET['go'])) or ($_GET['go']=='admin') or ($_GET['go']=='news'))
  {
  
  if (($_GET['go']=='admin') or ($_GET['go']=='news'))
  {
  include('inc/'.$_GET['go']);
  }
  else
  {
  $file=file('index/'.$_GET['go']);
  print('<font id="mainmain">'.$file[0].'</font><hr>');
  for ($i=1; $i<count($file); $i=$i+1)
  {
  print($file[$i]);
  };
    
  };
   
   
   
  }
 else
  {
   print('<font id="mainmain">Ошибка</font>
<hr>
Запрашиваемая страница не найдена. Попытка записана в лог файл.');
   if (file_exists('error_log/link.txt'))
    {
	 $f=fopen('error_log/link.txt','a');
	}
   else
    {
	 $f=fopen('error_log/link.txt','w');
	};
    fputs($f,$_GET['go'].chr(13).chr(10));
	fclose($f);
  };
}
else
{

if (file_exists('index/index'))
 {
  $file=file('index/index');
  print('<font id="mainmain">'.$file[0].'</font><hr>');
  for ($i=1; $i<count($file); $i=$i+1)
  {
  print($file[$i]);
  };

 }
else
 {
   print('<font id="mainmain">Ошибка</font>
<hr>
Запрашиваемая страница не найдена. Попытка записана в лог файл.');
   if (file_exists('error_log/link.txt'))
    {
	 $f=fopen('error_log/link.txt','a');
	}
   else
    {
	 $f=fopen('error_log/link.txt','w');
	};
    fputs($f,'INDEX ---- Critical Error !!!'.chr(13).chr(10));
	fclose($f);
 };  

};

?>	</td>
    <td width="1%" rowspan="2" bgcolor="#fecc0b" align="center">&nbsp;
	

	
	</td>
  </tr>
  <tr class="navigtab">
    <td align="center" valign="middle" bgcolor="#fecc0b">    </td>
  </tr>
  <tr>
    <td height="20" colspan="4" align="center" background="site_img/bottom_bcgr.png" bgcolor="#569d63">&lt; МОУСОШ №1 | Верхнеуральск | &copy; | 2007 | Токарчук Никита &gt; </td>
  </tr>
</table>
</body>
</html>
