<?php
include('config.php');
// Crétaion de vue qui contient les résultat du 2eme semestre
$tsql8="IF NOT EXISTS(select * FROM sys.views where name = 's6')
BEGIN    
  EXEC ('
  create view s6 (mat,moy,sauv,session,cracq,anet) as select mat,moy,sauv,session,CRACQ,anet from [usthb90000L].[dbo].CREDITRES c
  where sauv = (select max(sauv) from [usthb90000L].[dbo].CREDITRES 
  where mat = c.mat
  and anet= 3
  and session in (''JUIN'',''RJUIN'')
  group by mat)
  and anet=3
  and session in (''JUIN'',''RJUIN'')
  ')
END
ELSE
BEGIN
  EXEC ('
  alter view s6 (mat,moy,sauv,session,cracq,anet) as select mat,moy,sauv,session,CRACQ,anet from [usthb90000L].[dbo].CREDITRES c
where sauv = (select max(sauv) from [usthb90000L].[dbo].CREDITRES 
where mat = c.mat
and anet=3
and session in (''JUIN'',''RJUIN'')
group by mat)
and anet=3
and session in (''JUIN'',''RJUIN'')
  ')
END";
$getresults = $conn->prepare($tsql8)->execute();

// Crétaion d'une table qui contient les résultats du 4eme semestre max(sauv)
// table pour pouvoir l'indexé et améliorer le temps de recherche
// max(sauv) parce que une fois l'étudiant refait l'année on a plus besoin du sauv
$tsql10="if not exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[s61]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
    create table [dbo].[s61] (
    [MAT] [varchar] (13) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [MOY] [real] NULL,
    [SAUV] [int] NOT NULL ,
    [SESSION] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [CRACQ] [real] NULL,
    [ANET] [int] NOT NULL ,
    )
    ON [PRIMARY]
    ";
    $getresults = $conn->prepare($tsql10)->execute();
$tsql11= "truncate table [usthb90000L].[dbo].[s61]";
$getresults1 = $conn->prepare($tsql11);
$getresults1->execute();

$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[s61]') and name='index6') CREATE INDEX index6 ON [dbo].[s61] (mat)";
$getresults = $conn->prepare($tsql4)->execute();

$tsql4="insert into [usthb90000L].[dbo].[s61] (mat,moy,sauv,session,cracq,anet) (select distinct mat,moy,sauv,session,CRACQ,anet from [usthb90000L].[dbo].s6 c
where mat in (select MAT from intersection)
and moy=(select max(moy) from [usthb90000L].[dbo].s6
where mat=c.mat
group by mat)
and cracq=(select max(cracq) from [usthb90000L].[dbo].s6
where mat=c.mat
and cracq>0
group by mat)
)";
$getresults = $conn->prepare($tsql4)->execute();

$tsql="update [usthb90000L].[dbo].[results] set moy6=(select max(moy) from [usthb90000L].[dbo].[s61] where [usthb90000L].[dbo].[results].mat= [usthb90000L].[dbo].[S61].mat group by mat)";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

$tsql="update [usthb90000L].[dbo].[results] set cracq6=(select max(cracq) from [usthb90000L].[dbo].[s61] where [usthb90000L].[dbo].[results].mat= [usthb90000L].[dbo].[S61].mat group by mat)";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

$tsql="update [usthb90000L].[dbo].[results] set session6=(select distinct session from [usthb90000L].[dbo].[s61] where [usthb90000L].[dbo].[results].mat= [usthb90000L].[dbo].[S61].mat and session like 'R%')";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$tsql="update [usthb90000L].[dbo].[results] set session6='JUIN' where session6 is NULL";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

$tsql="update [usthb90000L].[dbo].[results] set sauv6=(select max(sauv) from [usthb90000L].[dbo].[s61] where [usthb90000L].[dbo].[results].mat= [usthb90000L].[dbo].[S61].mat group by mat)";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();