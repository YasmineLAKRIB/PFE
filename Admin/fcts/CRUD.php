<?php 

function getDatabaseConnexion() {
    try {
        $conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN;Database=usthb90000L","","");
        //$conn = new PDO("sqlsrv:Server=DESKTOP-3034QEN\SQLEXPRESS;Database=usthb90000L","","");
        $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
      }
      catch(Exception $e){
        die(print_r($e->getMessage()));
      }
}


// récupere tous les users
function getAllUsers() {
    $conn = getDatabaseConnexion();
    $requete = 'SELECT * from UTILISATEURS';
    $users = $conn->query($requete);
    return $users;
}

// creer un user
function createUser($ID, $NOM_PRENOM, $EMAIL, $MOT_PASSE, $TEL, $FACULTE, $BUREAU, $ADRESSE, $TYPE, $ENABLED) {
    try {
        $conn = getDatabaseConnexion();
        $sql = "INSERT INTO UTILISATEURS (ID, NOM_PRENOM, EMAIL, MOT_PASSE, TEL,
		    FACULTE, BUREAU, ADRESSE, TYPE, ENABLED) 
            VALUES ('$ID', '$NOM_PRENOM', '$EMAIL', '$MOT_PASSE' 
			,'$TEL','$FACULTE', '$BUREAU' ,'$ADRESSE', '$TYPE' ,'$ENABLED')";

        $conn->exec($sql);
		password_hash('', PASSWORD_DEFAULT);


    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}


	//recupere un user
	function readUser($EMAIL) {
		$conn = getDatabaseConnexion();
		$requete = "SELECT * from UTILISATEURS where EMAIL = '$EMAIL' ";
		$stmt = $conn->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
	}
		//met à jour le user
	function updateUser($ID, $NOM_PRENOM, $EMAIL, $MOT_PASSE, $TEL, $FACULTE, $BUREAU, $ADRESSE, $TYPE, $ENABLED) {
		try {
			$conn = getDatabaseConnexion();
			$requete = "UPDATE UTILISATEURS set 
						NOM_PRENOM = '$NOM_PRENOM',
						EMAIL = '$EMAIL',
						MOT_PASSE = '$MOT_PASSE',
						TEL = '$TEL' 
                        FACULTE = '$FACULTE',
						BUREAU = '$BUREAU',
						ADRESSE = '$ADRESSE',
						TYPE = '$TYPE' 
                        ENABLED = '$ENABLED' 
						where ID = '$ID' ";
			$stmt = $conn->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	

    // suprime un user
	function deleteUser($ID) {
		try {
			$conn = getDatabaseConnexion();
			$requete = "DELETE from UTILISATEURS where ID = '$ID' ";
			$stmt = $conn->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}


	// recuperer un user
    function getUser($EMAIL) {
		try {
			$conn = getDatabaseConnexion();
			$requete = "SELECT * from UTILISATEURS where EMAIL = '$_GET[$EMAIL]' ";
			$stmt = $conn->query($requete);
		}
		catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
		}
	}



    // recuperer les facultes
	function getFacultes() {
		$conn = getDatabaseConnexion();
		$requete = 'SELECT FACCODE from FACULTE0000';
		$facultes = $conn->query($requete);
		return $facultes;
	}


	// récupere tous les messages
function getAllMessages() {
    $conn = getDatabaseConnexion();
    $requete = 'SELECT * from MESSAGES';
    $messages = $conn->query($requete);
    return $messages;
}



?>