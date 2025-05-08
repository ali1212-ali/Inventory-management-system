<?php
include "header.php";
include "../user/connection.php";

   $id=$_GET["id"];
   $firstname="";
   $lastname="";
   $username="";
   $password="";
   $status="";
   $role="";

 

   $res=mysqli_query($conn , " SELECT * FROM user_registration where id= $id " );
   while($row=mysqli_fetch_array($res))
   {

 
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $username=$row["username"];
    $password=$row["password"];
    $status=$row["status"];
    $role=$row["role"];

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
         <h5><b>Edit User</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name ___" name="firstname" value="<?php echo $firstname; ?>" required/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name ___" name="lastname" value="<?php echo $lastname; ?>" required />
              </div>

              <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User name ___" name="username" value="<?php echo $username; ?>" readonly />
              </div>


            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" required />
              </div>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select role</label>
              <div class="controls">
                <select name="role" class="span11">
                <option <?php if( $role == "user"){echo "selected"; }?> >user</option>
                <option <?php if( $role == "admin"){echo "selected"; }?> >admin</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Status</label>
              <div class="controls">
                <select name="status" class="span11">
                <option <?php if( $status == "active"){echo "selected"; }?> >active</option>
                <option <?php if( $status == "inactive"){echo "selected"; }?> >inactive</option>
                </select>
              </div>
            </div>
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">update</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The user has been Updated successfully!
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

  
  mysqli_query($conn , " UPDATE user_registration set firstname='$_POST[firstname]', lastname='$_POST[lastname]' , username='$_POST[username]' , password='$_POST[password]' , role='$_POST[role]'  , status='$_POST[status]' where id='$id' ");
?>

<script type="text/javascript">
    document.getElementById("success").style.display = "block" ;
          setTimeout(function(){
              window.location="add_new_user.php ";
          },1500);
    </script>

<?php

}
?>

<?php
include "footer.php";
?>
