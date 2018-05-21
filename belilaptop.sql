/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - belilaptop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`belilaptop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `belilaptop`;

/*Table structure for table `tb_laptop` */

DROP TABLE IF EXISTS `tb_laptop`;

CREATE TABLE `tb_laptop` (
  `id_laptop` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `harga` int(12) DEFAULT NULL,
  PRIMARY KEY (`id_laptop`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_laptop` */

insert  into `tb_laptop`(`id_laptop`,`merk`,`type`,`stok`,`harga`) values 
(1,'Acer','Aspire One 725',50,3000000),
(2,'Asus','ROG Strix',10,18000000),
(3,'Acer','Predator 746',8,20000000),
(4,'asda','asdasf',0,0);

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_laptop` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jumlah_beli` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_laptop` (`id_laptop`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_laptop`) REFERENCES `tb_laptop` (`id_laptop`),
  CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_transaksi` */

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` char(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`email`) values 
(1,'admin','admin','admin@mail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
