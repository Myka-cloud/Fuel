<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where id='$id'");
while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $owners_id=$row['owners_id'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
	  $bill=$totalcons * $price;
	  $date=$row['date'];
 
  }

?>

<?php
  
include 'db.php';


$result = mysqli_query($conn,"SELECT * FROM owners WHERE id  = '$owners_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$lname= $test['lname'] ;					
				$fname=$test['fname'] ;
				$mi=$test['mi'] ;
				$address=$test['address'] ;
				$contact=$test['contact'] ;

?>
<html>
<head><title>Consumption Report</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
<script>
function printDiv(data) {
      var printContents = document.getElementById('data').innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
</head>
<body style=" background-size:cover; font-family:'Courier New', Courier;">
<style type="text/css">
#data { margin: 0 auto; width:700px; padding:20px; border:#066 thin ridge; height:600px; }

</style>
<div id="data">
<center>
<h4><center><b> Fuel Consumption Report</b></center></h4>
<p><strong>Hotel Liquidation</strong></p>
<i style="text-align:right; margin-left:250px;">Date: <?php echo $date; ?></i>
</center>
<div id="context">
<table class="table table-striped table-bordered">
<tr><td>Last Name</td><td></b><i><?php echo $lname; ?></i></td><td>Client ID</td><i>Bill Report<?php echo $id; ?></i></td> </tr>
<tr><td>First Name</td><td><b><i><?php echo $fname; ?></td><td bordercolor="#000000">Driver's Id</td><td><?php echo $id; ?></td></tr>


<tr><td>Address: </td><td><b><i><?php echo $address; ?></td></tr>
<tr><td bordercolor="#000000">Contact: </td><td><b><i><?php echo $contact; ?></td></tr>
<tr><td bordercolor="#000000">Previous Reading :</td><td><b><i> <?php echo $prev;?> </td><td bordercolor="#000000">Present Reading : </td><td><b><i><?php echo $pres; ?> </td></tr>
<tr><td bordercolor="#000000">Present Reading :</td><td><b><i> <?php echo $pres;?> </td><td bordercolor="#000000">Present Reading : </td><td><b><i><?php echo $pres; ?> </td></tr>
<tr><td bordercolor="#000000">Consumption: </td><td><b><i><?php echo $totalcons;?> </td><td bordercolor="#000000">Price / unit : </td>
<td>&#x20b9;<b><i><?php echo $price; ?>&nbsp;Pesos </td>
</tr>
<tr><td colspan="4"><center><h2>Total Inventory:<b><i> <?php echo $bill; ?><b></h2></center></td></tr>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['name'];

  }
?>
<tr><td>Checked By:                          <?php echo $sessionname;?></td><td>Signature:_____________</td></tr>

 
</table>



</div>
</div>
<CENTER><button type="button"  class="btn btn-default " onclick="printDiv(data)"><span
class=" glyphicon glyphicon-print"></span>&nbsp;Print Bill</button>&nbsp;<a href="bill.php"><button class="btn btn-danger">
	<span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Go back</button></a></CENTER>
</body>
</html>