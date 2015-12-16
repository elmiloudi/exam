<?php
include_once 'connect.php';
switch ($_GET["table"]) {
	case "personnes":
		createPersonne($_GET);
		break;
	case "colis":
		createcolis($_GET);
		break;
			
	default:
		;
	break;
}
function createPersonne($data){
	global $conn;
	
	$sql = "INSERT INTO personnes ( id_perso,nom_perso,adresse_perso)
	VALUES ( '".$data["id_perso"]."', '".$data["nom_perso"]."','".$data["adresse_perso"]."')";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
function createcolis($data){
	global $conn;
	
	$sql = "INSERT INTO colis ( descreptif, id_perso)
	VALUES ( '".$data["desc"]."', ".$data["id_perso"].")";
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
$conn->close();