-- MySQL dump 8.21
--
-- Host: localhost    Database: tf72
---------------------------------------------------------
-- Server version	3.23.49a

--
-- Table structure for table 'announce'
--

CREATE TABLE announce (
  id int(11) NOT NULL auto_increment,
  stamp datetime NOT NULL default '0000-00-00 00:00:00',
  txt text NOT NULL,
  postedby int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'announce'
--


INSERT INTO announce VALUES (1,'1999-06-19 11:00:00','Welcome to your new TFMSv2 Installation. Don\'t forget to change the admin password information.',0);

--
-- Table structure for table 'co'
--

CREATE TABLE co (
  id int(11) NOT NULL auto_increment,
  charname varchar(30) NOT NULL default '',
  rank int(11) NOT NULL default '0',
  email varchar(40) NOT NULL default '',
  password varchar(20) NOT NULL default '',
  realname varchar(50) default '',
  race varchar(20) default '',
  sex int(11) NOT NULL default '0',
  physical text,
  bio text,
  tfrole varchar(75) default NULL,
  admin int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'co'
--


INSERT INTO co VALUES (1,'admin',24,'admin','admin','','',2,'','',NULL,0);

--
-- Table structure for table 'crewlist'
--

CREATE TABLE crewlist (
  id int(11) NOT NULL auto_increment,
  ship int(11) NOT NULL default '0',
  charname varchar(30) NOT NULL default '',
  rank int(11) NOT NULL default '0',
  email varchar(40) NOT NULL default '',
  position varchar(40) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'crewlist'
--


--
-- Table structure for table 'grp'
--

CREATE TABLE grp (
  id int(11) NOT NULL auto_increment,
  name varchar(20) NOT NULL default '',
  flagship int(11) NOT NULL default '0',
  co int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'grp'
--


INSERT INTO grp VALUES (1,'Independent',2,3);
INSERT INTO grp VALUES (2,'Alpha',4,5);
INSERT INTO grp VALUES (3,'Beta',30,29);
INSERT INTO grp VALUES (100,'Mothballs',0,0);
INSERT INTO grp VALUES (4,'Gamma',31,39);
INSERT INTO grp VALUES (5,'Delta',13,12);

--
-- Table structure for table 'mco'
--

CREATE TABLE mco (
  id int(11) NOT NULL auto_increment,
  charname varchar(30) NOT NULL default '',
  rank int(11) NOT NULL default '0',
  email varchar(40) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'mco'
--


--
-- Table structure for table 'monthrep'
--

CREATE TABLE monthrep (
  id int(11) NOT NULL auto_increment,
  ship int(11) NOT NULL default '0',
  url varchar(100) NOT NULL default '',
  status text NOT NULL,
  awards text,
  promotions text,
  updates text,
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'monthrep'
--


--
-- Table structure for table 'rank'
--

CREATE TABLE rank (
  rankid int(11) default NULL,
  rankdesc text,
  image text,
  color text
) TYPE=MyISAM;

--
-- Dumping data for table 'rank'
--


INSERT INTO rank VALUES (1,'Cadet 2nd Yr','ranks/grey/cadet2.jpg','grey');
INSERT INTO rank VALUES (2,'Cadet 3rd Yr','ranks/grey/cadet3.jpg','grey');
INSERT INTO rank VALUES (3,'Cadet 4th Yr','ranks/grey/cadet4.jpg','grey');
INSERT INTO rank VALUES (4,'Crewman Recruit','ranks/red/red-crwrec.jpg','red');
INSERT INTO rank VALUES (5,'Crewman Apprentice','ranks/red/red-crwapp.jpg','red');
INSERT INTO rank VALUES (6,'Crewman','ranks/red/red-crw.jpg','red');
INSERT INTO rank VALUES (7,'Petty Officer 3c','ranks/red/red-po3.jpg','red');
INSERT INTO rank VALUES (8,'Petty Officer 2c','ranks/red/red-po2.jpg','red');
INSERT INTO rank VALUES (9,'Petty Officer 1c','ranks/red/red-po1.jpg','red');
INSERT INTO rank VALUES (10,'Chief Petty Officer','ranks/red/red-cpo.jpg','red');
INSERT INTO rank VALUES (11,'Senior Chief PO','ranks/red/red-scpo.jpg','red');
INSERT INTO rank VALUES (12,'Master Chief PO','ranks/red/red-mcpo.jpg','red');
INSERT INTO rank VALUES (13,'Warrant Officer','ranks/red/red-wo.jpg','red');
INSERT INTO rank VALUES (14,'Chief Warrant Officer 1','ranks/red/red-cwo.jpg','red');
INSERT INTO rank VALUES (15,'Chief Warrant Officer 2','ranks/red/red-cwo2.jpg','red');
INSERT INTO rank VALUES (16,'Chief Warrant Officer 3','ranks/red/red-cwo3.jpg','red');
INSERT INTO rank VALUES (17,'Ensign','ranks/red/red-ens.jpg','red');
INSERT INTO rank VALUES (18,'Lieutenant j.g.','ranks/red/red-ltjg.jpg','red');
INSERT INTO rank VALUES (19,'Lieutenant','ranks/red/red-lt.jpg','red');
INSERT INTO rank VALUES (20,'Lt. Commander','ranks/red/red-ltcdr.jpg','red');
INSERT INTO rank VALUES (21,'Commander','ranks/red/red-cdr.jpg','red');
INSERT INTO rank VALUES (22,'Captain','ranks/red/red-capt.jpg','red');
INSERT INTO rank VALUES (23,'Commodore','ranks/red/red-comdor.jpg','red');
INSERT INTO rank VALUES (24,'Rear Admiral','ranks/red/red-radm.jpg','red');
INSERT INTO rank VALUES (25,'Vice Admiral','ranks/red/red-vadm.jpg','red');
INSERT INTO rank VALUES (26,'Admiral','ranks/red/red-adm.jpg','red');
INSERT INTO rank VALUES (27,'Fleet Admiral','ranks/red/red-fadm.jpg','red');
INSERT INTO rank VALUES (28,'Crewman Recruit','ranks/gold/gold-crwrec.jpg','gold');
INSERT INTO rank VALUES (29,'Crewman Apprentice','ranks/gold/gold-crwapp.jpg','gold');
INSERT INTO rank VALUES (30,'Crewman','ranks/gold/gold-crw.jpg','gold');
INSERT INTO rank VALUES (31,'Petty Officer 3c','ranks/gold/gold-po3.jpg','gold');
INSERT INTO rank VALUES (32,'Petty Officer 2c','ranks/gold/gold-po2.jpg','gold');
INSERT INTO rank VALUES (33,'Petty Officer 1c','ranks/gold/gold-po1.jpg','gold');
INSERT INTO rank VALUES (34,'Chief Petty Officer','ranks/gold/gold-cpo.jpg','gold');
INSERT INTO rank VALUES (35,'Senior Chief PO','ranks/gold/gold-scpo..jpg','gold');
INSERT INTO rank VALUES (36,'Master Chief PO','ranks/gold/gold-mcpo.jpg','gold');
INSERT INTO rank VALUES (37,'Warrant Officer','ranks/gold/gold-wo.jpg','gold');
INSERT INTO rank VALUES (38,'Chief Warrant Officer 1','ranks/gold/gold-cwo.jpg','gold');
INSERT INTO rank VALUES (39,'Chief Warrant Officer 2','ranks/gold/gold-cwo2.jpg','gold');
INSERT INTO rank VALUES (40,'Chief Warrant Officer 3','ranks/gold/gold-cwo3.jpg','gold');
INSERT INTO rank VALUES (41,'Ensign','ranks/gold/gold-ens.jpg','gold');
INSERT INTO rank VALUES (42,'Lieutenant J.G.','ranks/gold/gold-ltjg.jpg','gold');
INSERT INTO rank VALUES (43,'Lieutenant','ranks/gold/gold-lt.jpg','gold');
INSERT INTO rank VALUES (44,'Lt. Commander','ranks/gold/gold-ltcdr.jpg','gold');
INSERT INTO rank VALUES (45,'Commander','ranks/gold/gold-cdr.jpg','gold');
INSERT INTO rank VALUES (64,'Crewman Recruit','ranks/purple/prp-crwrec.jpg','purple');
INSERT INTO rank VALUES (65,'Crewman Apprentice','ranks/purple/prp-crwapp.jpg','purple');
INSERT INTO rank VALUES (66,'Crewman','ranks/purple/prp-crw.jpg','purple');
INSERT INTO rank VALUES (67,'Petty Officer 3c','ranks/purple/prp-po3.jpg','purple');
INSERT INTO rank VALUES (68,'Petty Officer 2c','ranks/purple/prp-po2.jpg','purple');
INSERT INTO rank VALUES (69,'Petty Officer 1c','ranks/purple/prp-po1.jpg','purple');
INSERT INTO rank VALUES (70,'Chief Petty Officer','ranks/purple/prp-cpo.jpg','purple');
INSERT INTO rank VALUES (71,'Senior Chief PO','ranks/purple/prp-scpo..jpg','purple');
INSERT INTO rank VALUES (72,'Master Chief PO','ranks/purple/prp-mcpo.jpg','purple');
INSERT INTO rank VALUES (73,'Warrant Officer','ranks/purple/prp-wo.jpg','purple');
INSERT INTO rank VALUES (74,'Chief Warrant Officer 1','ranks/purple/prp-cwo.jpg','purple');
INSERT INTO rank VALUES (75,'Chief Warrant Officer 2','ranks/purple/prp-cwo2.jpg','purple');
INSERT INTO rank VALUES (76,'Chief Warrant Officer 3','ranks/purple/prp-cwo3.jpg','purple');
INSERT INTO rank VALUES (77,'Ensign','ranks/purple/prp-ens.jpg','purple');
INSERT INTO rank VALUES (78,'Lieutenant J.G.','ranks/purple/prp-ltjg.jpg','purple');
INSERT INTO rank VALUES (79,'Lieutenant','ranks/purple/prp-lt.jpg','purple');
INSERT INTO rank VALUES (80,'Lt. Commander','ranks/purple/prp-ltcdr.jpg','purple');
INSERT INTO rank VALUES (81,'Commander','ranks/purple/prp-cdr.jpg','purple');
INSERT INTO rank VALUES (82,'Captain','ranks/purple/prp-capt.jpg','purple');
INSERT INTO rank VALUES (83,'Commodore','ranks/purple/prp-comdor.jpg','purple');
INSERT INTO rank VALUES (84,'Rear Admiral','ranks/purple/prp-radm.jpg','purple');
INSERT INTO rank VALUES (85,'Vice Admiral','ranks/purple/prp-vadm.jpg','purple');
INSERT INTO rank VALUES (86,'Admiral','ranks/purple/prp-adm.jpg','purple');
INSERT INTO rank VALUES (87,'Private','ranks/green/grn-pvt.jpg','green');
INSERT INTO rank VALUES (88,'Private 1c','ranks/green/grn-pvt1.jpg','green');
INSERT INTO rank VALUES (89,'Lance Corporal','ranks/green/grn-lcpl.jpg','green');
INSERT INTO rank VALUES (90,'Corporal','ranks/green/grn-cpl.jpg','green');
INSERT INTO rank VALUES (91,'Sergeant','ranks/green/grn-sgt.jpg','green');
INSERT INTO rank VALUES (92,'Staff Sergeant','ranks/green/grn-ssgt.jpg','green');
INSERT INTO rank VALUES (93,'Gunnery Sergeant','ranks/green/grn-gsgt.jpg','green');
INSERT INTO rank VALUES (94,'Master Sergeant','ranks/green/grn-msgt.jpg','green');
INSERT INTO rank VALUES (95,'Sergeant Major','ranks/green/grn-sgmaj.jpg','green');
INSERT INTO rank VALUES (96,'Warrant Officer','ranks/green/grn-wo.jpg','green');
INSERT INTO rank VALUES (97,'Chief Warrant Officer 1','ranks/green/grn-cwo.jpg','green');
INSERT INTO rank VALUES (98,'Chief Warrant Officer 2','ranks/green/grn-cwo2.jpg','green');
INSERT INTO rank VALUES (99,'Chief Warrant Officer 3','ranks/green/grn-cwo3.jpg','green');
INSERT INTO rank VALUES (100,'2nd Lieutenant','ranks/green/grn-2lt.jpg','green');
INSERT INTO rank VALUES (101,'1st Lieutenant','ranks/green/grn-1lt.jpg','green');
INSERT INTO rank VALUES (102,'Captain','ranks/green/grn-cpt.jpg','green');
INSERT INTO rank VALUES (103,'Major','ranks/green/grn-maj.jpg','green');
INSERT INTO rank VALUES (104,'Lt. Colonel','ranks/green/grn-ltcol.jpg','green');
INSERT INTO rank VALUES (105,'Colonel','ranks/green/grn-col.jpg','green');
INSERT INTO rank VALUES (106,'Brigadier General','ranks/green/grn-bgen.jpg','green');
INSERT INTO rank VALUES (107,'Major General','ranks/green/grn-mgen.jpg','green');
INSERT INTO rank VALUES (108,'Lieutenant General','ranks/green/grn-ltgen.jpg','green');
INSERT INTO rank VALUES (109,'General','ranks/green/grn-gen.jpg','green');
INSERT INTO rank VALUES (128,'Admiral','ranks/srch/srch-add.jpg','Temporal');
INSERT INTO rank VALUES (127,'Vice Admiral','ranks/srch/srch-vadm.jpg','Temporal');
INSERT INTO rank VALUES (126,'Rear Admiral','ranks/srch/srch-radm.jpg','Temporal');
INSERT INTO rank VALUES (125,'Commodore','ranks/srch/srch-comdor.jpg','Temporal');
INSERT INTO rank VALUES (124,'Captain','ranks/srch/srch-capt.jpg','Temporal');
INSERT INTO rank VALUES (123,'Commander','ranks/srch/srch-cdr.jpg','Temporal');
INSERT INTO rank VALUES (122,'Lt. Commander','ranks/srch/srch-ltcdr.jpg','Temporal');
INSERT INTO rank VALUES (121,'Lieutenant','ranks/srch/srch-lt.jpg','Temporal');
INSERT INTO rank VALUES (120,'Lieutenant JG','ranks/srch/srch-ltjg.jpg','Temporal');
INSERT INTO rank VALUES (119,'Ensign','ranks/srch/srch-ens.jpg','Temporal');
INSERT INTO rank VALUES (118,'Master Chief PO','ranks/srch/srch-mcpo.jpg','Temporal');
INSERT INTO rank VALUES (117,'Sr. Chief Pty Ofcr','ranks/srch/srch-scpo.jpg','Temporal');
INSERT INTO rank VALUES (116,'Chief Petty Officer','ranks/srch/srch-cpo.jpg','Temporal');
INSERT INTO rank VALUES (115,'Petty Officer 1c','ranks/srch/srch-po1.jpg','Temporal');
INSERT INTO rank VALUES (114,'Petty Officer 2c','ranks/srch/srch-po2.jpg','Temporal');
INSERT INTO rank VALUES (113,'Petty Officer 3c','ranks/srch/srch-po3.jpg','Temporal');
INSERT INTO rank VALUES (112,'Crewman','ranks/srch/srch-fcrewman.jpg','Temporal');
INSERT INTO rank VALUES (111,'Crewman Apprentice','ranks/srch/srch-crewapp.jpg','Temporal');
INSERT INTO rank VALUES (110,'Crewman Recruit','ranks/srch/srch-crewman.jpg','Temporal');
INSERT INTO rank VALUES (133,'Crewman','ranks/blue/blue-crw.jpg','blue');
INSERT INTO rank VALUES (134,'Petty Officer 3c','ranks/blue/blue-po3.jpg','blue');
INSERT INTO rank VALUES (135,'Petty Officer 2c','ranks/blue/blue-po2.jpg','blue');
INSERT INTO rank VALUES (136,'Petty Officer 1c','ranks/blue/blue-po1.jpg','blue');
INSERT INTO rank VALUES (137,'Chief Petty Officer','ranks/blue/blue-cpo.jpg','blue');
INSERT INTO rank VALUES (138,'Senior Chief PO','ranks/blue/blue-scpo.jpg','blue');
INSERT INTO rank VALUES (138,'Master Chief PO','ranks/blue/blue-mcpo.jpg','blue');
INSERT INTO rank VALUES (140,'Warrant Officer','ranks/blue/blue-wo.jpg','blue');
INSERT INTO rank VALUES (141,'Chief Warrant Officer 1','ranks/blue/blue-cwo.jpg','blue');
INSERT INTO rank VALUES (142,'Chief Warrant Officer 2','ranks/blue/blue-cwo2.jpg','blue');
INSERT INTO rank VALUES (143,'Chief Warrant Officer 3','ranks/blue/blue-cwo3.jpg','blue');
INSERT INTO rank VALUES (144,'Ensign','ranks/blue/blue-ens.jpg','blue');
INSERT INTO rank VALUES (145,'Lieutenant J.G.','ranks/blue/blue-ltjg.jpg','blue');
INSERT INTO rank VALUES (146,'Lieutenant','ranks/blue/blue-lt.jpg','blue');
INSERT INTO rank VALUES (147,'Lt. Commander','ranks/blue/blue-ltcdr.jpg','blue');
INSERT INTO rank VALUES (148,'Commander','ranks/blue/blue-cdr.jpg','blue');
INSERT INTO rank VALUES (149,'D\'ja','ranks/card/Card-D\'ja.jpg','Cardassian');
INSERT INTO rank VALUES (150,'Gil','ranks/card/Card-Gill.jpg','Cardassian');
INSERT INTO rank VALUES (151,'Glen','ranks/card/Card-Glen.jpg','Cardassian');
INSERT INTO rank VALUES (152,'Glinn','ranks/card/Card-Glinn.jpg','Cardassian');
INSERT INTO rank VALUES (153,'Gull','ranks/card/Card-Gull.jpg','Cardassian');
INSERT INTO rank VALUES (154,'Kara','ranks/card/Card-Kara.jpg','Cardassian');
INSERT INTO rank VALUES (155,'Warrior Elite','ranks/kraz/krazrank-warriorelite.gif','Kraz');
INSERT INTO rank VALUES (185,'Cadet','ranks/grey/grey-cadet.jpg','grey');
INSERT INTO rank VALUES (186,'Crewman Recruit','ranks/grey/grey-crwrec.jpg','grey');
INSERT INTO rank VALUES (187,'Crewman Apprentice','ranks/grey/grey-crwapp.jpg','grey');
INSERT INTO rank VALUES (188,'Crewman','ranks/grey/grey-crw.jpg','grey');
INSERT INTO rank VALUES (189,'Petty Officer 3c','ranks/grey/grey-po3.jpg','grey');
INSERT INTO rank VALUES (190,'Petty Officer 2c','ranks/grey/grey-po2.jpg','grey');
INSERT INTO rank VALUES (191,'Petty Officer 1c','ranks/grey/grey-po1.jpg','grey');
INSERT INTO rank VALUES (192,'Chief Petty Officer','ranks/grey/grey-cpo.jpg','grey');
INSERT INTO rank VALUES (193,'Senior Chief PO','ranks/grey/grey-scpo.jpg','grey');
INSERT INTO rank VALUES (194,'Master Chief PO','ranks/grey/grey-mcpo.jpg','grey');
INSERT INTO rank VALUES (195,'Warrant Officer','ranks/grey/grey-wo.jpg','grey');
INSERT INTO rank VALUES (196,'Chief Warrant Officer 1','ranks/grey/grey-cwo.jpg','grey');
INSERT INTO rank VALUES (197,'Chief Warrant Officer 2','ranks/grey/grey-cwo2.jpg','grey');
INSERT INTO rank VALUES (198,'Chief Warrant Officer 3','ranks/grey/grey-cwo3.jpg','grey');
INSERT INTO rank VALUES (199,'Ensign','ranks/grey/grey-ens.jpg','grey');
INSERT INTO rank VALUES (200,'Lieutenant J.G.','ranks/grey/grey-ltjg.jpg','grey');
INSERT INTO rank VALUES (201,'Lieutenant','ranks/grey/grey-lt.jpg','grey');
INSERT INTO rank VALUES (202,'Lt. Commander','ranks/grey/grey-ltcdr.jpg','grey');
INSERT INTO rank VALUES (203,'Commander','ranks/grey/grey-cdr.jpg','grey');
INSERT INTO rank VALUES (214,'Warrior 1st Class','ranks/klingon/Kling-W1.jpg','Klingon');
INSERT INTO rank VALUES (215,'Warrior 2nd Class','ranks/klingon/Kling-W2.jpg','Klingon');
INSERT INTO rank VALUES (216,'Warrior 3rd Class','ranks/klingon/Kling-W3.jpg','Klingon');
INSERT INTO rank VALUES (217,'Lieutenant','ranks/klingon/Kling-Lt.jpg','Klingon');
INSERT INTO rank VALUES (218,'Commander','ranks/klingon/Kling-Cdr.jpg','Klingon');
INSERT INTO rank VALUES (219,'Captain','ranks/klingon/Kling-Cpt.jpg','Klingon');
INSERT INTO rank VALUES (220,'Major','ranks/klingon/Kling-Maj.jpg','Klingon');
INSERT INTO rank VALUES (221,'Colonel','ranks/klingon/Kling-Col.jpg','Klingon');
INSERT INTO rank VALUES (222,'Brigadier','ranks/klingon/Kling-Brg.jpg','Klingon');
INSERT INTO rank VALUES (223,'General','ranks/klingon/Kling-Gen.jpg','Klingon');
INSERT INTO rank VALUES (234,'Sub-Lieutenant','ranks/romulan/Rom-SubLt.jpg','Romulan');
INSERT INTO rank VALUES (235,'Lieutenant','ranks/romulan/Rom-Lt.jpg','Romulan');
INSERT INTO rank VALUES (236,'Centurion','ranks/romulan/Rom-Cent.jpg','Romulan');
INSERT INTO rank VALUES (237,'Sub-Commander','ranks/romulan/Rom-SCom.jpg','Romulan');
INSERT INTO rank VALUES (238,'Commander','ranks/romulan/Rom-Com.jpg','Romulan');
INSERT INTO rank VALUES (239,'Admiral','ranks/romulan/Rom-Adm.jpg','Romulan');
INSERT INTO rank VALUES (245,'','ranks/civilian/civilian.jpg','Civilian');
INSERT INTO rank VALUES (254,'Ensign','ranks/bajoran/baj-Ens.jpg','Bajoran');
INSERT INTO rank VALUES (255,'Lieutenant JG','ranks/bajoran/baj-Ltjg.jpg','Bajoran');
INSERT INTO rank VALUES (256,'Lieutenant','ranks/bajoran/baj-Lt.jpg','Bajoran');
INSERT INTO rank VALUES (257,'Captain','ranks/bajoran/baj-Cpt.jpg','Bajoran');
INSERT INTO rank VALUES (258,'Major','ranks/bajoran/baj-Maj.jpg','Bajoran');
INSERT INTO rank VALUES (259,'Colonel','ranks/bajoran/baj-Col.jpg','Bajoran');
INSERT INTO rank VALUES (260,'General','ranks/bajoran/baj-Gen.jpg','Bajoran');

--
-- Table structure for table 'ships'
--

CREATE TABLE ships (
  id int(11) NOT NULL auto_increment,
  name varchar(20) NOT NULL default '',
  registry varchar(20) NOT NULL default '',
  class varchar(30) NOT NULL default '',
  website varchar(150) NOT NULL default '',
  co int(11) NOT NULL default '0',
  xo int(11) NOT NULL default '0',
  grp int(11) NOT NULL default '0',
  status varchar(50) NOT NULL default '',
  image varchar(100) NOT NULL default '',
  mco int(11) NOT NULL default '0',
  language varchar(30) default 'English',
  missiontitle varchar(50) default NULL,
  sorder int(11) default NULL,
  lastmreport datetime default NULL,
  shiprole varchar(50) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'ships'
--


--
-- Table structure for table 'xo'
--

CREATE TABLE xo (
  id int(11) NOT NULL auto_increment,
  charname varchar(30) NOT NULL default '',
  rank int(11) NOT NULL default '0',
  email varchar(40) NOT NULL default '',
  password varchar(20) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

--
-- Dumping data for table 'xo'
--


