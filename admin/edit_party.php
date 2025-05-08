<?php
include "header.php";
include "../user/connection.php";

   $id=$_GET["id"];
   $firstname="";
   $lastname="";
   $bussinessname="";
   $contact="";
   $adress="";
   $city="";

 

   $res=mysqli_query($conn , " SELECT * FROM party_info where id= '$id' " );
   while($row=mysqli_fetch_array($res))
   {

 
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $bussinessname=$row["bussinessname"];
    $contact=$row["contact"];
    $adress=$row["adress"];
    $city=$row["city"];
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
         <h5><b>Edit party</b></h5>
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
              <label class="control-label">Bussiness Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Bussiness name ___" name="bussinessname" value="<?php echo $bussinessname; ?>"  required />
              </div>


            </div>
                <div class="control-group">
              <label class="control-label">contact</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter you contact" name="contact" value="<?php echo $contact; ?> " required/>
              </div>
                </div>
            

            </div>
                <div class="control-group">
              <label class="control-label">Adress</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter you Adress" name="adress" value="<?php echo $adress; ?>" required/>
              </div>
                </div>
            

            
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                 <input type="text"  class="span11" placeholder="Enter you City" name="city" value="<?php echo $city; ?> " required/>
                 </div>
                 </div>
            </div>
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">update</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The party has been Updated successfully!
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

  
  mysqli_query($conn , " UPDATE party_info set firstname='$_POST[firstname]', lastname='$_POST[lastname]' , bussinessname='$_POST[bussinessname]' , contact='$_POST[contact]' , adress='$_POST[adress]'  , city='$_POST[city]' where id='$id' ");
?>

<script type="text/javascript">
    document.getElementById("success").style.display = "block" ;
          setTimeout(function(){
              window.location="add_new_party.php ";
          },1500);
    </script>

<?php

}
?>

<?php
include "footer.php";
?>
