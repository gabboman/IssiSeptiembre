DROP TABLE SOPORTE;
DROP TABLE MANTENIMIENTO;
DROP TABLE REPARACIONES;
DROP TABLE LINEAFACTURACOMPRA;
DROP TABLE LINEAFACTURAVENTA;
DROP TABLE FACTURASCOMPRA;
DROP TABLE FACTURASVENTATERMINAL;
DROP TABLE CONTRATOCLIENTE;
DROP TABLE TARIFAS;
DROP TABLE TRABAJADORES;
DROP TABLE TIPOSSOPORTES;
DROP TABLE PIEZASREPARACION;
DROP TABLE TERMINAL;
DROP TABLE PROVEEDORES;
DROP TABLE PUESTOSTRABAJO;
DROP TABLE TIENDA;
DROP TABLE CLIENTES;
DROP TABLE OPERADORES;

  CREATE TABLE  OPERADORES  
  (  IDOPERADOR  NUMBER(*,0), 
	 NOMBRE  VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	 PRIMARY KEY ( IDOPERADOR )
  
   );

  CREATE TABLE  CLIENTES  
  (  TELEFONOMOVIL  NUMBER(*,0) NOT NULL ENABLE, 
	 EMAIL  VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	 CUENTABANCARIA  NUMBER(*,0) NOT NULL ENABLE, 
	 NOMBRE  VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	 APELLIDOS  VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	 DNI  VARCHAR2(9 BYTE) NOT NULL ENABLE, 
	 DIRECCION  VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	 PRIMARY KEY ( DNI )
  
   );

  CREATE TABLE   TIENDA  
   (	 NOMBRE  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 UBICACION  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 TELEFONO  NUMBER NOT NULL ENABLE, 
	 EMAIL  VARCHAR2(50 BYTE) NOT NULL ENABLE, 
	 IDTIENDA  NUMBER (*,0)NOT NULL ENABLE, 
	 CONSTRAINT  TIENDA_PK  PRIMARY KEY ( IDTIENDA )
  
   ) ;

  CREATE TABLE   PUESTOSTRABAJO  
   (	 SUELDO  NUMBER NOT NULL ENABLE, 
	 FUNCION  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 NOMBRE  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 TIPOSTRABAJOS  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 IDPUESTO  NUMBER NOT NULL ENABLE, 
	 CONSTRAINT  PUESTOSTRABAJO_PK  PRIMARY KEY ( IDPUESTO )
    );

  
  CREATE TABLE   PROVEEDORES  
   (	 NOMBRE  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 APELLIDOS  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 DNI  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 CIF  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 CONSTRAINT  PROVEEDORES_PK  PRIMARY KEY ( CIF )
  
   ) ;

  
  CREATE TABLE   TERMINAL  
   (	 MODELO  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 MARCA  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 PANTALLA  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 TECLADO  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 MEMINTERNA  NUMBER NOT NULL ENABLE, 
	 MEMEXTERNA  NUMBER NOT NULL ENABLE, 
	 GPU  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 CPU  NUMBER NOT NULL ENABLE, 
	 CAMARA  NUMBER NOT NULL ENABLE, 
	 CANTIDAD  NUMBER NOT NULL ENABLE, 
	 IDTERMINAL  NUMBER NOT NULL ENABLE, 
	 CONSTRAINT  TERMINAL_PK  PRIMARY KEY ( IDTERMINAL )
   
   ) ;

  CREATE TABLE   PIEZASREPARACION  
   (	 NOMBRE  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 CANTIDADMATERIAL  NUMBER NOT NULL ENABLE, 
	 TERMINALASOCIADO  NUMBER NOT NULL ENABLE, 
	 IDPIEZA  NUMBER NOT NULL ENABLE, 
	 CONSTRAINT  PIEZASREPARACION_PK  PRIMARY KEY ( IDPIEZA ),
	 CONSTRAINT PIEZAS_MOVIL FOREIGN KEY (TERMINALASOCIADO)
	  REFERENCES TERMINAL (IDTERMINAL) ENABLE
   
   ) ;
   
   
   
   

  CREATE TABLE   TIPOSSOPORTES  
   (	 NOMBRE  VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 IDSOPORTES  NUMBER NOT NULL ENABLE, 
	 CONSTRAINT  TIPOSSOPORTES_PK  PRIMARY KEY ( IDSOPORTES )
    ) ;
	
	
	
		
	  CREATE TABLE  TRABAJADORES
	   (	NOMBRE VARCHAR2(25 BYTE), 
		APELLIDOS VARCHAR2(25 BYTE), 
		DNI VARCHAR2(20 BYTE) DEFAULT NULL NOT NULL ENABLE, 
		DIRECCION VARCHAR2(50 BYTE) DEFAULT NULL,
		TELEFONO NUMBER(*,0), 
		HORARIO VARCHAR2(25 BYTE), 
		FECHACONTRATO DATE, 
		IDTIENDA NUMBER NOT NULL ENABLE, 
		IDPUESTO NUMBER NOT NULL ENABLE, 
		 CONSTRAINT PKTRAB PRIMARY KEY (DNI), 
		 CONSTRAINT TRABAJADORES_PUESTOSTRABA_FK1 FOREIGN KEY (IDPUESTO)
		  REFERENCES  PUESTOSTRABAJO (IDPUESTO) ENABLE, 
		 CONSTRAINT TRABAJADORES_TIENDA_FK1 FOREIGN KEY (IDTIENDA)
		  REFERENCES  TIENDA (IDTIENDA) ENABLE
	   )
	 ;
	
	
 
  CREATE TABLE TARIFAS 
   (	IDTARIFA NUMBER(*,0), 
	PRECIOMINUTO NUMBER(4,2) NOT NULL ENABLE, 
	CONSUMOMINIMO NUMBER(4,3) NOT NULL ENABLE, 
	CUOTABASE NUMBER(4,3) NOT NULL ENABLE, 
	NMINUTOSGRATUITO NUMBER(4,0) NOT NULL ENABLE, 
	CUOTAINTERNET NUMBER(4,3) NOT NULL ENABLE, 
	NOMBRETARIFA VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	IDOPERADOR NUMBER (*,0) NOT NULL ENABLE, 
	 PRIMARY KEY (IDTARIFA),
	 CONSTRAINT TARIFAS_OPERADORES_FK1 FOREIGN KEY (IDOPERADOR)
	  REFERENCES OPERADORES (IDOPERADOR) ENABLE
   ) ;
   
   
  CREATE TABLE CONTRATOCLIENTE 
   (	FECHAINICIO DATE NOT NULL ENABLE, 
	FECHAFIN DATE NOT NULL ENABLE, 
	NUMEROTELEFONO NUMBER NOT NULL ENABLE, 
	IDCONTRATO NUMBER NOT NULL ENABLE, 
	IDTARIFA NUMBER NOT NULL ENABLE, 
	DNICLIENTE VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	DNITRABAJADOR VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	IDTERMINAL NUMBER NOT NULL ENABLE, 
	 CONSTRAINT CONTRATOCLIENTE_PK PRIMARY KEY (IDCONTRATO),
	 CONSTRAINT CONTRATOCLIENTE_TERMINAL_FK1 FOREIGN KEY (IDTERMINAL)
	  REFERENCES TERMINAL (IDTERMINAL) ENABLE, 
	 CONSTRAINT CONTRATOCLIENTE_CLIENTES_FK1 FOREIGN KEY (DNICLIENTE)
	  REFERENCES CLIENTES (DNI) ENABLE, 
	 CONSTRAINT CONTRATOCLIENTE_TARIFAS_FK1 FOREIGN KEY (IDTARIFA)
	  REFERENCES TARIFAS (IDTARIFA) ENABLE, 
	 CONSTRAINT CONTRATOCLIENTE_TRABAJADO_FK1 FOREIGN KEY (DNITRABAJADOR)
	  REFERENCES TRABAJADORES (DNI) ENABLE
   );

   
    CREATE TABLE FACTURASVENTATERMINAL 
   (	CODFACTVENTA NUMBER NOT NULL ENABLE,  
	CODTRABAJADOR VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	CODCLIENTE VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	 CONSTRAINT FACTURASVENTATERMINAL_PK PRIMARY KEY (CODFACTVENTA),
	 CONSTRAINT CLIENTEL_FK1 FOREIGN KEY (CODCLIENTE)
	  REFERENCES CLIENTES (DNI) ENABLE, 
	 CONSTRAINT TRABAJADOR_FK1 FOREIGN KEY (CODTRABAJADOR)
	  REFERENCES TRABAJADORES (DNI) ENABLE

	);
	
	 CREATE TABLE FACTURASCOMPRA 
   (
	 CODFACTCOMPRA NUMBER NOT NULL ENABLE, 
	CODPROVEEDOR VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	CODTRABAJADOR VARCHAR2(20 BYTE), 
	 CONSTRAINT FACTURASCOMPRA_PK PRIMARY KEY (CODFACTCOMPRA),
	 CONSTRAINT PROVEEDOR_FK1 FOREIGN KEY (CODPROVEEDOR)
	  REFERENCES PROVEEDORES (CIF) ENABLE, 
	 FOREIGN KEY (CODTRABAJADOR)
	  REFERENCES TRABAJADORES (DNI) ENABLE
	);
   
   
  CREATE TABLE LINEAFACTURAVENTA 
   (	CONCEPTO VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	PRECIO NUMBER NOT NULL ENABLE, 
	IDFACTURAVENTA NUMBER NOT NULL ENABLE, 
	IDTERMINAL NUMBER NOT NULL ENABLE, 
	IDLINEAFACTURAVENTA NUMBER NOT NULL ENABLE, 
	 CONSTRAINT LINEAFACTURAVENTA_PK PRIMARY KEY (IDFACTURAVENTA, IDLINEAFACTURAVENTA),
	 CONSTRAINT LINEAFACTURAVENTA_FACTURA_FK1 FOREIGN KEY (IDFACTURAVENTA)
	  REFERENCES FACTURASVENTATERMINAL (CODFACTVENTA) ENABLE, 
	 CONSTRAINT LINEAFACTURAVENTA_TERMINA_FK1 FOREIGN KEY (IDTERMINAL)
	  REFERENCES TERMINAL (IDTERMINAL) ENABLE
   ) ;
   
  CREATE TABLE LINEAFACTURACOMPRA 
   (	IDLINEAFACTURACOMPRA NUMBER NOT NULL ENABLE, 
	CONCEPTO VARCHAR2(20 BYTE) NOT NULL ENABLE, 
	PRECIOTOTAL NUMBER NOT NULL ENABLE, 
	FECHA DATE NOT NULL ENABLE, 
	IDFACTURACOMPRA NUMBER NOT NULL ENABLE, 
	IDPIEZA NUMBER, 
	IDTERMINAL NUMBER, 
	 CONSTRAINT LINEAFACTURACOMPRA_PK PRIMARY KEY (IDLINEAFACTURACOMPRA, IDFACTURACOMPRA),
	 CONSTRAINT LINEAFACTURACOMPRA_FACTUR_FK1 FOREIGN KEY (IDFACTURACOMPRA)
	  REFERENCES FACTURASCOMPRA (CODFACTCOMPRA) ENABLE, 
	 CONSTRAINT LINEAFACTURACOMPRA_PIEZAS_FK1 FOREIGN KEY (IDPIEZA)
	  REFERENCES PIEZASREPARACION (IDPIEZA) ENABLE, 
	 CONSTRAINT LINEAFACTURACOMPRA_TERMIN_FK1 FOREIGN KEY (IDTERMINAL)
	  REFERENCES TERMINAL (IDTERMINAL) ENABLE
   ) ;

   
  CREATE TABLE REPARACIONES
   (	IDREPARACION NUMBER NOT NULL ENABLE, 
	FECHAENTRADA DATE NOT NULL ENABLE, 
	FECHASALIDA DATE NOT NULL ENABLE, 
	IDTERMINAL NUMBER NOT NULL ENABLE, 
	REPARACIONESREALIZADAS VARCHAR2(25 BYTE) NOT NULL ENABLE, 
	IDLINEAFACTURACOMP NUMBER NOT NULL ENABLE, 
	IDFACTURACOMPRA NUMBER NOT NULL ENABLE, 
	 CONSTRAINT REPARACIONES_PK PRIMARY KEY (IDREPARACION),
	 CONSTRAINT FACTURACOMPRA_FK1 FOREIGN KEY (IDFACTURACOMPRA)
	  REFERENCES FACTURASCOMPRA (CODFACTCOMPRA) ENABLE, 
	 CONSTRAINT LINEAFACTURACOMP_FK1 FOREIGN KEY (IDLINEAFACTURACOMP, IDFACTURACOMPRA)
	  REFERENCES LINEAFACTURACOMPRA (IDLINEAFACTURACOMPRA, IDFACTURACOMPRA) ENABLE
   ) ;

  
  CREATE TABLE MANTENIMIENTO 
   (	IDREPARACION NUMBER, 
	IDPIEZA NUMBER, 
	 CONSTRAINT MANTENIMIENTO_PIEZASREPAR_FK1 FOREIGN KEY (IDPIEZA)
	  REFERENCES PIEZASREPARACION (IDPIEZA) ENABLE, 
	 CONSTRAINT MANTENIMIENTO_REPARACIONES_FK1 FOREIGN KEY (IDREPARACION)
	  REFERENCES REPARACIONES (IDREPARACION) ENABLE
   ) ;

   

  CREATE TABLE SOPORTE 
   (	IDTERMINAL NUMBER, 
	IDTIPOSOPORTE NUMBER, 
	 CONSTRAINT SOPORTE_TERMINAL_FK1 FOREIGN KEY (IDTERMINAL)
	  REFERENCES TERMINAL (IDTERMINAL) ENABLE, 
	 CONSTRAINT SOPORTE_TIPOSSOPORTES_FK1 FOREIGN KEY (IDTIPOSOPORTE)
	  REFERENCES TIPOSSOPORTES (IDSOPORTES) ENABLE
   );
  
  
  
  --TRIGGERS
  
  create or replace trigger fechasReparacion
  BEFORE UPDATE OF fechaSalida ON Reparaciones
  FOR EACH ROW

