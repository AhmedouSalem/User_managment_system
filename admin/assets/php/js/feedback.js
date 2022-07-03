$(document).ready(function(){
	
	fetchAllFeedback();

	//fetch all feddback of an users
	function fetchAllFeedback(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllFeedback' },
			success: function(response){
				$("#showAllFeedback").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}

	//Get the current row FID & UID
	var uid;
	var fid;

	$("body").on("click", ".replyFeedbackIcon", function(e){
		uid = $(this).attr('id');
		fid = $(this).attr('fid');
	});

	//Send Feedback Reply to User Ajax Reqest
	$("#feedbackReplyBtn").click(function(e){
		if ($("#feedback-reply-form")[0].checkValidity()) {
			let message = $("#message").val();
			e.preventDefault();
			$("#feedback-reply-spinner").show();
			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: { uid: uid, message: message, fid: fid },
				success:function(response){
					$("#feedback-reply-spinner").hide();
					$("#showReplyModal").modal('hide');
					$("#feedback-reply-form")[0].reset();
					Swal.fire(
			    		'Sent!',
			    		'Reply Sent Successfully to User.',
			    		'success'
			    	)
			    	fetchAllFeedback();
				}
			});
		}
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