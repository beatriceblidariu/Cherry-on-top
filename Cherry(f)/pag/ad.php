<?php 
$name="";
$surname="";
$mail="";
$number="";
$com="";
$edit_state=false;
$db=mysqli_connect("localhost","root","","chery"); 
if(isset($_GET['edit']))
{
	$number=$_GET['edit'];
	$rec=mysqli_query($db,"SELECT * FROM Comanda WHERE number=$number");
	$edit_state= true;
	$record=mysqli_fetch_array($rec);
	$name=$record['name'];
	$surname=$record['surname'];
	$mail=$record['mail'];
	$number=$record['number'];
	$com=$record['com'];
	
	
}
$results=mysqli_query($db,"SELECT * FROM Comanda  ORDER BY name");

if (isset($_GET['delete'])) {
	$number = $_GET['delete'];
	mysqli_query($db, "DELETE FROM Comanda WHERE number=$number");
	header('location: ad.php');
}

?>

<html>
<head>
	<link rel="stylesheet" type="css/text/css" href="css/tab.css">
</head>
<header>
			
</head>
<body>
<table class="table"> 
		<thead>
				<tr>
					<th bgcolor="#f5a9cc">Nume</th>
					<th bgcolor="#f5a9cc">Prenume</th>
					<th bgcolor="#f5a9cc">Email</th>
					<th bgcolor="#f5a9cc">Telefon</th>
					<th bgcolor="#f5a9cc">Comanda</th>
					<th  bgcolor="#f5a9cc" colspan="2">Action</th>
				</tr>
		</thead>
		<tbody>
			<?php while($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){?>
				<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['surname'];?></td>
					<td><?php echo $row['mail'];?></td>
					<td><?php echo $row['number'];?></td>
					<td><?php echo $row['com'];?></td>
					<td><a href="ad.php?edit=<?php echo $row['number']; ?>" class="btn" >Edit</a></td>
					<td><a href="ad.php?delete=<?php echo $row['number']; ?>" class="btn" >Delete</a></td>
				</tr>
			<?php } ?>
				
		</tbody>
</table>
<div class="container-form">
<form action="formular.php" method="post">
	<p>Nume: <input type="text" name="name" value="<?php echo $name;?>"></p>
	<p>Prenume: <input type="text" name="surname" value="<?php echo $surname;?>"></p>
	<p>Telefon: <input type="text" name="number" value="<?php echo $number;?>"></p>
	<p>E-mail: <input type="text" name="mail" value="<?php echo $mail;?>"></p>
	<p>Comanda: <input type="text" name="com" rows="5" cols="40" value="<?php echo $com?>"></p>


		
					<?php if($edit_state==false):?>	
					<input type="submit" name="Send" class="btn" value="Plaseaza comanda">
					<?php else: ?>
					<input type="submit" name="edit" class="btn"  value="Plaseaza comanda">				
					<?php endif ?>
</div>
</form>
	
</body>
</html>