BEGIN
  IF(:NEW.fechasalida < :OLD.fechaentrada)
    THEN raise_application_error(-20600,:NEW.fechasalida ||'La fecha de salida no puede ser anterior a la fecha de entrada');
  END IF;
END;



create or replace trigger pedidos
  BEFORE INSERT OR UPDATE OF cantidad ON TERMINAL
  FOR EACH ROW

DECLARE
  --cant INTEGER;
BEGIN
  --SELECT cantidad INTO cant FROM TERMINAL;
  IF(:NEW.cantidad < 5)
    THEN raise_application_error(-20600,:NEW.cantidad||'Debemos pedir mas terminales a los proveedores');
  END IF;
END;

create or replace trigger PEDIDOSPIEZAS 
BEFORE INSERT OR UPDATE OF cantidadMaterial ON PIEZASREPARACION 
 FOR EACH ROW

--DECLARE
--  cant INTEGER;
BEGIN
  --SELECT cantidadMaterial INTO cant FROM PIEZASREPARACION;
  IF(:NEW.cantidadMaterial < 5)
    THEN raise_application_error(-20600,:NEW.cantidadMaterial||'Debemos pedir mas materiales a los proveedores');
  END IF;
END;
----FUNCIONES
CREATE OR REPLACE FUNCTION salario--sacar el salario del empleado
(IDEMPLEADO IN VARCHAR2 (25 BYTE))
RETURN NUMBER
IS idsueldo PUESTOTRABAJO.SUELDO%TYPE;
BEGIN 
SELECT sueldo INTO idsueldo
FROM PUESTOTRABAJO
WHERE IDPUESTO = IDEMPLEADO;
RETURN idsueldo;
END salario;

