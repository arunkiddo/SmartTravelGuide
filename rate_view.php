<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$msg="";

$qry=mysql_query("select * from service_review where sid=$sid");
$num=mysql_num_rows($qry);

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
  <h2 align="center">Review</h2>
  <table width="356" border="1" align="center">
    <tr>
      <th width="50" scope="col">Sno</th>
      <th width="290" scope="col">Reviews</th>
    </tr>
	<?php
	while($row=mysql_fetch_array($qry))
	{
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['review']; 
	  if($row['fake_st']=="1")
	  {
	  ?><span style="color:#FF0000"> (Fake)</span><?php
	  }
	  
	  ?></td>
    </tr>
	<?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
