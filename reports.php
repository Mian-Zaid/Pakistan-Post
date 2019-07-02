
<?php
     echo "i am staff.php";
    
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
     $db_user = "scott"; 
     $db_pass = "hellfire123";
 
     $con = oci_connect($db_user,$db_pass); 
     if($con) 
     { 
         echo "Oracle Connection Successful.";
         $q="select branchcode from poffice";
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

                $p_2=oci_parse($con,$q);
                if($p_2){
                    echo "parsed";
                    $ex=oci_execute($p_2);
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
        echo "conn failed";
    }


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Track</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script type="text/javascript" src="functions.js"></script>
    </head>

    <body>

        <nav class="navbar">
                  <div class="navbar-header">
                    <a >
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
        <a class="nav-link " href="mail_1.php">New Mail</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="track.html">Track</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="funds.html">Update Track</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link active" href="reports.html">Reports</a>
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
    <div class="jumbotron">
        <div class="container">
            <h1 style="text-align: center;">Reports</h1>
            <p style="text-align: center;">Enter details for serach</p>

            <div class="card search-input-box">
                <div class="card-header">
                    Reports
                </div>
                <div class="container">
                        <form method="POST" action="report-daily.php">
                            <div class="form-group">
                                <label style="margin-top: 10px;">Enter date Of which you want to Generate Report</label>
                                <input type="date" class="form-control col-2" name="currDate">

                                <select name="branch_code" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    
                                    <?php
                                        while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
                                            $branchCode=$row["BRANCHCODE"];
                                            echo $branchCode;
                                    ?>
                                            <option value="<?php echo $branchCode;?>"><?php echo $branchCode?></option>
                                    <?php
                                        }
                                    ?>
                                </select>


                                <button type="submit" name="submit_button" class="btn btn-success btn-lg btn-block" style="margin-top: 20px">Generate Daily Report</button>
                            </div>
                        </form>

                        <form  method="POST" action="report-yearly.php">
                            <div class="form-group">
                                <label>Enter Year Of which you want to Generate Report</label>
                                <input type="number" class="form-control col-2" name="year" placeholder="2019">
                                <select name="branch_code" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    
                                    <?php
                                        while($row = oci_fetch_array($p_2, OCI_BOTH+OCI_RETURN_NULLS)) {
                                            $branchCode=$row["BRANCHCODE"];
                                            echo $branchCode;
                                    ?>
                                            <option value="<?php echo $branchCode;?>"><?php echo $branchCode?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <button type="submit" name="submit_button_2" class="btn btn-success btn-lg btn-block" style="margin-bottom: 20px; margin-top: 20px; ">Generate Yearly Report</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>   
</div>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
