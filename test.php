<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" >
  Product Name: <input type="text" name="product_name">
  <input type="submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_REQUEST['product_name']) {
        echo $_REQUEST['product_name'];
    } else {
        echo "Product Name is empty";
    }
}
?>
</body>
</html>
