<?php
/**
Task: Create a function "addAll()" that will take an array as input parameter.
The function will sum all the elements in the array and then remove the first element of the array.
The function should repeat this until the array is empty and then return the total.
For example: For the array [1,1,1,1,1], the result should be 15 -> 5+4+3+2+1=15
Optimize your solution as far as possible.
-Implement the solution as a loop
-Implement the solution using a recursive function
**/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 1</title>
</head>
<body>
	<h1>Task 1</h1>
	<p>
		Task: Create a function "addAll()" that will take an array as input parameter.
		The function will sum all the elements in the array and then remove the first element of the array.
		The function should repeat this until the array is empty and then return the total.
		For example: For the array [1,1,1,1,1], the result should be 15 -> 5+4+3+2+1=15
		Optimize your solution as far as possible.
		<ul>
			<li>Implement the solution as a loop</li>
			<li>Implement the solution using a recursive function</li>
		</ul>
	</p>
	<p>
		<?php
		function addAll($Array){
			$ArrayLength = sizeof($Array);//gets the size of the array
			if($ArrayLength == 0) { //adds zero if no more elements are present in the array
				return 0;
			}
			$ArraySumTotal = $Array[0]; //initializes the first value of the counter
			for($i=1;$i<$ArrayLength;$i++){//loops to sum values
				$ArraySumTotal += $Array[$i];	
			}
			array_splice($Array,0,1); // removes first item from array
			return $ArraySumTotal+addAll($Array);
		}
		$Array = [1,1,1,1,1];
		echo addAll($Array); //calls to the function.
		?>
	</p>
</body>
</html>