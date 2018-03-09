<?php
/**
 * @file     admin.php
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  2.0
 * @date     5 mars 2018
 * @brief    vue admin
 * @details  
 * source    https://www.jqueryscript.net/text/Rich-Text-Editor-jQuery-RichText.html
 */
?> 
<head>
	<script src="js/admin.js"></script>
</head>
<main class="container-fluid" style="height:900px">
        <div class="d-flex justify-content-around mt-3">
            <h1>Tâches d'administrateur</h1>
        </div>
  <div class="row">
	  <aside class="col-lg-3">
		<nav class="nav flex-column nav-pills v-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link active" id="v-pills-validerUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerUsagers" role="tab" aria-controls="v-pills-validerUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Valider usagers</a>      
			<a class="nav-link" id="v-pills-listeUsagers-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeUsagers" role="tab" aria-controls="v-pills-listeUsagers" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false"></span><i class="fa fa-folder-open" aria-hidden="true"></i>Liste d'usagers</a>      
			<div class="dropdown-divider"></div>
			<a class="nav-link" id="v-pills-validerLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-validerLogements" role="tab" aria-controls="v-pills-validerLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Valider logements</a>
			<a class="nav-link" id="v-pills-listeLogements-tab list-group-item-action" onclick="cacherBoitesLecture()"  data-toggle="pill" href="#v-pills-listeLogements" role="tab" aria-controls="v-pills-listeLogements" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Liste des logements</a>
		</nav><!-- nav flex-column -->
	  </aside>
  <section class="tab-usagers tab-content col-lg-9" id="v-pills-tabContent">
      <div class="tableauUserValider tab-pane fade show active" id="v-pills-validerUsagers" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab" style="height:40vh; overflow: scroll;">
      <table class="table table-sm responsive-sm table-hover display">
        <thead>
        <h6>Usagers à valider</h6>
          <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th><i class="fa fa-envelope" aria-hidden="true"></i></th>  
            <th><i class="fa fa-phone" aria-hidden="true"></i></th>  
          </tr>
        </thead>
        <tbody id="tableauUserValider">
        </tbody>
      </table>
    </div><!-- tab-pane validerUsagers-->
	  
    <div class="listeUsagers tab-pane fade" id="v-pills-listeUsagers" role="tabpanel" aria-labelledby="v-pills-listeUsagers-tab" style="height:40vh; overflow: scroll;">
      <form class="formSuppMsg" method="POST">
	  <table class="table table-sm responsive-sm table-hover display">
        <thead>
        <h6>Liste d'usagers</h6>
          <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th><i class="fa fa-envelope" aria-hidden="true"></i></th>  
            <th><i class="fa fa-phone" aria-hidden="true"></i></th>  
          </tr>
        </thead>
        <tbody id="tableauListeUsagers"></tbody>
      </table>
	  	 <input type="text" name="actif" value="false" hidden/>
    </form>
    </div><!-- listeUsagers -->
	  
    <div class="validerLogements tab-pane fade" id="v-pills-validerLogements" role="tabpanel" aria-labelledby="v-pills-validerLogements-tab" style="height:20vh; overflow: scroll;" >
   <form class="formSuppMsg" method="POST">
   <table class="table table-sm responsive-sm table-hover display">
	<h6>Logements à valider</h6>
      <thead>
        <tr>
           <th>Numéro </th>
		   <th>Rue </th>
           <th>Ville</th>
           <th>Province</th>
           <th>Pays</th>
           <th>Code Postal</th>
        </tr>
      </thead>
      <tbody id="validerLogements">
      </tbody>
    </table>
	 <input type="text" name="actif" value="false" hidden/>
    </form>
  </div><!-- tab-pane validerLogements-->
	      <div class="messagesEnvoyes tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
        <form class="formSuppMsg" method="POST">
        <table class="table table-sm responsive-sm table-hover display">
          <button type="submit" class="btn btn-orange btn-sm suppMsg"><i class="fa fa-trash"  aria-hidden="false"></i></button>
          <thead>
            <tr>
              <th><input type="checkbox" class='tous' /></th>
              <th><i class="fa fa-level-up" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="msgEnvoyes"></tbody>
        </table>
          <input type="text" name="actif" value="false" hidden/>
       </form>
      </div><!-- messagesEnvoyes -->  
     <form class="ficheLogement hidden">
       <?php include 'ficheLogement.php';?>
     </form> 
	 <form class="ficheUsager hidden">
       <?php include 'ficheUsager.php';?>
     </form> 
   </section><!-- tab-messagerie -->
 </div><!-- d-flex flex-row -->
  <!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> 
  Open modal
</button> -->

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Bannir un Usager</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
           <div class="col-lg-12"> 
              <label for="description">Description</label>
              <textarea rows="6" cols="50" id="description" onblur="estDescription()" required></textarea>
              <span id="errDescription" style="color:red; visibility:hidden">* Description invalide ou requis</span>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="bannir" class="btn btn-danger" onclick="bannir()" data-dismiss="modal"disabled>Bannir</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
      </div>

    </div>
  </div>
</div>
</main><!-- container -->

  <style>
  #feedback { font-size: 0.9em; }
  #selectable .ui-selecting { background: #FECA40; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin-left: 5px; padding: 0em; font-size: 0.8em; }
  </style>
        
 