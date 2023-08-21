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
    $tableau=array();
	$i=0;
    foreach($GLOBALS["PDO"]->query('SELECT u.pseudo, m.mes_texte, m.mes_date from dis_messages m inner join utilisateurs u on m.user_id=u.id_user ',PDO::FETCH_ASSOC) as $i => $row){

		$tableau[$i]=$row;
		
	}
    
	echo json_encode($tableau);
	

?>

