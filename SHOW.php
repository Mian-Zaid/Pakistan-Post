<html>
  <head><title>Confirm</title></head>
  <body><br><br><br>
   <?php
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
     $db_user = "scott"; 
     $db_pass = "hellfire123";
     
      $con = oci_connect($db_user,$db_pass); 
      if($con) 
      { 
       echo "Oracle Connection Successful.";
        
      } 
   else 
      { die('Could not connect to Oracle: '); 
      }
     $query="select * from trackhistory where trackingID=1234";
     $a = oci_parse($con, $query); 
     $r = oci_execute($a);
?>
  <table border="true" width="80%" align="center">
        <?php
            while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS)) {
        ?>

            <tr>
                <td><?php echo $row["TRACKINGID"];?></td>
                <td><?php echo $row["CURRENTDATE"];?></td>
                                
               <td><?php echo $row["CURRENTLOCATION"]."	 ";?></td>
               <td><?php echo $row["STATUS"]."	 ";?></td>
            </tr>			
            

		<?php  } ?>
        </table>        

  </body>
</html>