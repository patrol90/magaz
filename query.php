<?php
 header('Access-Control-Allow-Origin: *');

if (isset($_POST['name']) && isset($_POST['level'])){
	
	
	print_r($_POST);
	$con=mysqli_connect("localhost","root","root","game");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// Perform queries 
	mysqli_query($con,"INSERT INTO prog (name,level) 
	VALUES ('".$_POST['name']."','".$_POST['level']."')");

	mysqli_close($con);

}

if (isset($_POST['name']) ){
	
	$con=mysqli_connect("localhost","root","root","game");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// Perform queries 
	$result=mysqli_query($con,"select * from prog where name='".$_POST['name']."' order by level DESC  LIMIT 1");
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo intval($row["level"]);
    }
	} else {
		echo "1";
	}

	mysqli_close($con);

}

if (isset($_POST['name']) && isset($_POST['delete'])){
	
	$con=mysqli_connect("localhost","root","root","game");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// Perform queries 
	$result=mysqli_query($con,"delete  from prog where name='".$_POST['name']."' ");
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo intval($row["level"]);
    }
	} else {
		echo "1";
	}

	mysqli_close($con);

}

?>


