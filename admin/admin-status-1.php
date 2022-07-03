<?php require_once 'assets/php/admin-header.php'; ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="admin-dashboard.php">Tableau de bord</a></li>
						<li class="breadcrumb-item active">Commande rejeté</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Nombre Des Commandes rejetées</h4>
						<a href="#" class="btn btn-primary float-right Ahmedou" data-toggle="modal" data-target="#addNoteModal"><i class="fa fa-plus-circle fa-lg"></i>&nbsp;Ajouter Une Commande</a>
					</div>
					<div class="card-body">

						<div class="table-responsive" id="showAllUsers">
							<h4 class="text-center text-lead mt-2">S'il vous plaît, attendez...</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<div class="modal fade" id="showUserDetailsModal">
	<div class="modal-dialog modal-dialog-centered mw-100 w-50">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="getName"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="card-deck">
					<div class="card border-primary">
						<div class="card-body">
							<p id="getEmail"></p>
							<p id="getPhone"></p>
							<p id="getGender"></p>
							<p id="getDob"></p>
							<p id="getCreated"></p>
							<p id="getVerified"></p>
							<!-- <p id="getAddress"></p> -->
						</div>
					</div>
					<div class="card align-self-center" id="getImage"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<!-- Start Add New Commande Modal -->
<div class="modal fade" id="addNoteModal">
	<div class="modal-dialog modal-dialog-center">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title text-light">Ajouter Une Commande</h4>
				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="#" method="post" id="add-note-form" class="px-3">
				<span class="user-img">
						<img class="rounded-circle" alt="User Image" id="photof" width="31" src="<?= '../assets/img/profiles/avatar.png' ?>">
					</span>
					<input type="hidden" name="id">
					<div class="form-group">
						<label for="id_fou">ID_F :</label>
						<input type="number" name="id_f" id="id_fou" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="nomf">Nom_F :</label>
						<input type="text" name="username" id="nomf" class="form-control" placeholder="Entrer Votre nom" disabled required>
					</div>
					<div class="form-group">
						<label for="prenomf">Prenom_F :</label>
						<input type="text" name="lastname" id="prenomf" class="form-control" placeholder="Entrer votre prénom" disabled required>
					</div>
					<div class="form-group">
						<label for="telephone">Tel fournisseur : </label>
						<select name="telephone" id="telephone" class="form-control" required>
							<option value="">Numéro de fournisseur</option>
						</select>
					</div>
					<div class="form-group">
						<label for="num_user">
							Numéro de client
						</label>
						<input type="number" list="browsers" name="num_user" id="num_user" class="form-control" required>
						<datalist id="browsers">
						</datalist>
					</div>
					<div class="form-group">
						<label for="note">Description :</label>
						<textarea name="note" id="note" cols="30" rows="10" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="addNote" id="addNoteBtn" class="btn btn-block btn-info">Ajouter&nbsp;
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="add-note-spinner"></span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Add New Commande Modal -->

<!-- Start Edit Commande Modal -->
<div class="modal fade" id="editNoteModal">
	<div class="modal-dialog modal-dialog-center">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title text-light">Réorienté la commande</h4>
				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="#" method="post" id="edit-note-form" class="px-3">
					<span class="user-img">
						<img class="rounded-circle" alt="User Image" id="photo" width="31" src="<?= '../assets/img/profiles/avatar.png' ?>">
					</span>
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="id_f">ID Fournisseur :</label>
						<input type="number" name="id_f" id="id_f" class="form-control" disabled>
					</div>
					<div class="form-group">
						<label for="nom">Nom Fournisseur :</label>
						<input type="text" id="nom" name="username" disabled class="form-control" placeholder="Entrer Votre nom" required>
					</div>
					<div class="form-group">
						<label for="prenom">Prénom Fournisseur :</label>
						<input type="text" id="prenom" name="lastname" disabled class="form-control" placeholder="Entrer votre prénom" required>
					</div>
					<!-- <div class="form-group">
						<input type="tel" id="phone" name="tel" class="form-control" placeholder="Entrer Votre numéro de téléphone" required>
					</div> -->
					<!-- <div class="form-group">
						<input type="radio" id="sexe" name="gender" value="male" required>Homme
						<input type="radio" id="sex1" name="gender" value="female" required>Femme
					</div> -->
					<div class="form-group">
						<label for="tel">Tel Fournisseur : </label>
						<select name="tel" id="tel" class="form-control" required>
							<option value="">Numéro de fournisseur</option>
						</select>
					</div>
					<!-- <div class="form-group">
						<textarea name="note" id="note" cols="30" class="form-control" rows="10" placeholder="description.."></textarea>
					</div> -->
					<div class="form-group">
						<button type="submit" name="editNote" id="editNoteBtn" class="btn btn-block btn-info">Réorienté&nbsp;
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-note-spinner"></span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Commande Modal -->

<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Datatables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

<script src="assets/php/js/status-1.js"></script>

</body>

</html>