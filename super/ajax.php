<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
include ("../connection.php");
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$statement = $db->prepare("SELECT productCode, productName, buyPrice FROM table_products where quantityInStock !=0 and UPPER($type) LIKE '".strtoupper($name)."%'");
	$statement->execute(array());
	$data = array();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
    	$name = $row['productCode'].'|'.$row['productName'].'|'.$row['buyPrice'];
		array_push($data, $name);

        }
	echo json_encode($data);exit;
}

