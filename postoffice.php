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

                $GpoCode=$_POST['gpo_code'];
                $BranchName=$_POST['branch_name'];
                $address=$_POST['address'];
                $city=$_POST['city'];
                $province=$_POST['province'];
                $phno=$_POST['phone'];
                $email=$_POST['email'];

                echo "gpo code = ";echo $GpoCode;

                $q="insert into poffice(BranchName,Address,City,Province,GpoCode,BranchPhone,BranchEmail) values('$BranchName','$address','$city','$province',$GpoCode,$phno,'$email')";
                echo $q;
                // $q="insert into poffice(BranchName,Address,City,Province,GpoCode,BranchPhone,BranchEmail) values('fistbranch','main market','rawalpindi','punjab',1160,0511235,'p@gmail.com')";
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

