<HTML>
	<TITLE>
		
	</TITLE>
	<HEAD>
		<meta charset="utf-8" />
		<title>Discord Version Wish</title>
		
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

	</HEAD>
	<BODY>

		<div id="pageDiscord">
			<div id="entete">
				<h1>#</h1>
				<p id="channel">general</p>
				<p id="desc">Parlez de tout et n'importe quoi.</p>
				<img src="img/cat.JPG" id="chat"></img>
				
				<p id="connect1">Vous êtes connecté en tant que 
					<?php 
						session_start();
				 		echo $_SESSION['pseudo'];
				 	?>  
				</p>
				

			</div>
			
			<div id="affichage">

			</div>

			<textarea id="publie" placeholder="Envoyer un message à #general" resize=none rows="1"></textarea>
		</div>

		
	</BODY>

</HTML>
