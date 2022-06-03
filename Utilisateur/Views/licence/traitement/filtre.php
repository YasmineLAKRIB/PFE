<?php
include ('config.php');
set_time_limit(3000);

//crétion d'une table finale qui contient tous les classements
$tsql10="if not exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[CLASSEMENTL]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
    create table [dbo].[CLASSEMENTL] (
    [MAT] [varchar] (13) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [NAME] [varchar] (100) COLLATE Latin1_General_100_CI_AI_SC NULL ,
	[PNAME] [varchar] (100) COLLATE Latin1_General_100_CI_AI_SC NULL ,
	[DN] [varchar] (10) COLLATE Latin1_General_100_CI_AI_SC NULL ,
	[LN] [varchar] (100) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [OCODE] [varchar] (255) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [FIL] [varchar] (250) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [SPE] [varchar] (250) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [DESIGNATION] [varchar] (250) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [ANET] [varchar] (255) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [SECT] [varchar] (2) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MOY1] [real] NULL,
    [CRACQ1] [real] NULL,
    [session1] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV1] [int] NULL ,
    [MOY2] [real] NULL,
    [CRACQ2] [real] NULL,
    [session2] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV2] [int] NULL ,
    [MOY3] [real] NULL,
    [CRACQ3] [real] NULL, 
    [session3] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV3] [int] NULL ,
    [MOY4] [real] NULL,
    [CRACQ4] [real] NULL,
    [session4] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV4] [int] NULL ,
    [MOY5] [real] NULL,
    [CRACQ5] [real] NULL,
    [session5] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV5] [int] NULL ,
    [MOY6] [real] NULL,
    [CRACQ6] [real] NULL,
    [session6] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV6] [int] NULL ,
    [MOYL1] [real] NULL,
    [INS1] [varchar] (20) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MOYL2] [real] NULL,
    [INS2] [varchar] (20) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MOYL3] [real] NULL,
    [INS3] [varchar] (20) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MSE] [real] NULL,
    [R] [int] NULL ,
    [S] [int] NULL ,
    [D] [int] NULL ,
    [MC] [real] NULL,
    [RANG] [int] NULL,
    [categorie] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    )
    ON [PRIMARY]
    ";
$getresults = $conn->prepare($tsql10)->execute();


$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[CLASSEMENTL]') and name='index_CLASSEMENTL') CREATE INDEX index_CLASSEMENTL ON [dbo].[CLASSEMENTL] (mat)";
$getresults = $conn->prepare($tsql4)->execute();


