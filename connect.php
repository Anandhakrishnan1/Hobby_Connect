<?php
    $Fname = $_POST['Fname'];
    $Mname = $_POST['Mname'];
    $Lname = $_POST['Lname'];
    $DOB=$_POST['DOB'];
    $email=$_POST['email'];
    $Phone=$_POST['Phone'];
    $Addr=$_POST['Addr'];
    $Gender=$_POST['Gender'];
    $Location=$_POST['Location'];
    $Hobby1=$_POST['Hobby1'];
    $Hobby2=$_POST['Hobby2'];
    $Hobby3=$_POST['Hobby3'];
    $UserID=$_POST['UserID'];
    $Password=$_POST['Password'];

    // Database connection
	$conn = new mysqli('localhost','root','','hobby');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Registration(Fname,Mname,Lname,DOB,email,Phone,Addr,Gender,Location,Hobby1,Hobby2,Hobby3,UserID,Password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssissssssss",$Fname,$Mname,$Lname,$DOB,$email,$Phone,$Addr,$Gender,$Location,$Hobby1,$Hobby2,$Hobby3,$UserID,$Password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>
