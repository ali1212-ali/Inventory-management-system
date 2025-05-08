<?php
include "header.php";
include "../user/connection.php";

   $id=$_GET["id"];
   $company="";
   
 

   $res=mysqli_query($conn , " SELECT * FROM company_info where id= $id " );
   while($row=mysqli_fetch_array($res))
   {

 
    $id=$row["id"];
    $companyname=$row["companyname"];

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
         <h5><b>Edit company</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">

            <label class="control-label">ID :</label>
              <div class="controls">
                <input type="text" class="span11"  name="id" value="<?php echo $id; ?>" readonly/>
              </div>
            </div>
              <label class="control-label">company Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="company name ___" name="companyname" value="<?php echo $companyname; ?>" required/>
              </div>
            </div>
            
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">update</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The company has been Updated successfully!
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

  
  mysqli_query($conn , " UPDATE company_info set  companyname='$_POST[companyname]' where id='$id' ");
?>

<script type="text/javascript">
    document.getElementById("success").style.display = "block" ;
          setTimeout(function(){
              window.location="add_new_company.php ";
          },1500);
    </script>

<?php

}
?>

<?php
include "footer.php";
?>
