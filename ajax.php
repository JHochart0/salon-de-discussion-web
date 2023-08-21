<?php
	$DBHOST='localhost';
	$DBDRIVER='pgsql';
	$DBNAME='dbdiscord';
	$DBUSER='user';
	$DBPASSWORD='1234';

    //Déclaration du PDO
    try{
        $PDO=new PDO("$DBDRIVER:host=$DBHOST;port=5432;dbname=$DBNAME",$DBUSER, $DBPASSWORD);

    }catch(PDOException $e){
        print("Il y'a une erreur");
    }

    session_start();
	$request = $PDO->prepare('SELECT id_user FROM utilisateurs WHERE pseudo=?');
	$request->execute(array($_SESSION['pseudo']));

	$idPseudo=$request->fetch();

	$texte=$_POST['texte'];

	$requete= $GLOBALS["PDO"]->prepare("INSERT INTO dis_messages (user_id, mes_texte, mes_date) VALUES (?, ?, ?)");
	$date="NOW()";
   	$requete->execute(array($idPseudo['id_user'], $texte, $date));

	foreach($GLOBALS["PDO"]->query('SELECT max(mes_id) from dis_messages',PDO::FETCH_ASSOC) as $row){
		$maxid=$row['max'];
	}



	$request = $PDO->prepare('SELECT mes_date FROM dis_messages WHERE mes_id = ?');
	$request->execute(array($maxid));
	$dateMessage=$request->fetch();

	$reponses=array('pseudo'=>$_SESSION['pseudo'], 'date'=>$dateMessage['mes_date']);
	echo json_encode($reponses);
?>