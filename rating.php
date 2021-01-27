<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['user'];
$msg="";





$mqry=mysql_query("select max(id) as maxid from service_review");
$mrow=mysql_fetch_array($mqry);
$id1 = $mrow['maxid'];
$id2 = $id1+1;	
$dis=0;



	if(isset($btn))
	{
	//echo "select * from hotel_booking where scode='$service'";
	$q5=mysql_query("select * from hotel_booking where id='$sid'");
	$n5=mysql_num_rows($q5);
	echo $n5;
			if($n5>0)
			{
			$r5=mysql_fetch_array($q5);
$d1=@explode("S",$sid);
$bookid=$d1[0];

$pid=$r5['hid'];
//echo "select * from service_review where bookid='$bookid'";
$q4=mysql_query("select * from service_review where bookid='$bookid'");
	$n4=mysql_num_rows($q4);
	if($n4>0)
	{
	$fs="1";
	}
	else
	{
	$fs="0";
	}
	
	
	
	$review=$_REQUEST['review'];
	
	
	$r=$review;
				if($fs=="0")
				{
			if($r==1)
			{
			mysql_query("update service_det set star1=star1+1 where id='".$pid."'");
			}
			else if($r==2)
			{
			mysql_query("update service_det set star2=star2+1 where id='".$pid."'");
			}
			else if($r==3)
			{
			mysql_query("update service_det set star3=star3+1 where id='".$pid."'");
			}
			else if($r==4)
			{
			mysql_query("update service_det set star4=star4+1 where id='".$pid."'");
			}
			else if($r==5)
			{
			mysql_query("update service_det set star5=star5+1 where id='".$pid."'");
			}
	
	
	$a=0;
	$b=0;
	$c=0;
	$d=0;
	$e=0;
	$qs2=mysql_query("select * from service_det where id='".$pid."'");
	$rs2=mysql_fetch_array($qs2);
	$a=$rs2['star1'];
	$b=$rs2['star2'];
	$c=$rs2['star3'];
	$d=$rs2['star4'];
	$e=$rs2['star5'];
	
		if($a>$b && $a>$c && $a>$d && $a>$e)
		{
		mysql_query("update service_det set rating='1' where id='".$pid."'");
		}
		else if($b>$c && $b>$d && $b>$e)
		{
		mysql_query("update service_det set rating='2' where id='".$pid."'");
		}
		else if($c>$d && $c>$e)
		{
		mysql_query("update service_det set rating='3' where id='".$pid."'");
		}
		else if($d>$e)
		{
		mysql_query("update service_det set rating='4' where id='".$pid."'");
		}
		else
		{
		mysql_query("update service_det set rating='5' where id='".$pid."'");
		}
				}//fs
	////////////
	$comment=$_REQUEST['comment'];
	
			$n =mysql_query("insert into service_review(id,sid,bookid,review,fake_st) values(".$id2.",'".$pid."','$bookid','".$comment."','$fs')"); 
		
	$msg="<span class=msg2>Rating Addedd Successfully....</span>";	
		
		
		}//n5
		else
		{
	$msg="<span class=msg>Fake User!!!!</span>";		
		}
		
	
	}//btn

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rating</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="">
<table width="382" height="114" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" class="hd3">
  <tr>
    <td width="372"><span class="txt1"><?php echo $rs['hotel']; ?></span></td>
  </tr>
  <tr>
    <td><strong class="msg2">Your Rating </strong></td>
  </tr>
  <tr>
    <td><span class="msg2">Star 5 </span>
        <input name="review" type="radio" value="5" />
      Excellent </td>
  </tr>
  <tr>
    <td><span class="msg2">Star 4</span>
        <input name="review" type="radio" value="4" />
      Very Good</td>
  </tr>
  <tr>
    <td><span class="msg2">Star 3</span>
        <input name="review" type="radio" value="3" />
      Average</td>
  </tr>
  <tr>
    <td><span class="msg2">Star 2</span>
        <input name="review" type="radio" value="2" />
      Poor</td>
  </tr>
  <tr>
    <td><span class="msg2">Star 1</span>
        <input name="review" type="radio" value="1" />
      Terrible </td>
  </tr>
  <tr>
    <td class="msg2">Your Review </td>
  </tr>
  <tr>
    <td><textarea name="comment" cols="40" rows="5"></textarea></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="btn" value="Submit" />    </td>
  </tr>
  <tr>
    <td align="center"><?php echo $msg; ?></td>
  </tr>
  <tr>
    <td align="center">
	<a href="javascript:window.close()">Close</a></td>
  </tr>
</table>
</form>
</body>
</html>
