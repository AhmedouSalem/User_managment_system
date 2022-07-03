$(document).ready(function(){

	fetchNotification();
	//Fetch notification ajax request
	function fetchNotification() {
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchNotification' },
			success: function(response) {
				$("#showNotification").html(response);
			}
		});
	}

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

	//Remove notification ajax request
	$("body").on("click", ".close", function(e){
		e.preventDefault();
		notification_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { notification_id: notification_id },
			success: function(response) {
				fetchNotification();
				checkNotification();
			}
		});
	});

});