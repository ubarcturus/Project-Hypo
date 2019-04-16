<?php
class Rental{

	public $db;
	public $name;
	public $email;
	public $phone;
	public $risklvl;
	public $mortages;
	public $rentDate;
	public $refundStatus;

	public function _construct(){
		$this->db = connectToDatabase();
	}
	public function create(){

		$statement = $this->db->prepare('INSERT INTO `user` (id,name,email,phoneNumber,fk_risk,fk_mortages,rentDate,refundStaus) VALUES (NULL, :name, :email, :phoneNumber, :risklvl, :mortages, :rentDate, :refundStaus)');
		$statement->bindParam(':name', $this->$name);
		$statement->execute();

	}

	public function update(int $id) : bool {

		$pdo = connectToDatabase();

		$statement = $this->db->prepare('UPDATE `user` SET VALUES (:name, :email, :phoneNumber, :risklvl, :mortages, :rentDate, :refundStaus) WHERE id = :id');

		$statement->bindParam(':id', $id);
		$statement->bindParam(':title', $this->$title);
		$statement->bindParam(':completed', $this->$completed);

		return $statement->execute();
	}








}