<?
date_default_timezone_set('Australia/Adelaide');
$downtime = date('H', time());
if ($downtime==22) { //if it's 10pm, go to screensaver for 11.5 hours
?> 
<meta http-equiv="REFRESH" content="0;url=crest.php"> 
<?
	
}else{
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COW bookings pre</title>
<style type="text/css">

.style3 {
	font: 60px/100% Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}

body {
	background-color: #000000;	
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<style type="text/css">

.button {
	display: inline-block;
	outline: none;
	width: 400px;
	height: 100px;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	font: 30px/100% Arial, Helvetica, sans-serif;
	padding: 0em 2em 0em;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	-webkit-border-radius: .5em; 
	-moz-border-radius: .5em;
	border-radius: .5em;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.button:hover {
	text-decoration: none;
}
.button:active {
	position: relative;	
	top: 1px;
}


.orange {
	color: black;
	border: solid 1px #FFFFBB;
	background: #FFFFBB;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFFFBB), to(#FFFFBB));
	background: -moz-linear-gradient(top,  #FFFFBB,  #FFFFBB);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFBB', endColorstr='#FFFFBB');
}
.orange:hover {
	background: #FFFF66;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFFF66), to(#FFFF66));
	background: -moz-linear-gradient(top,  #FFFF66,  #FFFF66);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFF66', endColorstr='#FFFF66');
}
.orange:active {
	color: black;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFFFDD), to(#FFFFDD));
	background: -moz-linear-gradient(top,  #FFFFDD,  #FFFFDD);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFDD', endColorstr='#FFFFDD');
}
.pink {
	color: #000000;
	border: solid 1px #f1e7ce;
	background: #f1e7ce;
	background: -webkit-gradient(linear, left top, left bottom, from(#f1e7ce), to(#f1e7ce));
	background: -moz-linear-gradient(top,  #f1e7ce,  #f1e7ce);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f1e7ce', endColorstr='#f1e7ce');
}
.pink:hover {
	background: #ead7A0;
	background: -webkit-gradient(linear, left top, left bottom, from(#ead7A0), to(#ead7A0));
	background: -moz-linear-gradient(top,  #ead7A0,  #ead7A0);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ead7A0', endColorstr='#ead7A0');
}
.pink:active {
	color: #000000;
	background: -webkit-gradient(linear, left top, left bottom, from(#f1e7ce), to(#f1e7ce));
	background: -moz-linear-gradient(top,  #f1e7ce,  #f1e7ce);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f1e7ce', endColorstr='#f1e7ce');
}

.style1 {
	font: 60px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;}
.style2 {
	font: 40px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #bda976;
	}
.style2A {
	font: 40px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #548ef8;
	}
.style3A {
	font: 30px/100% Arial, Helvetica, sans-serif;
	color: #FF0000;
	font-weight: bold;
}
.style4 {
	font: 24px/100% Arial, Helvetica, sans-serif;	
}
</style>
</head>

<body>



 
<table border="0" cellspacing="5" cellpadding="5" align="center">
<tr>
<td align="center" valign="center" span class="style3">      

      <p>eLearning store<br>
      bulk computer bookings<br>
      self service kiosk</p>
      </td>
</tr>
<tr>
<td align="center" valign="center"><p><a href="cow_bookings_today.php" ><img src="big_crest.png" border="0" /></a></p>
  <p><br />
  </p></td>
</tr>

	
	
</td>
</tr>
      <td align="center">
      <form name='pickup' method='post' action='cow_bookings_today.php'>
        <button class="button orange">Equipment out</button>
      </form></td><tr>
      <td align="center">
      <form name='return' method='post' action='cow_returns_today.php'>
        <button class="button orange">Equipment in</button>
      </form></td></tr>
</table>



<?
} //else
?>

</body>
</html>