$tsql4="IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[filtreExists]') AND OBJECTPROPERTY(id,N'IsScalarFunction') = 1)
BEGIN
    EXEC ('ALTER FUNCTION [dbo].[filtreExists]() returns int as 
    BEGIN 
    DECLARE @r int;
    if (exists (select *
    from [usthb90000L].[dbo].[CLASSEMENTL]
    where ANET = $annee and ocode in (select ocode from FILIERE0000 where designation= ''$spec'')))
     SET @r=1;
     ELSE
     SET @r=0;
    return @r;
    END;
    ')
END
ELSE
EXEC ('CREATE FUNCTION [dbo].[filtreExists]() returns int as 
    BEGIN 
    DECLARE @r int;
    if (exists (select *
    from [usthb90000L].[dbo].[CURSUS0000]
    where ANET = $annee and ocode in (select ocode from FILIERE0000 where designation= ''$spec'')))
     SET @r=1;
     ELSE
     SET @r=0;
    return @r;
    END;
    ')
";
$getresults = $conn->prepare($tsql4)->execute();

$tsql="SELECT dbo.filtreExists() as n;";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$results = $getresults2->fetchAll(PDO::FETCH_BOTH);
foreach($results as $r){
    $n= $r['n'];
}
if($n == 0){
$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[ETUDIANT0000]') and name='index_etudiant') CREATE INDEX index_etudiant ON [dbo].[ETUDIANT0000] (mat)";
$getresults = $conn->prepare($tsql4)->execute();
$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[CURSUS0000]') and name='index_cursus ') CREATE INDEX index_cursus ON [dbo].[CURSUS0000] (mat)";
$getresults = $conn->prepare($tsql4)->execute();

$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[CREDITRES]') and name='index_credits ') CREATE INDEX index_credits ON [dbo].[CREDITRES] (mat)";
$getresults = $conn->prepare($tsql4)->execute();


$tsql1="IF NOT EXISTS(select * FROM sys.views where name = 'fan')
BEGIN    
  EXEC ('
    CREATE VIEW [dbo].[fan]
    AS
      select distinct MAT from [usthb90000L].dbo.CURSUS0000 where sauv= $annee
  ')
END
ELSE
BEGIN
  EXEC ('
    ALTER VIEW [dbo].[fan]
    AS
      select distinct MAT from [usthb90000L].dbo.CURSUS0000 where sauv= $annee 
  ')
END";
$getresults = $conn->prepare($tsql1)->execute();



$tsql2="IF NOT EXISTS(select * FROM sys.views where name = 'fspec')
BEGIN    
  EXEC ('
  create view dbo.fspec 
  as 
  select distinct MAT, ANET,Ocode from [usthb90000L].dbo.CURSUS0000 where sauv<=$annee and ANET =3 and OCODE in (select ocode from FILIERE0000 where Designation= ''$spec'')
  ')
END
ELSE
BEGIN
  EXEC ('
  alter view [dbo].[fspec]
   as 
   select distinct MAT, ANET,Ocode from [usthb90000L].dbo.CURSUS0000 where sauv<=$annee and ANET =3 and OCODE in (select ocode from FILIERE0000 where Designation= ''$spec'')
  ')
END";
$getresults = $conn->prepare($tsql2)->execute();
// une vue qui contient tous les étudiant non inscrit après

$tsql100="IF NOT EXISTS(select * FROM sys.views where name = 'fapres')
BEGIN    
  EXEC ('
  create view fapres
  as 
  select mat from [usthb90000L].dbo.CURSUS0000 where mat not in (select mat from [usthb90000L].dbo.CURSUS0000 where sauv>$annee)
  ')
END
ELSE
BEGIN
  EXEC ('
  alter view fapres
  as
  select mat from [usthb90000L].dbo.CURSUS0000 where mat not in (select mat from [usthb90000L].dbo.CURSUS0000 where sauv>$annee )
  ')
END";
$getresults = $conn->prepare($tsql100)->execute();

/////////////////////////////////////////////////

$tsql3="IF NOT EXISTS(select * FROM sys.views where name = 'intersection')
BEGIN    
  EXEC ('
  create View intersection
  as 
  select distinct MAT, OCODE from fspec where MAT in (select MAT from [usthb90000L].dbo.fan Intersect select MAT from [usthb90000L].dbo.fspec Intersect select MAT from [usthb90000L].dbo.fapres)
  ')
END
ELSE
BEGIN
  EXEC ('
  alter View intersection
  as 
  select distinct MAT, OCODE from fspec where MAT in (select MAT from [usthb90000L].dbo.fan Intersect select MAT from [usthb90000L].dbo.fspec Intersect select MAT from [usthb90000L].dbo.fapres)
  ')
END";
$getresults = $conn->prepare($tsql3)->execute();

//crétion d'une table qui contient les informations des six semestre pour chaque étudiants
$tsql10="if not exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[results]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
    create table [dbo].[results] (
    [MAT] [varchar] (13) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [MOY1] [real] NULL,
    [CRACQ1] [real] NULL,
    [session1] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV1] [int] NULL ,
    [MOY2] [real] NULL,
    [CRACQ2] [real] NULL,
    [session2] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV2] [int] NULL ,
    [MOY3] [real] NULL,
    [CRACQ3] [real] NULL, 
    [session3] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV3] [int] NULL ,
    [MOY4] [real] NULL,
    [CRACQ4] [real] NULL,
    [session4] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV4] [int] NULL ,
    [MOY5] [real] NULL,
    [CRACQ5] [real] NULL,
    [session5] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV5] [int] NULL ,
    [MOY6] [real] NULL,
    [CRACQ6] [real] NULL,
    [session6] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV6] [int] NULL ,
    [MSE] [real] NULL,
    [CRT] [real] NULL,
    [R] [int] NULL ,
    [S] [int] NULL ,
    [D] [int] NULL ,
    )
    ON [PRIMARY]
    ";
$getresults = $conn->prepare($tsql10)->execute();

$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[results]') and name='index_semestre') CREATE INDEX index_semestre ON [dbo].[results] (mat)";
$getresults = $conn->prepare($tsql4)->execute();

$tsql11= "truncate table [usthb90000L].[dbo].[results]";
$getresults1 = $conn->prepare($tsql11);
$getresults1->execute();
$tsql="insert into [usthb90000L].[dbo].results (mat)  select distinct mat from [usthb90000L].[dbo].intersection";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

include ('s1.php');
include ('s2.php');
include ('s3.php');
include ('s4.php');
include ('s5.php');
include ('s6.php');


$tsql="select * from [usthb90000L].[dbo].[results]";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$results = $getresults2->fetchAll(PDO::FETCH_BOTH);
/////////////////////////////////////////////////
foreach($results as $row){
$mse=($row['MOY1']+$row['MOY2']+$row['MOY3']+$row['MOY4']+$row['MOY5']+$row['MOY6'])/6;
    $tsql="update [usthb90000L].[dbo].[results] set MSE=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$mse,$row['MAT']]);

$crt=$row['CRACQ1']+$row['CRACQ2']+$row['CRACQ3']+$row['CRACQ4']+$row['CRACQ5']+$row['CRACQ6'];
    $tsql="update [usthb90000L].[dbo].[results] set CRT=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$crt,$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[results] set R=(select count(*) from [usthb90000L].dbo.CURSUS0000 where mat=? and INS='AJR') where mat=? ";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[results] set D=(select count(*) from [usthb90000L].dbo.CURSUS0000 where mat=? and INS='ADC') where mat=? ";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[results] set S=(select count(*) from [usthb90000L].dbo.Creditres where mat=? and RESULT='ADM' and session in ('rjanv','rjuin')) where mat=? ";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
}


/////////////////////////////////////////////////
$tsql1="IF NOT EXISTS(select * FROM sys.views where name = 'fresult')
BEGIN
    EXEC ('
    create view fresult (MAT) as select distinct MAT from [usthb90000L].dbo.[results] where CRT=180
    ')
END
ELSE
BEGIN
EXEC ('
    alter view fresult (MAT) as select distinct MAT from [usthb90000L].dbo.[results] where CRT=180
    ')
END
";
$getresults = $conn->prepare($tsql1)->execute();

/////////////////////////////////////////////////
$tsql10="if not exists (select * from dbo.sysobjects where id = object_id(N'[dbo].[CLASSEMENT]') and OBJECTPROPERTY(id, N'IsUserTable') = 1)
    create table [dbo].[CLASSEMENT] (
    [MAT] [varchar] (13) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [NAME] [varchar] (100) COLLATE Latin1_General_100_CI_AI_SC NULL ,
	[PNAME] [varchar] (100) COLLATE Latin1_General_100_CI_AI_SC NULL ,
	[DN] [varchar] (10) COLLATE Latin1_General_100_CI_AI_SC NULL ,
	[LN] [varchar] (100) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [OCODE] [varchar] (255) COLLATE Latin1_General_100_CI_AI_SC NOT NULL ,
    [FIL] [varchar] (250) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [SPE] [varchar] (250) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [DESIGNATION] [varchar] (250) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [ANET] [varchar] (255) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [SECT] [varchar] (2) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MOY1] [real] NULL,
    [CRACQ1] [real] NULL,
    [session1] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV1] [int] NULL ,
    [MOY2] [real] NULL,
    [CRACQ2] [real] NULL,
    [session2] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV2] [int] NULL ,
    [MOY3] [real] NULL,
    [CRACQ3] [real] NULL, 
    [session3] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV3] [int] NULL ,
    [MOY4] [real] NULL,
    [CRACQ4] [real] NULL,
    [session4] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV4] [int] NULL ,
    [MOY5] [real] NULL,
    [CRACQ5] [real] NULL,
    [session5] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV5] [int] NULL ,
    [MOY6] [real] NULL,
    [CRACQ6] [real] NULL,
    [session6] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    [SAUV6] [int] NULL ,
    [MOYL1] [real] NULL,
    [INS1] [varchar] (20) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MOYL2] [real] NULL,
    [INS2] [varchar] (20) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MOYL3] [real] NULL,
    [INS3] [varchar] (20) COLLATE Latin1_General_100_CI_AI_SC NULL ,
    [MSE] [real] NULL,
    [R] [int] NULL ,
    [S] [int] NULL ,
    [D] [int] NULL ,
    [MC] [real] NULL,
    [RANG] [int] NULL,
    [categorie] [varchar] (50) COLLATE Latin1_General_100_CI_AI_SC NULL,
    )
    ON [PRIMARY]
    ";
