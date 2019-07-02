
<?php

$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = pc1)(PORT = 1521)) ) (CONNECT_DATA = (SID = orcl) ) )"; 
$db_user = "scott"; 
$db_pass = "hellfire123";

$con = oci_connect($db_user,$db_pass); 
if($con) 
{ 
    echo "Oracle Connection Successful.";
    
            // creat tables

             $q="@'C:\Program Files (x86)\Zend\Apache2\htdocs\script.txt'";
            // $q="CREATE TABLE GPO(
            //     BranchCode number(4) not null,
            //     Address varchar2(30),
            //     City varchar2(10),
            //     Province varchar2(10),
            //     BranchPhone number(11),
            //     BranchHead varchar2(15),
            //     BranchEmail varchar2(20),
            //     constraint pk01 primary key (branchCode))";
            echo $q;
            $p=oci_parse($con,$q);
            if($p){
                echo "parsed ";
                echo $p;
                $ex=oci_execute($p);
                if($ex){
                    echo "All tables created ";
                }else{
                    echo "error in tables creation ";
                }
            } 
            else{
                echo "error in parse ";
            }   

            ?>
    <br>
    <?php
        // // create table for Customer

        // $q="CREATE TABLE Customer(
        //     CustID number(4) not null,
        //     FirstName varchar2(10) not null,
        //     MiddleName varchar2(10),
        //     LastName varchar2(10) not null,
        //     CNIC number(13) not null,
        //     ContactNo number(12),
        //     Address varchar2(30),
        //     City varchar2(10),
        //     Province varchar2(10),
        //     Gender varchar2(6) not null,
        //     constraint pk03 primary key (CustID))";
        // $p=oci_parse($con,$q);
        // if($p){
        //     echo "parsed ";
        //     $ex=oci_execute($p);
        //     if($ex){
        //         echo "Customer table created \n";
        //     }else{
        //         echo "error in Customer table craetion \n";
        //     }
        // } 
        // else{
        //     echo "error in parse \n";
        // }   
        ?>
    <br>
    <?php
        // // create sequenec

        // $q="create sequence cust_seq start with 1000";
        // $p=oci_parse($con,$q);
        // if($p){
        //     echo "parsed ";
        //     $ex=oci_execute($p);
        //     if($ex){
        //         echo "sequence created \n";
        //     }else{
        //         echo "error in sequenece craetion \n";
        //     }
        // } 
        // else{
        //     echo "error in parse \n";
        // }   
        ?>
    <br>
    <?php
        // create trigger

        // $q="create or replace trigger cust_tr
        // before insert on Customer
        // for each row
        
        // Begin
        //     select cust_seq.NEXTVAL
        //     into :new.custID
        //     From dual\;
        // End \; /";
        // $p=oci_parse($con,$q);
        // if($p){
        //     echo "parsed ";
        //     $ex=oci_execute($p);
        //     if($ex){
        //         echo "trigegr created \n";
        //     }else{
        //         echo "error in trigger craetion \n";
        //     }
        // } 
        // else{
        //     echo "error in parse \n";
        // }   
        ?>
        <br>
        <?php

        // $q="/";
        // $p=oci_parse($con,$q);
        // if($p){
        //     echo "parsed ";
        //     $ex=oci_execute($p);
        //     if($ex){
        //         echo "trigegr created \n";
        //     }else{
        //         echo "error in trigger craetion \n";
        //     }
        // } 
        // else{
        //     echo "error in parse \n";
        // }   
        ?>
        <br>
        <?php

        // creat table poststaf

    //     $q="CREATE TABLE PPostStaf(
    //         StafID number(4) not null,
    //         BranchCode number(4) not null,
    //         FirstName varchar2(10) not null,
    //         MiddleName varchar2(10),
    //         LastName varchar2(10) not null,
    //         CNIC number(13) not null,
    //         FatherName varchar2(15),
    //         MotherName varchar2(15),
    //         ContactNo number(12),
    //         Email varchar2(15),
    //         Address varchar2(30),
    //         City varchar2(10),
    //         Province varchar2(10),
    //         DateOfBirth DATE,
    //         constraint pk05 primary key (StafID))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "post staf table created \n";
    //         }else{
    //             echo "error in poststaf table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
    <br>
    <?php
    //     // creat table post office


    //     $q="CREATE TABLE PostOffice(
    //         BranchCode number(4) not null,
    //         BranchName varchar2(20) not null,
    //         Address varchar2(30),
    //         City varchar2(10),
    //         Province varchar2(10),
    //         GPOCode number(4) not null,
    //         BranchHead number(4) not null,
    //         BranchPhone number(11),
    //         BranchEmail varchar2(20),
    //         BranchFax varchar2(15),
    //         DailyCASH number(10),
    //         constraint pk02 primary key (branchCode),
    //         constraint fk01 foreign key (GPOCode) references GPO(branchCode),
    //         constraint fk_br_head foreign key (BranchHead) references PPostStaf(StafID))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "post office table created \n";
    //         }else{
    //             echo "error in post table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
    <br>
    <?php
    //     // alter post staf

        
    //     $q="alter table PPostStaf
    //     add constraint fk03 foreign key (BranchCode) references PostOffice(branchCode)";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "post staff table altered \n";
    //         }else{
    //             echo "error in post staff table alteration \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
    <br>
    <?php
    //     // crete tabel for Mail/parcel

    //     $q="CREATE TABLE Parcel(
    //         MailNo number(10) not null,
    //         MailType varchar2(10),
    //         MailService varchar2(10),
    //         TrackingID number(10) not null,
    //         Status varchar2(10),
    //         InsuranceList NUMBER(1,0),
    //         IssueDate DATE,
    //         ExpectedDeliverDate DATE,
    //         DeliveredOn DATE,
    //         Description varchar2(50),
    //         BranchCode number(4) not null,
    //         AgentID number(10) not null,
    //         constraint pk08 primary key (MailNO),
    //         constraint fk07 foreign key (AgentID) references PPostStaf(StafID),
    //         constraint fk08 foreign key (BranchCode) references PostOffice(branchCode))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "Parcel table created ";
    //         }else{
    //             echo "error in Parcel table craetion ";
    //         }
    //     } 
    //     else{
    //         echo "error in parse ";
    //     }   
        ?>
    <br>
    <?php
    //     // creat table invoice

    //     $q="CREATE TABLE Invoice(
    //         InvoiceID number(15) not null,
    //         TrackingID number(15) not null,
    //         CustID number(4) not null,
    //         RecipentName varchar2(15) not null,
    //         RecipentAddress varchar2(30),
    //         RecipentCity varchar2(10),
    //         RecipentProvince varchar2(10),
    //         RecipentCNIC number(13),
    //         constraint pk04 primary key (InvoiceID,CustID),
    //         constraint fk02 foreign key (CustID) references Customer(CustID))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "invoice table created \n";
    //         }else{
    //             echo "error in Invoice table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
        <br>
        <?php
    //     // craete table ticket report

    //     $q="CREATE TABLE TicketReport(
    //         TicketID number(10) not null,
    //         TicketType varchar2(10),
    //         TotalTickets number(10),
    //         TicketPrice number(10),
    //         IssuedBy number(4) not null,
    //         BranchCode number(4) not null,
    //         constraint pk06 primary key (TicketID),
    //         constraint fk04 foreign key (IssuedBy) references PPostStaf(StafID),
    //         constraint fk05 foreign key (BranchCode) references PostOffice(branchCode))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "ticket report table created \n";
    //         }else{
    //             echo "error in ticket report table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
    <br>
    <?php
    //     // creat table track history

    //     $q="CREATE TABLE TrackHistory(
    //         TrackingID number(10) not null,
    //         CurrentDate DATE,
    //         CurrentLocation varchar2(10),
    //         constraint pk07 primary key (TrackingID),
    //         constraint fk06 foreign key (TrackingID) references Parcel(MailNo))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "track history table created \n";
    //         }else{
    //             echo "error in track history table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
    <br>
    <?php
    //     // craet table mail report

    //     $q="CREATE TABLE MailReport(
    //         MailReportID number(10) not null,
    //         MailType varchar2(10),
    //         TotalMails number(10),
    //         AmountCollected number(10),
    //         IssuedBy number(4) not null,
    //         constraint pk10 primary key (MailReportID),
    //         constraint fk10 foreign key (IssuedBy) references PPostStaf(StafID))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "mail report table created \n";
    //         }else{
    //             echo "error in mail report table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 
        ?>
        <br>
        <?php
    //     // create table yearly report

    //     $q="CREATE TABLE YearlyReport(
    //         YearlyReportID number(10) not null,
    //         BranchNo number(4) not null,
    //         ReportType varchar2(10),
    //         NoOfCollecions varchar2(10),
    //         Month varchar2(10),
    //         AmountCollected number(10),
    //         AmountReturned number(10),
    //         NetAmount number(10),
    //         constraint pk09 primary key (YearlyReportID),
    //         constraint fk09 foreign key (BranchNo) references PostOffice(BranchCode))";
    //     $p=oci_parse($con,$q);
    //     if($p){
    //         echo "parsed ";
    //         $ex=oci_execute($p);
    //         if($ex){
    //             echo "yearly report table created \n";
    //         }else{
    //             echo "error in yearly report table craetion \n";
    //         }
    //     } 
    //     else{
    //         echo "error in parse \n";
    //     } 

        ?>
    <br>
    <?php
    }else{
        echo "conection failed";
    }


    // header("Location: C:\Program Files (x86)\Zend\Apache2\htdocs\home.html");

?>