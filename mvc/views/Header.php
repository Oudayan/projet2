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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <header class="bg-inverse text-white">
            <nav class="navbar navbar-toggleable-sm">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#BarreNav">
                   <div class="fa fa-bars"></div>
                </button>
                 <!--- div class="col-9 col-md-6"  --->
                <div class="col-9 col-md-6">
                    <a class="navbar-brand active" href="index.php"><!-- <img src="images/Logo-A-Louer.png"> --></a>  
                </div>
                <div class="collapse navbar-collapse" id="BarreNav">
                    <div class="d-flex justify-content-end ml-auto">
                        <?php 
                            if (!isset($_SESSION["UserName"])) {
                        ?>
                        <form method='POST' action='index.php?Users' class='d-flex flex-row'>
                            <input type='hidden' name='action' value='login'>
                            <table>
                                <tr><td><label>Nom d'usager : </label></td><td><input type='text' name='UserName' value='OD'></td></tr>
                                <tr><td><label>Mot de passe : </label></td><td><input type='password' name='Password' value='12345'></td></tr>
                            </table>
                            <div>
                                <button type='submit' class='btn btn-success login'>Se&nbsp;connecter</button>
                            </div>
                        </form>
                        <?php }
                            else { ?>
                            <div>
                                <a href='index.php?Users&action=logout'><button class='btn btn-secondary login'>Se&nbsp;déconnecter</button></a>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </nav>
        </header>
        <!--- div class="col-9 col-md-6"  --->
        <div class="my-4 text-center">
            <?= (isset($_SESSION["loginMessage"]) ? $_SESSION["loginMessage"] : "") ?>
        </div>

        <main>
