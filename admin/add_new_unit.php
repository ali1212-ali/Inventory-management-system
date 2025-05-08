<?php
include "header.php";
include "../user/connection.php";

?>



<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

         <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
<div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         <h5><b>Add New Unit</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Unit name ___" name="unit" required/>
              </div>
            </div>
            
        
            
            <div class="alert alert-danger"  id="error" style="display:none">
                 This <strong> <?php echo $_POST["unit"]; ?></strong> Unit already Exists! Please Try Anohter Unit.
                </div>
             
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The <strong> <?php echo $_POST["unit"]; ?></strong> Unit has been Added successfully!
                </div>



          </form>
        </div>
        
           

      </div>

      <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID </th>
                  <th>Unit Name</th>
                  
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
              </thead>
              <tbody>
    <?php

    $res=mysqli_query($conn,"SELECT * from units");
    while ($row = mysqli_fetch_array($res)) {
    ?>



                <tr >
                  <td><?php echo $row["id"] ; ?> </td>
                  <td><?php echo $row["unit"] ; ?> </td>
                  <td > <center><div><a href = "edit_unit.php?id=<?php echo $row["id"] ; ?> " style='color:green'  > Edit </a></div></center> </td>
                  <td> <center><div><a href = "delete_unit.php?id=<?php echo $row["id"] ; ?>"  style='color:red'  > Delete </a> </div></center></td>
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
 $count=0;         
 $res = mysqli_query($conn , " SELECT * from units where unit='$_POST[unit]' ");
 $count = mysqli_num_rows($res);

 if($count>0){
   
    ?>
   <script type="text/javascript">
    document.getElementById("success").style.display="none";
    document.getElementById("error").style.display="block";
    
   </script>

  <?php
}else{
    mysqli_query($conn , "INSERT into units values(NULL,'$_POST[unit]')");

        ?>
    <script type="text/javascript">
    document.getElementById("error").style.display = "none" ;
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
