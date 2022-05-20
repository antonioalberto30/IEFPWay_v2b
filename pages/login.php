<?php

/*
 * Página de login - Deve permitir ir para o index.php
 */
require $_SERVER['DOCUMENT_ROOT'] . '/database/connectDatabase.php';

session_start();
if (isset($_SESSION["id"])) {
    header("Location: /pages/topup.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IEFPWay</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

    <link rel="stylesheet" href="/pages/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pages/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pages/assets/css/form-elements.css">
    <link rel="stylesheet" href="/pages/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="/pages/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="/pages/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="/pages/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/pages/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/pages/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>





<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>IEFPWay</strong> Login</h1>
                    <div class="description">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>
                            <p>Enter your username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>

                    <?php

                    if (isset($_POST["form-username"]) && isset($_POST["form-password"])) {
                        //AP  Faz ligacao SQL  e  procura utilizador com os valores dos campos para a procura

                        // COMPLETAR ... PROCURAR NA BASE DE DADOS -> POR UM USER COM O EMAIL E PASSWORD COLOCADOS NO FORM
                        // COLOCAR NA VARIAVEL O RESULTADO DA BASE DE DADOS

                        $sql = $conn->prepare("SELECT * FROM User WHERE email = ? AND password = ?");
                        $sql->bind_param("ss", $_POST["form-username"], $_POST["form-password"]);
                        $sql->execute();
                        $result = $sql->get_result();

                        //ERRO NA BASE DE DADOS


                        if (mysqli_error($conn)) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                User or password invalid
                            </div>

                        <?php

                        //RESULTADO DA BASE DE DADOS > 0 ENTAO EXIST
                        } else if (mysqli_num_rows($result) > 0) {


                        //GUARDAMOS NA SESSAO O ID DO UTILIZADOR
                        $_SESSION["id"] = mysqli_fetch_assoc($result)["id"];
                        ?>
                            <div class="alert alert-success" role="alert">
                                Sucess Redirecting
                            </div>
                            <script>
                                document.location.reload(); //SC   Recarrega a página,   Vai dar refresh na página
                            </script>
                        <?php

                        } else {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Error password and user combination invalid
                            </div>
                            <?php
                        }
                    }

                    ?>


                    <div class="form-bottom">
                        <form role="form" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="form-username" placeholder="Username..."
                                       class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="form-password" placeholder="Password..."
                                       class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" class="btn">Sign in!</button>

                        </form>
                        <a class="btn" style="background-color: #5cb85c" href="/pages/register.php"
                        >Sign up!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- Javascript -->
<script src="/pages/assets/js/jquery-1.11.1.min.js"></script>
<script src="/pages/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/pages/assets/js/jquery.backstretch.min.js"></script>
<script src="/pages/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="/pages/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>