<html>
<body>
<?php

	if(isset($_POST['Send']))
	{
		$con=mysqli_connect("localhost","root","","chery");
		$valori="INSERT INTO Comanda (name, surname,number,mail,com) VALUES ('$_POST[name]', '$_POST[surname]','$_POST[number]','$_POST[mail]','$_POST[com]')";
		mysqli_query($con,$valori);
	header("location: mesaj.html");}
		
   else
	{$edit_state=false;
	 if(isset($_POST['edit']))
	 $con=mysqli_connect("localhost","root","","chery");
	 {	
	 $nume=mysqli_real_escape_string($con,$_POST['name']);
	 $prenume=mysqli_real_escape_string($con,$_POST['surname']);
	 $email=mysqli_real_escape_string($con,$_POST['mail']);
	 $telefon=mysqli_real_escape_string($con,$_POST['number']);
	 $comanda=mysqli_real_escape_string($con,$_POST['com']);
	 
	 mysqli_query($con, "UPDATE Comenzi SET name='$name',surname='$surname',mail='$mail',telefon='$telefon',com='$com' WHERE number=$number");
	 header('location: ad.php');
	}
	}

?>
</body>
</html>