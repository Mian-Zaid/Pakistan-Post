<?php
     echo "i am mail_1.php";
    
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
     $db_user = "scott"; 
     $db_pass = "hellfire123";
 
     $con = oci_connect($db_user,$db_pass); 
     if($con) 
     { 
         echo "Oracle Connection Successful.";

        // $q="select branchcode from poffice";
        //  $p=oci_parse($con,$q);
        //  if($p){
        //      echo "parsed";
        //      $ex=oci_execute($p);
        //      if($ex){
        //          echo "data inserted";
        //      }else{
        //          echo "error while insertion";
        //      }
        //  }
        //  else{

        //      echo "error while parsing";
        //  }
         


        //  if(isset($_POST['submit_button'])){
        //  echo "i am submit ";
 
        //  }else{
        //      echo "error";
        //  }
    }else{
        echo "not connect";
    } 



?>



<!DOCTYPE html>
<html>
    <head>
        <title>Mail</title>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script type="text/javascript" src="functions.js"></script>
    </head>

    <body>

        <nav class="navbar">
                  <div class="navbar-header">
                    <a href="/campgrounds">
                        <img src="wingg.png" class="icon">      
                    </a>
                </div>
                <div class="colapse navbar-colapse">
                    <ul class="nav navbar-nav navbar-right">
                        <a>
                            <img class="profile-picture img-fluid" src="rain.jpg">
                        </a> 
                    </ul>
                </div>
        </nav>
        

<div class="navigation">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" href="home.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="mail_1.php">New Mail</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="track.html">Track</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="funds.html">Update Track</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reports.html">Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stamp.html">Stamps</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gpo_post_staff.html">GPO/PostOffice/Staff</a>
      </li>
    </ul>
</div>


<div class="container">
    <header class="jumbotron">
        <div class="container">
            <h1 style="text-align: center;">Register</h1>
            <p style="text-align: center;">Fill the form to register</p>

<form method="POST" action="mail.php">
  <!-- Customer information -->
  <h3 class="head">Customer</h3>
  <label>Name</label>
  <div class="form-row">
    <div class="form-group col-md-4">
      <!-- <label>First Name</label> -->
      <input type="text" name="customer-first-name" class="form-control" placeholder="First Name">
    </div>
    <div class="form-group col-md-4">
      <!-- <label>Last Name</label> -->
      <input type="text" name="customer-middle-name" class="form-control" placeholder="Middle Name">
    </div>
    <div class="form-group col-md-4">
      <!-- <label>Last Name</label> -->
      <input type="text" name="customer-last-name" class="form-control" placeholder="Last Name">
    </div>
  </div>

    <div class="form-row">
      <label class="form-group col-md-6">CNIC</label>
      <label class="form-group col-md-6">Phone number</label>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
      
        <input type="Number" name="customer-cnic" class="form-control" placeholder="1420214202142">
      </div>
      <div class="form-group col-md-6">
        
        <input type="Number" name="customer-phone-number"class="form-control" placeholder="03001234567">
      </div>  
    </div>
    
  <div class="form-group">
    <label>Address</label>
    <input type="text" name="customer-address" class="form-control" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <label class="form-group col-md-6">City</label>
    <label class="form-group col-md-6">Province</label>
  </div>
  
 
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <input type="text" name="customer-city" class="form-control" placeholder="City name">
    </div>
    
    <div class="form-group col-md-6">
      <!-- <input type="text" name="customer-province" class="form-control" placeholder="Province name"> -->
      <select name="customer-province" class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="Punjab">Punjab</option>
        <option value="Sindh">Sindh</option>
        <option value="KPK">KPK</option>
        <option value="Balochistan">Balochistan</option>
        <option value="Islamabad">Islamabad Capital Teritory</option>
        <option value="Azad Jammu & Kashmir">Azad Jammu & Kashmir</option>
      </select>
    </div>
  </div>

  
  <div class="form-group">
    <label>Gender</label>
    <div class="form-check">
      <input type="radio" name="customer-gender" value="male"> Male <br>
      <input type="radio" name="customer-gender" value="female"> Female
    </div>
  </div>


  <h3 class="foot">-</h3>

