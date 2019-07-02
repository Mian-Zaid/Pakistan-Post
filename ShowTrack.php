

<?php

    echo "i am showtrack.php";
        
    $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
    $db_user = "scott"; 
    $db_pass = "hellfire123";

    $con = oci_connect($db_user,$db_pass); 
    if($con) 
    { 
        echo "Oracle Connection Successful.";
        if(isset($_POST['submit_button'])){
            $track_ID=$_POST['tracking_ID'];
            echo $track_ID;
            $CNIC=$_POST['cnic'];
            echo $CNIC;

              // select sysdate

              $q2="select sysdate from dual";
              echo $q2;
              $p=oci_parse($con,$q2);
                  if($p){
                      echo "parsed";
                      $ex=oci_execute($p);
                      if($ex){
                          echo "date retrived : ";
                          while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
                              $curr_date=$row["SYSDATE"];
                              echo $curr_date;
                              
                          }
                      }else{
                          echo "error while insertion";
                      }
                  }
                  else{
      
                      echo "error while parsing";
                  }
            
                //   select all track history

            $q="select * from trackhistory where trackingID=$track_ID";
            echo $q;
            $p=oci_parse($con,$q);
            if($p){
                echo "parsed";
                $ex=oci_execute($p);
                if($ex){
                    echo "executed";
                }
            }


            $q="select AGENTID from parcel where trackingID=$track_ID";
            $p2=oci_parse($con,$q);
            if($p2){
                echo "parsed";
                $ex=oci_execute($p2);
                if($ex){
                    echo "executed";
                    while($row = oci_fetch_array($p2, OCI_BOTH+OCI_RETURN_NULLS)) {
                        $agent=$row["AGENTID"];
                        echo $agent;
                    }
                }
            }

            $q="select ORIGIN from parcel where trackingID=$track_ID";
            $p3=oci_parse($con,$q);
            if($p3){
                echo "parsed";
                $ex=oci_execute($p3);
                if($ex){
                    echo "executed";
                    while($row = oci_fetch_array($p3, OCI_BOTH+OCI_RETURN_NULLS)) {
                        $origin=$row["ORIGIN"];
                        echo $origin;
                    }
                }
            }

            $q="select DESTINATION from parcel where trackingID=$track_ID";
            $p4=oci_parse($con,$q);
            if($p4){
                echo "parsed";
                $ex=oci_execute($p4);
                if($ex){
                    echo "executed";
                    while($row = oci_fetch_array($p4, OCI_BOTH+OCI_RETURN_NULLS)) {
                        $destination=$row["DESTINATION"];
                        echo $destination;
                    }
                }
            }

            // current status

            $q="select STATUS from parcel where trackingID=$track_ID";
            $p5=oci_parse($con,$q);
            if($p5){
                echo "parsed";
                $ex=oci_execute($p5);
                if($ex){
                    echo "executed";
                    while($row = oci_fetch_array($p5, OCI_BOTH+OCI_RETURN_NULLS)) {
                        $status=$row["STATUS"];
                        echo $status;
                    }
                }
            }

            if($status=='Delivered'){
                $deliveredOn=$curr_date;
            }
        }

    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Track</title>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->    
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
        <a class="nav-link" href="mail.html">New Mail</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="track.html">Track</a>
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
            <!-- <h1 style="text-align: center;">Track</h1>
            <p style="text-align: center;">Tracking detials are given below</p> -->

  <h1 class="head" style="font-size:60px;">TRACK REPORT</h1>

    <div class="container">
      <div class="row">
         
      </div>
      <div class="row">
            <div class="col-4"><strong>Tracking Number: <?php echo $track_ID?></strong></div>
          <div class="col-2"></div>
          <div class="col-6 shipment-side-head" style="text-align: center;">Shipment Tracking Summary</div>
      </div>
      <div class="row">
          <div class="col-4">Agent Reference#:<strong> <?php echo $agent?></strong></div>
          <div class="col-2"></div>
          <div class="col-4 shipment-side no-right">Current Status:<strong> <?php echo $status?></strong></div>
          <div class="col-2 shipment-side no-left"></div>
      </div>
      <div class="row">
          <div class="col-4">Origin: <strong> <?php echo $origin?></strong></div>
          <div class="col-2"></div>
          <div class="col-4 shipment-side no-right">Delivered On:<strong> <?php echo $deliveredOn?></strong></div>
          <div class="col-2 shipment-side no-left"></div>
      </div>
      <div class="row">
          <div class="col-4">Destination: <strong> <?php echo $destination?></strong></div>
          <!-- <div class="col-2"></div>
          <div class="col-2 shipment-side no-right"></div>
          <div class="col-4 shipment-side no-left"></div> -->
      </div>
      <!-- <div class="row">
          <div class="col-2">Sender:</div>
          <div class="col-4"></div>
      </div>
      <div class="row">
          <div class="col-2">Reciver:</div>
          <div class="col-4"></div>
      </div> -->
    </div>

      


    <div class="container tracking">
      <div class="row tracking-head">
        <div class="col-3">Date Time</div>
        <div class="col-3">Status</div>
        <div class="col-3">Location</div>
      </div>

      <table width="100%" align="center">
        <?php
            while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
        ?>

            <tr>
                <div class="row">
                    <div class="col-3"><?php echo $row["CURRENTDATE"];?></div>
                    <div class="col-3"><?php echo $row["STATUS"];?></div>
                    <div class="col-3"><?php echo $row["CURRENTLOCATION"];?></div>
                </div>
            </tr>	
		<?php  } ?>
        </table> 

    </div>

  <h3 class="foot">-</h3>
  <button name="search-button" class="btn btn-success btn-lg btn-block">Print</button>

        </div>
    </header>
</div>



    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
