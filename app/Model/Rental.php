<?php
class Rental{

	public $db;
	public $name;
	public $email;
	public $phone;
	public $risklvl;
	public $mortgage;
	public $rentDate;
	public $refundStatus;

	public function __construct(){
		$this->db = connectToDatabase();
	}
	public function create(){
		$statement = $this->db->prepare('INSERT INTO `user` (id,name,email,phoneNumber,fk_risk, fk_mortgages,rentDate) VALUES (NULL, :name, :email, :phone, :risklvl, :mortgage, :rentDate)');
		$statement->bindParam(':name', $this->name);
		var_dump($this->name);
		$statement->bindParam(':email', $this->email);
		var_dump($this->email);
		$statement->bindParam(':phone', $this->phone);
		var_dump($this->phone);
		$statement->bindParam(':risklvl', $this->risklvl);
		var_dump($this->risklvl);
		$statement->bindParam(':mortgage', $this->mortgage);
		var_dump($this->mortgage);
		$statement->bindParam(':rentDate', $this->rentDate);
		var_dump($this->rentDate);
		$statement->execute();
	}

	public function update(int $id) : bool {

		$pdo = connectToDatabase();

		$statement = $this->db->prepare('UPDATE `user` SET VALUES (:name, :email, :phoneNumber, :risklvl, :mortgages, :rentDate, :refundStaus) WHERE id = :id');

		$statement->bindParam(':id', $id);
		$statement->bindParam(':name', $this->$name);
		$statement->bindParam(':email', $this->$email);
		$statement->bindParam(':phone', $this->$phone);
		$statement->bindParam(':risklvl', $this->$risklvl);
		$statement->bindParam(':mortgage', $this->$mortgage);
		$statement->bindParam(':rentDate', $this->$rentDate);
		$statement->bindParam(':refundStatus', $this->$refundStatus);

		return $statement->execute();
	}








}