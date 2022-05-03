<?php

$postData = $_POST;

if (isset($postData['email']) &&  isset($postData['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $postData['email'] &&
            $user['password'] === $postData['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
            ];

            /**
             * Cookie qui expire dans un an
             */
            setcookie(
                'LOGGED_USER',
                $loggedUser['email'],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );

            $_SESSION['LOGGED_USER'] = $loggedUser['email'];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                $postData['password']
            );
        }
    }
}

// Si le cookie ou la session sont présentes
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}
?>


<!DOCTYPE html>
<html lang="en">
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
			<form class="login">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Mot de passe">
				</div>
				<button class="button login__submit">
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




    
</body>
</html>


