#==========================================================
#===================CREAR BASE DE DATOS====================
#==========================================================
DROP DATABASE IF EXISTS DB_Icomallas;
CREATE DATABASE DB_Icomallas;
#==========================================================


#==========================================================
USE DB_Icomallas;
#==========================================================


#==========================================================
#================TABLA DE TIPO DE DOCUMENTO================
#==========================================================
DROP TABLE IF EXISTS tb_tipo_documento;
CREATE TABLE tb_tipo_documento
(
	id_tipoDocumento  INT NOT NULL AUTO_INCREMENT,
	tipoDocumento  VARCHAR(25) NOT NULL,
	
    CONSTRAINT PK_TB_tipoDocumento PRIMARY KEY (id_tipoDocumento)
);
#==========================================================


#==========================================================
#=================TABLA DE TIPO DE PERMISO=================
#==========================================================
DROP TABLE IF EXISTS tb_tipo_permiso;
CREATE TABLE tb_tipo_permiso
(
	id_tipoPermiso  INT NOT NULL AUTO_INCREMENT,
	tipoPermiso  VARCHAR(25) NOT NULL,
	
    CONSTRAINT PK_TB_tipoPermiso PRIMARY KEY (id_tipoPermiso)
);
#==========================================================


#==========================================================
#====================TABLA TIPO DE CARGO===================
#==========================================================
DROP TABLE IF EXISTS tb_tipo_cargo;
CREATE TABLE tb_tipo_cargo
(
	id_tipoCargo  INT NOT NULL AUTO_INCREMENT,
	tipoCargo  VARCHAR(20) NOT NULL,
	
    CONSTRAINT PK_TB_tipoCargo PRIMARY KEY (id_tipoCargo)
);
#==========================================================


#==========================================================
#======================TABLA DE CIUDAD=====================
#==========================================================
DROP TABLE IF EXISTS tb_ciudad;
CREATE TABLE tb_ciudad
(
	id_ciudad  INT NOT NULL AUTO_INCREMENT,
	ciudad  VARCHAR(25) NOT NULL,
	
    CONSTRAINT PK_TB_ciudad PRIMARY KEY (id_ciudad)
);
#==========================================================


#==========================================================
#=================TABLA DE UNIDAD DE MEDIDA================
#==========================================================
DROP TABLE IF EXISTS tb_unidad_medida;
CREATE TABLE tb_unidad_medida
(
	id_unidad_medida  INT NOT NULL AUTO_INCREMENT,
	tipoUnidadMedida  VARCHAR(25) NOT NULL,
	
    CONSTRAINT PK_TB_unidadMedida PRIMARY KEY (id_unidad_medida)
);
#==========================================================


#==========================================================
#====================TABLA DE EMPLEADO=====================
#==========================================================
DROP TABLE IF EXISTS tb_empleado;
CREATE TABLE tb_empleado
(
	id_empleado  INT NOT NULL AUTO_INCREMENT,
	id_tipoCargo  INT NOT NULL,
	id_ciudad  INT NOT NULL,
	nombreCompleto  VARCHAR(50) NOT NULL,
	numeroDocumento  VARCHAR(25) NOT NULL,
	fechaDeNacimiento  DATE NOT NULL,
	telefono  VARCHAR(25) NOT NULL,
	celular  VARCHAR(25),
	correoElectronico  VARCHAR(80),
	direccion  VARCHAR(80) NOT NULL,  
    estado BOOL NOT NULL,

	CONSTRAINT PK_TB_empleado PRIMARY KEY (id_empleado),
	CONSTRAINT FK_TB_empleado_TB_tipoCargo FOREIGN KEY (id_tipoCargo) REFERENCES tb_tipo_cargo (id_tipoCargo),
	CONSTRAINT FK_TB_empleado_TB_ciudad FOREIGN KEY (id_ciudad) REFERENCES tb_ciudad (id_ciudad)
);
#==========================================================


