<?php
include "header.php";
include "../user/connection.php";

   $id=$_GET["id"];
   $unit="";
   
 

   $res=mysqli_query($conn , " SELECT * FROM units where id= $id " );
   while($row=mysqli_fetch_array($res))
   {

 
    $id=$row["id"];
    $unit=$row["unit"];

}
?>



<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="add_new_user.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         <h5><b>Edit Unit</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">

            <label class="control-label">ID :</label>
              <div class="controls">
                <input type="text" class="span11"  name="unit" value="<?php echo $id; ?>" readonly/>
              </div>
            </div>
              <label class="control-label">Unit Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Unit name ___" name="unit" value="<?php echo $unit; ?>" required/>
              </div>
            </div>
            
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">update</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The Unit has been Updated successfully!
                </div>



          </form>
        </div>
        
           

      </div>

     
          </div>
      

          </form>
        </div>
      </div>
    </div>
        </div>

    </div>
</div>

        </div>

    </div>
</div>

<?php

if(isset($_POST["submit1"])){

  
  mysqli_query($conn , " UPDATE units set  unit='$_POST[unit]' where id='$id' ");
?>

<script type="text/javascript">
    document.getElementById("success").style.display = "block" ;
          setTimeout(function(){
              window.location="add_new_unit.php ";
          },1500);
    </script>

<?php

}
?>

<?php
include "footer.php";
?>
