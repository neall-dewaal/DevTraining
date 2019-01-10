<?php
/**
Task:
Modify your Foundation Task 2 result to do the following:
-Your php script should accept a POST variable that will serve as the maximum number for the Fibonacci sequence.
-Create a new html file that will have an input box where the user can specify the maximum number for the Fibonacci sequence.
-Add a button to the html file that will, when clicked take the user input and post it (using javascript) to the php script and then output the result on the screen
**/

function findNextNumber($FibSequence,$MaxNumber){
	$CurrentNumber = end($FibSequence);
	while($CurrentNumber <= $MaxNumber){
		if (sizeof($FibSequence) == 0){ //Check to see if this is the first time the loop is running
			echo '0 '; //Ensures output of '0' on first run.
			$NextNumber = 1;
		}else{ //If it is not the first run
			$PreviousNumber = prev($FibSequence);
			$NextNumber = $PreviousNumber + $CurrentNumber;
		}
		array_push($FibSequence, $NextNumber); //Adds the new number to the sequence
		if ($NextNumber<=$MaxNumber){
			echo("$NextNumber ") ; //Adds the new number to the output
		
		}
		return findNextNumber($FibSequence,$MaxNumber); //Recusive function loop.
	}
}

$MaxNumber = $_POST['max'];
$FibSequence = array();
findNextNumber($FibSequence,$MaxNumber);
?>