#==========================================================
#=====================TABLA DE USUARIO=====================
#==========================================================
DROP TABLE IF EXISTS tb_usuario;
CREATE TABLE tb_usuario
(
	id_usuario  INT NOT NULL AUTO_INCREMENT,
	id_empleado  INT NOT NULL,
	id_tipoPermiso  INT NOT NULL,
	nombreUsuario  VARCHAR(200) NOT NULL,
	contrasenia  VARCHAR(200) NOT NULL,
	estado  BOOL NOT NULL,

	CONSTRAINT PK_TB_usuario PRIMARY KEY (id_usuario),
	CONSTRAINT FK_TB_usuario_TB_empleado FOREIGN KEY (id_empleado) REFERENCES tb_empleado(id_empleado),
	CONSTRAINT FK_TB_usuario_TB_tipoPermiso FOREIGN KEY (id_tipoPermiso) REFERENCES tb_tipo_permiso(id_tipoPermiso)
);
#==========================================================


#==========================================================
#=====================TABLA DE CLIENTE=====================
#==========================================================
DROP TABLE IF EXISTS tb_cliente;
create table tb_cliente
(
	id_cliente  INT NOT NULL AUTO_INCREMENT,
	id_tipoDocumento  INT NOT NULL,
	id_ciudad  INT NOT NULL,
	nombreCompleto  VARCHAR(25) NOT NULL,
	numeroDocumento  VARCHAR(25) NOT NULL,
	telefono  VARCHAR(25) NOT NULL,
	celular  VARCHAR(25),
	fax  VARCHAR(25),  	
	correoElectronico  VARCHAR(80),
	direccion  VARCHAR(80) NOT NULL,
	estado  BOOL NOT NULL,

	CONSTRAINT PK_TB_cliente PRIMARY KEY (id_cliente),
	CONSTRAINT FK_TB_cliente_TB_tipoDocumento FOREIGN KEY (id_tipoDocumento) REFERENCES tb_tipo_documento(id_tipoDocumento),
	CONSTRAINT FK_TB_cliente_TB_ciudad FOREIGN KEY (id_ciudad) REFERENCES tb_ciudad(id_ciudad)
);
#==========================================================


#==========================================================
#====================TABLA DE PRODUCTO=====================
#==========================================================
DROP TABLE IF EXISTS tb_producto;
create table tb_producto
(
	id_producto  INT NOT NULL AUTO_INCREMENT,
	codigo  INT NOT NULL,
	id_unidadMedida  INT NOT NULL,
	nombre  VARCHAR(50) NOT NULL,
	descripcion  VARCHAR(250),	   
	fabricante  VARCHAR(50),  
	stock  INT NOT NULL,
	impuesto  DECIMAL(10,2) NOT NULL,
	valor_unitario  DECIMAL(10,2) NOT NULL,
	estado  BOOL NOT NULL,

	CONSTRAINT PK_TB_producto PRIMARY KEY (id_producto),
	CONSTRAINT FK_TB_unidadMedida FOREIGN KEY (id_unidadMedida) REFERENCES tb_unidad_medida(id_unidad_medida)
);
#==========================================================


#==========================================================
#======================TABLA DE VENTA======================
#==========================================================
DROP TABLE IF EXISTS tb_venta;
create table tb_venta
(
	id_venta  INT NOT NULL AUTO_INCREMENT,
	id_cliente  INT NOT NULL,
	id_usuario  INT NOT NULL,
	fecha_de_registro  date NOT NULL,
	totalBruto  DECIMAL(10,2) NOT NULL,
	impuesto DECIMAL(10,2) NOT NULL,
	valorNeto  DECIMAL(10,2) NOT NULL,
    estado  BOOL NOT NULL,

	CONSTRAINT PK_TB_venta PRIMARY KEY (id_venta),
	CONSTRAINT FK_TB_venta_TB_cliente FOREIGN KEY (id_cliente) REFERENCES tb_cliente(id_cliente),
	CONSTRAINT FK_TB_venta_TB_usuario FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario)
);
#==========================================================


