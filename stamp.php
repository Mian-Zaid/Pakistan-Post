<?php

echo "i am stamp.php";
    
$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
$db_user = "scott"; 
$db_pass = "hellfire123";

$con = oci_connect($db_user,$db_pass); 
if($con) 
{ 
    echo "Oracle Connection Successful.";
    if(isset($_POST['submit_button'])){
        echo "i am ssell ";
        $stampType=$_POST['StampType'];
        echo $stampType;
        $qty=$_POST['Quantity'];
        echo $qty;

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

            if($stampType=="5 Rs."){
                $price=5;
            }else if($stampType=="10 Rs."){
                $price=10;
            }else if($stampType=="50 Rs."){
                $price=50;
            }else if($stampType=="100 Rs."){
                $price=100;
            }if($stampType=="250 Rs."){
                $price=250;
            }else if($stampType=="500 Rs."){
                $price=500;
            }

            $totalPrice=$price*$qty;
        $q="insert into ticketReport(ticketType,TotalTickets,TicketPrice,CurrDate) values('$stampType',$qty,$totalPrice,'$curr_date')";
        
        
        $p=oci_parse($con,$q);
        if($p){
            echo "parsed";
            $ex=oci_execute($p);
            if($ex){
                echo "data inserted";
            }else{
                echo "error while insering adta";
            }
        }else{
            echo "parsed failed";
        }

    }else{
        echo "sell failed";
    }


}

include 'stamp.html';
?>