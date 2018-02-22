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
        <form>
          <div class="form-group row">
            <label for="text-input" class="col-2 col-form-label">À</label>
            <div class="col-10">
                <input class="form-control" type="text" value="" id="text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="text-input" class="col-2 col-form-label">Sujet</label>
            <div class="col-10">
                <input class="form-control" type="text" value="" id="text-input">
            </div>
          </div>
          <div class="form-group row">
            <label for="file_id" class="col-2 col-form-label">Fichier joint</label>
            <div class="col-10">
              <input name="mon_image" type="file" id="file_id">
            </div>
          </div>  
          <div class="form-group row">
            <label for="text-input" class="col-2 col-form-label">Message</label>           
            <div class="col-10">           
              <div class="page-wrapper box-content">
               <textarea class="content" name="example"></textarea> 
                <button class="btn btn-orange">Envoyer</button>
             </div>             
            </div>
          </div><!-- form-group row -->          
        </form>        
      </div><!-- tab-pane compMessage -->
      
      <div class="tab-pane fade show active" id="v-pills-boitRecp" role="tabpanel" aria-labelledby="v-pills-boitRecp-tab">
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
      </div>        
    </div><!-- tab-pane -->
    </div><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
</div><!-- container -->
<script type="text/javascript">
  $(document).ready(function() {
        $('.content').richText(); 
        afficherBoiteReception();
    });
        
</script>
 <script type="text/javascript">
    function afficherBoiteReception() {
    $.ajax({
        url: 'index.php?Messagerie&action=boiteReception', 
        type: 'POST',
        dataType: 'json',
       success: function(json) {
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
            $.each(json, function(i, item) {
               $("#msgEnvoyes").append("<tr><td>" + item.lu + "</td><td>" + item.nom + "</td><td>" + item.sujet + "</td><td>" + item.fichier_joint + "</td><td>" + item.msg_date + "</td></tr>");
         
              });
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
    }; 
 </script>
        
 
