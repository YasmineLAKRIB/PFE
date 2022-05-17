<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="connexion.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>

<div class="container_login">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="verification.php" method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="id" class="login__input" placeholder="Identificateur" required>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name ="password" class="login__input" placeholder="Mot de passe" required>
					<input  class="login__input" id="erreur" value="" placeholder="Erreur, Verifiez vos cordonnées !">
				</div>
				
				<button class="button login__submit" >
					<span class="button__text">Connexion</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
			</form>

            <div class="social-login">
				<h3>USTHB</h3>
			</div>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<script>
	document.getElementById("erreur").style.visibility = "hidden";
</script>


    
</body>
</html>


