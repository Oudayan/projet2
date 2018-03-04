	function readURL(input) {
		console.log(input.files[0].name);
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
				x = document.forms["form_ajoute"]["image3"].filename;
				console.dir(x);
			}
		// }
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
