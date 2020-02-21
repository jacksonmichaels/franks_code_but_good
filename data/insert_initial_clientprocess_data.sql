use clientprocess;

delete from software where soft_id>0;
delete from department where dept_id>0;

insert into department values(1, "Marketing");
insert into department values(2, "Accounting");
insert into department values(3, "Operations");
insert into department values(4, "IT");

insert into software values(1,"Windows 10",1);
insert into software values(2,"Windows 8",1);
insert into software values(3,"Windows 7",1);
insert into software values(4,"MAC",1);
insert into software values(5,"Word",2);
insert into software values(6,"Excel",2);
insert into software values(7,"PowerPoint",2);

select * from software;
select * from department
