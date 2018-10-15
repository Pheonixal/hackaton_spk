<?php 
	include ("db.php");
	
	$id = $_GET['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$experience = $_POST['experience'];
    $category = $_POST['category'];
	$tracknumber = tracking(16, $mysqli);
	$result = $mysqli->query("INSERT INTO `projects`(`name`, `category`, `price`, `description`, `experience`, `date`, `userid`,`tracknumber`) VALUES('$name', '$category', '$price', '$description', '$experience', CURRENT_TIMESTAMP(), '$id','$tracknumber')");

	if($result){
		header("Location: /index.php");
		exit();
	} else {
		header("Location: /error.php?error=project");
		exit();
	}
	function tracking($x, $mysqli) 
{
    
  $unique_ref_length = $x;
// A true/false variable that lets us know if we've  
// found a unique reference number or not  
$unique_ref_found = false;  
  
// Define possible characters.  
// Notice how characters that may be confused such  
// as the letter 'O' and the number zero don't exist  
$possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";  
  
// Until we find a unique reference, keep generating new ones  
while (!$unique_ref_found) {  
  
    // Start with a blank reference number  
    $unique_ref = "";  
      
    // Set up a counter to keep track of how many characters have   
    // currently been added  
    $i = 0;  
      
    // Add random characters from $possible_chars to $unique_ref   
    // until $unique_ref_length is reached  
    while ($i < $unique_ref_length) {  
      
        // Pick a random character from the $possible_chars list  
        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);  
          
        $unique_ref .= $char;  
          
        $i++;  
      
    }  
      
    // Our new unique reference number is generated.  
    // Lets check if it exists or not  
    //$query = ;  
    $result2 = $mysqli->query("SELECT `tracknumber` FROM `projects` WHERE `tracknumber`='$unique_ref'");  
    
    echo mysqli_error($mysqli);
    if (mysqli_num_rows($result2)==0) {  
      
        // We've found a unique number. Lets set the $unique_ref_found  
        // variable to true and exit the while loop  
        $unique_ref_found = true;  
      
    }  
  
}  
  
return $unique_ref;
}
?>