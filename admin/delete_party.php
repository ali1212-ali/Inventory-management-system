<?php
include "../user/connection.php";
  $id =$_GET["id"];
  mysqli_query( $conn , " DELETE FROM party_info WHERE  id= '$id' ");
?>
<script type="text/javascript">
window.location= "add_new_party.php";

</script>