#==========================================================
#==================TABLA DETALLE DE VENTA==================
#==========================================================
DROP TABLE IF EXISTS tb_detalle_venta;
create table tb_detalle_venta
(
	id_detalle_venta  INT NOT NULL AUTO_INCREMENT,
	id_producto  INT NOT NULL,
	id_venta  INT NOT NULL,
	cantidad  INT NOT NULL,
	valorUnitario  DECIMAL(10,2) NOT NULL,
	subTotal  DECIMAL(10,2) NOT NULL,

	CONSTRAINT PK_TB_detalle_venta PRIMARY KEY (id_detalle_venta),
	CONSTRAINT FK_TB_detalle_venta_TB_producto FOREIGN KEY (id_producto) REFERENCES tb_producto(id_producto),
	CONSTRAINT FK_TB_detalle_venta_TB_venta FOREIGN KEY (id_venta) REFERENCES tb_venta(id_venta)
);
#==========================================================






#==========================================================
#====================INSERCIÓN DE DATOS====================
#==========================================================


#==========================================================
#====INSERTANDO DATOS EN LA TABLA DE TIPO DE DOCUMENTO=====
#==========================================================
INSERT INTO tb_tipo_documento(tipoDocumento) VALUES ('Cedula');
INSERT INTO tb_tipo_documento(tipoDocumento) VALUES ('Nit');
#==========================================================


#==========================================================
#======INSERTANDO DATOS EN LA TABLA DE TIPO DE PERMISO=====
#==========================================================
INSERT INTO tb_tipo_permiso(tipoPermiso) VALUES ('Administrador');
INSERT INTO tb_tipo_permiso(tipoPermiso) VALUES ('Vendedor');
INSERT INTO tb_tipo_permiso(tipoPermiso) VALUES ('Operario');
#==========================================================


#==========================================================
#===========INSERTANDO DATOS EN LA TABLA DE CARGO==========
#==========================================================
INSERT INTO tb_tipo_cargo(tipoCargo) VALUES ('Administrador');
INSERT INTO tb_tipo_cargo(tipoCargo) VALUES ('Vendedor');
INSERT INTO tb_tipo_cargo(tipoCargo) VALUES ('Operario');
#==========================================================


