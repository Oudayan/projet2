<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>A Louer</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.jcarousel.min.js"></script>
        <script src="js/modernizr.js"></script> 
        
        <!-- Messagerie -->
      
        <link rel="stylesheet" href="css/site.css">
        <link rel="stylesheet" href="css/richtext.scss">        
        <link rel="stylesheet" href="css/richtext.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/jquery.richtext.js"></script>
        
        <!--<script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />-->
      
        <script>
            /*$(document).ready(function(){
                $("#myBtn").click(function(){
                    $("#myModal").modal();
                });
            });*/
        </script>
    </head>
    <body>
        <header class="container-fluid"> 
            <nav class="navbar navbar-toggleable-sm bg-inverse navbar-inverse text-white row">
                <div class="container px-5 px-sm-0">
                    <a href="index.php?Recherche&action=accueil" class="navbar-brand mr-5"><img src="images/logo.png" alt="logo" style="width:60%"></a>
                    <?php if (!isset($_SESSION["courriel"])) { ?>
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
					<div>
                      <a href="index.php?Usagers&action=nouvelMessage"><i class="fa fa-envelope iconMessage"></i><?= $_SESSION["courriel"];?></a>
                      <a href="index.php?Usagers&action=Logout" id="myBtn" class="nav-item nav-link" aria-hidden="true"><li class="fa fa-sign-out fa-lg bg-login"></li>Déconnexion</a>                        
					</div>
					<?php } ?>					
					
                </div><!-- container px-5 -->
            </nav>
           <!-- <div class="my-4 text-center">
            
            </div>-->
        </header>
      

