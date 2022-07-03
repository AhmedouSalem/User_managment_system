$(document).ready(function(){
	
	fetchAllUsers1();

	//fetch all users account active
	function fetchAllUsers1(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllUsers1' },
			success: function(response){
				$("#showAllUsers").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}
	//Fetch user details
	$("body").on("click", ".userDetailsIcon", function(e){
		e.preventDefault();
		details_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { details_id: details_id },
			success: function(response){
				data = JSON.parse(response);
				$("#getName").text(data.username+' '+data.lastname+''+'(ID: '+data.id+')');
				$("#getEmail").text('Categorie : '+data.cat_name);
				$("#getPhone").text('Phone : '+data.tel);
				// $("#getDob").text('DOB : '+data.dob);
				$("#getGender").text('Gender : '+data.gender);
				$("#getCreated").text('Description: '+data.des);
				$("#getVerified").text('Date de création : '+data.date);
				//$("#getAddress").text('Address : '+data.address+', '+data.city+', '+data.state+' - '+data.zip_code+', '+data.country+'.');

				if(data.img != ''){
					$("#getImage").html('<img src="../assets/php/'+data.img+'" class="img-fluid align-self-center" width="280px">');
				} else {
					$("#getImage").html('<img src="../assets/img/profiles/avatar.png" class="img-fluid align-self-center" width="280px">');
				}
			}
		});
	});

	//Delete user ajax reqest
	$("body").on("click", ".userDeleteIcon", function(e){
		e.preventDefault();
		delete_id = $(this).attr('id');
		Swal.fire({
		title: 'Êtes-vous sûr?',
		text: "Vous ne pourrez pas revenir en arrière !",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: "Annuler",
		confirmButtonText: 'Oui, désactivez-le !'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/admin-action.php',
					method: 'post',
					data: { delete_id: delete_id },
					success: function(response){
				    	Swal.fire(
				    		'Désactivé!',
				    		'compte Désactivé avec succès.',
				    		'success'
				    	)

				    	fetchAllUsers();
					}
				});
			}
		});
	});
});