#==========================================================
#============INSERTANDO DATOS EN LA TABLA CIUDAD===========
#==========================================================
INSERT INTO tb_ciudad(ciudad) VALUES ('Acacías');
INSERT INTO tb_ciudad(ciudad) VALUES ('Aguachica');
INSERT INTO tb_ciudad(ciudad) VALUES ('Agustín Codazzi');
INSERT INTO tb_ciudad(ciudad) VALUES ('Apartadó');
INSERT INTO tb_ciudad(ciudad) VALUES ('Arauca');
INSERT INTO tb_ciudad(ciudad) VALUES ('Arjona');
INSERT INTO tb_ciudad(ciudad) VALUES ('Armenia');
INSERT INTO tb_ciudad(ciudad) VALUES ('Baranoa');
INSERT INTO tb_ciudad(ciudad) VALUES ('Barrancabermeja');
INSERT INTO tb_ciudad(ciudad) VALUES ('Barranquilla');
INSERT INTO tb_ciudad(ciudad) VALUES ('Bello');
INSERT INTO tb_ciudad(ciudad) VALUES ('Bogotá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Bucaramanga');
INSERT INTO tb_ciudad(ciudad) VALUES ('Buenaventura');
INSERT INTO tb_ciudad(ciudad) VALUES ('Calarcá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Caldas');
INSERT INTO tb_ciudad(ciudad) VALUES ('Cali');
INSERT INTO tb_ciudad(ciudad) VALUES ('Candelaria');
INSERT INTO tb_ciudad(ciudad) VALUES ('Carmen de Bolívar');
INSERT INTO tb_ciudad(ciudad) VALUES ('Cartagena de Indias');
INSERT INTO tb_ciudad(ciudad) VALUES ('Cartago');
INSERT INTO tb_ciudad(ciudad) VALUES ('Caucasia');
INSERT INTO tb_ciudad(ciudad) VALUES ('Cereté');
INSERT INTO tb_ciudad(ciudad) VALUES ('Ciénaga');
INSERT INTO tb_ciudad(ciudad) VALUES ('Ciénaga de Oro');
INSERT INTO tb_ciudad(ciudad) VALUES ('Copacabana');
INSERT INTO tb_ciudad(ciudad) VALUES ('Corozal');
INSERT INTO tb_ciudad(ciudad) VALUES ('Chía');
INSERT INTO tb_ciudad(ciudad) VALUES ('Chigorodó');
INSERT INTO tb_ciudad(ciudad) VALUES ('Chiquinquirá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Dosquebradas');
INSERT INTO tb_ciudad(ciudad) VALUES ('Duitama');
INSERT INTO tb_ciudad(ciudad) VALUES ('El Banco');
INSERT INTO tb_ciudad(ciudad) VALUES ('El Cerrito');
INSERT INTO tb_ciudad(ciudad) VALUES ('Envigado');
INSERT INTO tb_ciudad(ciudad) VALUES ('Espinal');
INSERT INTO tb_ciudad(ciudad) VALUES ('Facatativá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Florencia');
INSERT INTO tb_ciudad(ciudad) VALUES ('Florida');
INSERT INTO tb_ciudad(ciudad) VALUES ('Floridablanca');
INSERT INTO tb_ciudad(ciudad) VALUES ('Fundación');
INSERT INTO tb_ciudad(ciudad) VALUES ('Funza');
INSERT INTO tb_ciudad(ciudad) VALUES ('Fusagasugá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Garzón');
INSERT INTO tb_ciudad(ciudad) VALUES ('Girardot');
INSERT INTO tb_ciudad(ciudad) VALUES ('Granada');
INSERT INTO tb_ciudad(ciudad) VALUES ('Guadalajara de Buga');
INSERT INTO tb_ciudad(ciudad) VALUES ('Ibagué');
INSERT INTO tb_ciudad(ciudad) VALUES ('Ipiales');
INSERT INTO tb_ciudad(ciudad) VALUES ('Itagüí');
INSERT INTO tb_ciudad(ciudad) VALUES ('Jamundí');
INSERT INTO tb_ciudad(ciudad) VALUES ('La Dorada');
INSERT INTO tb_ciudad(ciudad) VALUES ('La Estrella');
INSERT INTO tb_ciudad(ciudad) VALUES ('La Plata');
INSERT INTO tb_ciudad(ciudad) VALUES ('Los Patios');
INSERT INTO tb_ciudad(ciudad) VALUES ('Madrid');
INSERT INTO tb_ciudad(ciudad) VALUES ('Magangué');
INSERT INTO tb_ciudad(ciudad) VALUES ('Maicao');
INSERT INTO tb_ciudad(ciudad) VALUES ('Malambo');
INSERT INTO tb_ciudad(ciudad) VALUES ('Manaure');
INSERT INTO tb_ciudad(ciudad) VALUES ('Manizales');
INSERT INTO tb_ciudad(ciudad) VALUES ('Medellín');
INSERT INTO tb_ciudad(ciudad) VALUES ('Montelíbano');
INSERT INTO tb_ciudad(ciudad) VALUES ('Montería');
INSERT INTO tb_ciudad(ciudad) VALUES ('Mosquera');
INSERT INTO tb_ciudad(ciudad) VALUES ('Neiva');
INSERT INTO tb_ciudad(ciudad) VALUES ('Ocaña');
INSERT INTO tb_ciudad(ciudad) VALUES ('Palmira');
INSERT INTO tb_ciudad(ciudad) VALUES ('Pamplona');
INSERT INTO tb_ciudad(ciudad) VALUES ('Pasto');
INSERT INTO tb_ciudad(ciudad) VALUES ('Pereira');
INSERT INTO tb_ciudad(ciudad) VALUES ('Piedecuesta');
INSERT INTO tb_ciudad(ciudad) VALUES ('Pitalito');
INSERT INTO tb_ciudad(ciudad) VALUES ('Planeta Rica');
INSERT INTO tb_ciudad(ciudad) VALUES ('Popayán');
INSERT INTO tb_ciudad(ciudad) VALUES ('Puerto Asís');
INSERT INTO tb_ciudad(ciudad) VALUES ('Puerto Boyacá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Quibdó');
INSERT INTO tb_ciudad(ciudad) VALUES ('Riohacha');
INSERT INTO tb_ciudad(ciudad) VALUES ('Rionegro');
INSERT INTO tb_ciudad(ciudad) VALUES ('Riosucio');
INSERT INTO tb_ciudad(ciudad) VALUES ('Sabanalarga'); 
INSERT INTO tb_ciudad(ciudad) VALUES ('Sahagún');
INSERT INTO tb_ciudad(ciudad) VALUES ('Samaniego'); 
INSERT INTO tb_ciudad(ciudad) VALUES ('San Andrés'); 
INSERT INTO tb_ciudad(ciudad) VALUES ('San Andrés de Sotavento');
INSERT INTO tb_ciudad(ciudad) VALUES ('San Andrés de Tumaco');
INSERT INTO tb_ciudad(ciudad) VALUES ('San Jose de Cúcuta');
INSERT INTO tb_ciudad(ciudad) VALUES ('San José del Guaviare');
INSERT INTO tb_ciudad(ciudad) VALUES ('San Juan de Girón');
INSERT INTO tb_ciudad(ciudad) VALUES ('San Marcos');
INSERT INTO tb_ciudad(ciudad) VALUES ('San Vicente del Caguán');
INSERT INTO tb_ciudad(ciudad) VALUES ('Santa Cruz de Lorica');
INSERT INTO tb_ciudad(ciudad) VALUES ('Santa Marta');
INSERT INTO tb_ciudad(ciudad) VALUES ('Santa Rosa de Cabal');
INSERT INTO tb_ciudad(ciudad) VALUES ('Santander de Quilichao');
INSERT INTO tb_ciudad(ciudad) VALUES ('Sincelejo');
INSERT INTO tb_ciudad(ciudad) VALUES ('Soacha');
INSERT INTO tb_ciudad(ciudad) VALUES ('Sogamoso');
INSERT INTO tb_ciudad(ciudad) VALUES ('Soledad');
INSERT INTO tb_ciudad(ciudad) VALUES ('Tierralta');
INSERT INTO tb_ciudad(ciudad) VALUES ('Tuluá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Tunja');
INSERT INTO tb_ciudad(ciudad) VALUES ('Turbaco');
INSERT INTO tb_ciudad(ciudad) VALUES ('Turbo');
INSERT INTO tb_ciudad(ciudad) VALUES ('Uribia');
INSERT INTO tb_ciudad(ciudad) VALUES ('Valledupar');
INSERT INTO tb_ciudad(ciudad) VALUES ('Villa del Rosario');
INSERT INTO tb_ciudad(ciudad) VALUES ('Villavicencio');
INSERT INTO tb_ciudad(ciudad) VALUES ('Yopal');
INSERT INTO tb_ciudad(ciudad) VALUES ('Yumbo');
INSERT INTO tb_ciudad(ciudad) VALUES ('Zipaquirá');
INSERT INTO tb_ciudad(ciudad) VALUES ('Zona Bananera');
#==========================================================
         
         
#==========================================================
#=====INSERTANDO DATOS EN LA TABLA DE UNIDAD DE MEDIDA=====
#==========================================================
INSERT INTO tb_unidad_medida(tipoUnidadMedida) VALUES ('Unidad');
INSERT INTO tb_unidad_medida(tipoUnidadMedida) VALUES ('Centimetro');
INSERT INTO tb_unidad_medida(tipoUnidadMedida) VALUES ('Metro Cuadrado');
#==========================================================         


