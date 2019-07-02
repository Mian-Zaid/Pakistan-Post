<?php
    echo "i am gpo.php";
    
    $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
    $db_user = "scott"; 
    $db_pass = "hellfire123";

    $con = oci_connect($db_user,$db_pass); 
    if($con) 
    { 
        echo "Oracle Connection Successful.";
        if(isset($_POST['submit_button'])){
            echo "i am submit ";

                $Fanme=$_POST['first-name'];
                $Mname=$_POST['middle-name'];
                $Lanme=$_POST['last-name'];
                $ManagerName=$Fanme." ".$Mname." ".$Lanme;
                $address=$_POST['address'];
                $city=$_POST['city'];
                $province=$_POST['province'];
                $phno=$_POST['phone'];
                $email=$_POST['email'];

                $q="insert into gpo(ADDRESS,CITY,PROVINCE,BRANCHPHONE,BRANCHHEAD,BRANCHEMAIL) values('$address','$city','$province',$phno,'$ManagerName','$email')";

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
            }else{
                echo "submit failed";
            }

    }else{
        echo "connection failed";
    }


?>