--procedures---


CREATE OR REPLACE PROCEDURE contratoempleado
(IDDNI IN TRABAJADORES.DNI%TYPE,
IDFECHACONTRATO IN TRABAJADORES.FECHACONTRATO%TYPE) 
 IS
 BEGIN 
INSERT INTO TRABAJADORES(DNI, FECHACONTRATO)
VALUES (IDDNI, IDFECHACONTRATO);
END contratoempleado;

--cursores--

DECLARE
	CURSOR cursor_1 IS
	SELECT sueldo, funcion, nombre, tipostrabajos, idpuesto
	FROM PUESTOSTRABAJO ORDER BY sueldo;
	w_sueldo	PUESTOSTRABAJO.sueldo%TYPE;
	w_funcion	PUESTOSTRABAJO.funcion%TYPE;
	w_nombre	PUESTOSTRABAJO.nombre%TYPE;
	w_tipostrabajos	PUESTOSTRABAJO.tipostrabajos%TYPE;
	w_idpuesto	PUESTOSTRABAJO.idpuesto%TYPE;
BEGIN
	OPEN cursor_1;
	FETCH cursor_1 INTO w_sueldo, w_funcion, w_nombre, w_tipostrabajos, w_idpuesto;
	CLOSE cursor_1;
END;



--secuencias--

