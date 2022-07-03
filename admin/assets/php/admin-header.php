<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:index.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<?php
	$title = basename($_SERVER['PHP_SELF'], '.php');
	$title = explode('-', $title);
	$title = ucfirst($title[1]);
	if ($title == "Dashboard") {
		$title = "Tableau de bord";
	} elseif ($title == "Users") {
		$title = "Fournisseurs";
	} elseif ($title == "Desableduser") {
		$title = "Compte désactivé";
	} elseif ($title == "Status0") {
		$title = "Commande en attente";
	}
	?>
	<title>AWN - <?= $title; ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">

	<!-- Datatables CSS -->
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left">
				<a href="admin-dashboard.php" class="logo">
					<img src="assets/img/logo.png" alt="Logo">
				</a>
				<a href="admin-dashboard.php" class="logo logo-small">
					<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
				</a>
			</div>
			<!-- /Logo -->

			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->

			<!-- Header Right Menu -->
			<ul class="nav user-menu">

				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar.png" width="31" alt="admin"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profiles/avatar.png" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6>Salut, <?= $_SESSION['username']; ?></h6>
								<p class="text-muted mb-0">Administrateur</p>
							</div>
						</div>
						<a class="dropdown-item" href="assets/php/logout.php">Se déconnecter</a>
					</div>
				</li>
				<!-- /User Menu -->

			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php') ? "active" : ""; ?>">
							<a href="admin-dashboard.php"><i class="fe fe-home"></i> <span>Tableau de bord</span></a>
						</li>
						<?php if (basename($_SERVER['PHP_SELF']) == 'admin-users.php') { ?>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-users.php') ? "active" : ""; ?>">
								<a href="admin-users.php"><i class="fe fe-users"></i> <span>Comptes Fournisseurs</span></a>
							</li><?php } elseif (basename($_SERVER['PHP_SELF']) == 'admin-enableduser.php') { ?>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-enableduser.php') ? "active" : ""; ?>">
								<a href="admin-enableduser.php"><i class="fe fe-users"></i> <span>Compte activé</span></a>
							</li>
						<?php } elseif (basename($_SERVER['PHP_SELF']) == 'admin-newCustomer.php') { ?>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-newCustomer.php') ? "active" : ""; ?>">
								<a href="admin-newCustomer.php"><i class="fe fe-users"></i> <span>Nouveau Client</span></a>
							</li>
						<?php
								} elseif (basename($_SERVER['PHP_SELF']) == 'admin-customer.php') { ?>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-customer.php') ? "active" : ""; ?>">
								<a href="admin-customer.php"><i class="fe fe-users"></i> <span>Comptes Clients</span></a>
							</li>
						<?php
								} elseif (basename($_SERVER['PHP_SELF']) == 'admin-status0.php') { ?>
								<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-status0.php') ? "active" : ""; ?>">
								<a href="admin-status0.php"><i class="fe fe-users"></i> <span>Commandes en attente</span></a>
							</li>
							<?php } elseif (basename($_SERVER['PHP_SELF']) == 'admin-status1.php') { ?>
								<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-status1.php') ? "active" : ""; ?>">
								<a href="admin-status1.php"><i class="fe fe-users"></i> <span>Commandes accepté</span></a>
							</li> <?php } elseif (basename($_SERVER['PHP_SELF']) == 'admin-status-1.php') { ?>
								<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-status-1.php') ? "active" : ""; ?>">
								<a href="admin-status-1.php"><i class="fe fe-users"></i> <span>Commandes réjetté</span></a>
							</li> <?php } ?>
						<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-desableduser.php') ? "active" : ""; ?>">
							<a href="admin-desableduser.php"><i class="fe fe-user-minus"></i> <span>Compte désactivé</span></a>
						</li>
						<!-- <li> 
								<a href="assets/php/admin-action.php?export=excel"><i class="fe fe-table"></i> <span>Export Users</span></a>
							</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->