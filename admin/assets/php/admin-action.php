<?php

require_once 'admin-db.php';

$admin = new Admin();
session_start();

//Handle Admin Login Ajax Request
if (isset($_POST['action']) && $_POST['action'] == 'adminLogin') {
	$username = $admin->test_input($_POST['username']);
	$password = $admin->test_input($_POST['password']);
	$hpassword = sha1($password);

	$loggedInAdmin = $admin->admin_login($username, $hpassword);

	if ($loggedInAdmin != null) {
		echo 'admin_login';
		$_SESSION['username'] = $username;
	} else {
		echo $admin->showMessage('danger', 'Votre Nom ou Mot de passe est incorrect.');
	}
}

//Handle Fetch all vendor ajax request
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers') {
	$output = '';
	$data = $admin->fetchAllUsers();
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Image</th>
									<th>Nom</th>
									<th>Catégorie</th>
									<th>Tel</th>
									<th>Genre</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			if ($row['img'] != '') {
				$uphoto = $path . $row['img'];
			} else {
				$uphoto = '../assets/img/profiles/avatar.png';
			}

			$row['bool'] ?$output .= '
								<tr>
									<td>' . $row['id'] . '</td>
									<td><img class="avatar-img rounded-circle" src="' . $uphoto . '" width="30"></td>
									<td>' . $row['username'] . " " . $row['lastname'] . '</td>
									<td>' . $row['cat_name'] . '</td>
									<td>' . $row['tel'] . '</td>
									<td>' . $row['gender'] . '</td>
									<td>' . $row['des'] . '</td>
									<td>
										<a href="#" id="' . $row['id'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Modifier" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Desactivé le compte" class="text-danger userDeleteIcon"><i class="fa fa-ban"></i></a>
									</td>
								</tr>'
								: $output .= '
								<tr>
									<td>' . $row['id'] . '</td>
									<td><img class="avatar-img rounded-circle" src="' . $uphoto . '" width="30"></td>
									<td>' . $row['username'] . " " . $row['lastname'] . '</td>
									<td>' . $row['cat_name'] . '</td>
									<td>' . $row['tel'] . '</td>
									<td>' . $row['gender'] . '</td>
									<td>' . $row['des'] . '</td>
									<td>
										<a href="#" id="' . $row['id'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Modifier" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Compte n'a été trouvé!</h3>";
	}
}

//Handle Fetch all Customers ajax request
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllCustomers') {
	$output = '';
	$data = $admin->fetchAllCustomers();
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Image</th>
									<th>Nom</th>
									<th>Tel</th>
									<th>Genre</th>
									<th>Date de création</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			if ($row['img'] != '') {
				$uphoto = $path . $row['img'];
			} else {
				$uphoto = '../assets/img/profiles/avatar.png';
			}

			$output .= '
								<tr>
									<td>' . $row['id'] . '</td>
									<td><img class="avatar-img rounded-circle" src="' . $uphoto . '" width="30"></td>
									<td>' . $row['username'] . " " . $row['lastname'] . '</td>
									<td>' . $row['tel'] . '</td>
									<td>' . $row['gender'] . '</td>
									<td>' . $row['date'] . '</td>
									<td>
										<a href="#" id="' . $row['id'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Modifier" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Supprimer" class="text-danger userDeleteIcon"><i class="fa fa-trash"></i></a>
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Compte n'a été trouvé!!</h3>";
	}
}

//Handle Fetch all vendor account active ajax request
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers1') {
	$output = '';
	$data = $admin->fetchAllUsers1(1);
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Image</th>
									<th>Nom</th>
									<th>Catégorie</th>
									<th>Tel</th>
									<th>Genre</th>
									<th>description</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			if ($row['img'] != '') {
				$uphoto = $path . $row['img'];
			} else {
				$uphoto = '../assets/img/profiles/avatar.png';
			}

			$output .= '
								<tr>
									<td>' . $row['id'] . '</td>
									<td><img class="avatar-img rounded-circle" src="' . $uphoto . '" width="30"></td>
									<td>' . $row['username'] . " " . $row['lastname'] . '</td>
									<td>' . $row['cat_name'] . '</td>
									<td>' . $row['tel'] . '</td>
									<td>' . $row['gender'] . '</td>
									<td>' . $row['des'] . '</td>
									<td>
										<a href="#" id="' . $row['id'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Desactivé le compte" class="text-danger userDeleteIcon"><i class="fa fa-ban"></i></a>
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Compte n'a été trouvé!</h3>";
	}
}

