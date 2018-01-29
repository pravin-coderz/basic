<!DOCTYPE html>
<html>
<body>

<?php
function myTest() {
    static $x = 10;
    echo $x;
    $x++;
}

myTest();
echo "<br>";
myTest();
echo "<br>";
myTest();
echo "<br>";
myTest();
echo "<br>";
myTest();
?> 

</body>
</html>