CREATE DATABASE `computer_compwhiz`;
//
CREATE TABLE `computer_compwhiz`.`tblClients` (
`intID` int(4) NOT NULL auto_increment,
`varFirstname` varchar(50) NOT NULL default '',
`varLastname` varchar(50) NOT NULL default '',
`varEmail` varchar(255) NOT NULL default '',
`varPassword` varchar(128) NOT NULL default '',
`intActive` bool NOT NULL default 0,
`varActivationKey` varchar(128) NOT NULL default '',
PRIMARY KEY (`intID`)
) AUTO_INCREMENT=2;

