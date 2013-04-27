<?php
include('NB.php');

$con = mysql_connect("localhost","root","");
mysql_select_db("nb",$con);

//Test case
$X=array('Education'=>'12th','Work'=>35,'Disease'=>'Flu','Salary'=>2000);

//Classification factor
$n = 'Sex';

//table name
$table='table1';

//To be used to populate databse just once
/*
CREATE TABLE IF NOT EXISTS `table1` (
  `sl` int(4) NOT NULL AUTO_INCREMENT,
  `Education` varchar(20) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Work` int(3) NOT NULL,
  `Disease` varchar(20) NOT NULL,
  `Salary` int(6) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`sl`, `Education`, `Sex`, `Work`, `Disease`, `Salary`) VALUES
(1, '9th', 'M', 32, 'Bronchitis', 3000),
(2, '9th', 'M', 30, 'Cholera', 1000),
(3, '9th', 'M', 33, 'Flu', 2000),
(4, '10th', 'F', 35, 'Bronchitis', 2000),
(5, '10th', 'F', 36, 'Cholera', 3000),
(6, '11th', 'M', 37, 'Flu', 3000),
(7, '12th', 'M', 38, 'Cholera', 3000),
(8, '12th', 'F', 38, 'Flu', 3000),
(9, '11th', 'M', 37, 'Bronchitis', 1000),
(10, 'Masters', 'M', 41, 'Cholera', 1000),
(11, 'Bachelors', 'F', 39, 'Bronchitis', 2000),
(12, 'Masters', 'M', 42, 'Flu', 1000),
(13, 'Masters', 'M', 44, 'Flu', 2000),
(14, 'Bachelors', 'F', 38, 'Bronchitis', 1000),
(15, 'Doctorate', 'F', 44, 'Cholera', 2000),
(16, 'Masters', 'F', 40, 'Flu', 1000),
(17, 'Doctorate', 'F', 44, 'Bronchitis', 1000),
(18, 'Doctorate', 'F', 45, 'Cholera', 3000),
(19, 'Doctorate', 'F', 44, 'Cholera', 2000);
*/

classify($X,$n,$table);

?>
