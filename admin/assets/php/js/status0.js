$(document).ready(function () {

	fetchAllUsers();

	//fetch all users
	function fetchAllUsers() {
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchCommandeStatus0' },
			success: function (response) {
				$("#showAllUsers").html(response);
				if ($('.datatable').length > 0) {
					$('.datatable').DataTable({
						"bFilter": true,
						"order": [[0, "desc"]]
					});
				}
			}
		});
	}


	//Fetch user details
	$("body").on("click", ".userDetailsIcon", function (e) {
		e.preventDefault();
		detailsCommande_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { detailsCommande_id: detailsCommande_id },
			success: function (response) {
				data = JSON.parse(response);
				$("#getName").text(data.u_username + ' ' + data.u_lastname + ' ' + data.u_tel + '' + '(ID_Commande: ' + data.idc + ')');
				$("#getEmail").text('Service : ' + data.cat_name);
				$("#getPhone").text('Tel fournisseur : ' + data.u_tel);
				$("#getDob").text('Date de la commande : '+data.date_de_commande);
				$("#getGender").text('Nom Fournisseur : ' + data.a_username + ' ' + data.a_lastname);
				$("#getCreated").text('Description: ' + data.Commande);
				$("#getVerified").html('<a href="https://maps.google.com/maps?q='+data.latitude+','+data.longitude+'&hl=es;z=14&amp;output=embed" target="a_link"><strong>localisation</strong></a>');
				//text('Verified : '+data.verified);
				$("#getImage").html('<iframe src="https://maps.google.com/maps?q='+data.latitude+','+data.longitude+'&hl=es&z=14&amp;output=embed"  width="100%" height="400" iframeborder="0" name="a_link"></iframe>');
			}
		});
	});

	//Delete Commande
	$("body").on("click", ".userDeleteIcon", function (e) {
		e.preventDefault();
		deleteCommande_id = $(this).attr('id');
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
					data: { deleteCommande_id: deleteCommande_id },
					success: function (response) {
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
	//End Delete Commande

	//Add New commande Ajax Request
	$("body").on("click", ".Ahmedou", function () {
		$.getJSON("assets/php/commande-data.php", function(return_data){
			$.each(return_data.data, function(key,value){
				$("#telephone").append("<option value=" + value.id +">"+value.tel+"</option>");
				//$("#browsers").append("<option value="+ value.tel +">");
			});
		});
		$.getJSON("assets/php/datalist-data.php", function(return_data){
			$.each(return_data.data, function(key,value){
				//$("#telephone").append("<option value=" + value.id +">"+value.tel+"</option>");
				$("#browsers").append("<option value="+ value.id +">"+value.tel+"</option>");
			});
		});
	});

	//Change input
	$("#telephone").on('change', function (e) {
		e.preventDefault();
		//var optionSelected = $("option:selected", this);
		var valueSelected = this.value;
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { valueSelected: valueSelected },
			success: function (response) {
				data = JSON.parse(response);
				$("#id_fou").val(data.id);
				$("#nomf").val(data.username);
				$("#prenomf").val(data.lastname);
				(data.img && data.img != null) ? $("#photof").attr("src", "../assets/php/"+data.img) : $("#photof").attr("src", "../assets/img/profiles/avatar.png");
			}
		})
	});//browsers

	$("#addNoteBtn").click(function (e) {
		if ($("#add-note-form")[0].checkValidity()) {
			e.preventDefault();
			$("#add-note-spinner").show();
			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: $("#add-note-form").serialize() + '&action=add_commande',
				success: function (response) {
					$("#add-note-spinner").hide();
					$("#add-note-form")[0].reset();
					$("#addNoteModal").modal('hide');
					Swal.fire({
						title: 'Commande ajoutée avec succès.',
						icon: 'success'
					});

					fetchAllUsers();
				}
			});
		}
	});

	//End add new commande ajax request

	//Edit Commande of an vendor Ajax Request
	$("body").on("click", ".editBtn", function (e) {
		e.preventDefault();
		editCommande0_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { editCommande0_id: editCommande0_id },
			success: function (response) {
				data = JSON.parse(response);
				$("#id").val(data.idc);
				$("#nom").val(data.a_username);
				$("#prenom").val(data.a_lastname);
				$("#phone").val(data.a_tel);
				$("#id_f").val(data.id_fourniseur);
				(data.a_img && data.a_img!=null) ? $("#photo").attr("src", "../assets/php/"+data.a_img) : $("#photo").attr("src", "../assets/img/profiles/avatar.png");
				$("#tel").append("<option value=" + data.id_fourniseur +" selected>"+data.a_tel+"</option>");
				$.getJSON("assets/php/commande-data.php", function(return_data){
					$.each(return_data.data, function(key,value){
						$("#tel").append("<option value=" + value.id +">"+value.tel+"</option>");
					});
				});
			}
		});
	});

	//Change select
	$("#tel").on('change', function (e) {
		e.preventDefault();
		var optionSelected = $("option:selected", this);
		var valueSelected = this.value;
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { valueSelected: valueSelected },
			success: function (response) {
				data = JSON.parse(response);
				$("#id_f").val(data.id);
				$("#nom").val(data.username);
				$("#prenom").val(data.lastname);
				(data.img && data.img != null) ? $("#photo").attr("src", "../assets/php/"+data.img) : $("#photo").attr("src", "../assets/img/profiles/avatar.png");
			}
		})
	});
	
	//Update Commande Ajax Request
	$("#editNoteBtn").click(function (e) {
		if ($("#edit-note-form")[0].checkValidity()) {
			e.preventDefault();
			$("#edit-note-spinner").show();
			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: $("#edit-note-form").serialize() + '&action=update_commande0',
				success: function (response) {
					$("#edit-note-spinner").hide();
					$("#edit-note-form")[0].reset();
					$("#editNoteModal").modal('hide');
					Swal.fire({
						title: 'Modification avec succés.',
						icon: 'success'
					});

					fetchAllUsers();
				}
			});
		}
	});
});