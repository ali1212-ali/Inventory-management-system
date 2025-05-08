<?php

include "../../user/connection.php";
$company_name=$_GET["company_name"];
$res=mysqli_query($conn, "SELECT * from  products where companyname='$company_name'");

?>
<select class="span11" name="productname" id="productname">
<option>Select</option>

<?php
while ($row=mysqli_fetch_array($res)) {
    echo "<option>";
    echo $row["productname"];
    echo "</option>";
}
echo "</select>";
?>