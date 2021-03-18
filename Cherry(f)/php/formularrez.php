<html>
<body>
<?php

	if(isset($_POST['Send']))
	{
		$con=mysqli_connect("localhost","root","","chery");
		$valori="INSERT INTO Rez (nsip, em,da,o,per) VALUES ('$_POST[nsip]', '$_POST[em]','$_POST[da]','$_POST[o]','$_POST[per]')";
		mysqli_query($con,$valori);
	header("location: ../pag/mesaj_rezervari.html");}
		
   else
	{$edit_state=false;
	 if(isset($_POST['edit']))
	 $con=mysqli_connect("localhost","root","","chery");
	 {	
	 $nume=mysqli_real_escape_string($con,$_POST['nsip']);
	 $prenume=mysqli_real_escape_string($con,$_POST['em']);
	 $eo=mysqli_real_escape_string($con,$_POST['o']);
	 $telefon=mysqli_real_escape_string($con,$_POST['da']);
	 $peranda=mysqli_real_escape_string($con,$_POST['per']);
	 
	 mysqli_query($con, "UPDATE Rez SET nsip='$nsip',em='$em',o='$o',telefon='$telefon',per='$per' WHERE da=$da");
	 header('location: ad.php');
	}
	}

?>
</body>
</html>