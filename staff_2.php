<?php
     echo "i am pstaff_2.php";
    
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
     $db_user = "scott"; 
     $db_pass = "hellfire123";
 
     $con = oci_connect($db_user,$db_pass); 
     if($con) 
     { 
         echo "Oracle Connection Successful.";
         if(isset($_POST['submit_button'])){
             echo "i am submit ";

            //  dob

            $DateofBirth=$_POST['DOB'];
            echo $DateofBirth;
           $arr=explode("-",$DateofBirth);
         
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

            $Fname=$_POST['first_name'];
            $Mname=$_POST['middle_name'];
            $Lname=$_POST['last_name'];
            $Fathername=$_POST['father_name'];
            $Mothername=$_POST['mother_name'];
            $cnic=$_POST['cnic'];
            $contact=$_POST['phone_number'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $city=$_POST['city'];
            $province=$_POST['province'];
            $branchID=$_POST['branch_code'];

             $q="insert into poststaf(FIRSTNAME,MIDDLENAME,LASTNAME,CNIC,FATHERNAME,MOTHERNAME,CONTACTNO,EMAIL,ADDRESS,CITY,PROVINCE,DATEOFBIRTH,BRANCHCODE) values('$Fname','$Mname','$Lname',$cnic,'$Fathername','$Mothername',$contact,'$email','$address','$city','$province','$date',$branchID)";
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
         }else{
            echo "submit failed";
         }  

    }else{
        echo "conn failed";
    }


?>
