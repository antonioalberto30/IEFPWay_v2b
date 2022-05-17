<?php



require("../database/connectDatabase.php");

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
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/pages/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/pages/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/pages/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/pages/assets/ico/apple-touch-icon-57-precomposed.png">
        <style>

            .inlineimage{max-width:470px;margin-right: 8px;margin-left: 10px}.images{display: inline-block;max-width: 98%;height: auto;width: 22%;margin: 1%;left:20px;text-align: center}
        </style>
    </head>

    <body>

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>IEFPWay</strong> Register</h1>
                        <div class="description">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Register on our site</h3>
                                <p>Send money to your friends</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>


                        <?php

                        //VERIFICA TODOS OS CAMPOS

                        if( isset($_POST["form-username"]) && isset($_POST["form-email"]) && isset($_POST["form-contact"]) && isset($_POST["form-password"]) && isset($_POST["form-confirm-password"])
                        && isset($_POST["form-card-number"])  && isset($_POST["form-card-name"])  && isset($_POST["form-card-csv"])  && isset($_POST["form-card-expiration"])
                        ){

                            //COMPLETAR -> Dá erro caso a password não seja igual a Confirmação da password  MOSTRAR A MSG

                            /*
                                <div class="alert alert-warning" role="alert">
                                    The password and confirm password didn't match
                                </div>
                            */
                            ?>
                            <?php

                                //Query para inserir o cartao e obter o id desse cartao
                                $sql = $conn->prepare("INSERT INTO Card(name,csv,card_code,expirationDate) VALUES (?,?,?,?);");
                                $sql->bind_param("sdss", $_POST["form-card-name"], $_POST["form-card-csv"], $_POST["form-card-number"],$_POST["form-card-expiration"]);
                                $sql->execute();
                                $cardId = $conn -> insert_id;

                                //COMPLETAR INSERIR O UTILIZADOR COM O CARD ID

                                //Se der erro dá esta mensagem
                                if (mysqli_error($conn)) {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                       Error creating user
                                    </div>
                                    <?php
                                }else{
                                    //se não der erro dá esta mensagem
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                       You are now registered
                                    </div>
                                    <?php
                                }

                        }

                        ?>


                        <div class="form-bottom">
                            <form role="form"  method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Username</label>
                                    <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="form-email" placeholder="Email..." class="form-username form-control" id="form-email" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-contact">Contacto</label>
                                    <input type="text"   name="form-contact" placeholder="Contact..." class="form-username form-control" id="form-contact" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password2">Confirm password</label>
                                    <input type="password" name="form-confirm-password" placeholder="Confirm password..." class="form-password form-control" id="form-password2" required>
                                </div>


                                <div class="">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <h3 class="text-center">Payment Details</h3>
                                                <div class="inlineimage"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group"> <label>CARD NUMBER</label>
                                                            <div class="input-group"> <input type="text" class="form-control" placeholder="Valid Card Number" name="form-card-number" required /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group"> <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label> <input type="text" class="form-control" name="form-card-expiration" placeholder="MM / YY" required/> </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group"> <label>CV CODE</label> <input type="text" class="form-control" placeholder="CVC"  name="form-card-csv" required/> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group"> <label>CARD OWNER</label> <input type="text" class="form-control" placeholder="Card Owner Name"  name="form-card-name"  required/> </div>
                                                    </div>
                                                </div>
                                        </div>

                                    </div>
                                </div>



                                <button type="submit" class="btn">Sign up!</button>
                            </form>
                            <a class="btn"  href="/pages/login.php"
                            >Sign in!</a>
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