CREATE SEQUENCE secterminal--secuencia para poder definir la primary key . añadido antes del commit.
  Start With 1
  Increment By 1
  CACHE 10;

CREATE SEQUENCE secoperadores
  Start With 1
  Increment By 1
  CACHE 10;

 CREATE SEQUENCE sectienda
  Start With 1
  Increment By 1
  CACHE 10;

 CREATE SEQUENCE secpuestos
  Start With 1
  Increment By 1
  CACHE 10;

 CREATE SEQUENCE secpieza
  Start With 1
  Increment By 1
  CACHE 10;
	
 CREATE SEQUENCE secsoporte
  Start With 1
  Increment By 1
  CACHE 10;

  
  CREATE SEQUENCE sectarifa
  Start With 1
  Increment By 1
  CACHE 10;

  CREATE SEQUENCE secfacventer
  Start With 1
  Increment By 1
  CACHE 10;


  CREATE SEQUENCE secfaccomter
  Start With 1
  Increment By 1
  CACHE 10;  

  CREATE SEQUENCE seclinfaccomter
  Start With 1
  Increment By 1
  CACHE 10;  

  CREATE SEQUENCE secrep
  Start With 1
  Increment By 1
  CACHE 10;  
  
  CREATE SEQUENCE secmant
  Start With 1
  Increment By 1
  CACHE 10;
 
 
  CREATE SEQUENCE secsop
  Start With 1
  Increment By 1
  CACHE 10;
  
