<?php

require $_SERVER['DOCUMENT_ROOT'] . '/database/connectDatabase.php';

session_start();
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
        <link rel="stylesheet" href="/pages/assets/css/sendmoney.css">
        <link href='https://fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Signika:400' rel='stylesheet' type='text/css'>

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
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
              href="/pages/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/pages/assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
    <?php include("navbar.php"); ?>

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>IEFPWay</strong> Add friend</h1>
                        <div class="description">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <p>Send money to your friends</p>
                            </div>

                        </div>

                        <?php

                        if(isset($_POST["form-contact"])) {
                            /*

                       COMPLETAR ->

                            Query para verificar se o contacto existe na base de dados

                       Caso não exista mostrar:

                            <div class="alert alert-danger" role="alert">
                                User is not registered in this app
                            </div>

                       Caso exista tentar guardar na tabela Contact o contacto com o id do user $_SESSION["id"] e o do que pesquisou antes.

                            Se conseguir adicionar o amigo mostra:
                               <div class="alert alert-success" role="alert">
                                    Success - Friend added
                                </div>
                            Senão conseguir mostrar:
                              <div class="alert alert-danger" role="alert">
                                    Error adding friend
                                </div>
                        */

                        }


                        ?>


                        <div class="form-bottom">
                            <form role="form" method="post" class="login-form">




                                <div class="form-group">
                                    <label class="sr-only" for="form-contact">Contacto</label>
                                    <input type="text"
                                           name="form-contact" placeholder="Contact..."
                                           class="form-username form-control" id="form-contact">
                                </div>


                                <button type="submit" class="btn">Add</button>
                            </form>
                            <a class="btn" href="/pages/topup.php"
                            >Back</a>
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
