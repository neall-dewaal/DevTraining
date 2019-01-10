<?php
class Person{
	private $ServerName = "localhost";
	private $UserName = "root";
	private $Password = "root";
	private $DBname = "StratuSolve";

	public function __construct(){
		$this->conn = new mysqli($this->ServerName, $this->UserName, $this->Password, $this->DBname);
		//Check that database has been created and if not create one.
		$createDB = "CREATE DATABASE IF NOT EXISTS StratuSolve";
		if (!$this->conn->query($createDB) === TRUE) {
		echo "Error creating database: " . $conn->error.'.';
		}
		//Check that table has been created and if not create one.
		$createTable = "CREATE TABLE IF NOT EXISTS Person (
			ID INT NOT NULL AUTO_INCREMENT,
			Name VARCHAR(30) NOT NULL,
			Surname VARCHAR(30) NOT NULL,
			DateOfBirth DATE NOT NULL,
			EmailAddress VARCHAR(30) NOT NULL,
			Age INT NOT NULL,
			PRIMARY KEY (ID))";
		if (!$this->conn->query($createTable) === TRUE) {
    		printf("Error creating table: " . $this->conn->error.'.');
		}
	}
	//Function to create a new person:
	public function createPerson($Name,$Surname,$DateOfBirth,$EmailAdress,$Age) {
		$sql="INSERT INTO Person (Name,Surname,DateOfBirth,EmailAddress,Age) VALUES ('$Name','$Surname','$DateOfBirth','$EmailAdress','$Age')";
		if (!$this->conn->query($sql) === TRUE) {
		    printf("Error inserting data: " . $this->conn->error.'.');
		}
	}
	public function loadPerson($ID=0){
		$selectPerson = "SELECT * FROM Person WHERE ID='$ID';";
		if($result = $this->conn->query($selectPerson)){
			return $result->fetch_array();
		}else{
		    echo "ERROR:" . $this->conn->error;
		}
	}
	public function loadAllPeople(){
		$allPeopleArray = array();
		$selectAllPerson = "SELECT * FROM Person;";
		if($result = $this->conn->query($selectAllPerson)){
    		if($result->num_rows > 0){
	        	while($row = $result->fetch_array()){ //Each
	        		array_push($allPeopleArray, $row);
			        }
			        // Free result set
			        $result->free();
		    }
		} else{
		    echo "ERROR:" . $this->conn->error;
		}
		return $allPeopleArray;
	}
	public function savePerson($ID,$Name,$Surname,$DateOfBirth,$EmailAdress,$Age){
		$personToChange = $this->loadPerson($ID);
		if ($Name != $personToChange['Name']){
			$sql = "UPDATE Person SET Name='$Name' WHERE ID='$ID';";
			if(!$this->conn->query($sql)===True){
				echo "Error".$this->conn->error;
			}
		}
		if ($Surname != $personToChange['Surname']){
			$sql = "UPDATE Person SET Surname='$Surname' WHERE ID='$ID';";
			if(!$this->conn->query($sql)===True){
				echo "Error".$this->conn->error;
			}
		}
		if ($DateOfBirth != $personToChange['DateOfBirth']){
			$sql = "UPDATE Person SET DateOfBirth='$DateOfBirth' WHERE ID='$ID';";
			if(!$this->conn->query($sql)===True){
				echo "Error".$this->conn->error;
			}
		}
		if ($EmailAdress != $personToChange['EmailAddress']){
			$sql = "UPDATE Person SET EmailAddress='$EmailAdress' WHERE ID='$ID';";
			if(!$this->conn->query($sql)===True){
				echo "Error".$this->conn->error;
			}
		}
		if ($Age != $personToChange['Age']){
			$sql = "UPDATE Person SET Age='$Age' WHERE ID='$ID';";
			if(!$this->conn->query($sql)===True){
				echo "Error".$this->conn->error;
			}
		}	
	}
	public function deletePerson($ID){
		$sql="DELETE FROM Person WHERE ID='$ID';";
		if(!$this->conn->query($sql)){
			echo "Error";
		}
	}
	public function deleteAllPeople(){
		$sql = "SELECT * FROM Person;";
		if($result = $this->conn->query($sql)){
			while($row = $result->fetch_array()){
				$this->deletePerson($row['Name'],$row['Surname']);
			}
			$result->free();
		}
		echo "Deleted all persons in database";
	}
	public function __destruct(){
		$this->conn->close();
	}
}