--inserts--


insert into OPERADORES (IDOPERADOR, nombre) values (secoperadores.nextval,'yoigo');
insert into OPERADORES (IDOPERADOR, nombre) values (secoperadores.nextval,'movistar');

insert into CLIENTES (dni,telefonoMovil,email,cuentaBancaria,nombre,apellidos,direccion) values ('02034562J','654633278','felix@gmail.com','035832356854333695','Sara','Perez Pi�a','Calle el puerto , n� 4');
insert into CLIENTES (dni,telefonoMovil,email,cuentaBancaria,nombre,apellidos,direccion) values ('78954332A','686593278','maria89@gmail.com','035832359658433695','Francisco','Castro Pinz�n','Calle el compas, n� 7');

insert into TIENDA (IDTIENDA,nombre,ubicacion,telefono,email) values (sectienda.nextval,'Nomb0','C/A n�2','954673827','calleA@gmail.com');
insert into TIENDA (IDTIENDA,nombre,ubicacion,telefono,email) values (sectienda.nextval,'Nomb2','Avenida Bn�3','975363728','calleB@gmail.com');

insert into PUESTOSTRABAJO (idpuesto,sueldo,funcion,nombre,tiposTrabajos) values (secpuestos.nextval,758.00,'revisiones','Manuel','tecnico');
insert into PUESTOSTRABAJO (idpuesto,sueldo,funcion,nombre,tiposTrabajos) values (secpuestos.nextval,826.00,'administrativa','Rosa','asistente');

