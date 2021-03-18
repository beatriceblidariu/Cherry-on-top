<?php require 'db.php'; ?>

<?php 

class Controller{


	public function registration($name,$email,$password){

     global $pdo;

     $stmt = $pdo->prepare('INSERT INTO users (name,email,password) VALUES (?,?,?)');

     $stmt->execute([
   
   $name,
   $email,
   $password
     
     ]);

	}


	public function chk_email($email){


global $pdo;

$stmt = $pdo->prepare('SELECT email FROM users WHERE email=?');

$stmt->execute([$email]);


if ($stmt->rowCount() > 0) {
	
	return true;
}
else{
	return false;
}


	}



public function userlogin($email){

global $pdo;

$stmt = $pdo->prepare('SELECT * FROM users WHERE email=?');

$stmt->execute([$email]);

return $stmt->fetch(PDO::FETCH_OBJ);

}

}




