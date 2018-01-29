<?php
/*$t = date("H");
echo "<p>The hour (of the server) is " . $t; 
echo ", and will give the following message:</p>";

if ($t < "10") {
    echo "Have a good morning!";
} 
elseif ($t < "20") {
    echo "Have a good day!";
}
elseif($t<"12"){
   echo "Have a good afternoon!";	
}
 else {
    echo "Have a good night!";
}*/
echo $_SERVER['PHP_SELF'];
echo '</br>';
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
?>
 
