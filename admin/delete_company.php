<?php
include "../user/connection.php";
  $id = $_GET["id"];
?>

    
        <?php    mysqli_query( $conn , " DELETE FROM company_info WHERE  id = '$id' ");?>
  
<script type="text/javascript">
window.location="add_new_company.php";
</script>