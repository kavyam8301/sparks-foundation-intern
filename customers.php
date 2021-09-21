
<?php include "stylesheet css.php";
include "header.php";
include "connection.php";
?>


<!DOCTYPE html>
<html>
	<title>
		<head> DISPLAY RECORDS </head>
	</title>
    

<body id="bi1">
    <div class="mx-auto">
        <div class="w-100 p-5">
            <div class="table-responsive">
    <div  class="font-effect-outline" style="font-family: Comic Sans MS; font-size: 50px;">
	<table class="table table-dark table-hover" align="center" border="1px" style="width:1000px; line-height:40px;">
	<tr>
		<th colspan="4"><h2><center>DEMO BANKING</center></h2></th>
		</tr>
		<tr>
			<th>#</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>CURRENT BALANCE</th>
    	</tr>
    	<?php
    	include("connection.php");
    	error_reporting(0);
    	$query="select * from customers";
    	$data=mysqli_query($conn,$query);
    	/*$total=mysqli_num_rows($data);
    	if($total!=0){
    		
    		while($result=mysqli_fetch_assoc($data))
    		{
    			echo "
    			<tr>
    			
    			<td>".$result['id']."</td>
    			<td>".$result['name']."</td>
    			<td>".$result['email']."</td>
    			<td>".$result['current balance']."</td>
    			
    			</tr>
    			";

    		}
    	}*/
    	?>
    	<?php  
        foreach ($data as $row) {
    		# code...
    	?>
    		<tr>
    			<td><?php echo $row["id"] ?></td>
    			<td><?php echo $row["name"] ?></td>
    			<td><?php echo $row["email"] ?></td>
    			<td><?php echo $row["current_balance"] ?></td>	

    		</tr>

    	<?php } ?>
    	<tr>
    		
    	</tr>
    	</table>
    </div>
</div>
</div>
</div>
    	</body>
    	</html>











		




