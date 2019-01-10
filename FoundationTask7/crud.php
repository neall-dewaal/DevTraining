<?php
/**
else{
	}
**/
require('crudClass.php');
$personObject = new Person();
if(sizeof($_POST) != 0){
	if ($_POST['command']=='Create'){
		$createPerson = $personObject->createPerson($_POST['Name'],$_POST['Surname'],$_POST['DateOfBirth'],$_POST['Email'],$_POST['Age']);
	} elseif ($_POST['command']=='Update') {
		$updatePerson = $personObject->savePerson($_POST['ID'],$_POST['Name'],$_POST['Surname'],$_POST['DateOfBirth'],$_POST['Email'],$_POST['Age']);
	} elseif ($_POST['command']=='Delete') {
		$deletePerson= $personObject->deletePerson($_POST['ID']);
	} elseif ($_POST['command']=='Load') {
		$str ='';
		$loadPerson= $personObject->loadPerson($ID = $_POST['ID']);
		$str.=$loadPerson['Name'].',';
		$str.=$loadPerson['Surname'].',';
		$str.=$loadPerson['DateOfBirth'].',';
		$str.=$loadPerson['EmailAddress'].',';
		$str.=$loadPerson['Age'];
		echo $str;
		#$a = json_encode($loadPerson['DateOfBirth']);//,$loadPerson['Surname'],$loadPerson['Name'],$loadPerson['EmailAddress'],$loadPerson['Age']);
		#foreach ($loadPerson as $key=>$value) {
			#var_dump(($key));
		#}
	}
}else{
	$allPeopleData = $personObject->loadAllPeople();
	$html = '<a id="createPerson" href="#" class="list-group-item" data-toggle="modal" data-target="#myModal">
                <h4 class="list-group-item-heading">No Persons in Database</h4>
                <p class="list-group-item-text">Click here to create one</p>
            </a>';

	if (sizeof($allPeopleData)<1){
		die($html);
	}else{
		$html = '';
		foreach ($allPeopleData as $personData) {
			$html.='<a id="'.$personData['ID'].'"href="#" class="list-group-item" data-toggle="modal" data-target="#myModal">
		                    <h4 class="list-group-item-heading">'.$personData['Name'].' '.$personData['Surname'].'</h4></a>';
		}
	}
	die($html);

}

?>


