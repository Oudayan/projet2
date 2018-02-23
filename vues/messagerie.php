<?php
/**
 * @file     messagerie.php
 * @author   Zoraida Ortiz
 * @version  2.0
 * @date     20 fevrier 2018
 * @brief    vue messagerie
 * @details  
 * source    https://www.jqueryscript.net/text/Rich-Text-Editor-jQuery-RichText.html
 */
?> 
<head> 
    <!-- Messagerie -->
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/richtext.scss">        
    <link rel="stylesheet" href="css/richtext.min.css">
       <!-- <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
   <!-- <script src="js/jquery.dataTables.min.js"></script> --> 
    <script src="js/jquery.richtext.js"></script>
   <!-- <script src="js/messagerie.js"></script>-->
</head>     

<div class="container">
  <div class="d-flex flex-row">
    <div class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-compMessage-tab list-group-item-action" data-toggle="pill" href="#v-pills-compMessage" role="tab" aria-controls="v-pills-compMessage" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Composer un message</a>
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-boitRecp-tab list-group-item-action" data-toggle="pill" href="#v-pills-boitRecp" role="tab" aria-controls="v-pills-boitRecp" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false">14</span><i class="fa fa-folder-open" aria-hidden="true"></i>Boîte de réception</a>      
      <a class="nav-link" id="v-pills-mEnvoyes-tab list-group-item-action" onclick="afficherMsgEnvoyes()" data-toggle="pill" href="#v-pills-mEnvoyes" role="tab" aria-controls="v-pills-mEnvoyes" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Messages envoyés</a>
    </div><!-- nav flex-column -->

    <div class="tab-content tab-messagerie col-9" id="v-pills-tabContent">
       
    <div class="tab-pane fade " id="v-pills-compMessage" role="tabpanel" aria-labelledby="v-pills-compMessage-tab">
        <?php include "vues/formulaireMessagerie.php";?>     
      </div><!-- tab-pane compMessage -->
      
      <div class="tab-pane fade show active" id="v-pills-boitRecp" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
       <div class="btnsMessagerie">
        <button type="button" class="btn-bleu btn-sm">Répondre</button><br><br>
      </div> 
        <table class="table table-sm responsive-sm table-hover display" id="messages">
          <thead>
            <tr>
              <th scope="col">lu</th>
              <th><i class="fa fa-level-down" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="boiteReception">
          </tbody>
        </table>
      </div><!-- tab-pane boitRecp-->
      
      <div class="tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab">
        <button type="button" class="btn-bleu btn-sm disabled">Répondre</button><br><br>
        <table class="table table-sm responsive-sm table-hover display">
          <thead>
            <tr>
              <th scope="col">lu</th>
              <th><i class="fa fa-level-up" aria-hidden="true"></i></th>
              <th>Sujet</th>
              <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
              <th><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody id="msgEnvoyes">
          </tbody>
        </table>
        <div id="messageRecu">
         <!-- <form>  
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">De</label>
                <div class="col-sm-10">
                  <p class="form-control-static">email@example.com</p>
                </div>
              </div>
             <?php //include "vues/formulaireMessagerie.php";?>
          </form>-->
        </div>
        
      </div>        
    </div><!-- tab-pane -->
    </div><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
</div><!-- container -->
<script type="text/javascript">
$(document).ready(function() {
        $('.content').richText(); 
        afficherBoiteReception();
       /* $(document).on('click','.mess', function(){          
          alert('salut')});*/
    });
        
</script>
 <script type="text/javascript">
    function afficherBoiteReception() {
    $.ajax({
        url: 'index.php?Messagerie&action=boiteReception', 
        type: 'POST',
        dataType: 'json',
       success: function(json) {
          $("#boiteReception").html("");
          $.each(json, function(i, item) {
          $("#boiteReception").append("<tr><td>" + item.lu + "</td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td></tr>");

          });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
    });
};
        
</script>
 <script type="text/javascript">
    function afficherMsgEnvoyes() {
        $.ajax({
            url: 'index.php?Messagerie&action=msgEnvoyes', 
            type: 'POST',
            dataType: 'json',
           success: function(json) {
            $("#msgEnvoyes").html("");
            $.each(json, function(i, item) {
              /*console.log("<tr><td onclick=\"alert('salut')\">");*/
               $("#msgEnvoyes").append("<tr><td><a href='#' onclick='lireMessage(" + item.id_message + ")'>" + item.lu + "</a></td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td><td class='hidden'>" + item.id_message + "</td></tr>");
         
              });
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
    }; 
 </script>
<script type="text/javascript">
function lireMessage(id){
       $.ajax({
          url: 'index.php?Messagerie&action=afficherMessage', 
          type: 'POST',
          data: {id_message: id },
          dataType: 'json',
          success: function(json) {
            /*$('#PresentationId').val(json.courriel);*/
          $("#messageRecu").empty();
          $.each(json, function(i, item) {
            $("<texarea class= 'content'>" + item.message + "</texarea><hr>").appendTo("#messageRecu");

            });
              },
              error: function(xhr, ajaxOptions, thrownError) {
                  alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
              }
     }); 
  };
 
  </script>
  
        
 
