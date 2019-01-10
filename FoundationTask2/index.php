<?php
/**
Task: Write a program that will start at 0 and output the fibonacci sequence up to 34
-Implement the solution as a loop
-Implement the solution using a recursive function
**/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 2</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Task 2</h1>
	<p>
		Task: Write a program that will start at 0 and output the fibonacci sequence up to 34
		<ul>
			<li>-Implement the solution as a loop</li>
			<li>-Implement the solution using a recursive function</li>
		</ul>
	</p>
	<p>
		<?php
		function findNextNumber($FibSequence){
			$CurrentNumber = end($FibSequence);
			while($CurrentNumber != 34){
				if (sizeof($FibSequence) == 1){ //Check to see if this is the first time the loop is running
					echo "0 "; //Ensures output of '0' on first run.
					$NextNumber = 1;
				}else{ //If it is not the first run
					$PreviousNumber = prev($FibSequence);
					$NextNumber = $PreviousNumber + $CurrentNumber;
				}
				array_push($FibSequence, $NextNumber); //Adds the new number to the sequence
				echo "$NextNumber "; //Adds the new number to the output
				return findNextNumber($FibSequence); //Recusive function loop.

			}
		}
		$FibSequence = array(0);
		findNextNumber($FibSequence);
		?>
	</p>
</body>
</html>