<?php
    echo "i am dailyreport.php";
    
    $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
    $db_user = "scott"; 
    $db_pass = "hellfire123";
    
    $con = oci_connect($db_user,$db_pass); 
    if($con) 
    { 
        echo "Oracle Connection Successful.";
        if(isset($_POST['submit_button'])){
            echo "i am submit";
            $currDate=$_POST['currDate'];
            echo $currDate;
           $arr=explode("-",$currDate);
         
           if($arr[1]=="01"){
               $date=$arr[2]."-"."JAN"."-".$arr[0];
               echo $date;
           }else if($arr[1]=="02"){
            $date=$arr[2]."-"."FEB"."-".$arr[0];
            echo $date;
            }else if($arr[1]=="03"){
                $date=$arr[2]."-"."MAR"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="04"){
                $date=$arr[2]."-"."APR"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="05"){
                $date=$arr[2]."-"."MAY"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="06"){
                $date=$arr[2]."-"."JUN"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="07"){
                $date=$arr[2]."-"."JUL"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="08"){
                $date=$arr[2]."-"."AUG"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="09"){
                $date=$arr[2]."-"."SEP"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="10"){
                $date=$arr[2]."-"."OCT"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="11"){
                $date=$arr[2]."-"."NOV"."-".$arr[0];
                echo $date;
            }else if($arr[1]=="12"){
                $date=$arr[2]."-"."DEC"."-".$arr[0];
                echo $date;
            }

            $q="select ticketType,sum(TotalTickets),sum(Ticketprice) from ticketReport where currDate='$date' group by TicketType";
        $p=oci_parse($con,$q);
            if($p){
              echo "parsed";
              $ex=oci_execute($p);
                  if($ex){
                      echo "data fetched";
                  }else{
                      echo "error while fetchung data";
                  }
              
          }else{
              echo "error while parsing";
          }
            

          

          $q="select mailtype,count(MailType),mailservice,sum(Parcelprice),sum(InsurancePrice),sum(TotalPrice) from parcel where issuedate='$date' group by mailservice,mailtype";
          $p2=oci_parse($con,$q);
          if($p2){
            echo "parsed";
            $ex=oci_execute($p2);
                if($ex){
                    echo "data fetched";
                }else{
                    echo "error while fetchung data";
                }
            
        }else{
            echo "error while parsing";
        }

            
        }else{
            echo "submit failed";
        }

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
            <h1 style="text-align: center;"></h1>
            <!-- <p style="text-align: center;">Stamps and Parcel Report</p> -->

  <h1 class="head" style="font-size:60px;">DAILY REPORT</h1>

    <div class="container">
      <div class="row">
          <div class="col-2">Date:</div>
          <div class="col-4"><strong><?php echo $date?></strong></div>
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
    <div style="font-size:50px; text-align:center;">Tickets Report</div>
    <div class="container tracking">
      <div class="row tracking-head">
        <div class="col-3"><strong>Type</strong></div>
        <div class="col-3"><strong>Qty</strong></div>
        <div class="col-3"><strong>Amount</strong></div>
      </div>

      <table width="100%" align="center">
        <?php
            $total_Ticket_Amount=0;
            $total_Tickets=0;
            while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
        ?>

            <tr>
                <div class="row">
                    <div class="col-3"><?php echo $row["TICKETTYPE"];?></div>
                    <div class="col-3"><?php echo $row["SUM(TOTALTICKETS)"];?></div>
                    <div class="col-3"><?php echo $row["SUM(TICKETPRICE)"];?></div>
                    <?php
                        $total_Ticket_Amount+=$row["SUM(TICKETPRICE)"];
                        $total_Tickets+=$row["SUM(TOTALTICKETS)"];
                    ?>
                </div>
            </tr>	
		<?php  } ?>
        </table> 

        <div class="row tracking-head">
            <div class="col-3"><strong></strong></div>
            <div class="col-3"><strong><?php echo $total_Tickets?></strong></div>
            <div class="col-3"><strong><?php echo $total_Ticket_Amount?></strong></div>
        </div>

    </div>



    <div style="font-size:50px; text-align:center;">Parcels Report</div>
    <div class="container tracking">
      <div class="row tracking-head">
        <div class="col-2"><strong>MailType</strong></div>
        <div class="col-2"><strong>Count</strong></div>
        <div class="col-2"><strong>MailService</strong></div>
        <div class="col-2"><strong>ParcelPrice</strong></div>
        <div class="col-2"><strong>InssurancePrice</strong></div>
        <div class="col-2"><strong>TotalPrice</strong></div>
      </div>

      <table width="100%" align="center">
        <?php
            $total_parcel_amount=0;
            $total_insurance_amount=0;
            $total_amount=0;
            while($row = oci_fetch_array($p2, OCI_BOTH+OCI_RETURN_NULLS)) {
        ?>

            <tr>
                <div class="row">
                    <div class="col-2"><?php echo $row["MAILTYPE"];?></div>
                    <div class="col-2"><?php echo $row["COUNT(MAILTYPE)"];?></div>
                    <div class="col-2"><?php echo $row["MAILSERVICE"];?></div>
                    <div class="col-2"><?php echo $row["SUM(PARCELPRICE)"];?></div>
                    <div class="col-2"><?php echo $row["SUM(INSURANCEPRICE)"];?></div>
                    <div class="col-2"><?php echo $row["SUM(TOTALPRICE)"];?></div>

                    <?php
                        $total_parcel_amount+=$row["SUM(PARCELPRICE)"];
                        $total_insurance_amount+=$row["SUM(INSURANCEPRICE)"];
                        $total_amount+=$row["SUM(TOTALPRICE)"];
                    ?>
                    
                </div>
            </tr>	
		<?php  } ?>
        </table> 

        <div class="row tracking-head">
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-2"><strong><?php echo $total_parcel_amount?></strong></div>
            <div class="col-2"><strong><?php echo $total_insurance_amount?></strong></div>
            <div class="col-2"><strong><?php echo $total_amount?></strong></div>
        </div>

       <?php $total_amount_collected=$total_amount+$total_Ticket_Amount;?>
        

    </div>

    <div class="row tracking-head">
            <div class="col-4"></div>
            <div class="col-4"><strong>Total Amount Collected : <?php echo $total_amount_collected?></strong></div>
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
