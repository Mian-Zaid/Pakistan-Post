<?php
    echo "i am yearlyreport.php";
    
    $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
    $db_user = "scott"; 
    $db_pass = "hellfire123";
    
    $con = oci_connect($db_user,$db_pass); 
    if($con) 
    { 
        echo "Oracle Connection Successful.";
        if(isset($_POST['submit_button_2'])){
            echo "i am submit";
            $year=$_POST['year'];
            echo $year;

            // parcel yearly report

            $q="select extract(month from issuedate),extract(year from issuedate),mailtype,count(MailType),mailservice,sum(Parcelprice),sum(InsurancePrice),sum(TotalPrice) from parcel where extract(year from issuedate)='$year' group by extract(month from issuedate),extract(year from issuedate),mailtype,mailservice";
            $p=oci_parse($con,$q);
            if($p){
                echo "parsed";
                $ex=oci_execute($p);
                if($ex){
                    echo "executed";
                    
                }else{
                    echo "exe failed";
                }
            }else{
                echo "error while parsed";
            }


            // stmp yearly report

            $q="select extract(month from currdate),extract(year from currdate),TicketType,sum(totalTickets),sum(ticketPrice) from ticketreport where extract(year from currdate)='$year' group by tickettype,extract(month from currdate),extract(year from currdate)";
            $p2=oci_parse($con,$q);
            if($p2){
                echo "parsed";
                $ex=oci_execute($p2);
                if($ex){
                    echo "executed";
                    
                }else{
                    echo "exe failed";
                }
            }else{
                echo "error while parsed";
            }
        }


    }else{
        echo "connection failed";
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
        <a class="nav-link" href="track.html">Track</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="funds.html">Update Track</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="reports.html">Reports</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="stamp.html">Stamps</a>
        </li>
    </ul>
</div>


<div class="container">
    <header class="jumbotron">
        <div class="container">
            <h1 style="text-align: center;font-size:60px;"></h1>
            <!-- <p style="text-align: center;">Print and hands to the customer</p> -->

  <h1 class="head" style="font-size:60px;">YEARLY REPORT</h1>

    <div class="container">
      <div class="row">
          <div class="col-2">Year:</div>
          <div class="col-4"><strong><?php echo $year?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Branch:</div>
          <div class="col-4"></div>
          <div class="col-2">Name:</div>
          <div class="col-4"></div>
      </div>
      <div class="row">
          <div class="col-2">Manager Name:</div>
          <div class="col-4"></div>
      </div>
    </div>

    <div style="font-size:50px; text-align:center;">Parcels Report</div>
    <div class="container tracking">
      <div class="row tracking-head">
        <div class="col-2"><strong>Month</strong></div>
        <div class="col-2"><strong>MailType</strong></div>
        <div class="col-2"><strong>MailCount</strong></div>
        <div class="col-2"><strong>MailService</strong></div>
        <div class="col-1"><strong>Parcel</strong></div>
        <div class="col-1"><strong>Inssurance</strong></div>
        <div class="col-1"><strong>Total</strong></div>
      </div>

    <!-- <table> -->
      <?php
       $parcel_total=0;
        while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
      ?>      
         <div class="row">
            <div class="col-2"><?php echo $row["EXTRACT(MONTHFROMISSUEDATE)"]; ?></div>
            <div class="col-2"><?php echo $row["MAILTYPE"]; ?></div>
            <div class="col-2"><?php echo $row["COUNT(MAILTYPE)"]; ?></div>
            <div class="col-2"><?php echo $row["MAILSERVICE"]; ?></div>
            <div class="col-1"><?php echo $row["SUM(PARCELPRICE)"]; ?></div>
            <div class="col-1"><?php echo $row["SUM(INSURANCEPRICE)"]; ?></div>
            <div class="col-1"><?php echo $row["SUM(TOTALPRICE)"]; ?></div>

          <?php  $parcel_total+=$row["SUM(TOTALPRICE)"];?>
        </div>
      <?php   
        }
      ?>
    <!-- </table> -->
    <div class="row tracking-head">
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-2"></div>
        <div class="col-4"><strong>Total Amount Collected : <?php  echo $parcel_total?></strong></div>
        
      </div>
    </div>

    

    <div style="font-size:50px; text-align:center;">Stamps Report</div>
    <div class="container tracking">
      <div class="row tracking-head">
        <div class="col-3"><strong>Month</strong></div>
        <div class="col-3"><strong>StampType</strong></div>
        <div class="col-3"><strong>StampCount</strong></div>
        <div class="col-3"><strong>Stamp Price</strong></div>
        
      </div>

    <!-- <table> -->
      <?php
        $ticket_total=0;
        while($row = oci_fetch_array($p2, OCI_BOTH+OCI_RETURN_NULLS)) {
      ?>      
         <div class="row">
            <div class="col-3"><?php echo $row["EXTRACT(MONTHFROMCURRDATE)"] ?></div>
            <div class="col-3"><?php echo $row["TICKETTYPE"] ?></div>
            <div class="col-3"><?php echo $row["SUM(TOTALTICKETS)"] ?></div>
            <div class="col-3"><?php echo $row["SUM(TICKETPRICE)"] ?></div>
            
            <?php  $ticket_total+=$row["SUM(TICKETPRICE)"];?>
        </div>
      <?php   
        }
      ?>
    <!-- </table> -->
    <div class="row tracking-head">
        <div class="col-3"></div>
        <div class="col-3"></div>
        <div class="col-1"></div>
        <div class="col-5"><strong>Total Amount Collected : <?php  echo $ticket_total?></strong></div>
        
      </div>
    </div>


    <div class="row tracking-head">
        <div class="col-4"></div>
        <div class="col-4"><strong>Total Amount Collected : <?php  echo $parcel_total+$ticket_total?></strong></div>
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
