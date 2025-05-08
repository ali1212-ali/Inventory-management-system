<?php
include "../user/connection.php";
  $id = $_GET["id"];
?>
<?php

mysqli_query( $conn ," DELETE from products where id = '$id' ");



?>

<script type="text/javascript">
window.location="add_new_product.php";
</script>