#==========================================================   
#=========INSERTANDO DATOS EN LA TABLA EMPLEADO============ 
#==========================================================   
INSERT INTO tb_empleado (id_tipoCargo,id_ciudad,nombreCompleto,numeroDocumento,fechaDeNacimiento,telefono,celular,correoElectronico,direccion,estado)
VALUES (1,17,'Juan Sebastian Rodriguez','1143939596','1991/04/27','4045761','3187386091','sebastianRodriguez@hotmail.com','Calle 100D',1);

INSERT INTO tb_empleado (id_tipoCargo,id_ciudad,nombreCompleto,numeroDocumento,fechaDeNacimiento,telefono,celular,correoElectronico,direccion,estado)
VALUES (2,8,'Juan Carlos Trujillo','1243939596','1993/03/13','1234567','3181234567','CarlosTrujillo@hotmail.com','Calle 100E',1);

INSERT INTO tb_empleado (id_tipoCargo,id_ciudad,nombreCompleto,numeroDocumento,fechaDeNacimiento,telefono,celular,correoElectronico,direccion,estado)
VALUES (3,12,'Carlos Roman Cruz','1343939596','1996/06/16','6543210','3187654321','CarlosCruz@hotmail.com','Calle 100F',1);
#==========================================================   


#==========================================================   
#===========INSERTANDO DATOS EN LA TABLA USUARIO===========
#==========================================================   
INSERT INTO tb_usuario (id_empleado,id_tipoPermiso,nombreUsuario,contrasenia,estado)
VALUES (1,1,'sebastian','adcd7048512e64b48da55b027577886ee5a36350',1);

