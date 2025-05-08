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
            <h5><b>Add New Party</b></h5>
            </div>
                <div class="widget-content nopadding">
                    <form name="form" action="" method="post" class="form-horizontal">
                    <div class="control-group">
                         <label class="control-label">First Name :</label>
                        <div class="controls">
                     <input type="text" class="span11" placeholder="First name ___" name="firstname" required/>
                    </div>
                 </div>
            
             <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name ___" name="lastname" required />
              </div>

              <div class="control-group">
              <label class="control-label">Bussiness Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Bussiness name ___" name="bussinessname" required />
              </div>


            </div>
                <div class="control-group">
              <label class="control-label">contact</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter you contact" name="contact" required/>
              </div>
                </div>
            

            </div>
                <div class="control-group">
              <label class="control-label">Adress</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter you Adress" name="adress" required/>
              </div>
                </div>
            

            
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                 <input type="text"  class="span11" placeholder="Enter you City" name="city" required/>
                 </div>
                 </div>
            </div>
        


            
            
             
                

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The party has been Added successfully!
                </div>



          </form>
        </div>
        
           

      </div>

      <table class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Bussiness Name</th>
                  <th>contact</th>
                  <th>Adress</th>
                  <th>City</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
    <?php

    $res=mysqli_query($conn,"SELECT * from party_info");
    while ($row = mysqli_fetch_array($res)) {
    ?>



                <tr >
                <td><?php echo $row["id"] ; ?> </td>
                  <td><?php echo $row["firstname"] ; ?> </td>
                  <td><?php echo $row["lastname"] ; ?> </td>
                  <td><?php echo $row["bussinessname"] ; ?> </td>
                  <td><?php echo $row["contact"] ; ?> </td>
                  <td><?php echo $row["adress"] ; ?> </td>
                  <td><?php echo $row["city"] ; ?> </td>
                  <td > <a href ="edit_party.php?id=<?php echo $row["id"] ; ?> " style='color:green' > Edit </a> </td>
                  <td>  <a href ="delete_party.php?id=<?php echo $row["id"] ; ?> " style='color:red'> Delete </a> </td>
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
    mysqli_query($conn , "INSERT into party_info values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[bussinessname]','$_POST[contact]','$_POST[adress]','$_POST[city]')");
        ?>
    <script type="text/javascript">
    document.getElementById("success").style.display = "block" ;
        setTimeout(function(){
        window.location.href = window.location.href ;

            },1500);
    </script>

       <?php


    }


?>





<?php
include "footer.php";
?>
