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
         <h5><b>Add New Purchase</b></h5>
            </div>
            <div class="widget-content nopadding">
          <form name="form" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <select class="span11" id="companyname" onchange="select_company(this.value)">
<option> Select </option>
    <?php
    $res = mysqli_query($conn , "SELECT * from company_info");
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
              <label class="control-label">Select Product :</label>
              <div class="controls" id="product_name">
            <select class="span11">
                <option>Select</option>
         
            </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Unit :</label>
              <div class="controls">
                <select class="span11" id="unit">
                    <option> Select</option>

                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Packaging Size :</label>
              <div class="controls">
                <select class="span11" id="packing_size">
                    <option>  Select </option>
                </select>
              </div>
            </div>

            <div class="control-group" >
              <label class="control-label">Enter Qty :</label>
              <div class="controls" >
                <input type="text" class="span11" name="qty" value=0 placeholder="Enter the Quantity. . ." >
              </div>
            </div>

            <div class="control-group" >
              <label class="control-label">Enter Price :</label>
              <div class="controls">
                <input type="text" class="span11" name="price" value=0 placeholder="Enter the Price . . ." >
              </div>
            </div>

<div class="control-group">
              <label class="control-label">Select Party Name :</label>
              <div class="controls">
                <select class="span11" id="bussinessname">
                    <option>  Select </option>
                </select>
              </div>
            </div>
  
            <div class="control-group">
              <label class="control-label">Select Purchase Type :</label>
              <div class="controls">
                <input type="radio" id="Cash" name="purchase_type" value="Cash">
                Cash <br>
                <input type="radio" id="Debit"  name="purchase_type" value="Debit">
                Debit <br>

                

                <!-- <select type="radio" class="span11" id="purchase_type">
                    <option >cash</option>
                    <option >debit</option>
                </select> -->
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Expiry date :</label>
              <div class="controls">
                <input type="date" value="2025-05-05" class="span11" name="expiry_date" required >
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Purchase Now</button>
            </div>


            <div class="alert alert-success" id="success" style="display:none">
                 The Purchase inserted successfully!
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


<script type="text/javascript">
  function select_company(company_name)
  {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("product_name").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "forajax/load_products_using_company.php?company_name=" + company_name, true);
    xmlhttp.send();
  }
  
</script>

   <?php

        if(isset($_POST["submit1"])){

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



?>





<?php
include "footer.php";
?>
