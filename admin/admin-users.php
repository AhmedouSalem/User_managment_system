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
						<li class="breadcrumb-item active">Fournisseurs</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Nombre total de fournisseur</h4>
						<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNoteModal"><i class="fa fa-plus-circle fa-lg"></i>&nbsp;Ajouter Un Fournisseur</a>
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
							<!-- <p id="getDob"></p> -->
							<p id="getGender"></p>
							<p id="getVerified"></p>
							<p id="getCreated"></p>
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

<!-- Start Add New Vendor Modal -->
<div class="modal fade" id="addNoteModal">
	<div class="modal-dialog modal-dialog-center">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title text-light">Ajouter un fournisseur</h4>
				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="#" method="post" id="add-note-form" class="px-3">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Entrer Votre nom" required>
					</div>
					<div class="form-group">
						<input type="text" name="lastname" class="form-control" placeholder="Entrer votre prénom" required>
					</div>
					<div class="form-group">
						<input type="tel" name="tel" class="form-control" placeholder="Entrer Votre numéro de téléphone" required>
					</div>
					<div class="form-group">
						<input type="radio" name="gender" value="M" checked required>Homme
						<input type="radio" name="gender" value="F" required>Femme
					</div>
					<div class="form-group">
						<select name="categorie" class="form-control">
							<option value="1">Plombier</option>
							<option value="2">Electriciens</option>
							<option value="3">Menuiser</option>
							<option value="4">Peindre</option>
						</select>
					</div>
					<div class="form-group">
						<textarea name="note" cols="30" class="form-control" rows="10" placeholder="description.."></textarea>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Entrer Votre mot de passe">
					</div>
					<div class="form-group">
						<input type="number" name="credit" class="form-control" id="credit" value="0">
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
<!-- End Add New Vendor Modal -->

<!-- Start Edit Vendor Modal -->
<div class="modal fade" id="editNoteModal">
	<div class="modal-dialog modal-dialog-center">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title text-light">Modifier</h4>
				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="#" method="post" id="edit-note-form" class="px-3">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<input type="text" id="nom" name="username" class="form-control" placeholder="Entrer Votre nom" required>
					</div>
					<div class="form-group">
						<input type="text" id="prenom" name="lastname" class="form-control" placeholder="Entrer votre prénom" required>
					</div>
					<div class="form-group">
						<input type="tel" id="phone" name="tel" class="form-control" placeholder="Entrer Votre numéro de téléphone" required>
					</div>
					<div class="form-group">
						<input type="radio" id="sexe" name="gender" value="M" required>Homme
						<input type="radio" id="sexe1" name="gender" value="F" required>Femme
					</div>
					<div class="form-group">
						<select name="categorie" id="categorie" class="form-control">
							<option value="1">Plombier</option>
							<option value="2">Electriciens</option>
							<option value="3">Peindre</option>
							<option value="4">Menuiser</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="creditt" id="credity" class="form-control">
					</div>
					<div class="form-group">
						<textarea name="note" id="note" cols="30" class="form-control" rows="10" placeholder="description.."></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="editNote" id="editNoteBtn" class="btn btn-block btn-info">Modifier&nbsp;
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-note-spinner"></span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Edit Vendor Modal -->

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

<script src="assets/php/js/users.js"></script>

</body>

</html>