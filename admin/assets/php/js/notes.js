$(document).ready(function(){
	
	fetchAllNotes();

	//fetch all users notes
	function fetchAllNotes(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllNotes' },
			success: function(response){
				$("#showAllNotes").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}

	//Delete user note ajax reqest
	$("body").on("click", ".deleteNoteIcon", function(e){
		e.preventDefault();
		note_id = $(this).attr('id');
		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/admin-action.php',
					method: 'post',
					data: { note_id: note_id },
					success: function(response){
				    	Swal.fire(
				    		'Deleted!',
				    		'Note Deleted Successfully.',
				    		'success'
				    	)

				    	fetchAllNotes();
					}
				});
			}
		});
	});

	//check notification ajax request
	checkNotification();
	function checkNotification() {
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'checkNotification' },
			success: function(response) {
				$("#checkNotification").html(response);
			}
		});
	}
});