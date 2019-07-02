-- Table 1

CREATE TABLE GPO(
BranchCode number(4) not null,
Address varchar2(30),
City varchar2(10),
Province varchar2(10),
BranchPhone number(11),
BranchHead varchar2(15),
BranchEmail varchar2(20),
constraint pk01 primary key (branchCode));

-- table 2

CREATE TABLE Customer(
CustID number(4) not null,
FirstName varchar2(10) not null,
MiddleName varchar2(10),
LastName varchar2(10) not null,
CNIC number(13) not null,
ContactNo number(12),
Address varchar2(30),
City varchar2(10),
Province varchar2(10),
Gender varchar2(6) not null,
constraint pk03 primary key (CustID));

-- table 3

CREATE TABLE Customer(
CustID number(4) not null,
FirstName varchar2(10) not null,
MiddleName varchar2(10),
LastName varchar2(10) not null,
CNIC number(13) not null,
ContactNo number(12),
Address varchar2(30),
City varchar2(10),
Province varchar2(10),
Gender varchar2(6) not null,
constraint pk03 primary key (CustID));

create sequence cust_seq start with 1000;
create or replace trigger cust_tr
before insert on Customer
for each row

Begin
	select cust_seq.NEXTVAL
	into :new.custID
	From dual;
End;
/

