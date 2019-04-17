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
	public $payDate;

	public function __construct(){
		$this->db = connectToDatabase();
	}
	public function create(){
		$statement = $this->db->prepare('INSERT INTO `user` (id,name,email,phoneNumber,fk_risk, fk_mortgages,rentDate,payDate) VALUES (NULL, :name, :email, :phone, :risklvl, :mortgage, :rentDate, :payDate)');
		$statement->bindParam(':name', $this->name);
		$statement->bindParam(':email', $this->email);
		$statement->bindParam(':phone', $this->phone);
		$statement->bindParam(':risklvl', $this->risklvl);
		$statement->bindParam(':mortgage', $this->mortgage);
		$statement->bindParam(':rentDate', $this->rentDate);
		$statement->bindParam(':payDate', $this->payDate);
		$statement->execute();
	}

	public function update(int $id) : bool {

		$pdo = connectToDatabase();

		$statement = $this->db->prepare('UPDATE `user` SET VALUES (:name, :email, :phoneNumber, :risklvl, :mortgages, :rentDate, :refundStaus) WHERE id = :id');
		$statement->bindParam(':id', $id);
		$statement->bindParam(':name', $this->name);
		$statement->bindParam(':email', $this->email);
		$statement->bindParam(':phone', $this->phone);
		$statement->bindParam(':risklvl', $this->risklvl);
		$statement->bindParam(':mortgage', $this->mortgage);
		$statement->bindParam(':rentDate', $this->rentDate);
		$statement->bindParam(':refundStatus', $this->refundStatus);

		return $statement->execute();
	}








}