<?php

    echo "i am updatetrack.php";
        
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
           $status=$_POST['status'];
           echo $status;
           $city=$_POST['city'];
           echo $city;
           
            // valiadte traking number

            $q="select trackingID from parcel";
            $p=oci_parse($con,$q);
            if($p){
                echo "parsed    ";
                $ex=oci_execute($p);
                if($ex){
                    echo "executed  ";
                    while(($row = oci_fetch_array($p, OCI_BOTH+OCI_RETURN_NULLS)) != false) {
                        echo "i am in ";
                        $tID = $row["TRACKINGID"];
                        echo $tID;
                        if($tID==$track_ID){
                            echo "matched   ";
                            
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
                                $q="insert into TrackHistory(TrackingID,CurrentDate,CurrentLocation,status) values($track_ID,'$curr_date','$city','$status')";   
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
                                
                                
                                // update status in parcel

                                $q="update parcel set status='$status' where trackingID=$track_ID";
                                echo $q;
                                $p2=oci_parse($con,$q);  
                                if($p2){
                                    echo "parsed";
                                    $ex=oci_execute($p2);
                                        if($ex){
                                            echo "status updted";
                                        }else{
                                            echo "eroro";
                                        }
                                    
                                } 
                        }else{
                            echo "not found ";
                        }
                        
                    }
                    echo "i am out ";
                    ?>
                    <br>
                    <?php
                }else{
                    echo "exe failed    ";
                }
            }


     
        }

    }


    include 'showtrack.php';
?>