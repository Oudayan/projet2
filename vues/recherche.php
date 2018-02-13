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
<main class="container text-center">
    <div class="container">
        <div class="row">
            <aside class="col-sm-2">
                <form>
                    <select>
                    <?php foreach ($donnees["typesLogements"] as $typesLogements) {
                        echo "<option value='" . $typesLogements->lireIdTypeLogement() . "'>" . $typesLogements->lireTypeLogement() . "</option>";
                    } ?>
                    </select>
                </form>
                <button id="drop" class="btn btn-orange" onclick="dropPins()">Rechercher</button>
            </aside>
            <div class="col-sm-10">
                <section id="carte">
                </section>
                <section id="fiches">
                <?php foreach ($donnees["logements"] as $logement) { ?>
                    <article id="fiche_<?= $logement->lireIdLogement(); ?>" class="row border rounded text-center my-2 p-2">
                        <div class="col-lg-4">
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel" data-jcarousel="true">
                                    <ul id="liste_image_<?= $logement->lireIdLogement(); ?>">
                                        <li><img src="<?= $logement->lirePremierePhoto(); ?>"></li>
                                        <li><img src="images/Logements/1/image_1.jpg"></li>
                                        <li><img src="images/Logements/1/image_2.jpg"></li>
                                        <li><img src="images/Logements/1/image_3.jpg"></li>
                                    </ul>
                                </div>
                                <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true" onclick="afficherImagesCarousel(<?= $logement->lireIdLogement() . ', \'' . $logement->lirePremierePhoto() ?>')">‹</a>
                                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
                                <p id="pagination_photo_<?= $logement->lireIdLogement(); ?>"  class="jcarousel-pagination" data-jcarouselpagination="true">
                                    <a href="#1" class="active">1</a>
                                    <a href="#2">2</a>
                                    <a href="#3">3</a>
                                </p>
                            </div>
                            <div id="description_image_<?= $logement->lireIdLogement(); ?>">
                                <p>Description de la photo</p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <h4 class="col-12"><?= $logement->lireNoCivique() . " " . $logement->lireRue() . " " . $logement->lireApt() . ", " . $logement->lireVille() . ", " . $logement->lireProvince(); ?></h4>
                                <div class="col-sm-4">
                                    <?= $logement->lireDescription(); ?><br>
                                </div>
                                <div class="col-sm-4">
                                    <?= $logement->lirePrix(); ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $logement->lireEvaluation(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
                </section>
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
        ["204 Rue de l'Hôpital, Montréal, QC H2Y 1V8", 45.503252, -73.55668400000002], 
        ["3848 Avenue du Parc-La Fontaine, Montréal, QC H2L 3M6", 45.5231874, -73.56986770000003], 
        ["4393 Esplanade Ave, Montreal, QC H2W 1T2", 45.5178746, -73.58631330000003], 
        ["163 Rue Murray, Montréal, QC H3C 2C9", 45.4923621, -73.55838560000001],
        ["316 Rue du Square Saint Louis, Montréal, QC H2X 1A5", 45.51680770000001, -73.56932169999999], 
        ["442 Sainte-Hélène St, Montreal, QC H2Y 2K7", 45.5012713, -73.55829399999999],
        ["3048 Rue Delisle, Montreal, QC H4C 1M9", 45.4820269, -73.57898369999998], 
        <?php foreach ($donnees["logements"] as $logement) {
            echo '[\'<a href="index.php?Logement&action=getbyid"><h5>' . $logement->lireNoCivique() . ' ' . $logement->lireRue() . ' ' . $logement->lireApt() . ', ' . $logement->lireVille() . ', ' . $logement->lireProvince() . ' - <span class="text-warning">' . $logement->lirePrix() . '$</span></h5><img src="' . $logement->lirePremierePhoto() . '"></a>\', ' . $logement->lireLatitude() . ', ' . $logement->lireLongitude() . '], ';
        } ?>
    ];

    // Setup the different icons and shadows
    var iconURLPrefix = 'images/';

    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'chalet.png',
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
            zoom: 10,
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
            maxWidth: 300
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
                    console.log("Hover!");
                }
            })(marker, i));

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                    map.setZoom(17);
                    map.setCenter(marker.getPosition());
                    console.log("Click!");
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
