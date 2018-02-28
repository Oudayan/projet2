/**
 * @file     validerFormCompMsg.php
 * @author   Zoraida Ortiz
 * @version  1.0
 * @date     26 fevrier 2018
 * @brief    validation du formulaire pour composer un message
 * 
 */
function validaterFormMsg(){
	var destinataire = $("#destinataire").val();
	var sujet = $("#sujet").val();
	var textMessage = $("#textMessage").val();
    var erreur = "";
        
        //selection destinataire
		if(destinataire == null || destinataire == 0){
			erreur += 'ERROR: Vous devez entrer au moins un destinataire.<br>';
		}
 
		//champ obligatoire
		if(sujet == null || sujet.length == 0 || /^\s+$/.test(sujet)){
			erreur += 'ERROR: Vous devez saisir un sujet.<br>';
		}
        if (textMessage == null || textMessage.length == 0 || /^\s+$/.test(textMessage)){
          erreur += "Voudriez vous envoyer le courriel sans messsage?<br>";
        }
        
        if (erreur == ""){
          return true;
        }
        else{
           alert(erreur); 
        }
       
}    
function validerExtension() { 
    var fichierJoint = $("#fichierJoint").val();
    
   var extensionsBannies = new Array("exe", "js"); 
   var erreur = ""; 
   if (!fichierJoint) { 
      //S'il n' y a pas de fichier selectioné dans le formulaire 
      	erreur = "vous n'avez pas selectioné aucun fichier"; 
   }else{ 
      // reprendre l'extension du fichier 
      extension = (fichierJoint.substring(fichierJoint.lastIndexOf("."))).toLowerCase(); 
      //alert (extension); 
      //valider si l'extensión est parmi les permises
      permetre = false; 
      for (var i = 0; i < extensionsBannies .length; i++) { 
         if (extensionsBannies [i] != extension) { 
         permetre = true; 
         break; 
         } 
      } 
      if (!permetre) { 
         erreur = "Vérifiez que l'extension du fichier correspond au type de fichier du document: " + extensionsBannies.join(); 
      	}else{ 
         alert ("Le fichier a été téléversé. Message envoyé."); 
         //formulaire.submit(); 
         return true; 
      	} 
   } 
    //s'il y a l'alert c'est car le fichier est banni 
  if(erreur != ""){
   alert (erreur); 
   }
   return false; 
}