insert into PROVEEDORES (nombre,apellidos,dni,cif) values ('Carlos','P�rez D�az','30384324D','23345678A');
insert into PROVEEDORES (nombre,apellidos,dni,cif) values ('David','�lvarez Castro','48853773G','34567890B');

insert into TERMINAL (idterminal,marca,modelo,pantalla,teclado,memInterna,memExterna,gpu,cpu,camara,cantidad) values (secterminal.nextval,'samsung','GalaxyS3','480x800','tactil',523,4,'Adreno300',800,8,8);
insert into TERMINAL (idterminal,marca,modelo,pantalla,teclado,memInterna,memExterna,gpu,cpu,camara,cantidad) values (secterminal.nextval,'sorny','XPERIAARCS','340x330','tactil',2034,8,'Adreno300',800,8,7);

insert into PIEZASREPARACION (idpieza,nombre,cantidadMaterial,terminalAsociado) values (secpieza.nextval,'pantalla','6',1);
insert into PIEZASREPARACION (idpieza,nombre,cantidadMaterial,terminalAsociado) values (secpieza.nextval,'teclado','8',2);

insert into TIPOSSOPORTES (IDSOPORTES,nombre) values (secsoporte.nextval,'JPG');
insert into TIPOSSOPORTES (IDSOPORTES,nombre) values (secsoporte.nextval,'AVI');

insert into TRABAJADORES (dni,IDTIENDA,idpuesto,telefono,horario,fechaContrato,nombre,apellidos,direccion) values ('6666667D',1,1,666666665,'20:00-24:00',to_date('2008/05/03 22:03:44', 'yyyy/mm/dd hh24:mi:ss'),'Lance','Hardwood','calle falsa 233');
insert into TRABAJADORES (dni,IDTIENDA,idpuesto,telefono,horario,fechaContrato,nombre,apellidos,direccion) values ('6666668D',2,2,666666666,'9:00-23:00',to_date('2009/05/03 22:03:44', 'yyyy/mm/dd hh24:mi:ss'),'Ristro','Montoya','calle falsa 233');

insert into TARIFAS (idtarifa,precioMinuto,consumoMinimo,cuotaBase,NMINUTOSGRATUITO,cuotaInternet,nombreTarifa,IDOPERADOR) values (sectarifa.nextval,6,5,0,0,0,'S',1);
insert into TARIFAS (idtarifa,precioMinuto,consumoMinimo,cuotaBase,NMINUTOSGRATUITO,cuotaInternet,nombreTarifa,IDOPERADOR) values (sectarifa.nextval,5,2,6,0,0,'M',2);

Insert Into Contratocliente (Fechainicio,Fechafin,Numerotelefono,Idcontrato,Idtarifa,Dnicliente,Dnitrabajador,Idterminal) Values (To_Date('2008/05/02 11:03:44', 'yyyy/mm/dd hh:mi:ss'),To_Date('2014/05/03 12:03:44', 'yyyy/mm/dd hh:mi:ss'),955623333,1,1,'02034562J','6666667D',1);
insert into CONTRATOCLIENTE (FECHAINICIO,FECHAFIN,NUMEROTELEFONO,IDCONTRATO,IDTARIFA,DNICLIENTE,DNITRABAJADOR,IDTERMINAL) values (to_date('2009/06/22 20:48:05', 'yyyy/mm/dd hh24:mi:ss'),to_date('3014/06/02 10:48:05', 'yyyy/mm/dd hh:mi:ss'),666666666,2,2,'78954332A','6666668D',2);

