<?php
    echo "i am mail.php";
    
    $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
    $db_user = "scott"; 
    $db_pass = "hellfire123";

    $con = oci_connect($db_user,$db_pass); 
    if($con) 
    { 
        echo "Oracle Connection Successful.";
        if(isset($_POST['submit_button'])){
        echo "i am submit ";


        

        // insert into customer table
        $first_name=$_POST['customer-first-name'];
        $middle_name=$_POST['customer-middle-name'];
        $last_name=$_POST['customer-last-name'];
        $cnic=$_POST['customer-cnic'];
        $custphoneNo=$_POST['customer-phone-number'];
        $custaddress=$_POST['customer-address'];
        $custcity=$_POST['customer-city'];
        $province=$_POST['customer-province'];
        $gender=$_POST['customer-gender'];
        $custName=$first_name." ".$middle_name." ".$last_name;
        
        echo $first_name;

        $q="insert into customer(FirstName,MiddleName,LastName,CNIC,ContactNo,Address,City,Province,Gender) values('$first_name','$middle_name','$last_name',$cnic,$custphoneNo,'$custaddress','$custcity','$province','$gender')";
            echo $q;
        $p=oci_parse($con,$q);
            if($p){
                echo "parsed";
                $ex=oci_execute($p);
                if($ex){
                    echo "data inserted";
                }else{
                    echo "error while insertion";
                }
            }
            else{

                echo "error while parsing";
            }
        

            


        // select cust ID from cust
        
        $q="select custID from customer where CNIC=$cnic";
        echo $q;
        $p=oci_parse($con,$q);
            if($p){
                echo "parsed";
                $ex=oci_execute($p);
                if($ex){
                    echo "cust ID retrived : ";
                    
                    while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
                        $custID=$row["CUSTID"];
                        echo $custID;
                    }
                    
                }else{
                    echo "error while insertion";
                }
            }
            else{
                echo "error while parsing";
            }

        // insert into parcel table

        $mail_type=$_POST['mail-type'];
        $mail_service=$_POST['service-type'];
          if($mail_type=="Letter"){

            if($mail_service=="Regular"){
                if($province==$recipent_province){
                    $price=100;
                }else{
                    $price=150;
                }
            }else if($mail_service=="One day"){
                if($province==$recipent_province){
                    $price=100*1.5;
                }else{
                    $price=150*1.5;
                }
            }else if($mail_service=="Urgent"){
                if($province==$recipent_province){
                    $price=100*2;
                }else{
                    $price=150*2;
                }
            }

              
          }  
          else if($mail_type=="1Kg"){

            if($mail_service=="Regular"){
                if($province==$recipent_province){
                    $price=300;
                }else{
                    $price=450;
                }
            }else if($mail_service=="One day"){
                if($province==$recipent_province){
                    $price=300*1.5;
                }else{
                    $price=450*1.5;
                }
            }else if($mail_service=="Urgent"){
                if($province==$recipent_province){
                    $price=300*2;
                }else{
                    $price=450*2;
                }
            }

           
          }
          else if($mail_type="5Kg"){

            if($mail_service=="Regular"){
                if($province==$recipent_province){
                    $price=500;
                }else{
                    $price=750;
                }
            }else if($mail_service=="One day"){
                if($province==$recipent_province){
                    $price=500*1.5;
                }else{
                    $price=750*1.5;
                }
            }else if($mail_service=="Urgent"){
                if($province==$recipent_province){
                    $price=500*2;
                }else{
                    $price=750*2;
                }
            }

           
          }
          else if($mail_type=="greater than 5Kg"){

            if($mail_service=="Regular"){
                if($province==$recipent_province){
                    $price=700;
                }else{
                    $price=1000;
                }
            }else if($mail_service=="One day"){
                if($province==$recipent_province){
                    $price=700*1.5;
                }else{
                    $price=1000*1.5;
                }
            }else if($mail_service=="Urgent"){
                if($province==$recipent_province){
                    $price=700*2;
                }else{
                    $price=1000*2;
                }
            }

           
          }

        
        $status='Arrived at Origin';
        $InsuranceList=0;
        

            // select sysdate

            $q="select sysdate from dual";
            echo $q;
            $p=oci_parse($con,$q);
                if($p){
                    echo "parsed";
                    $ex=oci_execute($p);
                    if($ex){
                        echo "date retrived : ";
                        while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
                            $issue_date=$row["SYSDATE"];
                            echo $issue_date;
                            $expected_date=$issue_date;
                            $delivered_date=$issue_date;
                        }
                    }else{
                        echo "error while insertion";
                    }
                }
                else{
    
                    echo "error while parsing";
                }

        $description=$_POST['product-description'];
        $branchCode=$_POST['BranchID'];
        $AgentID=$_POST['AgentID'];
        $Insurance_Price=0;
        $track_ID=0000;
        $total_Price=$price;
        $product_price=$_POST['product-price'];
        if($product_price==0){
            $Insurance="NO";
        }else if($product_price>0){
            $Insurance="YES";
            $Insurance_Price=0.02*$product_price;
            $total_Price=$Insurance_Price+$price;
        }

         



     

        // insert into invoice table

        $fname=$_POST['reciver-first-name'];
        $mname=$_POST['reciver-middle-name'];
        $lname=$_POST['reciver-last-name'];
        $recipent_name=$fname." ".$mname." ".$lname;
        $recipent_adrress=$_POST['reciever-address'];
        $recipent_city=$_POST['reciver-city'];
        $recipent_province=$_POST['reciver-province'];
        $recipent_phoneNo=$_POST['reciver-phone-number'];
        $recipent_cnic=$_POST['Reciver-cnic'];
        $q="insert into invoice(CustID,RecipentName,RecipentAddress,RecipentCity,RecipentProvince,RecipentCnic,RecipentPhoneNo) 
        values($custID,'$recipent_name','$recipent_adrress','$recipent_city','$recipent_province',$recipent_cnic,$recipent_phoneNo)";
            echo $q;
        $p=oci_parse($con,$q);
        if($p){
            echo "parsed";
            $ex=oci_execute($p);
            if($ex){
                echo "data inserted";
            }else{
                echo "error while insertion";
            }
        }
        else{

            echo "error while parsing";
        }

        $q="insert into parcel(mailtype,mailservice,status,InsuranceList,Issuedate,Expecteddeliverdate,DeliveredOn,Description,BranchCode,AgentID,ParcelPrice,InsurancePrice,TotalPrice,Origin,Destination) 
        values('$mail_type','$mail_service','$status',$InsuranceList,'$issue_date','$expected_date','$delivered_date','$description',$branchCode,$AgentID,$price,$Insurance_Price,$total_Price,'$custcity','$recipent_city')";
        echo $q;
        $p=oci_parse($con,$q);
            if($p){
                echo "parsed";
                $ex=oci_execute($p);
                if($ex){
                    echo "data inserted";
                }else{
                    echo "error while insertion";
                }
            }
            else{

                echo "error while parsing";
            }


            // select tracking ID

            $q="select max(trackingID) from parcel";
            $p=oci_parse($con,$q);
                if($p){
                    $ex=oci_execute($p);
                    if($ex){
                        echo "executed";
                        while($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) {
                            $track_ID=$row["MAX(TRACKINGID)"];
                            echo $track_ID;
                            
                        }
                    }
                }
            



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


            // insert into track history
            $q="insert into TrackHistory(TrackingID,CurrentDate,CurrentLocation,status) values($track_ID,'$curr_date','$custcity','$status')";   
            echo $q;
            $p=oci_parse($con,$q);  
            if($p){
                echo "parsed";
                $ex=oci_execute($p);
                    if($ex){
                        echo "track updted";
                    }else{
                        echo "eroro";
                    }
                
            }     
           
        }else{
            echo "submit failed";
        }
    } 
    else { 
        echo 'Could not connect to Oracle: '; 
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
            <h1 style="text-align: center;">Reciept</h1>
            <p style="text-align: center;">Print and hands to the customer</p>

  <h3 class="head">PPost Customer Transactions</h3>

    <div class="container">
      <div class="row">
          <div class="col-2">Customer Name: </div>
          <div class="col-4"><strong><?php echo $custName?></strong></div>
          <div class="col-2">Phone#:</div>
          <div class="col-4"><strong><?php echo $custphoneNo?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Address:</div>
          <div class="col-4"><strong><?php echo $custaddress?></strong></div>
          <div class="col-2">City:</div>
          <div class="col-4"><strong><?php echo $custcity?></strong></div>
      </div>
    </div>

    <div class="container tracking">
      <div class="row tracking-head">
        <div><strong>Details</strong></div>
      </div>
      <div class="row">
          <div class="col-2">Tracking ID: </div>
          <div class="col-4"><strong><?php echo $track_ID?></strong></div>
          <div class="col-2">Parcel Type:</div>
          <div class="col-4"><strong><?php echo $mail_type?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Service Type: </div>
          <div class="col-4"><strong><?php echo $mail_service?></strong></div>
          <div class="col-2">Charges:</div>
          <div class="col-4"><strong><?php echo $price?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Reciepent Name:</div>
          <div class="col-4"><strong><?php echo $recipent_name?></strong></div>
          <div class="col-2">Description:</div>
          <div class="col-4"><strong><?php echo $description?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Reciepent Address: </div>
          <div class="col-4"><strong><?php echo $recipent_adrress?></strong></div>
          <div class="col-2">Reciepent City:</div>
          <div class="col-4"><strong><?php echo $recipent_city?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Inssurance:</div>
          <div class="col-4"><strong><?php echo $Insurance?></strong></div>
          <div class="col-2">Inssurance Price:</div>
          <div class="col-4"><strong><?php echo $Insurance_Price?></strong></div>
      </div>
      <div class="row">
          <div class="col-2">Total Price:</div>
          <div class="col-4"><strong><?php echo $total_Price?></strong></div>
          <div class="col-2">Date:</div>
          <div class="col-4"><strong><?php echo $curr_date?></strong></div>
      </div>
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
