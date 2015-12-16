<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "personnes":
		selectpersonnes($_GET);
		break;
	case "colis":
		selectcolis($_GET);
		break;	
	default:
		;
	break;
}

function selectpersonnes($data){
	global $conn;
	$list= array();
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	
	//echo $sql."<br>".$result->num_rows."<br>";
	if ($result && $result->num_rows) {
		while($row = $result->fetch_assoc()) {
			$list[] = $row;
		}
		echo json_encode($list);
	}
}
}

function selectcolis($data){
	global $conn;
	
	$sql = "SELECT * FROM colis where ( id_colis=".$data["id_colis"].")";
	if ($conn->query($sql) === TRUE) {
	    echo "afficher colis";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
}
$conn->close();
?>