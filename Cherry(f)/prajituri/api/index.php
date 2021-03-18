<?php

require 'Slim/Slim.php';

$app = new Slim();

$app->get('/praji', 'getPrajis');
$app->get('/praji/:id',	'getPraji');
$app->get('/praji/search/:query', 'findByName');

$app->run();

function getPrajis() {
	$sql = "SELECT * FROM prajituri ORDER BY nume";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$prajituri = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"prajituri": ' . json_encode($prajituri) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getPraji($id) {
	$sql = "SELECT * FROM prajituri WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$prajituri = $stmt->fetchObject();  
		$db = null;
		echo json_encode($prajituri); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}



function findByName($query) {
	$sql = "SELECT * FROM prajituri WHERE UPPER(nume) LIKE :query ORDER BY nume";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$query = "%".$query."%";  
		$stmt->bindParam("query", $query);
		$stmt->execute();
		$prajituri = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"prajituri": ' . json_encode($prajituri) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getConnection() {
	$dbhost="127.0.0.1";
	$dbuser="root";
	$dbpass="";
	$dbname="cherry";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>