$getresults = $conn->prepare($tsql10)->execute();

/////////////////////////////////////////////////
$tsql4="if not exists (select * from sysindexes
  where id=object_id('[dbo].[CLASSEMENT]') and name='index_CLASSEMENT') CREATE INDEX index_CLASSEMENT ON [dbo].[CLASSEMENT] (mat)";
$getresults = $conn->prepare($tsql4)->execute();

/////////////////////////////////////////////////
$tsql11= "truncate table [usthb90000L].[dbo].[CLASSEMENT]";
$getresults1 = $conn->prepare($tsql11);
$getresults1->execute();

/////////////////////////////////////////////////
$tsql="select * from [usthb90000L].[dbo].[fresult]";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$results = $getresults2->fetchAll(PDO::FETCH_BOTH);

//remplissage de la table finale 
foreach($results as $row){
 
    $tsql="insert into [usthb90000L].[dbo].[CLASSEMENT] (MAT, NAME, PNAME, DN, LN, OCODE) (select e.MAT, NAME, PNAME, DN, LN, OCODE from [usthb90000L].dbo.ETUDIANT0000 e,[usthb90000L].dbo.CURSUS0000 c where e.mat=c.mat and c.anet=3 and e.mat =?)";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT']]);
 //insertion MSE
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MSE=(select MSE from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
 //insertion nombre de redoublements par année
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set R=(select R from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
 //insertion nombre d'admissions après la session de rattrapage
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set S=(select S from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
 //insertion nombre d'admissions avec dettes
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set D=(select D from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
//insertion des moyennes semestrielles s1 -> s6
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOY1=(select MOY1 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOY2=(select MOY2 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOY3=(select MOY3 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOY4=(select MOY4 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOY5=(select MOY5 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOY6=(select MOY6 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);

///////////////////////////////////////////////// s1 -> s6
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set CRACQ1=(select CRACQ1 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set CRACQ2=(select CRACQ2 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set CRACQ3=(select CRACQ3 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set CRACQ4=(select CRACQ4 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set CRACQ5=(select CRACQ5 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set CRACQ6=(select CRACQ6 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);

///////////////////////////////////////////////// s1 -> s6
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set session1=(select session1 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set session2=(select session2 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set session3=(select session3 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set session4=(select session4 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set session5=(select session5 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set session6=(select session6 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);

///////////////////////////////////////////////// s1 -> s6
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SAUV1=(select SAUV1 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SAUV2=(select SAUV2 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SAUV3=(select SAUV3 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SAUV4=(select SAUV4 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SAUV5=(select SAUV5 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SAUV6=(select SAUV6 from [usthb90000L].[dbo].[results] where mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
}
// récupérer les lignes de résults où crédit=180
$tsql="select distinct * from [usthb90000L].[dbo].[results] where mat in (select mat from [usthb90000L].[dbo].[fresult])";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$results = $getresults2->fetchAll(PDO::FETCH_BOTH);

foreach($results as $row){
    // calcul du max sauv
    $sauvf=max(abs($row['SAUV1']),abs($row['SAUV2']),abs($row['SAUV3']),abs($row['SAUV4']),abs($row['SAUV5']),abs($row['SAUV6']));
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set ANET=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$sauvf,$row['MAT']]);
// insérer la section de chaque étudiant
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SECT=(select distinct SECT from CURSUS0000 where SAUV=$annee and ANET=3 and mat=?) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$row['MAT']]);
}


//insertion designation pour la facilité de recherche dans la table classementL après 
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set DESIGNATION='$spec'";
$getresults2 = $conn->prepare($tsql);
$getresults2->execute();

// récupérer les infos des étudiants 
$tsql="select * from [usthb90000L].[dbo].[CLASSEMENT]";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$results = $getresults2->fetchAll(PDO::FETCH_BOTH);
$a=0.04;

foreach($results as $row){
    $r=(float)$row['R'];
    $s=(float)$row['S'];
    $d=(float)$row['D'];
    $mse=(float)$row['MSE'];
    $mc=$mse*(1.0-$a*($r+$d/2+$s/4));
    //insertion filière
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set FIL=(select FIL_MERS from [usthb90000L].[dbo].[FILSPE_MERS] where OCODE=?) where mat=?";
$getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['OCODE'],$row['MAT']]);
//insertion specialité
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set SPE=(select SPE_MERS from [usthb90000L].[dbo].[FILSPE_MERS] where OCODE=?) where mat=?";
$getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['OCODE'],$row['MAT']]);

    // insertion du MC
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MC=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$mc,$row['MAT']]);

// calcul moyenne 
$L1=($row['MOY1']+$row['MOY2'])/2;
$L2=($row['MOY3']+$row['MOY4'])/2;
$L3=($row['MOY5']+$row['MOY6'])/2;

// insertion moyenne L1
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOYL1=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$L1,$row['MAT']]);
// insertion moyenne L2
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOYL2=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$L2,$row['MAT']]);
// insertion moyenne L3
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set MOYL3=? where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$L3,$row['MAT']]);

// calcul sauv de chaque année
$L1=max(abs($row['SAUV1']),abs($row['SAUV2']));
$L2=max(abs($row['SAUV3']),abs($row['SAUV4']));
$L3=max(abs($row['SAUV5']),abs($row['SAUV6']));
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set INS1=(select INS from [usthb90000L].[dbo].[CURSUS0000] where mat=? and sauv=? and anet=1) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$L1,$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set INS2=(select INS from [usthb90000L].[dbo].[CURSUS0000] where mat=? and sauv=? and anet=2) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$L2,$row['MAT']]);
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set INS3=(select INS from [usthb90000L].[dbo].[CURSUS0000] where mat=? and sauv=? and anet=3) where mat=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT'],$L3,$row['MAT']]);
}
//création d'une vue qui contient les moyennes
$tsql="IF NOT EXISTS(select * FROM sys.views where name = 'fclass')
BEGIN    
  EXEC ('
  create view fclass 
  as 
  select distinct mc from [usthb90000L].[dbo].[CLASSEMENT]
  ')
END
ELSE
BEGIN
  EXEC ('
  alter view fclass 
  as 
  select distinct mc from [usthb90000L].[dbo].[CLASSEMENT]
  ')
END";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

// classement des moyennes 
$tsql="IF NOT EXISTS(select * FROM sys.views where name = 'ffin')
BEGIN    
  EXEC ('
  create view ffin
  as 
  select mc,rank() over (order by mc DESC) as classement from [usthb90000L].[dbo].[fclass]
  ')
END
ELSE
BEGIN
  EXEC ('
  alter view ffin
  as 
  select mc,rank() over (order by mc DESC) as classement from [usthb90000L].[dbo].[fclass]
  ')
END";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

//insertion du classement
$tsql="update [usthb90000L].[dbo].[CLASSEMENT] set rang= (select distinct classement from [ffin] where [usthb90000L].[dbo].[CLASSEMENT].mc=[ffin].mc)";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();

/////////////////////////////////////////////////
$tsql="select max(RANG) as cmpt from [usthb90000L].[dbo].[CLASSEMENT]";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute();
$results = $getresults2->fetchAll(PDO::FETCH_BOTH);
foreach($results as $row){
    $cmpt= $row['cmpt'];
}
$A=round($cmpt/10);
$B=round($cmpt/4);
$C=round($cmpt-2*($A+$B));
foreach($results as $row){
    $cmpt= $row['cmpt'];
}

/////////////////////////////////////////////////
for($i = 1; $i <=$A; ++$i) {
    $tsql="update [usthb90000L].[dbo].[CLASSEMENT] set categorie='A' where rang=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$i]);
}
for($i = $A+1; $i <=($A+$B); ++$i) {
    $tsql="update [usthb90000L].[dbo].[CLASSEMENT] set categorie='B' where rang=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$i]);
}
for($i =($A+$B)+1; $i <=($A+$B+$C); ++$i) {
    $tsql="update [usthb90000L].[dbo].[CLASSEMENT] set categorie='C' where rang=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$i]);
}

for($i =($A+$B+$C)+1; $i <= ($A+2*$B+$C); ++$i) {
    $tsql="update [usthb90000L].[dbo].[CLASSEMENT] set categorie='D' where rang=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$i]);}
for($i =($A+2*$B+$C)+1; $i <= (2*$A+2*$B+$C); ++$i) {
    $tsql="update [usthb90000L].[dbo].[CLASSEMENT] set categorie='E' where rang=?";
    $getresults2 = $conn->prepare($tsql);
$getresults2->execute([$i]);}

// Insertion du dernier classement effectuer dans la table CLASSEMENTL

$tsql="insert into [usthb90000L].[dbo].[CLASSEMENTL] 
select distinct * from [usthb90000L].[dbo].[CLASSEMENT]";
$getresults2 = $conn->prepare($tsql);
$getresults2->execute([$row['MAT']]);
    }
    
else{
}
?>