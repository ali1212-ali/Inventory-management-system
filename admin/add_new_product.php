<?php
include "header.php";
include "../user/connection.php";

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
         <h5><b>Add New Products</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <select class="span11" name="companyname"  >
      

    <?php
    $res = mysqli_query($conn , "SELECT * from company_info");
    echo "<option>Select</option>";
    while($row = mysqli_fetch_array($res)){
        echo "<option>";
        echo $row["companyname"];
        echo "</option>";
        
    }
   
    ?>

                </select>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
    <input type="text" class="span11" name="productname" placeholder="Enter the product name ------" required>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Unit :</label>
              <div class="controls">
                <select class="span11" name="unit">
<option>
    Select
    </option>
    <?php
    $res = mysqli_query($conn , "SELECT * from units");
    while($row = mysqli_fetch_array($res)){
        echo "<option>";
        echo $row["unit"];
        echo "</option>";

    }
   
    ?>


                </select>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Packaging Size :</label>
              <div class="controls">
    <input type="text" class="span11" name="packing_size" placeholder="Enter the packaging size ------" required>
                <!-- <input type="text" class="span11" placeholder="Company name ___" name="companyname" required/> -->
              </div>
            </div>

            
        
            
            <div class="alert alert-danger"  id="error" style="display:none">
                 This <strong> <?php 
                 $status=null;
if($_POST['companyname']=="Select"){
  
  echo "{$_POST['companyname']}";
  $status="Company Name";

    
} 
elseif($_POST['unit']=="Select"){
  echo "{$_POST['unit']}";
  $status="Unit";
}     
 ?></strong> is not a valid <?php echo "$status"; ?>
                </div>
             
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The <strong> <?php echo $_POST["companyname"]; ?></strong> Product has been Added successfully!
                </div>



          </form>
        </div>
        
           

      </div>

      <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit</th>
                  <th>packing Size</th>
                  
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
    <?php

    $res=mysqli_query($conn,"SELECT * from products");
    while ($row = mysqli_fetch_array($res)) {
    ?>



                <tr >
                  <td><?php echo $row["id"] ; ?> </td>
                  <td><?php echo $row["companyname"] ; ?> </td>
                  <td><?php echo $row["productname"] ; ?> </td>
                  <td><?php echo $row["unit"] ; ?> </td>
                  <td><?php echo $row["packing_size"] ; ?> </td>
                  <td > <center><div><a href = "edit_product.php?id=<?php echo $row["id"] ; ?> " style='color:green'  > Edit </a></div></center> </td>
                  <td> <center><div><a href = "delete_product.php?id=<?php echo $row["id"] ; ?>"  style='color:red'  > Delete </a> </div></center></td>
                </tr>
           <?php
           }
           ?>
                
              </tbody>
            </table>
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
          if($_POST['companyname']=="Select" || $_POST['unit'] == "Select"){
            
?>
<script type="text/javascript">
   document.getElementById("error").style.display = "block" ;
  //  document.getElementById("success").style.display = "none" ;
         setTimeout(function(){
             window.location.href = window.location.href;
         },2000);
   

   </script>
   <?php

}
else{

  mysqli_query($conn , "INSERT into products values(NULL,'$_POST[productname]','$_POST[companyname]','$_POST[unit]','$_POST[packing_size]')");

  ?>
<script type="text/javascript">
// document.getElementById("error").style.display = "none" ;
document.getElementById("success").style.display = "block" ;
    setTimeout(function(){
        window.location.href = window.location.href;
    },1500);


</script>

 <?php












  
}

    }



?>





<?php
include "footer.php";
?>
