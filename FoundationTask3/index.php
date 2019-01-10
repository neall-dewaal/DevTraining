<?php
/**
Task:
A palindrome is a word that reads the same backward or forward.
Write a function that checks if a given word is a palindrome. Character case should be ignored.
For example, isPalindrome("Never Odd Or Even") should return true as character case should be ignored, resulting in "Never Odd Or Even", which is a palindrome since it reads the same backward and forward.

<?php 
class Palindrome {
	public static function isPalindrome($word) {
		//TODO: Implement this
		return false;
	}
}

if (Palindrome::isPalindrome('Never Odd Or Even'))
	echo 'Palindrome';
else
	echo 'Not palindrome';

?>
**/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 3</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Task 3</h1>
	<p>
		A palindrome is a word that reads the same backward or forward.
		Write a function that checks if a given word is a palindrome. Character case should be ignored.
		For example, isPalindrome("Never Odd Or Even") should return true as character case should be ignored, resulting in "Never Odd Or Even", which is a palindrome since it reads the same backward and forward.
	</p>
	<p>
	<?php 
	class Palindrome {
		public static function isPalindrome($word) {
			$WordNoSpaces = str_replace(" ", "", $word); //Removes the whitespace from the sentence.
			$WordLowerCase = strtolower($WordNoSpaces); //converts the entire string to lowercase.
			$WordReverse = strrev($WordLowerCase); //Reverses the string as a conditions against which will be tested if $word is a palindrome
			//Condition to determine if given sentence is a palindrome (Return true if $word is palindrome)
			if($WordLowerCase == $WordReverse){
				return true;
			}else{
				return false;
			}
		}
	}

	if(Palindrome::isPalindrome("Never Odd Or Even")){
		echo "Palindrome.";
	}else{
		echo "Not a Palindrome.";
	}
	?>
	</p>
</body>
</html>