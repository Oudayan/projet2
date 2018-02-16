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
<main class="container">
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-3 border rounded py-3">
                <form class="py-2">
                    <div class="form-group">
                        <label for="region">Région&nbsp;:</label>
                        <select class="form-control" id="region">
                            <option value="1" disabled>Bas-Saint-Laurent</option>
                            <option value="2" disabled>Saguenay–Lac-Saint-Jean</option>
                            <option value="3" disabled>Capitale-Nationale</option>
                            <option value="4" disabled>Mauricie</option>
                            <option value="5" disabled>Estrie</option>
                            <option value="6" selected>Montréal</option>
                            <option value="7" disabled>Outaouais</option>
                            <option value="8" disabled>Abitibi-Témiscamingue</option>
                            <option value="9" disabled>Côte-Nord</option>
                            <option value="10" disabled>Nord-du-Québec</option>
                            <option value="11" disabled>Gaspésie–Îles-de-la-Madeleine</option>
                            <option value="12" disabled>Chaudière-Appalaches</option>
                            <option value="13" disabled>Laval</option>
                            <option value="14" disabled>Lanaudière</option>
                            <option value="15" disabled>Laurentides</option>
                            <option value="16" disabled>Montérégie</option>
                            <option value="17" disabled>Centre-du-Québec</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rayon">Rayon&nbsp;:</label>
                        <select class="form-control" id="rayon">
                            <option value="1">0.5 KM</option>
                            <option value="1">1 KM</option>
                            <option value="2">2 KM</option>
                            <option value="3">3 KM</option>
                            <option value="4">4 KM</option>
                            <option value="5">5 KM</option>
                            <option value="10">10 KM</option>
                            <option value="15">15 KM</option>
                            <option value="20">20 KM</option>
                            <option value="25" selected>25 KM</option>
                            <option value="50">50 KM</option>
                            <option value="75">75 KM</option>
                            <option value="100">100 KM</option>
                            <option value="150">150 KM</option>
                            <option value="200">200 KM</option>
                            <option value="250">250 KM</option>
                            <option value="500">500 KM</option>
                            <option value="500">1000 KM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prixMin">Entre&nbsp;:</label>
                        <select class="form-control" id="prixMin">
                            <option value="0" selected>Aucun prix minimum</option>
                            <option value="25">25 $</option>
                            <option value="50">50 $</option>
                            <option value="75">75 $</option>
                            <option value="100">100 $</option>
                            <option value="125">125 $</option>
                            <option value="150">150 $</option>
                            <option value="175">175 $</option>
                            <option value="200">200 $</option>
                            <option value="225">225 $</option>
                            <option value="250">250 $</option>
                            <option value="275">275 $</option>
                            <option value="300">300 $</option>
                            <option value="325">325 $</option>
                            <option value="350">350 $</option>
                            <option value="375">375 $</option>
                            <option value="400">400 $</option>
                            <option value="425">425 $</option>
                            <option value="450">450 $</option>
                            <option value="475">475 $</option>
                            <option value="500">500 $</option>
                            <option value="550">550 $</option>
                            <option value="600">600 $</option>
                            <option value="650">650 $</option>
                            <option value="700">700 $</option>
                            <option value="750">750 $</option>
                            <option value="800">800 $</option>
                            <option value="850">850 $</option>
                            <option value="900">900 $</option>
                            <option value="950">950 $</option>
                            <option value="1000">1000 $</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prixMax">Et&nbsp;:</label>
                        <select class="form-control" id="prixMax">
                            <option value="0">0 $</option>
                            <option value="25">25 $</option>
                            <option value="50">50 $</option>
                            <option value="75">75 $</option>
                            <option value="100">100 $</option>
                            <option value="125">125 $</option>
                            <option value="150">150 $</option>
                            <option value="175">175 $</option>
                            <option value="200">200 $</option>
                            <option value="225">225 $</option>
                            <option value="250">250 $</option>
                            <option value="275">275 $</option>
                            <option value="300">300 $</option>
                            <option value="325">325 $</option>
                            <option value="350">350 $</option>
                            <option value="375">375 $</option>
                            <option value="400">400 $</option>
                            <option value="425">425 $</option>
                            <option value="450">450 $</option>
                            <option value="475">475 $</option>
                            <option value="500">500 $</option>
                            <option value="550">550 $</option>
                            <option value="600">600 $</option>
                            <option value="650">650 $</option>
                            <option value="700">700 $</option>
                            <option value="750">750 $</option>
                            <option value="800">800 $</option>
                            <option value="850">850 $</option>
                            <option value="900">900 $</option>
                            <option value="950">950 $</option>
                            <option value="1000">1000 $</option>
                            <option value="1000000" selected>Aucun prix maximum</option>
                        </select>
                    </div>
                    <label>Types de logements&nbsp;:</label>
                    <div class="form-group border rounded py-1">
                        <div class="form-check">
                        <?php foreach ($donnees["typesLogements"] as $typesLogements) { 
                            $icones = ["images/red-dot.png", "images/orange-dot.png", "images/yellow-dot.png", "images/purple-dot.png", "images/blue-dot.png", "images/green-dot.png"]
                            ?>
                            <div class="row>">
                                <input class="form-check-input col-1 offset-1" type="checkbox" value="<?= $typesLogements->lireIdTypeLogement() ?>" id="typeLogement<?= $typesLogements->lireIdTypeLogement() ?>" checked>
                                <label class="form-check-label col-9" for="typeLogement<?= $typesLogements->lireIdTypeLogement() ?>"><?= $typesLogements->lireTypeLogement() ?></label>
                                <span class="legende col-1"><img src="<?= $icones[($typesLogements->lireIdTypeLogement() - 1)] ?>"></span>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </form>
                <button id="drop" class="btn btn-block btn-orange mb-2">Rechercher</button>
            </aside>
            <div class="col-lg-9">
                <nav>
                    <div id="nav-tab" class="nav nav-tabs row mx-0" role="tablist">
                        <a class="nav-item nav-link col-6 active" id="nav-fiches-tab" data-toggle="tab" href="#fiches" role="tab" aria-controls="nav-fiches" aria-selected="true"><h3>Fiches</h3></a>
                        <a class="nav-item nav-link col-6" id="nav-carte-tab" data-toggle="tab" href="#carte" role="tab" aria-controls="nav-carte" aria-selected="false"><h3>Carte</h3></a>
                    </div>
                </nav>
                <div id="nav-tabContent" class="tab-content border-left border-right border-bottom">
                    <section id="carte" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-carte-tab">
                    </section>
                    <section id="fiches" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-fiches-tab">
                        <?php foreach ($donnees["logements"] as $logement) { ?>
                            <article id="fiche_<?= $logement->lireIdLogement(); ?>" class="row border rounded text-center m-2 p-2">
                                <div class="col-lg-4">
                                    <div class="jcarousel-wrapper">
                                        <div class="jcarousel" data-jcarousel="true">
                                            <ul id="liste_image_<?= $logement->lireIdLogement(); ?>">
                                                <li>
                                                    <img src="<?= $logement->lirePremierePhoto(); ?>">
                                                    <h5 class="py-2">Façade</h5>
                                                </li>
                                                <li>
                                                    <img src="images/Logements/1/image_2.jpg">
                                                    <h5 class="py-2">Escalier</h5>
                                                </li>
                                                <li>
                                                    <img src="images/Logements/1/image_3.jpg">
                                                    <h5 class="py-2">Salon</h5>
                                                </li>
                                                <li>
                                                    <img src="images/Logements/1/image_5.jpg">
                                                    <h5 class="py-2">Bureau</h5>
                                                </li>
                                                <li>
                                                    <img src="images/Logements/1/image_6.jpg">
                                                    <h5 class="py-2">Cuisine</h5>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true" onclick="afficherImagesCarousel(<?= $logement->lireIdLogement() . ', \'' . $logement->lirePremierePhoto() ?>')">‹</a>
                                        <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
                                        <p id="pagination_photo_<?= $logement->lireIdLogement(); ?>"  class="jcarousel-pagination" data-jcarouselpagination="true">
                                            <a href="#1" class="active">1</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-8 description-fiche">
                                    <a href="index.php?Logement&action=getbyid">
                                        <div class="row">
                                            <h4 class="titre-fiche col-12 p-2"><?= $logement->lireNoCivique() . " " . $logement->lireRue() . " " . $logement->lireApt() . ", " . $logement->lireVille() . ", " . $logement->lireProvince(); ?></h4>
                                            <div class="col-sm-12 text-left my-3">
                                                <?= $logement->lireDescription(); ?><br>
                                            </div>
                                            <div class="col-sm-6 text-left my-3">
                                                Prix&nbsp;:&nbsp;<br><span class="prix mt-3"><strong><?= $logement->lirePrix(); ?>&nbsp;$</strong></span>
                                            </div>
                                            <div class="col-sm-6 text-right my-3">
                                                Évaluation&nbsp;:&nbsp;<?= round($logement->lireEvaluation(), 2); ?>&nbsp;/&nbsp;5
                                                <br><span class="score"><span style="width: <?= ($logement->lireEvaluation() / 5) * 100 ?>%"></span></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        <?php } ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    // Création des images du caroussel
    function afficherImagesCarousel(idLogement, premierePhoto) {
        $.ajax({
            url: 'index.php?Recherche&action=afficherImagesCarousel', 
            type: 'POST',
            data:  { idLogement: idLogement }, 
            dataType: 'json',
            success: function(donnees) {
                console.log(donnees);
                /*
                $('#liste_image_' + idLogement).empty();
                $('<img src="' + LirePremierePhoto() + '">').appendTo('#liste_image_' + idLogement);
                $(result).appendTo('#liste_image_' + idLogement);
                */
                //$('.jcarousel').jcarousel('reload');
            }
        });
    };

</script>

<script type="text/javascript">
    
    // Switch entre l'affichage des fiches ou de la carte
    $(window).on("load", function() {
        var url = window.location.search.substring(1);
        var fiches = new RegExp(/fiches=true/, "i");
        if (fiches.test(url)) {
            $("#nav-tab a:first-child").tab('show');
            $("#fiches").addClass('active');
            $(".legende").addClass('hidden');
        }
        var carte = new RegExp(/carte=true/, "i");
        if (carte.test(url)) {
            $("#nav-tab a:last-child").tab('show');
            $("#carte").addClass('active');
            $(".legende").removeClass('hidden');
        }
    });

    $("#nav-fiches-tab").on("click", function() {
        $(".legende").addClass('hidden');
    });

    $("#nav-carte-tab").on("click", function() {
        $(".legende").removeClass('hidden');
    });

</script>



<script type="text/javascript">
    // Source : https://sorgalla.com/jcarousel/
    $(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                jcarousel.jcarousel('items').width(jcarousel.innerWidth());
            })
            .jcarousel({
                wrap: 'circular',
                transitions: Modernizr.csstransitions ? {
                    transforms:   Modernizr.csstransforms,
                    transforms3d: Modernizr.csstransforms3d,
                    easing:       'ease'
                } : false
            });

        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA22Ascl7tbt6eLIQVW8E_2h2rCIoFA4Aw"></script>
<script type="text/javascript">
    // Source : https://stackoverflow.com/questions/30439915/google-map-click-marker-by-external-link

    var markers = new Array();
    var map;

    var locations = [
        <?php foreach ($donnees["logements"] as $logement) {
            echo '[\'<a href="index.php?Logement&action=getbyid"><h4 class="p-2">' . $logement->lireNoCivique() . ' ' . $logement->lireRue() . ' ' . $logement->lireApt() . ', ' . $logement->lireVille() . ', ' . $logement->lireProvince() . '</h4></span><img src="' . $logement->lirePremierePhoto() . '"><div class="d-flex justify-content-between"><span class="prix pt-2"><strong>' . $logement->lirePrix() . '$</strong></span><span class="score"><span style="width:' . ($logement->lireEvaluation() / 5) * 100 . '%"></span></div></a>\', ' . $logement->lireLatitude() . ', ' . $logement->lireLongitude() . ', ' . ($logement->lireIdTypeLogement() - 1). '], ';
        } ?>
    ];
    console.log(locations);
    
    // Setup the different icons and shadows
    var iconURLPrefix = 'images/';

    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'purple-dot.png',
      iconURLPrefix + 'orange-dot.png',
      iconURLPrefix + 'blue-dot.png',
      iconURLPrefix + 'yellow-dot.png',
      iconURLPrefix + 'green-dot.png',
      iconURLPrefix + 'pink-dot.png'
    ]
    var iconsLength = icons.length;

    function initialize() {
        map = new google.maps.Map(document.getElementById('carte'), {
            zoom: 11,
            center: new google.maps.LatLng(45.56, -73.57),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            streetViewControl: false,
            panControl: false,
            zoomControlOptions: {
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        });


        var infowindow = new google.maps.InfoWindow({
            maxWidth: 300
        });

        var iconCounter = 0;

        // Add the markers and infowindows to the map
        for (var i = 0; i < locations.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: icons[locations[i][3]],
                title: 'Cliquer pour agrandir'
            });

            markers.push(marker);

            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                    infowindow.setContent('<div class="text-danger">' + locations[i][0] + '</div>');
                    infowindow.open(map, marker);
                    //map.setZoom(9);
                    //map.setCenter(marker.getPosition());
                    //console.log("Hover!");
                }
            })(marker, i));

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                    map.setZoom(17);
                    map.setCenter(marker.getPosition());
                    //console.log("Click!");
                }
            })(marker, i));

            iconCounter++;
            // We only have a limited number of possible icon colors, so we may have to restart the counter
            if (iconCounter >= iconsLength) {
              iconCounter = 0;
            }

        }
        //autoCenter();
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);

    
    function triggerClick(i) {
        google.maps.event.trigger(markers[i], 'click');
        //map.getBounds();	
    }

    function autoCenter() {
        //  Create a new viewpoint bound
        var bounds = new google.maps.LatLngBounds();
        //  Go through each...
        for (var i = 0; i < markers.length; i++) {
            bounds.extend(markers[i].position);
        }
        //  Fit these bounds to the map
        map.fitBounds(bounds);
    }

</script>