<!-- Parcel area -->

  <h3 class="head">Parcel/Mail</h3>
  <div class="form-group">
    <label>Product description</label>
    <input type="text" name="product-description" class="form-control" placeholder="Detail about the product">
  </div>


  <div class="form-row">
    <div class="input-group mb-3 form-group col-md-6">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Mail type</label>
      </div>
      <select name="mail-type" class="custom-select " id="inputGroupSelect01">
        <option selected value="N/A">Choose...</option>
        <option value="Letter">Letter</option>
        <option value="1Kg">Less then or equal 1kg</option>
        <option value="5Kg">Less then or equal 5kg</option>
        <option value="greater than 5Kg">Greater than 5kg</option>
      </select>
    </div>
    
    
    <div class="input-group mb-3 form-group col-md-6">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Service</label>
      </div>
      <select name="service-type" class="custom-select " id="inputGroupSelect01">
        <option selected value="N/A">Choose...</option>
        <option value="Regular">Regular</option>
        <option value="One day">One day</option>
        <option value="Urgent">Urgent</option>
      </select>
    </div>
    
  </div>



  <div>
    <label>Insurance</label>
    <input type="checkbox" id="myCheck" onclick="myFunction()">
    <div id="insurance-details" style="display:none" class="form-group insurance">
      <label>(2% of the original price)</label>
      <input type="text" name="product-price" class="form-control" value=0 placeholder="Price of the product">
    </div>
  </div>


  <h3 class="foot">-</h3>


<!-- Reciever information -->
  <h3 class="head">Reciever</h3>
  <label>Name</label>
  <div class="form-row">
    <div class="form-group col-md-4">
      <input type="text" name="reciver-first-name" class="form-control" placeholder="First Name">
    </div>
    <div class="form-group col-md-4">
      <input type="text" name="reciver-middle-name" class="form-control" placeholder="Middle Name">
    </div>
    <div class="form-group col-md-4">
      <input type="text" name="reciver-last-name" class="form-control" placeholder="Last Name">
    </div>
  </div>

  <div class="form-row">
    <label class="form-group col-md-6">CNIC</label>
    <label class="form-group col-md-6">Phone number</label>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    
      <input type="Number" name="Reciver-cnic" class="form-control" placeholder="1420214202142">
    </div>
    <div class="form-group col-md-6">
      
      <input type="Number" name="reciver-phone-number"class="form-control" placeholder="03001234567">
    </div>  
  </div>

  <div class="form-group">
    <label>Address</label>
    <input type="text" name="reciever-address" class="form-control" placeholder="Apartment, studio, or floor">
  </div>

  <div class="form-row">
    <label class="form-group col-md-6">City</label>
    <label class="form-group col-md-6">Province</label>
  </div>
  
 
  <div class="form-row">
    
    <div class="form-group col-md-6">
      <input type="text" name="reciver-city" class="form-control" placeholder="City name">
    </div>
    
    <div class="form-group col-md-6">
      <!-- <input type="text" name="customer-province" class="form-control" placeholder="Province name"> -->
      <select name="reciver-province" class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        <option value="Punjab">Punjab</option>
        <option value="Sindh">Sindh</option>
        <option value="KPK">KPK</option>
        <option value="Balochistan">Balochistan</option>
        <option value="Islamabad">Islamabad Capital Teritory</option>
        <option value="Azad Jammu & Kashmir">Azad Jammu & Kashmir</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label>Gender</label>
    <div class="form-check">
      <input type="radio" name="reciever-gender" value="male"> Male <br>
      <input type="radio" name="reciever-gender" value="female"> Female
    </div>
  </div>  
  <h3 class="foot">-</h3>

  <h3 class="head">Agent/Staff</h3>
    <div class="form-row">
     
      <label class="form-group col-md-6">BranchID</label>
      <label class="form-group col-md-6">AgentID</label>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="number" name="BranchID" class="form-control" placeholder="1234">
           
        </div>
      <div class="form-group col-md-6">
          <input type="number" name="AgentID" class="form-control" placeholder="1234">
      </div>
    </div>
   
  <h3 class="foot">-</h3>

  <button type="submit" name="submit_button" class="btn btn-success btn-lg btn-block">Submit</button>
</form>

        </div>
    </header>
</div>


    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
