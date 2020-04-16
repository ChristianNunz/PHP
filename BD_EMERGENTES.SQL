CREATE DATABASE crud;
Create user crud WITH password 'crud';
grant all Privileges on  Database crud to crud;

Create table PERSONA(
id_persona serial PRIMARY KEY,
nombre_persona VARCHAR(50) NOT NULL,
apellido_persona VARCHAR(50) NOT NULL,
direccion_persona VARCHAR(50) NOT NULL,
edad_persona VARCHAR(3) NOT NULL,
estado_civil VARCHAR(50) NOT NULL
);

Create table VENDEDOR(
	id_vendedor serial PRIMARY key,
	nombre_vendedor VARCHAR(50) NOT NULL,
	apellido_vendedor VARCHAR(50) NOT NULL,
	telefono_vendedor VARCHAR(9) NOT NULL,
	usuario VARCHAR(25) NOT NULL,
	contrasena VARCHAR(250) NOT NULL
);

CREATE TABLE PRODUCTO(
	id_producto serial primary key,
	nombre_producto varchar(50) not null,
	precio_producto DECIMAL(10,2) not null,
	cantidad_producto integer not null,
	descripcion_producto VARCHAR(300)
);

CREATE TABLE CLIENTE(
	id_cliente serial primary key, 
	nombre_cliente VARCHAR(50) not null,
	apellidos_cliente VARCHAR(50) not null,
	telefono_cliente varchar(9) not null
);

CREATE TABLE FACTURA(
	id_factura serial PRIMARY key,
	fecha date not null,
	cantidad_vendida DECIMAL(10,2) NOT NULL,
	total_venta int NOT NULL,
	id_cliente serial,
	id_producto serial,
	id_vendedor serial
);

ALTER TABLE FACTURA
	ADD CONSTRAINT FK_cliente FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id_cliente) on delete cascade,
	ADD CONSTRAINT FK_producto FOREIGN KEY (id_producto) REFERENCES PRODUCTO(id_producto) on delete cascade,
	ADD CONSTRAINT FK_vendedor FOREIGN KEY (id_vendedor) REFERENCES VENDEDOR(id_vendedor) on delete cascade

ALTER SEQUENCE campo_id_seq RESTART WITH 1;