insert into FACTURASVENTATERMINAL(CODFACTVENTA,CODTRABAJADOR,CODCLIENTE) values(secfacventer.nextval,'6666667D','02034562J');
insert into FACTURASVENTATERMINAL(CODFACTVENTA,CODTRABAJADOR,CODCLIENTE) values(secfacventer.nextval,'6666668D','78954332A');

insert into FACTURASCOMPRA(CODFACTCOMPRA,CODPROVEEDOR,CODTRABAJADOR) values(secfaccomter.nextval,'23345678A','6666667D');
insert into FACTURASCOMPRA(CODFACTCOMPRA,CODPROVEEDOR,CODTRABAJADOR) values(secfaccomter.nextval,'23345678A','6666668D');

insert into LINEAFACTURAVENTA(CONCEPTO,PRECIO,IDFACTURAVENTA,IDTERMINAL,IDLINEAFACTURAVENTA) values('Compra de gs3',500,1,1,1);
insert into LINEAFACTURAVENTA(CONCEPTO,PRECIO,IDFACTURAVENTA,IDTERMINAL,IDLINEAFACTURAVENTA) values('Compra de htc One',450,2,2,2);

insert into LINEAFACTURACOMPRA(IDLINEAFACTURACOMPRA,CONCEPTO,PRECIOTOTAL,FECHA,IDFACTURACOMPRA,IDPIEZA,IDTERMINAL) values(seclinfaccomter.nextval,'Compra terminales',600,to_date('2008/05/03 12:03:44','yyyy/mm/dd hh:mi:ss'),1,1,1);
insert into LINEAFACTURACOMPRA(IDLINEAFACTURACOMPRA,CONCEPTO,PRECIOTOTAL,FECHA,IDFACTURACOMPRA,IDPIEZA,IDTERMINAL) values(seclinfaccomter.nextval,'Compra terminales',800,to_date('2009/06/22 10:48:05','yyyy/mm/dd hh:mi:ss'),2,2,2);

insert into REPARACIONES(IDREPARACION,FECHAENTRADA,FECHASALIDA,IDTERMINAL,REPARACIONESREALIZADAS,IDLINEAFACTURACOMP,IDFACTURACOMPRA) values(secrep.nextval,to_date('2008/05/03 11:03:44', 'yyyy/mm/dd hh:mi:ss'),to_date('2008/05/9 2:00:00','yyyy/mm/dd hh:mi:ss'),1,'Cambio de la pantalla',1,1);
insert into REPARACIONES(IDREPARACION,FECHAENTRADA,FECHASALIDA,IDTERMINAL,REPARACIONESREALIZADAS,IDLINEAFACTURACOMP,IDFACTURACOMPRA) values(secrep.nextval,to_date('2013/06/23 4:35:00', 'yyyy/mm/dd hh:mi:ss'),to_date('2013/07/23 1:00:00','yyyy/mm/dd hh:mi:ss'),2,'Cambio del teclado',2,2);

insert into MANTENIMIENTO(IDREPARACION,IDPIEZA) values(secmant.nextval,1);
insert into MANTENIMIENTO(IDREPARACION,IDPIEZA) values(secmant.nextval,2);

insert into SOPORTE(IDTERMINAL,IDTIPOSOPORTE) values(secsop.nextval,1);
insert into SOPORTE(IDTERMINAL,IDTIPOSOPORTE) values(secsop.nextval,2);




--script de prueba--
UPDATE REPARACIONES
SET FECHAENTRADA=to_date('2009/05/03 21:02:44', 'yyyy/mm/dd hh24:mi:ss'),FECHASALIDA=to_date('2008/05/03 21:02:44', 'yyyy/mm/dd hh24:mi:ss');

UPDATE TERMINAL
SET CANTIDAD=3
WHERE IDTERMINAL=1;

UPDATE PIEZASREPARACION
SET CANTIDADMATERIAL=3
WHERE IDPIEZA = 1;