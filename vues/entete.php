<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-toggle.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!--  -->
        <title>A Louer</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/moment.min.js"></script>
        <script type="text/javascript" src="js/daterangepicker.js"></script>
    </head>
    <body>
        <header class="container-fluid"> 
            <nav class="navbar navbar-toggleable-sm bg-inverse navbar-inverse text-white row">
                <div class="container">
                    <a href="index.php?Recherche&action=accueil" class="navbar-brand mr-5"><img src="images/logo.png" alt="logo" style="width:60%"></a>
                    <?php if (isset($_SESSION["succes"])) { ?>
                        <div class="alert alert-secondary" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&nbsp;&times;</span></button>
                            <strong><?= $_SESSION["succes"] ?></strong> 
                        </div>
                        <?php unset($_SESSION['succes']);
                    }
                    if (isset($_SESSION["erreur"])) { ?>
                        <div class="alert alert-secondary" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&nbsp;&times;</span></button>
                            <strong>Attention !</strong> <?= $_SESSION["erreur"] ?>
                        </div>
                        <?php unset($_SESSION['erreur']);
                    }
                    if (!isset($_SESSION["courriel"])) { ?>
					<div class="ml-auto d-flex flex-nowrap">
                        <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in fa-lg bg-login"></i>Login</a>
                        <!-- Modal -->
                        <div class="modal fade" id="loginModal" role="dialog">
                            <div class="modal-dialog" id="dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="padding:15px 30px;">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <h6 class="text-white"> Connectez-vous avec votre adresse e-mail</h6>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body" style="padding:15px 15px;">
                                        <form role="form" action="index.php?Usagers&action=verificationLogin" method="post">
                                            <div class="form-group">
                                                <div class="offset-">
                                                    <label for="psw"><span class="fa fa-envelope" aria-hidden="true"></span></label>
                                                </div>
                                                <input type="email" name="courriel" class="form-control" id="courriel" placeholder="Courriel">
                                            </div>
                                            <div class="form-group">
                                                <label for="psw"><span class="fa fa-key" aria-hidden="true"></span></label>
                                                <input type="password" name="MotDePasse" class="form-control" id="psw" placeholder="Mot de passe">
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" checked class="textModal"> Se souvenir de moi</label>
                                            </div>
                                            <button type="submit" id="btnModal" class="btn-block btn-bleu">Se connecter</button>
                                        </form>
                                    </div>
                                    <!-- modal-body -->
                                    <div class="modal-footer">
                                        <p class="textModalc">Vous n’avez pas de compte ?<a href="index.php?Usagers&action=ajouterUsager"> Inscription</a><br></p>
                                    </div>
                                </div><!-- modal-content -->
                            </div><!-- modal-dialog -->
                        </div><!-- modal fade -->
                    </div><!-- ml-auto -->
				    <?php }
					else { ?>
				    <div class="text-right">
                        <span>Usager: <strong><?= $_SESSION["prenom"];?> - <?=$_SESSION["typeUser"]?> </strong></span>
                        <a href="index.php?Usagers&action=Logout" class="nav-item" aria-hidden="true"><i class="fa fa-sign-out fa-lg"></i>Déconnexion</a>
                        <nav class="d-flex justify-content-between">
                            <a href="index.php?Recherche&action=recherche"><i class="fa fa-search iconNav"></i>Recherche</a>
                            <a href="index.php?Messagerie&action=afficherMessagerie"><i class="fa fa-envelope iconNav"></i>Messagerie</a>
                            <?php if ($_SESSION["typeUser"] == 1 || $_SESSION["typeUser"] == 2) { ?>
                            <a href="index.php?Proprietaire&action=afficherLogements"><i class="fa fa-home iconNav"></i>Mes propriétés</a>
                            <?php }
                            if ($_SESSION["typeUser"] == 1) { ?>
                                <a href="index.php?Usagers&action=admin"><i class="fa fa-cogs iconNav"></i>Admin</a>
                            <?php } ?>
                       </nav>
					</div>
					<?php } ?>					
                </div><!-- container px-5 -->
            </nav>
        </header>
        <div id="alerteMessagerie" class="row collapse my-3">
        </div>

        <script>
            // Fade out de 4 secondes sur les alertes de login
            window.setTimeout(function() {
                $(".navbar .alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 4000);

            // Vérifier pour des nouveaux messages dans la messagerie interne
            $(window).on("load", function() {
                $.ajax({
                    url: 'index.php?Messagerie&action=alerteMessagerie',
                    type: 'POST',
                    dataType: 'html',
                    success: function(alerte) {
                        $("#alerteMessagerie").empty();
                        $(alerte).appendTo("#alerteMessagerie");
                        $("#alerteMessagerie").collapse('show');
                    }
                });
            });

        </script>
