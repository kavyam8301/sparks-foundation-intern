<?php
include"header.php";
error_reporting(0);
include"stylesheet css.php";
include"connection.php";
$result=mysqli_query($conn,"select * from customers");

if(isset($_POST["submit"])){
	$receiver=$_POST["receiver"];
	$amt=$_POST["amount"];
	#$bal=$_POST["balance"];
	$def=mysqli_query($conn,"select * from demo_user");
	foreach ($def as $row) 
    		$bal=$row["balance"];
    		
	if($amt<$bal){

		#$inst="insert into transaction(sender,receiver,amount) values('demo_sender','$receiver','$amt')";
		$inst="INSERT INTO transaction(sender, receiver, amount) VALUES ('demo_sender','$receiver','$amt')";
		$abc=mysqli_query($conn,$inst);
		$ghi="UPDATE `demo_user` SET balance=$bal-$amt";
		$r=mysqli_query($conn,$ghi);
		$a="UPDATE `customers` SET current_balance=current_balance+$amt where name='$receiver'";
		$k=mysqli_query($conn,$a);

		 if($abc && $r && $k){
			?>
			<script>alert("TRANSFERRED SUCCESSFULLY!!")</script>
			<?php 
		}

		

	}
	else{
		?>
			<script type="text/javascript">alert("AMOUNT MUST BE LESS THAN BALANCE")</script>
			<?php 
	}



}
?>
<head>
  <meta charset="utf-8">
  </head>
<body id="bi2">

  <div class="mx-auto">
        <div class="w-100 p-5">
<center>

<div style="font-family:Comic Sans MS;">
<h1 style="background-color: blue; max-width: 1000px;"> WELCOME TO TRANSACTION PAGE!! </h1>
</div>
<br>
<div class="card text-white bg-secondary mb-3" style="font-family: 'Audiowide', sans-serif; max-width: 1000px; opacity: 0.8;">
<form action="transfer.php" method="post" >
<br>
<div class="col-md-4">
    <label for="validationDefault02" class="form-label" style="padding-right: 430px; font-size: 30px;" style="font-family: Impact"><b>SENDER </b></label>
    <input type="text" class="form-control" id="validationDefault02" value="demo_sender" required disabled> 
  </div>
<div class="col-md-4">
    <label for="validationDefault04" class="form-label" style="padding-right: 430px; font-size: 30px;"><br><b>RECEIVER </b></label>
    <select class="form-select" id="validationDefault04" required name="receiver">
      <option selected disabled value="">...select customer...</option>
      <?php  
        foreach ($result as $row) {
    		
    	?>
      <option><?php echo $row["name"] ?></option>
  <?php } ?>

    </select>
  </div>
  <br>
  <div class="col-md-4">

  	<?php  
  		$data=mysqli_query($conn,"select * from demo_user");
        foreach ($data as $row) {
    		$bal=$row["balance"];
    	}
    	?>
       
  
    <label for="validationDefault02" class="form-label" style="font-size: 25px;"><br><b>
    CURRENT BALANCE : </b></label>
    <input type="text" class="shadow-lg p-3 mb-5 bg-body rounded" placeholder="<?php echo $bal ?>" required disabled>
   
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label" style="font-size: 20px;"><br><b>AMOUNT TO BE DEBITED </b></label>
    <input type="text" class="shadow-lg p-3 mb-5 bg-body rounded" name="amount" required >
  </div>
  
    
  
  
  <div class="col-12">
    <center><button class="btn btn-primary" type="submit" name="submit">Submit</button></center>
  </div>
</div>
</form>
</div>
</center>
</div>
</div>

</body>





