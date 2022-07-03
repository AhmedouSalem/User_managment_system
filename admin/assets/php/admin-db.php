<?php 

	require_once 'config.php';

	class Admin extends Database
	{
		//Admin Login
		public function admin_login($username, $password){
			$sql = "SELECT username, `password` FROM `administrator` WHERE username = :username AND password = :password";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['username'=>$username, 'password'=>$password]);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}

		//count Total No. of Rows
		public function totalCount($tablename){
			$sql = "SELECT * FROM $tablename";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$count = $stmt->rowCount();
			return $count;
		}

		//count new user
		
		public function NewCount($tablename){
			$sql = "SELECT * FROM $tablename WHERE `date` BETWEEN NOW() - INTERVAL 3 MONTH AND NOW()";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$count = $stmt->rowCount();
			return $count;
		}

		// Fetch new customer 
		public function fetchAllNewCustomers($tablename)
		{
			$sql = "SELECT * FROM $tablename WHERE `date` BETWEEN NOW() - INTERVAL 3 MONTH AND NOW()";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(); 
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		//admin, bool, 1
		//test account
		public function test_account($tablename, $column, $val){
			$sql = "SELECT * FROM $tablename WHERE $column = $val ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$count = $stmt->rowCount();
			return $count;
		}

		//Fetch All Registred admin
		public function fetchAllUsers(){
			$sql = "SELECT `a`.`id`, `a`.`username`, `a`.`lastname`, `a`.`tel`, `a`.`password`, `a`.`id_cat`, `a`.`des`, `a`.`img`, `a`.`bool`, `a`.`gender`,
			`c`.`cat_id`, `c`.`cat_name` FROM `admin` as `a`, `categories` as `c` WHERE `a`.`id_cat`=`c`.`cat_id`";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		
		//Fetch All Registred users
		public function fetchAllCustomers()
		{
			$sql = "SELECT * FROM users ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		// fetch all enabled or desabled admin
		public function fetchAllUsers1($val){
			$sql = "SELECT `a`.`id`, `a`.`username`, `a`.`lastname`, `a`.`tel`, `a`.`password`, `a`.`id_cat`, `a`.`des`, `a`.`img`, `a`.`bool`, `a`.`gender`,
			`c`.`cat_id`, `c`.`cat_name` FROM `admin` as `a`, `categories` as `c` WHERE `a`.`id_cat`=`c`.`cat_id` AND `bool` = $val";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		//Fetch user details by ID
		public function fetchUserDetailsById($id){
			$sql = "SELECT `a`.`id`, `a`.`username`, `a`.`lastname`, `a`.`tel`, `a`.`password`, `a`.`id_cat`, `a`.`des`, `a`.`img`, `a`.`bool`, `a`.`gender`,`a`.`date`,
			`c`.`cat_id`, `c`.`cat_name` FROM `admin` as `a`, `categories` as `c` WHERE id = :id AND `a`.`id_cat`=`c`.`cat_id`";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		//Fetch Customers details by ID
		public function fetchCustomerDetailsById($id){
			$sql = "SELECT * FROM `users` WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		//Delete User
		public function userAction($id, $val){
			$sql = "UPDATE `admin` SET bool = $val WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			return true;
		}

		//Delete Customer 
		public function customerAction($id)
		{
			$sql = "DELETE FROM `commande` WHERE `id_user` = :id;
			        DELETE FROM `dislike` WHERE `user_id` = :id;
			        DELETE FROM `favorite` WHERE `user_id` = :id;
			        DELETE FROM `likes` WHERE `user_id` = :id;
			        DELETE FROM `users` WHERE `id` = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			return true;
		}

		//ADD CUSTOMER 
		public function add_new_user($username, $lastname, $tel, $gender,$password)
		{
			$sql = "INSERT INTO `users` (`username`, `lastname`, `tel`, `password`,`gender`, `date`)
			 VALUES (:username, :lastname, :tel, :password, :gender, :date_state)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['username'=>$username, 'lastname'=>$lastname, 'tel'=>$tel, 'password'=>$password, 'gender'=>$gender, 'date_state'=>date("Y-m-d")]);
			return true;
		}
		
		//ADD Vendor
		public function add_new_vendor($username, $lastname, $tel,$dpassword, $categorie, $note, $gender,$credit)
		{
			$sql = "INSERT INTO `admin` (`username`, `lastname`, `tel`, `password`, `id_cat`, `des`, `gender`, `date`, `credit`)
			 VALUES (:username, :lastname, :tel, :dpassword, :categorie_id, :note, :gender, :date_state, :credit)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['username'=>$username, 'lastname'=>$lastname, 'tel'=>$tel, 'dpassword'=>$dpassword,'categorie_id'=>$categorie,'note'=>$note, 'gender'=>$gender, 'date_state'=>date("Y-m-d"),'credit'=>$credit]);
			return true;
		}

		//customer info
		public function edit_table($id,$tablename){
			$sql = "SELECT * FROM $tablename WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
		}

		//Update customer of an user
		public function update_customer($id,$username, $lastname, $tel, $gender){
			$sql = "UPDATE `users` SET `username` = :username, `lastname` = :lastname, `tel` = :tel, `gender` = :gender WHERE `id` = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['username'=>$username, 'lastname'=>$lastname, 'tel'=>$tel, 'gender'=>$gender, 'id'=>$id]);
			return true;
		}

		//update vendor
		public function update_vendor($id,$username, $lastname, $tel,$categorie,$note, $gender, $credit)
		{
			$sql = "UPDATE `admin` SET `username` = :username, `lastname` = :lastname, `tel` = :tel, `id_cat` = :id_cat, `des` = :descriptions, `gender` = :gender, `credit` = :credit WHERE `id` = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['username'=>$username, 'lastname'=>$lastname, 'tel'=>$tel,'id_cat'=>$categorie, 'descriptions'=>$note , 'gender'=>$gender, 'credit'=>$credit,'id'=>$id]);
			return true;
		}

		//Fetch Commande when the status == 0
		public function fetchCommandeStatus0 ($status)
		{
			$sql = "SELECT `c`.`idc`, `c`.`Commande`, `c`.`id_fourniseur`, `c`.`id_user`, `c`.`date_de_commande`, `c`.`longitude`, `c`.`stutus`, `c`.`latitude`, `a`.`tel` a_tel, `u`.`tel` u_tel, `a`.`id_cat`,`cat`.`cat_name`,
			`a`.`username` a_username, `a`.`lastname` a_lastname,`u`.`username` u_username, `u`.`lastname` u_lastname  FROM `commande` AS `c`, `users` AS `u`, `admin` AS `a`, `categories` AS `cat` WHERE (`c`.`id_fourniseur` = `a`.`id` AND `c`.`id_user` = `u`.`id` AND `a`.`id_cat` = `cat`.`cat_id`) AND `stutus` = $status";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		//Fetch Commande details by ID
		public function CommandeDetails0($id,$status)
		{
			$sql = "SELECT `c`.`idc`, `c`.`Commande`, `c`.`id_fourniseur`, `c`.`id_user`, `c`.`date_de_commande`, `c`.`longitude`, `c`.`stutus`, `c`.`latitude`, `a`.`tel` a_tel, `u`.`tel` u_tel, `a`.`id_cat`,`cat`.`cat_name`,
			`a`.`username` a_username, `a`.`lastname` a_lastname,`u`.`username` u_username, `u`.`lastname` u_lastname  FROM `commande` AS `c`, `users` AS `u`, `admin` AS `a`, `categories` AS `cat` WHERE (`c`.`id_fourniseur` = `a`.`id` AND `c`.`id_user` = `u`.`id` AND `a`.`id_cat` = `cat`.`cat_id`) AND (`stutus` = $status AND `c`.`idc` = :id)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		// commande info
		public function editCommande0($id,$status)
		{
			$sql = "SELECT `c`.`idc`, `c`.`Commande`, `c`.`id_fourniseur`, `c`.`id_user`, `c`.`date_de_commande`, `c`.`longitude`, `c`.`stutus`, `c`.`latitude`, `a`.`tel` a_tel, `u`.`tel` u_tel, `a`.`id_cat`,`cat`.`cat_name`,
			`a`.`username` a_username, `a`.`lastname` a_lastname, `a`.`img` a_img,`u`.`username` u_username, `u`.`lastname` u_lastname  FROM `commande` AS `c`, `users` AS `u`, `admin` AS `a`, `categories` AS `cat` WHERE (`c`.`id_fourniseur` = `a`.`id` AND `c`.`id_user` = `u`.`id` AND `a`.`id_cat` = `cat`.`cat_id`) AND (`stutus` = $status AND `c`.`idc` = :id)";
			$stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
		}

		//Update commande 
		public function update_commande($id,$tel,$status)
		{
			$sql = "UPDATE `commande` SET `id_fourniseur` = :id_fourniseur, `date_de_commande` = NOW(), `stutus` = :stutus WHERE `idc` = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id_fourniseur'=>$tel, 'stutus'=>$status,'id'=>$id]);
			return true;
		}

		//Delete Commande
		public function CommandeAction($id)
		{
			$sql = "DELETE FROM `commande` WHERE `idc` = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			return true;
		}

		//add new commande
		public function add_commande($id_f,$userId,$des)
		{
			$sql = "INSERT INTO `commande`(`Commande`, `id_fourniseur`, `id_user`, `date_de_commande`) 
			VALUES (:note, :id_fournisseur, :id_user, :date_state)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['note'=>$des, 'id_fournisseur'=>$id_f, 'id_user'=>$userId, 'date_state'=>date("Y-m-d H:i:s")]);
			return true;
		}
	}

 ?>