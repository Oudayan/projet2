<?php
/** 
 * @file        recherche.php
 * @author      Oudayan Dutta, Zoraida Ortiz, Denise Ratté, Jorge Subirats 
 * @version     1.0
 * @date        10 février 2018
 * @brief       Page de recherche du site
 * @details     Liens pour recherche de logements par carte ou par liste
 */ 
?>
<main class="container-fluid mx-3">
    <div class="d-flex justify-content-around mt-3">
        <h1>Recherche de logements À Louer</h1>
    </div>
    <div class="row">
        <aside class="recherche col-lg-3 border rounded py-3 mt-2">
            <form id="formulaire_recherche" method="post" action="<?= $_SESSION["recherche"]["action"] ?>" class="py-2">
                <input type="hidden" id="action" name="action" value="recherche">
                <input type="hidden" id="affichage" name="affichage" value="carte">
                <div id="boiteTri" class="py-2">
                    <div class="form-group d-flex justify-content-between">
                        <h5>Trier par&nbsp;:</h5>
                        <input type="checkbox" id="tri" name="tri" <?= $_SESSION["recherche"]["tri"] ?> data-toggle="toggle" data-on="Prix" data-off="Évaluation" data-onstyle="bleu" data-offstyle="orange">
                        <input type="checkbox" id="asc" name="asc" <?= $_SESSION["recherche"]["asc"] ?> data-toggle="toggle" data-on="Asc." data-off="Desc." data-onstyle="bleu" data-offstyle="orange">
                    </div>
                    <hr />
                </div>
                <h5>Filtrer par&nbsp;:</h5>
                <div class="form-group date-form">
                    <label for="datesLocation">Dates&nbsp;:</label>
                    <input type="text" id="datesLocation" name="datesLocation" class="form-control">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar date-icon"></i>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="adresseDepart">Point de départ&nbsp;:</label>
                        <a class="btn btn-sm btn-orange mb-2" onclick="geoLocalisation()"><i class="fa fa-globe"></i> Ma position</a>
                    </div>
                    <input type="text" id="adresseDepart" name="adresseDepart" class="form-control" placeholder="Entrer une adresse" value="<?= $_SESSION["recherche"]["adresseDepart"] ?>">
                </div>
                <input type="hidden" id="latitude" name="latitude" value="<?= $_SESSION["recherche"]["latitude"] ?>">
                <input type="hidden" id="longitude" name="longitude" value="<?= $_SESSION["recherche"]["longitude"] ?>">
                <div class="form-group hidden">
                    <label for="region">Région&nbsp;:</label>
                    <select class="form-control" id="region" name="region">
                        <option value="1" <?= ($_SESSION["recherche"]['region'] == 1 ? 'selected' : 'disabled') ?>>Bas-Saint-Laurent</option>
                        <option value="2" <?= ($_SESSION["recherche"]['region'] == 2 ? 'selected' : 'disabled') ?>>Saguenay–Lac-Saint-Jean</option>
                        <option value="3" <?= ($_SESSION["recherche"]['region'] == 3 ? 'selected' : 'disabled') ?>>Capitale-Nationale</option>
                        <option value="4" <?= ($_SESSION["recherche"]['region'] == 4 ? 'selected' : 'disabled') ?>>Mauricie</option>
                        <option value="5" <?= ($_SESSION["recherche"]['region'] == 5 ? 'selected' : 'disabled') ?>>Estrie</option>
                        <option value="6" <?= ($_SESSION["recherche"]['region'] == 6 ? 'selected' : 'disabled') ?>>Montréal</option>
                        <option value="7" <?= ($_SESSION["recherche"]['region'] == 7 ? 'selected' : 'disabled') ?>>Outaouais</option>
                        <option value="8" <?= ($_SESSION["recherche"]['region'] == 8 ? 'selected' : 'disabled') ?>>Abitibi-Témiscamingue</option>
                        <option value="9" <?= ($_SESSION["recherche"]['region'] == 9 ? 'selected' : 'disabled') ?>>Côte-Nord</option>
                        <option value="10" <?= ($_SESSION["recherche"]['region'] == 10 ? 'selected' : 'disabled') ?>>Nord-du-Québec</option>
                        <option value="11" <?= ($_SESSION["recherche"]['region'] == 11 ? 'selected' : 'disabled') ?>>Gaspésie–Îles-de-la-Madeleine</option>
                        <option value="12" <?= ($_SESSION["recherche"]['region'] == 12 ? 'selected' : 'disabled') ?>>Chaudière-Appalaches</option>
                        <option value="13" <?= ($_SESSION["recherche"]['region'] == 13 ? 'selected' : 'disabled') ?>>Laval</option>
                        <option value="14" <?= ($_SESSION["recherche"]['region'] == 14 ? 'selected' : 'disabled') ?>>Lanaudière</option>
                        <option value="15" <?= ($_SESSION["recherche"]['region'] == 15 ? 'selected' : 'disabled') ?>>Laurentides</option>
                        <option value="16" <?= ($_SESSION["recherche"]['region'] == 16 ? 'selected' : 'disabled') ?>>Montérégie</option>
                        <option value="17" <?= ($_SESSION["recherche"]['region'] == 17 ? 'selected' : 'disabled') ?>>Centre-du-Québec</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rayon">Rayon&nbsp;:</label>
                    <select class="form-control" id="rayon" name="rayon">
                        <option value="0.5" <?= ($_SESSION["recherche"]['rayon'] == 0.5 ? 'selected' : '') ?>>0.5 KM</option>
                        <option value="1" <?= ($_SESSION["recherche"]['rayon'] == 1 ? 'selected' : '') ?>>1 KM</option>
                        <option value="2" <?= ($_SESSION["recherche"]['rayon'] == 2 ? 'selected' : '') ?>>2 KM</option>
                        <option value="3" <?= ($_SESSION["recherche"]['rayon'] == 3 ? 'selected' : '') ?>>3 KM</option>
                        <option value="4" <?= ($_SESSION["recherche"]['rayon'] == 4 ? 'selected' : '') ?>>4 KM</option>
                        <option value="5" <?= ($_SESSION["recherche"]['rayon'] == 5 ? 'selected' : '') ?>>5 KM</option>
                        <option value="10" <?= ($_SESSION["recherche"]['rayon'] == 10 ? 'selected' : '') ?>>10 KM</option>
                        <option value="15" <?= ($_SESSION["recherche"]['rayon'] == 15 ? 'selected' : '') ?>>15 KM</option>
                        <option value="20" <?= ($_SESSION["recherche"]['rayon'] == 20 ? 'selected' : '') ?>>20 KM</option>
                        <option value="25" <?= ($_SESSION["recherche"]['rayon'] == 25 ? 'selected' : '') ?>>25 KM</option>
                        <option value="50" <?= ($_SESSION["recherche"]['rayon'] == 50 ? 'selected' : '') ?>>50 KM</option>
                        <option value="75" <?= ($_SESSION["recherche"]['rayon'] == 75 ? 'selected' : '') ?>>75 KM</option>
                        <option value="100" <?= ($_SESSION["recherche"]['rayon'] == 100 ? 'selected' : '') ?>>100 KM</option>
                        <option value="150" <?= ($_SESSION["recherche"]['rayon'] == 150 ? 'selected' : '') ?>>150 KM</option>
                        <option value="200" <?= ($_SESSION["recherche"]['rayon'] == 200 ? 'selected' : '') ?>>200 KM</option>
                        <option value="250" <?= ($_SESSION["recherche"]['rayon'] == 250 ? 'selected' : '') ?>>250 KM</option>
                        <option value="500" <?= ($_SESSION["recherche"]['rayon'] == 500 ? 'selected' : '') ?>>500 KM</option>
                        <option value="1000" <?= ($_SESSION["recherche"]['rayon'] == 1000 ? 'selected' : '') ?>>1000 KM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prixMin">Entre&nbsp;:</label>
                    <select class="form-control" id="prixMin" name="prixMin">
                        <option value="0" <?= ($_SESSION["recherche"]['prixMin'] == 0 ? 'selected' : '') ?>>Aucun prix minimum</option>
                        <option value="25" <?= ($_SESSION["recherche"]['prixMin'] == 25 ? 'selected' : '') ?>>25 $</option>
                        <option value="50" <?= ($_SESSION["recherche"]['prixMin'] == 50 ? 'selected' : '') ?>>50 $</option>
                        <option value="75" <?= ($_SESSION["recherche"]['prixMin'] == 75 ? 'selected' : '') ?>>75 $</option>
                        <option value="100" <?= ($_SESSION["recherche"]['prixMin'] == 100 ? 'selected' : '') ?>>100 $</option>
                        <option value="125" <?= ($_SESSION["recherche"]['prixMin'] == 125 ? 'selected' : '') ?>>125 $</option>
                        <option value="150" <?= ($_SESSION["recherche"]['prixMin'] == 150 ? 'selected' : '') ?>>150 $</option>
                        <option value="175" <?= ($_SESSION["recherche"]['prixMin'] == 175 ? 'selected' : '') ?>>175 $</option>
                        <option value="200" <?= ($_SESSION["recherche"]['prixMin'] == 200 ? 'selected' : '') ?>>200 $</option>
                        <option value="225" <?= ($_SESSION["recherche"]['prixMin'] == 225 ? 'selected' : '') ?>>225 $</option>
                        <option value="250" <?= ($_SESSION["recherche"]['prixMin'] == 250 ? 'selected' : '') ?>>250 $</option>
                        <option value="275" <?= ($_SESSION["recherche"]['prixMin'] == 275 ? 'selected' : '') ?>>275 $</option>
                        <option value="300" <?= ($_SESSION["recherche"]['prixMin'] == 300 ? 'selected' : '') ?>>300 $</option>
                        <option value="325" <?= ($_SESSION["recherche"]['prixMin'] == 325 ? 'selected' : '') ?>>325 $</option>
                        <option value="350" <?= ($_SESSION["recherche"]['prixMin'] == 350 ? 'selected' : '') ?>>350 $</option>
                        <option value="375" <?= ($_SESSION["recherche"]['prixMin'] == 375 ? 'selected' : '') ?>>375 $</option>
                        <option value="400" <?= ($_SESSION["recherche"]['prixMin'] == 400 ? 'selected' : '') ?>>400 $</option>
                        <option value="425" <?= ($_SESSION["recherche"]['prixMin'] == 425 ? 'selected' : '') ?>>425 $</option>
                        <option value="450" <?= ($_SESSION["recherche"]['prixMin'] == 450 ? 'selected' : '') ?>>450 $</option>
                        <option value="475" <?= ($_SESSION["recherche"]['prixMin'] == 475 ? 'selected' : '') ?>>475 $</option>
                        <option value="500" <?= ($_SESSION["recherche"]['prixMin'] == 500 ? 'selected' : '') ?>>500 $</option>
                        <option value="550" <?= ($_SESSION["recherche"]['prixMin'] == 550 ? 'selected' : '') ?>>550 $</option>
                        <option value="600" <?= ($_SESSION["recherche"]['prixMin'] == 600 ? 'selected' : '') ?>>600 $</option>
                        <option value="650" <?= ($_SESSION["recherche"]['prixMin'] == 650 ? 'selected' : '') ?>>650 $</option>
                        <option value="700" <?= ($_SESSION["recherche"]['prixMin'] == 700 ? 'selected' : '') ?>>700 $</option>
                        <option value="750" <?= ($_SESSION["recherche"]['prixMin'] == 750 ? 'selected' : '') ?>>750 $</option>
                        <option value="800" <?= ($_SESSION["recherche"]['prixMin'] == 800 ? 'selected' : '') ?>>800 $</option>
                        <option value="850" <?= ($_SESSION["recherche"]['prixMin'] == 850 ? 'selected' : '') ?>>850 $</option>
                        <option value="900" <?= ($_SESSION["recherche"]['prixMin'] == 900 ? 'selected' : '') ?>>900 $</option>
                        <option value="950" <?= ($_SESSION["recherche"]['prixMin'] == 950 ? 'selected' : '') ?>>950 $</option>
                        <option value="1000" <?= ($_SESSION["recherche"]['prixMin'] == 1000 ? 'selected' : '') ?>>1000 $</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prixMax">Et&nbsp;:</label>
                    <select class="form-control" id="prixMax" name="prixMax">
                        <option value="1000000" <?= ($_SESSION["recherche"]['prixMax'] == 1000000 ? 'selected' : '') ?>>Aucun prix maximum</option>
                        <option value="25" <?= ($_SESSION["recherche"]['prixMax'] == 25 ? 'selected' : '') ?>>25 $</option>
                        <option value="50" <?= ($_SESSION["recherche"]['prixMax'] == 50 ? 'selected' : '') ?>>50 $</option>
                        <option value="75" <?= ($_SESSION["recherche"]['prixMax'] == 75 ? 'selected' : '') ?>>75 $</option>
                        <option value="100" <?= ($_SESSION["recherche"]['prixMax'] == 100 ? 'selected' : '') ?>>100 $</option>
                        <option value="125" <?= ($_SESSION["recherche"]['prixMax'] == 125 ? 'selected' : '') ?>>125 $</option>
                        <option value="150" <?= ($_SESSION["recherche"]['prixMax'] == 150 ? 'selected' : '') ?>>150 $</option>
                        <option value="175" <?= ($_SESSION["recherche"]['prixMax'] == 175 ? 'selected' : '') ?>>175 $</option>
                        <option value="200" <?= ($_SESSION["recherche"]['prixMax'] == 200 ? 'selected' : '') ?>>200 $</option>
                        <option value="225" <?= ($_SESSION["recherche"]['prixMax'] == 225 ? 'selected' : '') ?>>225 $</option>
                        <option value="250" <?= ($_SESSION["recherche"]['prixMax'] == 250 ? 'selected' : '') ?>>250 $</option>
                        <option value="275" <?= ($_SESSION["recherche"]['prixMax'] == 275 ? 'selected' : '') ?>>275 $</option>
                        <option value="300" <?= ($_SESSION["recherche"]['prixMax'] == 300 ? 'selected' : '') ?>>300 $</option>
                        <option value="325" <?= ($_SESSION["recherche"]['prixMax'] == 325 ? 'selected' : '') ?>>325 $</option>
                        <option value="350" <?= ($_SESSION["recherche"]['prixMax'] == 350 ? 'selected' : '') ?>>350 $</option>
                        <option value="375" <?= ($_SESSION["recherche"]['prixMax'] == 375 ? 'selected' : '') ?>>375 $</option>
                        <option value="400" <?= ($_SESSION["recherche"]['prixMax'] == 400 ? 'selected' : '') ?>>400 $</option>
                        <option value="425" <?= ($_SESSION["recherche"]['prixMax'] == 425 ? 'selected' : '') ?>>425 $</option>
                        <option value="450" <?= ($_SESSION["recherche"]['prixMax'] == 450 ? 'selected' : '') ?>>450 $</option>
                        <option value="475" <?= ($_SESSION["recherche"]['prixMax'] == 475 ? 'selected' : '') ?>>475 $</option>
                        <option value="500" <?= ($_SESSION["recherche"]['prixMax'] == 500 ? 'selected' : '') ?>>500 $</option>
                        <option value="550" <?= ($_SESSION["recherche"]['prixMax'] == 550 ? 'selected' : '') ?>>550 $</option>
                        <option value="600" <?= ($_SESSION["recherche"]['prixMax'] == 600 ? 'selected' : '') ?>>600 $</option>
                        <option value="650" <?= ($_SESSION["recherche"]['prixMax'] == 650 ? 'selected' : '') ?>>650 $</option>
                        <option value="700" <?= ($_SESSION["recherche"]['prixMax'] == 700 ? 'selected' : '') ?>>700 $</option>
                        <option value="750" <?= ($_SESSION["recherche"]['prixMax'] == 750 ? 'selected' : '') ?>>750 $</option>
                        <option value="800" <?= ($_SESSION["recherche"]['prixMax'] == 800 ? 'selected' : '') ?>>800 $</option>
                        <option value="850" <?= ($_SESSION["recherche"]['prixMax'] == 850 ? 'selected' : '') ?>>850 $</option>
                        <option value="900" <?= ($_SESSION["recherche"]['prixMax'] == 900 ? 'selected' : '') ?>>900 $</option>
                        <option value="950" <?= ($_SESSION["recherche"]['prixMax'] == 950 ? 'selected' : '') ?>>950 $</option>
                        <option value="1000" <?= ($_SESSION["recherche"]['prixMax'] == 1000 ? 'selected' : '') ?>>1000 $</option>
                    </select>
                </div>
                <label>Types de logements&nbsp;:</label>
                <div class="form-group border rounded py-1">
                    <div class="form-check">
                    <?php foreach ($_SESSION["recherche"]["typesLogements"] as $typesLogements) { 
                        $icones = ["images/red-dot.png", "images/orange-dot.png", "images/yellow-dot.png", "images/purple-dot.png", "images/blue-dot.png", "images/green-dot.png"]
                        ?>
                        <div class="row>">
                            <input class="form-check-input col-1 offset-1" type="checkbox" value="<?= $typesLogements->lireIdTypeLogement() ?>" id="typeLogement<?= $typesLogements->lireIdTypeLogement() ?>" name="typeLogement<?= $typesLogements->lireIdTypeLogement() ?>" <?= $_SESSION["recherche"]["typeLogement" . $typesLogements->lireIdTypeLogement()]; ?>>
                            <label class="form-check-label col-9" for="typeLogement<?= $typesLogements->lireIdTypeLogement() ?>"><?= $typesLogements->lireTypeLogement() ?></label>
                            <span class="legende col-1"><img src="<?= $icones[($typesLogements->lireIdTypeLogement() - 1)] ?>"></span>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="evaluation">Évaluation&nbsp;:</label>
                    <select class="form-control" id="evaluation" name="evaluation">
                        <option value="0" <?= ($_SESSION["recherche"]['evaluation'] == 0 ? 'selected' : '') ?>>Toutes les évaluations</option>
                        <option value="1" <?= ($_SESSION["recherche"]['evaluation'] == 1 ? 'selected' : '') ?>>1 étoile ou plus</option>
                        <option value="2" <?= ($_SESSION["recherche"]['evaluation'] == 2 ? 'selected' : '') ?>>2 étoiles ou plus</option>
                        <option value="3" <?= ($_SESSION["recherche"]['evaluation'] == 3 ? 'selected' : '') ?>>3 étoiles ou plus</option>
                        <option value="4" <?= ($_SESSION["recherche"]['evaluation'] == 4 ? 'selected' : '') ?>>4 étoiles ou plus</option>
                        <option value="5" <?= ($_SESSION["recherche"]['evaluation'] == 5 ? 'selected' : '') ?>>5 étoiles</option>
                    </select>
                </div>
                <!-- <button type="submit" id="recherche" class="btn btn-block btn-orange mb-2">Rechercher</button> -->
                <!-- <input type="text" class="form-control-plaintext" placeholder="test" disabled> -->
            </form>
        </aside>
        <div class="col-lg-9 mt-2">
            <nav>
                <div id="nav-tab" class="nav nav-tabs row mx-0" role="tablist">
                    <a class="nav-item nav-link col-6 active" id="nav-fiches-tab" data-toggle="tab" href="#fiches-tab" role="tab" aria-controls="nav-fiches" aria-selected="true"><h3>Fiches</h3></a>
                    <a class="nav-item nav-link col-6" id="nav-carte-tab" data-toggle="tab" href="#carte-tab" role="tab" aria-controls="nav-carte" aria-selected="false"><h3>Carte</h3></a>
                </div>
            </nav>
            <div id="nav-tabContent" class="tab-content border-left border-right border-bottom">
                <section id="carte-tab" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-carte-tab">
                    <div id="alerte-carte" class="alert alert-warning" role="alert" style="margin-bottom:0;display: none;">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong id="message-carte"></strong> 
                    </div> 
                    <div id="carte">
                    </div>
                </section>
                <section id="fiches-tab" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-fiches-tab">
                    <div id="fiches">
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    
    $(window).on("load", function() {
        // Switch entre l'affichage des fiches ou de la carte
        var url = window.location.search.substring(1);
        var fiches = new RegExp(/fiches=true/, "i");
        if (fiches.test(url)) {
            rechercheFiches();
            $("#nav-tab a:first-child").tab("show");
            $("#fiches").addClass("active");
            $(".legende").addClass("hidden");
            $("#boiteTri").removeClass("hidden");
            $("#affichage").val("fiches");
        }
        var carte = new RegExp(/carte=true/, "i");
        if (carte.test(url)) {
            rechercheCarte();
            $("#nav-tab a:last-child").tab("show");
            $("#carte").addClass("active");
            $(".legende").removeClass("hidden");
            $("#boiteTri").addClass("hidden");
            $("#affichage").val("carte");
        }

        // Arrêter les carousels
        $(".carousel").carousel({
            pause: true,
            interval: false
        });

        // Initialiser le sélectionneur de dates
        $('#datesLocation').daterangepicker({
            "showDropdowns": true, 
            "autoApply": true, 
            "dateLimit": {
                "months": 3
            },
            "locale": {
                "direction": "ltr",
                "format": "YYYY-MM-DD",
                "separator": "  au  ",
                "applyLabel": "Sélectionner",
                "cancelLabel": "Annuler",
                "fromLabel": "Du",
                "toLabel": "Au",
                "customRangeLabel": "Sur mesure",
                "daysOfWeek": [
                    "Di",
                    "Lu",
                    "Ma",
                    "Me",
                    "Je",
                    "Ve",
                    "Sa"
                ],
                "monthNames": [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre"
                ],
                "firstDay": 1
            },
            <?= (isset($_SESSION['disponibilite']['dateDebut']) ? '"minDate": "' . $_SESSION['disponibilite']['dateDebut'] . '", ' : '"minDate": new Date(), ') ?>
            <?= (isset($_SESSION['disponibilite']['dateFin']) ? '"minDate": "' . $_SESSION['disponibilite']['dateFin'] . '", ' : '') ?>
            <?= (isset($_SESSION['recherche']['debutLocation']) ? '"startDate": "' . $_SESSION['recherche']['debutLocation'] . '", ' : '') ?>
            <?= (isset($_SESSION['recherche']['finLocation']) ? '"endDate": "' . $_SESSION['recherche']['finLocation'] . '", ' : '') ?>
            "applyClass": "btn-orange"
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });

        $(".alert .close").click(function(){
            $(this).parent().hide();
        });

    }); // Fin du onload


    function geoLocalisation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(chercherPosition);
        }
        else { 
            $("#adresseDepart").val("Geolocalisation non supportée sur ce fureteur.");
        }
    };

    function chercherPosition(position) {
        var lat = position.coords.latitude; 
        var lng = position.coords.longitude;
        $("#latitude").val(lat); 
        $("#longitude").val(lng);
        var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
        console.log(latlng);
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    $("#adresseDepart").val(results[0].formatted_address);
                    window.setTimeout(function() {
                        $("#formulaire_recherche").submit();
                    }, 500);

                }
                else {
                    window.alert("Aucun résultat trouvé.");
                }
            }
            else {
                window.alert("La géolocalisation n'a pu être effectuée.");
            }
        });
    };

    function LngLat() {
        var adresse = $("#adresseDepart").val();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': adresse}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
                $("#latitude").val(lat); 
                $("#longitude").val(lng);
                //$("#formulaire_recherche").submit();
            }
            else {
                $("#adresseDepart").val("");
            }
        });
    };
    
    // Mise à jour des éléments du formulaire recherche quand l'onglet Fiches est sélectionné
    $("#nav-fiches-tab").on("click", function() {
        $(".legende").addClass("hidden");
        $("#formulaire_recherche").attr("action", "index.php?Recherche&fiches=true");
        $("#boiteTri").removeClass('hidden');
        $("#affichage").val('fiches');
        rechercheFiches();
    });
    // Mise à jour des éléments du formulaire recherche quand l'onglet Carte est sélectionné
    $("#nav-carte-tab").on("click", function() {
        $(".legende").removeClass("hidden");
        $("#formulaire_recherche").attr("action", "index.php?Recherche&carte=true");
        $("#boiteTri").addClass("hidden");
        $("#affichage").val('carte');
        rechercheCarte();
    });

    // Mise à jour des fiches selon les options du formulaire de recherche
    function rechercheFiches() {
        $.ajax({
            url: 'index.php?Recherche&action=rechercheFiches', 
            type: 'POST',
            data: { 
                    tri: $('#tri:checked').val(), 
                    asc: $('#asc:checked').val(), 
                    datesLocation: $('#datesLocation').val(), 
                    region: $('#region').val(), 
                    adresseDepart: $('#adresseDepart').val(), 
                    latitude: $('#latitude').val(), 
                    longitude: $('#longitude').val(), 
                    rayon: $('#rayon').val(), 
                    prixMin: $('#prixMin').val(), 
                    prixMax: $('#prixMax').val(), 
                    typeLogement1: $("#typeLogement1:checked").val(),
                    typeLogement2: $("#typeLogement2:checked").val(),
                    typeLogement3: $("#typeLogement3:checked").val(),
                    typeLogement4: $("#typeLogement4:checked").val(),
                    typeLogement5: $("#typeLogement5:checked").val(),
                    typeLogement6: $("#typeLogement6:checked").val(),
                    evaluation: $('#evaluation').val(), 
                }, 
            dataType: 'html',
            success: function(logements) {
                $("#fiches").empty();
                $(logements).appendTo("#fiches");
            }
        });        
    };

    // Mise à jour de la carte selon les options du formulaire de recherche
    function rechercheCarte() {
        $.ajax({
            url: 'index.php?Recherche&action=rechercheCarte', 
            type: 'POST',
            data: { 
                    tri: $('#tri:checked').val(), 
                    asc: $('#asc:checked').val(), 
                    datesLocation: $('#datesLocation').val(), 
                    region: $('#region').val(), 
                    adresseDepart: $('#adresseDepart').val(), 
                    latitude: $('#latitude').val(), 
                    longitude: $('#longitude').val(), 
                    rayon: $('#rayon').val(), 
                    prixMin: $('#prixMin').val(), 
                    prixMax: $('#prixMax').val(), 
                    typeLogement1: $("#typeLogement1:checked").val(),
                    typeLogement2: $("#typeLogement2:checked").val(),
                    typeLogement3: $("#typeLogement3:checked").val(),
                    typeLogement4: $("#typeLogement4:checked").val(),
                    typeLogement5: $("#typeLogement5:checked").val(),
                    typeLogement6: $("#typeLogement6:checked").val(),
                    evaluation: $('#evaluation').val(), 
                }, 
            dataType: 'json',
            success: function(logements) {
                // Effacer les anciens marqueurs
                effacerMarqueurs();
                if (logements.length) {
                    // Afficher les nouveraux marqueurs
                    chargerMarqueurs(logements);
                    modifierZoom();
                    // Modifier le message d'alerte
                    $("#message-carte").text(logements.length + " logements trouvés !");
                }
                else {
                    $("#message-carte").text("Aucun logement trouvé !");
                }
                // Affichage du message d'alerte
                $("#alerte-carte").show().css("opacity", "1");
                // "Fade-out" des messages d'alerte après 4 secondes
                window.setTimeout(function() {
                    $("#alerte-carte").fadeTo(500, 0).slideUp(500, function(){
                        $(this).hide(); 
                    });
                }, 4000);
            }
        });        
    };

    // Mise à jour de la vue quand un item du formulaire de recherche est changé
    $("#formulaire_recherche").on("change", function() {
        LngLat();
        if ($("#nav-fiches-tab").hasClass("active")) {
            rechercheFiches();
        }
        if ($("#nav-carte-tab").hasClass("active")) {
            rechercheCarte();
        }
    });

    $("#adresseDepart").on("blur", function() {
        //if ($("#nav-carte-tab").hasClass("active")) {
            $("#formulaire_recherche").submit();
        //}
    });
    
    $("#rayon").on("change", function() {
        //if ($("#nav-carte-tab").hasClass("active")) {
            $("#formulaire_recherche").submit();
        //}
    });
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA22Ascl7tbt6eLIQVW8E_2h2rCIoFA4Aw&callback=initialize"></script>
<script type="text/javascript">
    // Source : https://stackoverflow.com/questions/30439915/google-map-click-marker-by-external-link
    var marqueurs = [];
    var marqueur;
    var map;
    // Chargement des icones pointeurs
    var icones = [
      'images/red-dot.png',
      'images/orange-dot.png',
      'images/yellow-dot.png',
      'images/purple-dot.png',
      'images/blue-dot.png',
      'images/green-dot.png',
      'images/pink-dot.png'
    ]

    //var logements = [
        <?php //foreach ($donnees["logements"] as $logement) {
            //echo '[\'<a href="index.php?Logement&action=afficherLogement"><h4 class="p-2">' . $logement->lireNoCivique() . ' ' . $logement->lireRue() . ' ' . $logement->lireApt() . ', ' . $logement->lireVille() . ', ' . $logement->lireProvince() . '</h4></span><img src="' . $logement->lirePremierePhoto() . '"><div class="d-flex justify-content-between"><span class="prix pt-2"><strong>' . $logement->lirePrix() . '$</strong></span><span class="score"><span style="width:' . ($logement->lireEvaluation() / 5) * 100 . '%"></span></div></a>\', ' . $logement->lireLatitude() . ', ' . $logement->lireLongitude() . ', ' . ($logement->lireIdTypeLogement() - 1). '], ';
        //} 
        ?>
    //];

    function initialize() {
        var zoomlvl = <?= $_SESSION["recherche"]["zoom"] ?>;
        var latitude = <?= $_SESSION["recherche"]["latitude"] ?>;
        var longitude = <?= $_SESSION["recherche"]["longitude"] ?>;
        map = new google.maps.Map(document.getElementById('carte'), {
            zoom: zoomlvl,
            center: new google.maps.LatLng(latitude, longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            //mapTypeControl: false,
            //streetViewControl: false,
            //panControl: false,
            zoomControlOptions: {
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        });
    };

    function chargerMarqueurs(logements) {
        var infowindow = new google.maps.InfoWindow({
            maxWidth: 300
        });

        //var zoomlvl = <?= $_SESSION["recherche"]["zoom"] ?>;
        //map.setZoom(zoomlvl);        

        for (var i = 0; i < logements.length; i++) {
            ajouterMarqueur(logements[i][1], logements[i][2], icones[logements[i][3]]);

            google.maps.event.addListener(marqueur, 'mouseover', (function(marqueur, i) {
                return function() {
                    infowindow.setContent(logements[i][0]);
                    infowindow.open(map, marqueur);
                    //map.setZoom(9);
                    //map.setCenter(marqueur.getPosition());
                }
            })(marqueur, i));

            google.maps.event.addListener(marqueur, 'click', (function(marqueur, i) {
                return function() {
                    infowindow.setContent(logements[i][0]);
                    infowindow.open(map, marqueur);
                    map.setZoom(17);
                    map.setCenter(marqueur.getPosition());
                }
            })(marqueur, i));

        }
    };

    // Ajoute un marqueur à la carte et le rajoute au tableau marqueurs[]
    function ajouterMarqueur(latitude, longitide, icone) {
        marqueur = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitide),
            map: map,
            icon: icone,
            title: 'Cliquer pour agrandir', 
            animation: google.maps.Animation.DROP
        });
        marqueurs.push(marqueur);
    }

    // Sets the map on all marqueurs in the array.
    function ecrireTousSurCarte(map) {
        for (var i = 0; i < marqueurs.length; i++) {
            marqueurs[i].setMap(map);
        }
    }

    // Masque les marqueurs, mais les garde dans le tableau.
    function masquerMarqueurs() {
        ecrireTousSurCarte(null);
    }

    // Affiche tous les marqueurs présents dans le tableau.
    function AfficherMarqueurs() {
        ecrireTousSurCarte(map);
    }

    // Efface tous marqueurs du tableau.
    function effacerMarqueurs() {
        masquerMarqueurs();
        marqueurs = [];
    }

    function modifierZoom() {
        var zoomlvl = <?= $_SESSION["recherche"]["zoom"] ?>;
        map.setZoom(zoomlvl);        
    };

</script>