INSERT INTO tb_usuario (id_empleado,id_tipoPermiso,nombreUsuario,contrasenia,estado)
VALUES (2,2,'carlosT','adcd7048512e64b48da55b027577886ee5a36350',1);

INSERT INTO tb_usuario (id_empleado,id_tipoPermiso,nombreUsuario,contrasenia,estado)
VALUES (3,3,'romanC','adcd7048512e64b48da55b027577886ee5a36350',1);
#==========================================================   


#==========================================================   
#===========INSERTANDO DATOS EN LA TABLA CLIENTE===========
#========================================================== 
INSERT INTO tb_cliente(id_tipoDocumento,id_ciudad,nombreCompleto,numeroDocumento,telefono,celular,fax,correoElectronico,direccion,estado)
VALUES (1,4,'Pedro Andres Ocampo','123456789','1234567','1234567891','1122334455','pedroAndres@hotmail.com','Calle 20A',1);

INSERT INTO tb_cliente(id_tipoDocumento,id_ciudad,nombreCompleto,numeroDocumento,telefono,celular,fax,correoElectronico,direccion,estado)
VALUES (1,8,'Norma Patricia Trujillo','987654321','7456321','1234567891','2233445588','patriciaTrujillo@hotmail.com','Calle 20B',1);

INSERT INTO tb_cliente(id_tipoDocumento,id_ciudad,nombreCompleto,numeroDocumento,telefono,celular,fax,correoElectronico,direccion,estado)
VALUES (1,12,'Nancy Trujillo Arce','1123456789','1234567','8654321','3344556677','nancyArce@hotmail.com','Calle 20C',1);
#==========================================================  


#==========================================================   
#==========INSERTANDO DATOS EN LA TABLA PRODUCTO===========
#========================================================== 
INSERT INTO tb_producto(codigo,id_unidadMedida,nombre,descripcion,fabricante,stock,impuesto,valor_unitario,estado)
VALUES (112233,3,'Malla Metalica','Malla Para Exteriores','Icomallas',100,0.16,20000,1);

INSERT INTO tb_producto(codigo,id_unidadMedida,nombre,descripcion,fabricante,stock,impuesto,valor_unitario,estado)
VALUES (223344,3,'Malla Plastica','Malla Para Exteriores','Icomallas',100,0.16,10000,1);

INSERT INTO tb_producto(codigo,id_unidadMedida,nombre,descripcion,fabricante,stock,impuesto,valor_unitario,estado)
VALUES (334455,3,'Angeo','Angeo Para Exteriores','Icomallas',100,0.16,5000,1);
#==========================================================