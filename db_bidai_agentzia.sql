CREATE database IF NOT EXISTS db_bidai_agentzia;
USE db_bidai_agentzia;
/* *************************************************************** 
***************************CREATING TABLES************************
**************************************************************** */

/* *********************************** 
************AGENZTIA MOTA*************
************************************** */
CREATE TABLE if not exists agentzia_mota(
	agentzia_kod CHAR (2) not null PRIMARY KEY,
	deskribapena VARCHAR (50),
    UNIQUE (agentzia_kod)
);

/* *********************************** 
***********LANGILE KOPURUA************
************************************** */
CREATE TABLE if not exists langile_kop(
	langile_kod CHAR (2) not null PRIMARY KEY,
	deskribapena VARCHAR (50),
    UNIQUE (langile_kod)
);

/* *********************************** 
***************AGENZTIA **************
************************************** */
CREATE TABLE if not exists agentzia (
	agentzia_id INT not null PRIMARY KEY,
    izena VARCHAR (25),
    logoa VARCHAR (25),
    marka_kolore VARCHAR (9),
    erabiltzailea VARCHAR (25),
    pasahitza VARCHAR (25),
    agentzia_kod CHAR (2),
    langile_kod CHAR (2),
	FOREIGN KEY (agentzia_kod) REFERENCES agentzia_mota(agentzia_kod),
    FOREIGN KEY (langile_kod) REFERENCES langile_kop(langile_kod)
);


/* *********************************** 
****************BIDAIA****************
************************************** */
CREATE TABLE if not exists bidaia(
	bidai_id VARCHAR(12) not null PRIMARY KEY,
    izena VARCHAR (25),
	deskribapena VARCHAR (25),
    bidai_iraupen INT (4),
	agentzia_id INT,
    herrialdea VARCHAR (50),
	FOREIGN KEY (agentzia_id) REFERENCES agentzia(agentzia_id) ON UPDATE CASCADE ON DELETE CASCADE
);
/* *********************************** 
**************HERRIALDEAK*************
************************************** */
CREATE TABLE if not exists herrialdeak(
	herri_kod CHAR (2) not null PRIMARY KEY,
	herrialdea VARCHAR (50),
    bidai_id VARCHAR(12),
    UNIQUE (herri_kod),
    FOREIGN KEY (bidai_id) REFERENCES bidaia(bidai_id) 
);

/* *********************************** 
**************BIDAI MOTA**************
************************************** */
CREATE TABLE if not exists bidai_mota(
	bidai_kod CHAR (2) not null PRIMARY KEY,
	deskribapena VARCHAR (75),
    bidai_id VARCHAR(12),
    UNIQUE (bidai_kod),
    FOREIGN KEY (bidai_id) REFERENCES bidaia(bidai_id) 
);

/* *********************************** 
***************ZERBIZTUA**************
************************************** */
CREATE TABLE if not exists zerbitzuak(
	zerb_kod VARCHAR (4) PRIMARY KEY,
    bidai_id VARCHAR(12),
    UNIQUE (zerb_kod),
    FOREIGN KEY (bidai_id) REFERENCES bidaia(bidai_id)
);

/* *********************************** 
*************BESTE BATZUK*************
************************************** */
CREATE TABLE if not exists beste_batzuk(
	zerb_kod VARCHAR (4) PRIMARY KEY,
	izena VARCHAR (25),
	deskribapena VARCHAR (25),
    prezioa INT,
	FOREIGN KEY (zerb_kod) REFERENCES zerbitzuak(zerb_kod)
);

/* *********************************** 
***************OSTATUA**************
************************************** */
CREATE TABLE if not exists ostatua(
	zerb_kod VARCHAR (4) PRIMARY KEY,
	izena VARCHAR (25),
    prezioa INT,
    hiria VARCHAR(50),
    sarrera_egun VARCHAR (10),
    ireeta_egun VARCHAR (10),
    FOREIGN KEY (zerb_kod) REFERENCES zerbitzuak(zerb_kod)
);
/* *********************************** 
****************LOGELA MOTAK**********
************************************** */
CREATE TABLE if not exists logela_mota(
	logela_kod CHAR (3) not null PRIMARY KEY,
	deskribapena VARCHAR (25),
    zerb_kod VARCHAR (4),
    UNIQUE (logela_kod),
    FOREIGN KEY (zerb_kod) REFERENCES ostatua(zerb_kod)
);

/* *********************************** 
***************AIRELINEA**************
************************************** */
CREATE TABLE if not exists airelinea(
	airelinea_kod VARCHAR (4) not null PRIMARY KEY,
	izena VARCHAR (50),
    herrialdea CHAR (3),
    UNIQUE (airelinea_kod)
);
/* *********************************** 
***************AIREPORTUA**************
************************************** */
CREATE TABLE if not exists aireportua(
	aireportu_kod VARCHAR (3) not null PRIMARY KEY,
	hiria VARCHAR (100),
    jatorri_aireport VARCHAR (100),
    helmug_aireport VARCHAR (100),
    UNIQUE (aireportu_kod)
);

/* *********************************** 
***************HEGALDIA***************
************************************** */
CREATE TABLE if not exists hegaldia(
	hegaldi_kod VARCHAR (7) PRIMARY KEY,
    izena VARCHAR (25),
    prezioa INT,
    irteera_data VARCHAR (10),
    irteera_ordua VARCHAR (5),
    bidai_iraupen VARCHAR (5),
    aireportu_kod VARCHAR (3),
    airelinea_kod VARCHAR (4),
	helmug_aireport VARCHAR (100),
    zerb_kod VARCHAR (4),
    UNIQUE (hegaldi_kod),
	FOREIGN KEY (aireportu_kod) REFERENCES aireportua(aireportu_kod) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (airelinea_kod) REFERENCES airelinea(airelinea_kod)ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (zerb_kod) REFERENCES ostatua(zerb_kod) ON UPDATE CASCADE ON DELETE CASCADE
);

/* *********************************** 
***************JOAN-ETORRI**************
************************************** */
CREATE TABLE if not exists joan_etorria(
	joanetorri_kod VARCHAR (7) PRIMARY KEY,
	itzulera_data VARCHAR (10),
    itzulera_ordua VARCHAR (25),
    buelta_iraupen VARCHAR (25),
    buelta_hegal_kod VARCHAR (5),
    airelinea_kod VARCHAR (4),
    UNIQUE (joanetorri_kod),
    FOREIGN KEY (airelinea_kod) REFERENCES airelinea(airelinea_kod)
);