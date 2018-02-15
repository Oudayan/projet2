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
            <aside class="col-lg-3 border rounded my-2">
                <form class="py-3">
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
                            <option value="6">10 KM</option>
                            <option value="7">15 KM</option>
                            <option value="8">20 KM</option>
                            <option value="9" selected>25 KM</option>
                            <option value="10">50 KM</option>
                            <option value="11">75 KM</option>
                            <option value="12">100 KM</option>
                            <option value="13">150 KM</option>
                            <option value="14">200 KM</option>
                            <option value="15">250 KM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prixMin">Entre&nbsp;:</label>
                        <select class="form-control" id="prixMin">
                            <option value="1" selected>0 $</option>
                            <option value="1">25 $</option>
                            <option value="2">50 $</option>
                            <option value="3">75 $</option>
                            <option value="4">100 $</option>
                            <option value="5">125 $</option>
                            <option value="6">150 $</option>
                            <option value="7">175 $</option>
                            <option value="8">200 $</option>
                            <option value="9">225 $</option>
                            <option value="10">250 $</option>
                            <option value="11">275 $</option>
                            <option value="12">300 $</option>
                            <option value="13">325 $</option>
                            <option value="14">350 $</option>
                            <option value="15">375 $</option>
                            <option value="16">400 $</option>
                            <option value="17">425 $</option>
                            <option value="18">450 $</option>
                            <option value="19">475 $</option>
                            <option value="20">500 $</option>
                            <option value="21">550 $</option>
                            <option value="22">600 $</option>
                            <option value="23">650 $</option>
                            <option value="24">700 $</option>
                            <option value="25">750 $</option>
                            <option value="26">800 $</option>
                            <option value="27">850 $</option>
                            <option value="28">900 $</option>
                            <option value="29">950 $</option>
                            <option value="30">1000 $ ou plus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prixMax">Et&nbsp;:</label>
                        <select class="form-control" id="prixMax">
                            <option value="1">0 $</option>
                            <option value="1">25 $</option>
                            <option value="2">50 $</option>
                            <option value="3">75 $</option>
                            <option value="4">100 $</option>
                            <option value="5">125 $</option>
                            <option value="6">150 $</option>
                            <option value="7">175 $</option>
                            <option value="8">200 $</option>
                            <option value="9">225 $</option>
                            <option value="10">250 $</option>
                            <option value="11">275 $</option>
                            <option value="12">300 $</option>
                            <option value="13">325 $</option>
                            <option value="14">350 $</option>
                            <option value="15">375 $</option>
                            <option value="16">400 $</option>
                            <option value="17">425 $</option>
                            <option value="18">450 $</option>
                            <option value="19">475 $</option>
                            <option value="20">500 $</option>
                            <option value="21">550 $</option>
                            <option value="22">600 $</option>
                            <option value="23">650 $</option>
                            <option value="24">700 $</option>
                            <option value="25">750 $</option>
                            <option value="26">800 $</option>
                            <option value="27">850 $</option>
                            <option value="28">900 $</option>
                            <option value="29">950 $</option>
                            <option value="30" selected>1000 $ ou plus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="typeLogement">Type de logement&nbsp;:</label>
                        <select multiple class="form-control" id="typeLogement">
                        <?php foreach ($donnees["typesLogements"] as $typesLogements) {
                            echo "<option value='" . $typesLogements->lireIdTypeLogement() . "'>" . $typesLogements->lireTypeLogement() . "</option>";
                        } ?>
                        </select>
                    </div>
                </form>
                <button id="drop" class="btn btn-block btn-orange mb-4">Rechercher</button>
            </aside>
            
            
            <div class="col-lg-9 mt-2">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-catalogue-tab" data-toggle="tab" href="#catalogue" role="tab" aria-controls="nav-catalogue" aria-selected="true">Catalogue</a>
                        <a class="nav-item nav-link" id="nav-carte-tab" data-toggle="tab" href="#carte" role="tab" aria-controls="nav-carte" aria-selected="false">Carte</a>
                    </div>
                </nav>
                <div id="nav-tabContent" class="tab-content border-left border-right border-bottom mb-2">
                    <section id="catalogue" class="tab-pane fade show" role="tabpanel" aria-labelledby="nav-catalogue-tab">
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
                                <div class="col-lg-8">
                                    <div class="row">
                                        <h4 class="col-12 p-2"><?= $logement->lireNoCivique() . " " . $logement->lireRue() . " " . $logement->lireApt() . ", " . $logement->lireVille() . ", " . $logement->lireProvince(); ?></h4>
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
                                </div>
                            </article>
                        <?php } ?>
                    </section>
                    <section id="carte" class="tab-pane fade" id="nav-carte" role="tabpanel" aria-labelledby="nav-carte-tab">
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
    $(window).on("load", function() {
        var url = window.location.search.substring(1);
        var catalogue = new RegExp(/catalogue=true/, "gi");
        if (catalogue.test(url)) {
            $("#catalogue").addClass("active");
            $("#catalogue").tab("show");
        }
        else {
            $("#catalogue").removeClass("active");
            //$("#catalogue").tab("hide");
        }
        var carte = new RegExp(/carte=true/, "gi");
        if (carte.test(url)) {
            $("#carte").addClass("active");
            $("#carte").tab("show");
        }
        else {
            $("#carte").removeClass("active");
            //$("#carte").tab("hide");
        }
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
            echo '[\'<a href="index.php?Logement&action=getbyid"><h4 class="p-2">' . $logement->lireNoCivique() . ' ' . $logement->lireRue() . ' ' . $logement->lireApt() . ', ' . $logement->lireVille() . ', ' . $logement->lireProvince() . '</h4></span><img src="' . $logement->lirePremierePhoto() . '"><div class="d-flex justify-content-between"><span class="prix pt-2"><strong>' . $logement->lirePrix() . '$</strong></span><span class="score"><span style="width:' . ($logement->lireEvaluation() / 5) * 100 . '%"></span></div></a>\', ' . $logement->lireLatitude() . ', ' . $logement->lireLongitude() . '], ';
        } ?>
    ];

    // Setup the different icons and shadows
    var iconURLPrefix = 'images/';

    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'blue-dot.png',
      iconURLPrefix + 'green-dot.png',
      iconURLPrefix + 'yellow-dot.png',
      iconURLPrefix + 'purple-dot.png',
      iconURLPrefix + 'orange-dot.png',
      iconURLPrefix + 'pink-dot.png'
    ]
    var iconsLength = icons.length;

    function initialize() {
        map = new google.maps.Map(document.getElementById('carte'), {
            zoom: 20,
            center: new google.maps.LatLng(20.59, 78.96),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            streetViewControl: false,
            panControl: false,
            zoomControlOptions: {
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        });


        var infowindow = new google.maps.InfoWindow({
            maxWidth: 350
        });

        var iconCounter = 0;

        // Add the markers and infowindows to the map
        for (var i = 0; i < locations.length; i++) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: icons[iconCounter],
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
        autoCenter();
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function triggerClick(i) {
        google.maps.event.trigger(markers[i], 'click');
        //map.getBounds();	
    }

    function triggerClickHome() {
        //map.zoom: 10,
        //map.center: new google.maps.LatLng(20.59, 78.96),
        //map.mapTypeId: google.maps.MapTypeId.ROADMAP,
        //google.maps.event.trigger(markers[i], 'click');
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
