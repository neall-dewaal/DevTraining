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
    		printf("Error creating table: " . $conn->error.'.');
		}
	}
	//Function to create a new person:
	public function createPerson($Name,$Surname,$DateOfBirth,$EmailAdress,$Age) {
		$sql="INSERT INTO Person (Name,Surname,DateOfBirth,EmailAddress,Age) VALUES ('$Name','$Surname','$DateOfBirth','$EmailAdress','$Age')";
		if ($this->conn->query($sql) === TRUE) {
		    printf("Data inserted successfully.<br>");
		} else {
		    printf("Error inserting data: " . $this->conn->error.'.');
		}
	}
	public function loadPerson($Name,$Surname){
		$selectPerson = "SELECT * FROM Person WHERE Name='$Name' AND Surname='$Surname';";
		if($result = $conn->query($selectPerson)){
			$conn->close();
			return $result;
		}else{
		    echo "ERROR:" . $this->conn->error;
		}
	}
	public function loadAllPeople(){
		$selectAllPerson = "SELECT * FROM Person;";
		if($result = $this->conn->query($selectAllPerson)){
    		if($result->num_rows > 0){
		        echo "<table>";
		            echo "<tr>";
		                echo "<th>id</th>";
		                echo "<th>first_name</th>";
		                echo "<th>last_name</th>";
		                echo "<th>email</th>";
		            echo "</tr>";
        		while($row = $result->fetch_array()){ //Each
            	echo "<tr>";
            		echo "<td>" . $row['ID'] . "</td>";
	                echo "<td>" . $row['Name'] . "</td>";
	                echo "<td>" . $row['Surname'] . "</td>";
	                echo "<td>" . $row['DateOfBirth'] . "</td>";
	                echo "<td>" . $row['EmailAddress'] . "</td>";
					echo "<td>" . $row['Age']."</td>";
	            echo "</tr>";
		        }
		      
		        echo "</table>";
		        // Free result set
		        $result->free();

		    } else{
		        echo "No records matching your query were found.";
		    }
		} else{
		    echo "ERROR: Could not able to execute $selectPerson. " . $conn->error;
		}
	}
	public static function savePerson($Name,$Surname,$valueToChange,$valueChange){
		switch ($valueToChange) {
			case 'Name':
				$sql = "UPDATE Person SET Name='$valueChange' WHERE Name='$Name' AND Surname='$Surname';";
				break;
			case 'Surname':
				$sql = "UPDATE Person SET Surname='$valueChange' WHERE Name='$Name' AND Surname='$Surname';";
				break;
			case 'DateOfBirth':
				$sql = "UPDATE Person SET DateOfBirth='$valueChange' WHERE Name='$Name' AND Surname='$Surname';";
				break;
			case 'EmailAddress':
				$sql = "UPDATE Person SET EmailAddress='$valueChange' WHERE Name='$Name' AND Surname='$Surname';";
				break;
			case 'Age':
				$sql = "UPDATE Person SET Age='$valueChange' WHERE Name='$Name' AND Surname='$Surname';";
				break;
		}
		$conn = new mysqli("localhost","root","root","StratuSolve");
		if($conn->query($sql)){
			echo "For $Name $Surname the $valueToChange has been changed to $valueChange.";
		}else{
			echo "Error".$conn->error;
		}
		$conn->close();
	}
	public function deletePerson($Name,$Surname){
		$sql="DELETE FROM Person WHERE Name='$Name' AND Surname='$Surname';";
		if($this->conn->query($sql)){
			echo "Successfully deleted $Name $Surname";
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
		echo "session closed";
	}
}
$tenPeople=[array("Name"=>"Neall","Surname"=>"De Waal","DateOfBirth"=>'1994-10-24',"EmailAddress"=>"nealldw@gmail.com","Age"=>'24'),
	array("Name"=>"Rachel","Surname"=>"Swanepoel","DateOfBirth"=>'1995-01-30',"EmailAddress"=>"rachel@gmail.com","Age"=>23),
	array("Name"=>"Joaquin","Surname"=>"Grobler","DateOfBirth"=>'1994-10-24',"EmailAddress"=>"joaquin@gmail.com","Age"=>24),
	array("Name"=>"Johan","Surname"=>"Griesel","DateOfBirth"=>'1983-09-29',"EmailAddress"=>"johan@gmail.com","Age"=>29),
	array("Name"=>"Rudolph","Surname"=>"Bendeman","DateOfBirth"=>'1938-03-17',"EmailAddress"=>"rudolph@gmail.com","Age"=>34),
	array("Name"=>"Eduard","Surname"=>"Grabe","DateOfBirth"=>'1944-08-10',"EmailAddress"=>"eduard@gmail.com","Age"=>21),
	array("Name"=>"Trishca","Surname"=>"Adams","DateOfBirth"=>'1914-07-05',"EmailAddress"=>"trishca@gmail.com","Age"=>27),
	array("Name"=>"Tristen","Surname"=>"Eduards","DateOfBirth"=>'2001-06-16',"EmailAddress"=>"tristen@gmail.com","Age"=>26),
	array("Name"=>"Christene","Surname"=>"Louw","DateOfBirth"=>'1963-05-22',"EmailAddress"=>"christene@gmail.com","Age"=>28),
	array("Name"=>"Lilly","Surname"=>"Aldren","DateOfBirth"=>'1987-04-27',"EmailAddress"=>"lilly@gmail.com","Age"=>31)];
$timeStart = microtime(true);
$personObject = new Person();

$task1 = false;
$task2= true;
$task3 = true;

//for Loop to create 10 people
if($task1 == true){
	foreach ($tenPeople as $personData) {
		$personObject->createPerson($personData["Name"],$personData['Surname'],$personData["DateOfBirth"],$personData["EmailAddress"],$personData["Age"]);
	}
}
//loop to load all people on database and print out
if($task2 == true){
	foreach ($tenPeople as $personData) {
		$result =$personObject->loadPerson($personData["Name"],$personData['Surname']);
		$row=$result->fetch_array();
		echo $row['Name'].' '.$row['Surname'].','.$row['DateOfBirth'].','.$row['EmailAddress'].','.$row['Age']."<br>";
	$result->free();
	}
}
//add log that logs when sripts start and how long it took to execute
if($task3 == true){
	$timeStop = microtime(true);
	$timer = $timeStop - $timeStart;
	echo "The execution took ".$timer.' seconds'."<br>";
}