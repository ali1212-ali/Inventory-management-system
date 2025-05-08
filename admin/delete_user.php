<?php
include "../user/connection.php";
  $id = $_GET["id"];
  mysqli_query( $conn , " DELETE FROM user_registration WHERE  id = '$id' ");
?>
<script type="text/javascript">
window.location="add_new_user.php";

</script>