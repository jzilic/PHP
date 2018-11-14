use darivatelj;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administratori
-- ----------------------------
DROP TABLE IF EXISTS administratori;
CREATE TABLE administratori (
  id int(6) NOT NULL AUTO_INCREMENT,
  ime varchar(100) DEFAULT NULL,
  prezime varchar(100) DEFAULT NULL,
  korisnicko_ime varchar(100) DEFAULT NULL,
  lozinka varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administratori
-- ----------------------------
INSERT INTO administratori VALUES ('1', 'Jure', 'Žilić', 'jzilic', '12345');
INSERT INTO administratori VALUES ('2', 'Boris', 'Badurina', 'bbadurina', '54321');
-- ----------------------------
-- Table structure for darivatelji
-- ----------------------------
DROP TABLE IF EXISTS darivatelji;
CREATE TABLE darivatelji (
  id_darivatelj int(11) NOT NULL AUTO_INCREMENT,
  ime_darivatelj varchar(255) DEFAULT NULL,
  prezme_darivatelj varchar(255) DEFAULT NULL,
  adresa varchar(255) DEFAULT NULL,
  mjesto_darivanja int(11) DEFAULT NULL,
  krvna_grupa varchar(255) DEFAULT NULL,
  fotografija varchar(200) DEFAULT NULL,
  PRIMARY KEY (id_darivatelj)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of darivatelji
-- ----------------------------
INSERT INTO darivatelji VALUES ('1', 'Jure', 'Žilić', 'Savska 13, Zagreb', '1', 'B negativna', 'slika1.jpg');
INSERT INTO darivatelji VALUES ('2', 'Jozo', 'Pilić', 'Saturn 112, Zadar', '2', 'A pozitivna', 'slika2.jpg');
INSERT INTO darivatelji VALUES ('3', 'Marko', 'Jozić', 'Dunavska 15, Split', '1', '0 ', 'slika3.jpg');
INSERT INTO darivatelji VALUES ('4', 'Marija', 'Lokić', 'Miratova 43, Rijeka', '2', 'B pozitivna', 'slika4.jpg');

-- ----------------------------
-- Table structure for bolnica
-- ----------------------------
DROP TABLE IF EXISTS mjesto_darivanja;
CREATE TABLE mjesto_darivanja (
  id_mjesto_darivanja int(11) NOT NULL AUTO_INCREMENT,
  naziv varchar(255) DEFAULT NULL,
  adresa_mj varchar(255) DEFAULT NULL,
  postanski_broj int(4) DEFAULT NULL, 
  PRIMARY KEY (id_mjesto_darivanja)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mjesto darivanja
-- ----------------------------
INSERT INTO mjesto_darivanja VALUES ('1', 'Klinički bolnički centar Osijek', 'Dravska 16', '31000');