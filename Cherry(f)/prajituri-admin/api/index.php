<?php

require 'Slim/Slim.php';

$app = new Slim();

$app->get('/praji', 'getPrajis');
$app->get('/praji/:id',	'getPraji');
$app->get('/praji/search/:query', 'findByName');
$app->post('/praji', 'addPraji');
$app->put('/praji/:id', 'updatePraji');
$app->delete('/praji/:id',	'deletePraji');

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

function addPraji() {
	//error_log('addPraji\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	$prajituri = json_decode($request->getBody());
	$sql = "INSERT INTO prajituri (nume, data_valabilitate, calorii, tip, eveniment, description) VALUES (:nume,:data_valabilitate, :calorii, :tip, :eveniment, :description)";
	
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("nume", $prajituri->nume);
		$stmt->bindParam("data_valabilitate", $prajituri->data_valabilitate);
		$stmt->bindParam("calorii", $prajituri->calorii);
		$stmt->bindParam("tip", $prajituri->tip);
		$stmt->bindParam("eveniment", $prajituri->eveniment);
		$stmt->bindParam("description", $prajituri->description);
		$stmt->execute();
		$prajituri->id = $db->lastInsertId();
		$db = null;
		echo json_encode($prajituri); 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updatePraji($id) {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$prajituri = json_decode($body);
	$sql = "UPDATE prajituri SET nume=:nume, data_valabilitate=:data_valabilitate, calorii=:calorii, tip=:tip, eveniment=:eveniment, description=:description WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("nume", $prajituri->nume);
		$stmt->bindParam("data_valabilitate", $prajituri->data_valabilitate);
		$stmt->bindParam("calorii", $prajituri->calorii);
		$stmt->bindParam("tip", $prajituri->tip);
		$stmt->bindParam("eveniment", $prajituri->eveniment);
		$stmt->bindParam("description", $prajituri->description);
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
		echo json_encode($prajituri); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function deletePraji($id) {
	$sql = "DELETE FROM prajituri WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
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