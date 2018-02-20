<?php
/**
 * @file     messgerie.php
 * @author   Zoraida Ortiz
 * @version  1.0
 * @date     15 fevrier 2018
 * @brief    vue messagerie
 * @details  
 * source    https://www.jqueryscript.net/text/Rich-Text-Editor-jQuery-RichText.html
 * 
 */
?> 
<head> 
    <!-- Messagerie -->
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/richtext.scss">        
    <link rel="stylesheet" href="css/richtext.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.richtext.js"></script>
</head>     

<div class="container">
  <div class="d-flex flex-row">
    <div class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-compMessage-tab list-group-item-action" data-toggle="pill" href="#v-pills-compMessage" role="tab" aria-controls="v-pills-compMessage" aria-selected="true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Composer un message</a>
       <div class="dropdown-divider"></div>
      <a class="nav-link" id="v-pills-boitRecp-tab list-group-item-action" data-toggle="pill" href="#v-pills-boitRecp" role="tab" aria-controls="v-pills-boitRecp" aria-selected="false"><span class="badge badge-default badge-pill" aria-hidden="false">14</span><i class="fa fa-folder-open" aria-hidden="true"></i>Boîte de réception</a>      
      <a class="nav-link" id="v-pills-mEnvoyes-tab list-group-item-action" data-toggle="pill" href="#v-pills-mEnvoyes" role="tab" aria-controls="v-pills-mEnvoyes" aria-selected="false"><i class="fa fa-paper-plane" aria-hidden="true"></i>Messages envoyés</a>
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
        <table class="table table-sm responsive-sm table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <tr onclick="afficherMessage(this)">
              <td>
               <i class="fa fa-envelope" aria-hidden="true"></i>
              </td>
              <td>pepito perez</td>
              <td><a href="">demo messagerie</a></td>
              <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i></a></td>
              <td>17 fev 2017</td>
            </tr>            
          </tbody>
        </table>
      </div><!-- tab-pane boitRecp-->
      
      <div class="tab-pane fade" id="v-pills-mEnvoyes" role="tabpanel" aria-labelledby="v-pills-mEnvoyes-tab"> gdgd dfd  dfgsd...</div>
      </div><!-- tab-pane -->
    </div><!-- tab-messagerie -->
  </div><!-- d-flex flex-row -->
</div><!-- container -->
 <script>
        $(document).ready(function() {
            $('.content').richText();
        });
        </script>

