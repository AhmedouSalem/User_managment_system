$(document).ready(function(){
	$("#adminLoginBtn").click(function(e){
		if($("#admin-login-form")[0].checkValidity()){
			e.preventDefault();
			$("#admin-login-spinner").show();
			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: $("#admin-login-form").serialize()+'&action=adminLogin',
				success: function(response){
					if (response === 'admin_login') {
						window.location = 'admin-dashboard.php';
					} else {
						$("#adminLoginAlert").html(response);
						$("#admin-login-spinner").hide();
					}
				}
			});
		}
	});
});