<html>
<body>
<?php

	if(isset($_POST['Send']))
	{
		$con=mysqli_connect("localhost","root","","cherry");
		$valori="INSERT INTO Contact (nume_prenume,email,mesaj) VALUES ('$_POST[nume_prenume]', '$_POST[email]','$_POST[mesaj]')";
		mysqli_query($con,$valori);
	header("location: ../pag/mesaj_contact.html");}
		
   else
	{$edit_state=false;
	 if(isset($_POST['edit']))
	 $con=mysqli_connect("localhost","root","","cherry");
	 {	
	 $nume_prenume=mysqli_real_escape_string($con,$_POST['nume_prenume']);
	 $email=mysqli_real_escape_string($con,$_POST['email']);
	 $mesaj=mysqli_real_escape_string($con,$_POST['mesaj']);
	
	 
	 mysqli_query($con, "UPDATE Contact SET nume_prenume='$nume_prenume',email='$email',mesaj='$mesaj' WHERE mesaj=$mesaj");
	 header('location: ../pag/mesaj.html');
	}
	}

?>
</body>
</html>