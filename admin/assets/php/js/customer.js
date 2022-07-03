$(document).ready(function(){
	
	fetchAllCustomers();

	//fetch all users
	function fetchAllCustomers(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllCustomers' },
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
		detailsCustomer_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { detailsCustomer_id: detailsCustomer_id },
			success: function(response){
				data = JSON.parse(response);
				$("#getName").text(data.username+' '+data.lastname+''+'(ID: '+data.id+')');
				// $("#getEmail").text('Categorie : '+data.cat_name);
				$("#getPhone").text('Phone : '+data.tel);
				// $("#getDob").text('DOB : '+data.dob);
				$("#getGender").text('Gender : '+data.gender);
				$("#getCreated").text('Date de création : '+data.date);
				// $("#getVerified").text('Verified : '+data.verified);
				//$("#getAddress").text('Address : '+data.address+', '+data.city+', '+data.state+' - '+data.zip_code+', '+data.country+'.');

				if(data.img != ''){
					$("#getImage").html('<img src="../assets/php/'+data.img+'" class="img-fluid align-self-center" width="280px">');
				} else {
					$("#getImage").html('<img src="../assets/img/profiles/avatar.png" class="img-fluid align-self-center" width="280px">');
				}
			}
		});
	});

	//Delete Customer ajax reqest
	$("body").on("click", ".userDeleteIcon", function(e){
		e.preventDefault();
		deleteCustomers_id = $(this).attr('id');
		Swal.fire({
		title: 'Êtes-vous sûr?',
		text: "Vous ne pourrez pas revenir en arrière !",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Oui, Supprimez-le !',
		cancelButtonText: "Annuler",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/admin-action.php',
					method: 'post',
					data: { deleteCustomers_id: deleteCustomers_id },
					success: function(response){
				    	Swal.fire(
				    		'Supprimé!',
				    		'compte Supprimé avec succès.',
				    		'success'
				    	)

				    	fetchAllCustomers();
					}
				});
			}
		});
	});

	//Add New customer Ajax Request
    $("#addNoteBtn").click(function (e) {
        if ($("#add-note-form")[0].checkValidity()) {
            e.preventDefault();
            $("#add-note-spinner").show();
            $.ajax({
                url: 'assets/php/admin-action.php',
                method: 'post',
                data: $("#add-note-form").serialize() + '&action=add_note',
                success: function (response) {
                    $("#add-note-spinner").hide();
                    $("#add-note-form")[0].reset();
                    $("#addNoteModal").modal('hide');
                    Swal.fire({
                        title: 'compte ajouté avec succès.',
                        icon: 'success'
                    });

                    fetchAllCustomers();
                }
            });
        }
    });

	//Edit customer Ajax Request
	$("body").on("click", ".editBtn", function(e){
		e.preventDefault();
		edit_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { edit_id: edit_id },
			success: function(response){
				data = JSON.parse(response);
				$("#id").val(data.id);
				$("#nom").val(data.username);
				$("#prenom").val(data.lastname);
				$("#phonenumber").val(data.tel);
				(data.gender && (data.gender == "M"))? $("#sexe").prop('checked', true) : $("#sexe1").prop('checked', true);
			}
		});
	});

	//Update customer Ajax Request
	$("#editNoteBtn").click(function(e){
		if ($("#edit-note-form")[0].checkValidity()) {
			e.preventDefault();
			$("#edit-note-spinner").show();
			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: $("#edit-note-form").serialize()+'&action=update_note',
				success: function(response){
					$("#edit-note-spinner").hide();
					$("#edit-note-form")[0].reset();
					$("#editNoteModal").modal('hide');
					Swal.fire({
						title: 'Modification avec succés.',
					    icon: 'success'
					});

					fetchAllCustomers();
				}
			});
		}
	});
});