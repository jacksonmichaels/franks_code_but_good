use clientprocess;

select * from corpclient;
select * from address;
select * from clientcomments;
select * from clientsoftware;
select * from department;
select * from software;

select corpclient.cid,cfn,cln,cstreet,ccity,cst,czip
from corpclient, address
where corpclient.cid=address.cid