//Handle Fetch all New Customers ajax request
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllNewCustomers') {
	$output = '';
	$data = $admin->fetchAllNewCustomers("users");
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Image</th>
									<th>Nom</th>
									<th>Tel</th>
									<th>Genre</th>
									<th>Date de création</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			if ($row['img'] != '') {
				$uphoto = $path . $row['img'];
			} else {
				$uphoto = '../assets/img/profiles/avatar.png';
			}

			$output .= '
								<tr>
									<td>' . $row['id'] . '</td>
									<td><img class="avatar-img rounded-circle" src="' . $uphoto . '" width="30"></td>
									<td>' . $row['username'] . " " . $row['lastname'] . '</td>
									<td>' . $row['tel'] . '</td>
									<td>' . $row['gender'] . '</td>
									<td>' . $row['date'] . '</td>
									<td>
										<a href="#" id="' . $row['id'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Modifier" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['id'] . '" title="Supprimer" class="text-danger userDeleteIcon"><i class="fa fa-trash"></i></a>
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Compte n'a été trouvé!</h3>";
	}
}

//Handle show all deleted user ajax request
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers') {
	$output = '';
	$data = $admin->fetchAllUsers1(0);
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
								    <th>#</th>
								    <th>Image</th>
								    <th>Nom</th>
								    <th>Catégorie</th>
								    <th>Tel</th>
								    <th>Genre</th>
								    <th>description</th>
								    <th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			if ($row['img'] != '') {
				$uphoto = $path . $row['img'];
			} else {
				$uphoto = '../assets/img/profiles/avatar.png';
			}

			$output .= '
								<tr>
								<td>' . $row['id'] . '</td>
								<td><img class="avatar-img rounded-circle" src="' . $uphoto . '" width="30"></td>
								<td>' . $row['username'] . " " . $row['lastname'] . '</td>
								<td>' . $row['cat_name'] . '</td>
								<td>' . $row['tel'] . '</td>
								<td>' . $row['gender'] . '</td>
								<td>' . $row['des'] . '</td>
									<td>
										<a href="#" id="' . $row['id'] . '" title="Activé le compte" class="text-white badge badge-success restoreUserIcon">Activé le compte</a>
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Aucun compte d'utilisateur n'a encore été désactivé!</h3>";
	}
}

//Handle fetch all commande where status == 0
if (isset($_POST['action']) && $_POST['action'] == 'fetchCommandeStatus0') {
	$output = '';
	$data = $admin->fetchCommandeStatus0('0');
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom fournisseur</th>
									<th>Numéro de fournisseur</th>
									<th>Nom client</th>
									<th>Numéro de Client</th>
									<th>Date de la commande</th>
									<th>Descritpion</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			// if ($row['img'] != '') {
			// 	$uphoto = $path . $row['img'];
			// } else {
			// 	$uphoto = '../assets/img/profiles/avatar.png';
			// }

			$output .= '
								<tr>
									<td>' . $row['idc'] . '</td>
									<td>' .$row['a_username']." ". $row['a_lastname'].'</td>
									<td>' . $row['a_tel'] . '</td>
									<td>' . $row['u_username'] . " " . $row['u_lastname'] . '</td>
									<td>' . $row['u_tel'] . '</td>
									<td>' . $row['date_de_commande'] . '</td>
									<td>' .$row['Commande'].'</td>
									<td>
										<a href="#" id="' . $row['idc'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['idc'] . '" title="Réorienté" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['idc'] . '" title="Suspendre" class="text-danger userDeleteIcon"><i class="fa fa-trash"></i></a>
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Commande n'a été trouvé!</h3>";
	}
}

//Handle fetch all commande where status == 1
if (isset($_POST['action']) && $_POST['action'] == 'fetchCommandeStatus1') {
	$output = '';
	$data = $admin->fetchCommandeStatus0('1');
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom fournisseur</th>
									<th>Numéro de fournisseur</th>
									<th>Nom client</th>
									<th>Numéro de Client</th>
									<th>Date de la commande</th>
									<th>Descritpion</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			// if ($row['img'] != '') {
			// 	$uphoto = $path . $row['img'];
			// } else {
			// 	$uphoto = '../assets/img/profiles/avatar.png';
			// }

			$output .= '
								<tr>
									<td>' . $row['idc'] . '</td>
									<td>' .$row['a_username']." ". $row['a_lastname'].'</td>
									<td>' . $row['a_tel'] . '</td>
									<td>' . $row['u_username'] . " " . $row['u_lastname'] . '</td>
									<td>' . $row['u_tel'] . '</td>
									<td>' . $row['date_de_commande'] . '</td>
									<td>' .$row['Commande'].'</td>
									<td>
										<a href="#" id="' . $row['idc'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['idc'] . '" title="Modifier" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Commande n'a été trouvé!</h3>";
	}
}

