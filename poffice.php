
<?php
     echo "i am poffice.php";
    
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
     $db_user = "scott"; 
     $db_pass = "hellfire123";
 
     $con = oci_connect($db_user,$db_pass); 
     if($con) 
     { 
         echo "Oracle Connection Successful.";
         if(isset($_POST['submit_button'])){
             echo "i am submit ";

             $q="select branchcode from gpo";
             $p=oci_parse($con,$q);
                if($p){
                    echo "parsed";
                    $ex=oci_execute($p);
                    if($ex){
                        echo "data retriced";
                       
                    }else{
                        echo "error while insertion";
                    }
                }
                else{
                    echo "error while parsing";
                }
         }else{
            echo "submit failed";
         }  

    }else{
        echo "conn failed";
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
        <a class="nav-link" href="mail.html">New Mail</a>
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
        <a class="nav-link active" href="gpo_post_staff.html">GPO/PostOffice/Staff</a>
      </li>
    </ul>
</div>


<div class="container">
    <header class="jumbotron">
        <div class="container">
            <form action="PostOffice.php" method="POST">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>GPO CODE</label>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Branch Name</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <!-- <input type="number" name="gpo_code" class="form-control" placeholder="1234"> -->
                                <select name="gpo_code" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    
                                    <?php
                                        while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
                                            $GpoCode=$row["BRANCHCODE"];
                                            echo $GpoCode;
                                    ?>
                                            <option value="<?php echo $GpoCode;?>"><?php echo $GpoCode?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="branch_name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                <label>Address</label>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Province</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="city" class="form-control" placeholder="City">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="province" class="form-control" placeholder="Province">
                    </div>  
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Phone#</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="number" name="phone" class="form-control" placeholder="051111111">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="email" class="form-control" placeholder="gpo@gmail.com">
                    </div>
                </div>

                <button type="submit" name="submit_button" class="btn btn-success btn-lg btn-block" >Submit</button>

            </form>
        </div>
    </header>
</div>


    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

