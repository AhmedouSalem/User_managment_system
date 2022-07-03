<?php
require_once 'assets/php/admin-header.php';
require_once 'assets/php/admin-db.php';
$count = new Admin();
?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item active">Tableau de bord</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xl-3 col-sm-4 col-12">
						<!-- <a href="admin-users.php"> -->
						<div class="card">
							<div class="card-header lead text-center text-primary">Nombre total d'utilisateurs</div>
							<div class="card-body">
								<h1 class="display-4 text-center text-primary"><?= $count->totalCount("admin") + $count->totalCount("users"); ?></h1>
							</div>
						</div>
						<!-- </a> -->
					</div>
					<div class="col-xl-3 col-sm-4 col-12">
						<a href="admin-users.php">
							<div class="card">
								<div class="card-header lead text-center text-warning">Nombre de fournisseur</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-warning"><?= $count->totalCount("admin"); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-3 col-sm-4 col-12">
						<a href="admin-customer.php">
							<div class="card">
								<div class="card-header lead text-center text-danger">Nombre de client</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-danger"><?= $count->totalCount("users"); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-3 col-sm-4 col-12">
						<a href="admin-newCustomer.php">
							<div class="card">
								<div class="card-header lead text-center text-success">Nouveau Client</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-success"><?= $count->NewCount("users"); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-4 col-sm-4 col-12">
						<a href="admin-enableduser.php">
							<div class="card">
								<div class="card-header lead text-center text-secondary">Compte activé</div>
								<div class="card-body ">
									<h1 class="display-4 text-center text-secondary"><?= $count->test_account("admin", "bool", '1'); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-4 col-sm-4 col-12">
						<a href="admin-desableduser.php">
							<div class="card">
								<div class="card-header lead text-center text-info">Compte désactivé</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-info"><?php echo $count->totalCount("admin") - $count->test_account("admin", "bool", '1'); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-4 col-sm-4 col-12">
						<a href="admin-status0.php">
							<div class="card">
								<div class="card-header lead text-center text-dark">Commande en attente</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-dark"><?= $count->test_account("commande", "stutus", '0'); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-6 col-sm-4 col-12">
						<a href="admin-status1.php">
							<div class="card">
								<div class="card-header lead text-center text-dark">Commande accepté</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-dark"><?= $count->test_account("commande", "stutus", '1'); ?></h1>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-6 col-sm-4 col-12">
						<a href="admin-status-1.php">
							<div class="card">
								<div class="card-header lead text-center text-dark">Commande rejeté</div>
								<div class="card-body">
									<h1 class="display-4 text-center text-dark"><?= $count->test_account("commande", "stutus", '-1'); ?></h1>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</body>

</html>