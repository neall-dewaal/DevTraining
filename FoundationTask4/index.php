<?php
/**
Implement a groupByOwners function that:
Accepts an associative array containing the item owner name for each item.
Returns an associative array containing an array of items for each owner name, in any order.
**/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 4</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Task 4</h1>
	<p>
		Implement a groupByOwners function that:
		Accepts an associative array containing the item owner name for each item. Returns an associative array containing an array of items for each owner name, in any order.
	</p>
	<p>
		<?php
		class ItemOwners{
			public static function groupByOwners($items){
				$ItemsOfOwners = array();//Declare the final array that will contain the unique owners and their item inventory
				$AllOwnersArray = array_unique(array_values($items)); //list all the owners that currently have items and remove duplicate owners.
				
				//loop through $items while adding each unique owner's items to an independant array
				foreach ($AllOwnersArray as $UniqueOwner){
					$UniqueOwnerItemArray=array(); //Item list for a specific owner.
					foreach ($items as $Item => $Owner) {
						if($Owner == $UniqueOwner){
							$UniqueOwnerItemArray[] = $Item; //adds items of specific owner to array.
						}
					}
					$ItemsOfOwners[$UniqueOwner] = $UniqueOwnerItemArray; //adds complete list of items for a unique owner.
				}
				return ($ItemsOfOwners);
			}
		}

		$items=array("Baseball Bat"=>"John","Golf ball"=>"Stan","Tennis Racket"=>"John");
		echo json_encode(ItemOwners::groupByOwners($items));
		?>
	</p>
	
</body>
</html>