//Handle fetch all commande where status == -1
if (isset($_POST['action']) && $_POST['action'] == 'fetchCommandeStatus-1') {
	$output = '';
	$data = $admin->fetchCommandeStatus0('-1');
	$path = '../assets/php/';

	if ($data) {
		$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom fournisseur</th>
									<th>Numéro de fournisseur</th>
									<th>Nom client</th>
									<th>Numéro de Client</th>
									<th>Date de la commande</th>
									<th>Descritpion</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
		foreach ($data as $row) {
			// if ($row['img'] != '') {
			// 	$uphoto = $path . $row['img'];
			// } else {
			// 	$uphoto = '../assets/img/profiles/avatar.png';
			// }

			$output .= '
								<tr>
									<td>' . $row['idc'] . '</td>
									<td>' .$row['a_username']." ". $row['a_lastname'].'</td>
									<td>' . $row['a_tel'] . '</td>
									<td>' . $row['u_username'] . " " . $row['u_lastname'] . '</td>
									<td>' . $row['u_tel'] . '</td>
									<td>' . $row['date_de_commande'] . '</td>
									<td>' .$row['Commande'].'</td>
									<td>
										<a href="#" id="' . $row['idc'] . '" title="Voir les détails" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['idc'] . '" title="Réorienté" class="text-primary editBtn" data-toggle="modal" data-target="#editNoteModal"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="' . $row['idc'] . '" title="Suspendre" class="text-danger userDeleteIcon"><i class="fa fa-trash"></i></a>
									</td>
								</tr>';
		}
		$output .= '
							</tbody>
						</table>';
		echo $output;
	} else {
		echo "<h3 class='text-center text-secondary'>:( Auccune Commande n'a été trouvé!</h3>";
	}
}

//Handle Deleted User Restore rwquest
if (isset($_POST['restore_id'])) {
	$id = $_POST['restore_id'];
	$admin->userAction($id, 1);
}

//Handle view user ajax request
if (isset($_POST['details_id'])) {
	$id = $_POST['details_id'];
	$data = $admin->fetchUserDetailsById($id);
	echo json_encode($data);
}

//Handle view commande ajax request 
if (isset($_POST['detailsCommande_id'])) {
	$id = $_POST['detailsCommande_id'];
	$data = $admin->CommandeDetails0($id, '0');
	echo json_encode($data);
}

// Handle view commande ajax request 
if (isset($_POST['detailsCommande1_id'])) {
	$id = $_POST['detailsCommande1_id'];
	$data = $admin->CommandeDetails0($id, '1');
	echo json_encode($data);
}

// Handle view commande ajax request 
if (isset($_POST['detailsCommande_1_id'])) {
	$id = $_POST['detailsCommande_1_id'];
	$data = $admin->CommandeDetails0($id, '-1');
	echo json_encode($data);
}

//Handle view customer ajax request 
if (isset($_POST['detailsCustomer_id'])) {
	$id = $_POST['detailsCustomer_id'];
	$data = $admin->fetchCustomerDetailsById($id);
	echo json_encode($data);
}

// Handle view new customer
if (isset($_POST['detailsNewCustomer_id'])) {
	$id = $_POST['detailsNewCustomer_id'];
	$data = $admin->fetchCustomerDetailsById($id);
	echo json_encode($data);
}

//Handle delete user ajax request
if (isset($_POST['delete_id'])) {
	$id = $_POST['delete_id'];
	$admin->userAction($id, 0);
}

//Handle delete customer ajax request
if (isset($_POST['deleteCustomers_id'])) {
	$id = $_POST['deleteCustomers_id'];
	$admin->customerAction($id);
}

//Handle Add New customer Ajax Request
if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
	$username = $admin->test_input($_POST['username']);
	$lastname = $admin->test_input($_POST['lastname']);
	$tel = $admin->test_input($_POST['tel']);
	$gender = $admin->test_input($_POST['gender']);
	$password = $admin->test_input($_POST['password']);
	$dpassword = md5($password);
	
	$admin->add_new_user($username, $lastname, $tel, $gender,$dpassword);
	//vendor
}

