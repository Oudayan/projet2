/**
 * @file     managePhotos.js
 * @author   Oudayan Dutta, Denise Ratté, Zoraida Ortiz, J Subirats 
 * @version  2.0
 * @date     5 mars 2018
 * @brief    Logique pour le télécharmegent des photos
 *   
 * @details   
 */
function checkPhotos() {
	y = document.getElementById('photo0').src;
	regex1 = RegExp('images/Logements');
	if (regex1.test(y)){
		$('#monConteneur').hide();	
		$("#photo"+0).show();
		$("#piece"+0).show();
		$("#trash"+0).show();
	}
	for (i = 1 ; i <20 ; i++) {
		y = document.getElementById('photo'+i).src;
		console.log(regex1.test(y));
		if (regex1.test(y)){
			$("#photo"+i).show();
			$("#piece"+i).show();
			$("#trash"+i).show();
			}
		}
}


	function readURL(input) {
		console.log(input.files[0].name);
		console.log(input.id[0]);
		// for(i=0;i<20;i++){
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				/* reader.onload = function (e) {
					$('#photo'+input.id)
						.attr('src', e.target.result);
				}; */
				formData = new FormData();
				formData.append('files[]',input.files[0]);
				$.ajax({
					url: "vues/upload.php",
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					async:false, 
					success: function (res) {
						// document.getElementById("response").innerHTML = res;
						// alert(res);
					},
					error: function(){
						alert('Erreur');
					}
				});				
				reader.readAsDataURL(input.files[0]);
				courriel = document.getElementById('courriel').value;
					$("#photo"+input.id).show()
					.attr('src','images/Logements/'+courriel+'/' + input.files[0].name); 
				$("#photo"+input.id).show();
				$("#piece"+input.id).show();
				$("#trash"+input.id).show();
				$('#monConteneur').hide();	
			}
		// }
	}
		function prePhotosModification(input) {
		if (input.files.length >= 20) {
			alert ("Votre choix a dépassé la limite, jusqu'a 20 Photos" )
		}
		formData = new FormData();
		
		 for (i=0;i<input.files.length;i++){
			formData.append('files[]',input.files[i]);
		}
		console.dir(formData);
		if (input.files.length > 0){
				$('#monConteneur').hide();
			}

		courriel = document.getElementById('courriel').value;
			for(i=0;i<input.files.length;i++){
				file = 'images/Logements/'+courriel+'/' + input.files[i].name;
				 $("#photo"+i).show()
					.attr('src','images/Logements/'+courriel+'/' + input.files[i].name); 
					maEtiquette = "image"+i;
				$("#trash"+i).show();
				$("#piece"+i).show();
			}
	}
	
	function prePhotos(input) {
		if (input.files.length >= 20) {
			alert ("Votre choix a dépassé la limite, jusqu'a 20 Photos" )
		}
		formData = new FormData();
		
		 for (i=0;i<input.files.length;i++){
			formData.append('files[]',input.files[i]);
		}
		console.dir(formData);
		if (input.files.length > 0){
				$('#monConteneur').hide();
			}
			$.ajax({
				url: "vues/upload.php",
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				async:false, 
				success: function (res) {
				},
				error: function(){
					alert('Erreur');
				}
			});
		courriel = document.getElementById('courriel').value;
			for(i=0;i<input.files.length;i++){
				file = 'images/Logements/'+courriel+'/' + input.files[i].name;
				 $("#photo"+i).show()
					.attr('src','images/Logements/'+courriel+'/' + input.files[i].name); 
					maEtiquette = "image"+i;
				$("#trash"+i).show();
				$("#piece"+i).show();
			}
	}
	
	function removePhoto(input){
		i = extractNumbers(input);
		monImage = 'photo'+i;
		filetoremove = document.getElementById(monImage).src;
		formData = new FormData();
		formData.append('files[]',filetoremove);
		$.ajax({
			url: "vues/delete_photo.php",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			success: function (res) {

				},
			error: function(){
				alert('Erreur');
				}
			});
		$("#trash"+i).hide();
		$("#piece"+i).hide();
		$("#photo"+i).hide()
			.attr('src',"");
		validaBtnMPhotos();
	}
	
	function extractNumbers(str) {
		var thenum = str.replace( /^\D+/g, '');
	return thenum;
	}
	
	function validaBtnMPhotos(){
		photos = 0 ; 
		for (i=0;i<20;i++){
			myPhoto = document.getElementById("photo"+i).width;
			if (myPhoto != 0) {
				photos++;}
		}
		if (photos == 0){
			$('#monConteneur').show();	
		}
	}
