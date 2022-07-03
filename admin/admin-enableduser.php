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
									<h4 class="card-title">Nombre total de Fournisseur avec comptive activé</h4>
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
		<script  src="assets/js/script.js"></script>

		<script src="assets/php/js/activeaccount.js"></script>
		
    </body>
</html>