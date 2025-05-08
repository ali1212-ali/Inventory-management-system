<?php
include "header.php";
include "../user/connection.php";

$id=$_GET["id"];

$ros = mysqli_query($conn, "SELECT * from products where id='$id'  ");
while($bow=mysqli_fetch_array($ros)){
$productname=$bow["productname"];
$packing_size=$bow["packing_size"];
$companyname=$bow["companyname"];
$unit=$bow["unit"];
}

?>



<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

         <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
<div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         <h5><b>EDIT Products</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <select class="span11" name="companyname" >

<option>
<?php
                echo "$companyname" ;
                ?>
    <?php
    $res = mysqli_query($conn , "SELECT * from company_info ");
    while($row = mysqli_fetch_array($res)){
        echo "<option>";
        echo $row["companyname"];
        echo "</option>";

    }
   




    ?>
</option>

                </select>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
    <input type="text" class="span11" name="productname" value="<?php echo $productname ; ?>" required>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Unit :</label>
              <div class="controls">
                <select class="span11" name="unit" ">
<option>
<?php
                echo "$unit" ;
                ?>
    <?php
    $res = mysqli_query($conn , "SELECT * from units");
    while($row = mysqli_fetch_array($res)){
        echo "<option>";
        echo $row["unit"];
        echo "</option>";

    }
   
    ?>
</option>

                </select>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Packaging Size :</label>
              <div class="controls">
    <input type="text" class="span11" name="packing_size" value="<?php echo $packing_size ; ?>" >
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>

            
        
            
            <!-- <div class="alert alert-danger"  id="error" style="display:none">
                 This <strong> <?php echo $_POST["companyname"]; ?></strong> Company already Exists! Please Try Anohter Unit.
                </div>
              -->
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Update</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The <strong> <?php echo $_POST["productname"]; ?></strong> Product has been updated successfully!
                </div>



          </form>
        </div>
        
           

      </div>

          </form>
        </div>
      </div>
    </div>
        </div>

    </div>
</div>

   <?php

        if(isset($_POST["submit1"])){

    mysqli_query($conn , "UPDATE products set companyname='$_POST[companyname]',  productname='$_POST[productname]',   unit='$_POST[unit]', packing_size='$_POST[packing_size]' where id='$id'");

        ?>
    <script type="text/javascript">
    // document.getElementById("error").style.display = "none" ;
    document.getElementById("success").style.display = "block" ;
          setTimeout(function(){
              window.location = "add_new_product.php";
          },1500);
    

    </script>

       <?php


    }



?>





<?php
include "footer.php";
?>