//Handle Add New vendor Ajax Request
if (isset($_POST['action']) && $_POST['action'] == 'add_vendor') {
	$username = $admin->test_input($_POST['username']);
	$lastname = $admin->test_input($_POST['lastname']);
	$tel = $admin->test_input($_POST['tel']);
	$password = $admin->test_input($_POST['password']);
	$dpassword = md5($password);
	$categorie = $admin->test_input($_POST['categorie']);
	$note = $admin->test_input($_POST['note']);
	$gender = $admin->test_input($_POST['gender']);
	$credit = $admin->test_input($_POST['credit']);
	
	$admin->add_new_vendor($username, $lastname, $tel,$dpassword, $categorie, $note, $gender, $credit);
}

//fetch user info for update it
if (isset($_POST['edit_id'])) {
	$id = $_POST['edit_id'];
	$row = $admin->edit_table($id, "users");
	echo json_encode($row);
}

// fetch vendor info for update it 
if (isset($_POST['editVendor_id'])) {
	$id = $_POST['editVendor_id'];
	$row = $admin->edit_table($id, "admin");
	echo json_encode($row);
}

// fetch commande info for update it status = 0 
if (isset($_POST['editCommande0_id'])) {
	$id = $_POST['editCommande0_id'];
	$row = $admin->editCommande0($id,"0");
	echo json_encode($row);
}

// fetch commande info for update it status = 1 
if (isset($_POST['editCommande1_id'])) {
	$id = $_POST['editCommande1_id'];
	$row = $admin->editCommande0($id,"1");
	echo json_encode($row);
}

// fetch commande info for update it status = -1
if (isset($_POST['editCommande_1_id'])) {
	$id = $_POST['editCommande_1_id'];
	$row = $admin->editCommande0($id,"-1");
	echo json_encode($row);
}

//Change select 
if (isset($_POST['valueSelected'])) {
	$id = $_POST['valueSelected'];
	$row = $admin->fetchUserDetailsById($id);
	echo json_encode($row);
}
//Handle Update users of user Ajax Request
if (isset($_POST['action']) && $_POST['action'] == 'update_note') {
	$id = $admin->test_input($_POST['id']);
	$username = $admin->test_input($_POST['username']);
	$lastname = $admin->test_input($_POST['lastname']);
	$tel = $admin->test_input($_POST['tel']);
	$gender = $admin->test_input($_POST['gender']);

	$admin->update_customer($id,$username, $lastname, $tel, $gender);
}

//Handle Update vendor of vendor ajax request
if (isset($_POST['action']) && $_POST['action'] == 'update_Vendor') {
	$id = $admin->test_input($_POST['id']);
	$username = $admin->test_input($_POST['username']);
	$lastname = $admin->test_input($_POST['lastname']);
	$tel = $admin->test_input($_POST['tel']);
	$categorie = $admin->test_input($_POST['categorie']);
	$note = $admin->test_input($_POST['note']);
	$gender = $admin->test_input($_POST['gender']);
	$credit = $admin->test_input($_POST['creditt']);

	$admin->update_vendor($id,$username, $lastname, $tel,$categorie,$note, $gender, $credit);
}

//Handle Update Commande 1 and 0
if (isset($_POST['action']) && $_POST['action'] == 'update_commande0') {
	$id = $admin->test_input($_POST['id']);
	$tel = $admin->test_input($_POST['tel']);
	$admin->update_commande($id,$tel,"0");
}

//Handle Update Commande -1 
if (isset($_POST['action']) && $_POST['action'] == 'update_commande1') {
	$id = $admin->test_input($_POST['id']);
	$tel = $admin->test_input($_POST['tel']);
	$admin->update_commande($id,$tel,"0");
}

//ADD New Commande
if (isset($_POST['action']) && $_POST['action'] == 'add_commande') {
	$id_f = $admin->test_input($_POST['telephone']);
	$num_user = $admin->test_input($_POST['num_user']);
	//$userId = $admin->num_user_select($num_user);
	$des = $admin->test_input($_POST['note']);
	$admin->add_commande($id_f,$num_user,$des);
}

//Delete Commande
if (isset($_POST['deleteCommande_id'])) {
	$id = $_POST['deleteCommande_id'];
	$admin->CommandeAction($id);
}