DROP SCHEMA IF EXISTS `CuponeraBD` ;
-- ---------------------------------------------------------------------------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `CuponeraBD` DEFAULT CHARACTER SET utf8 ;
-- ---------------------------------------------------------------------------------------------------------------------
USE `CuponeraBD` ;
-- ---------------------------------------------------------------------------------------------------------------------
CREATE TABLE Estado_aprobacion (
    ID_estado_aprobacion INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Estado_aprobacion VARCHAR(25) NOT NULL
    );


INSERT INTO
    Estado_aprobacion (Estado_aprobacion)
VALUES
    ('Pendiente'),
    ('Aprobado'),
    ('Desaprobado');

CREATE TABLE Categorias (
    ID_categoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Categoria VARCHAR(25) NOT NULL
    );


INSERT INTO
    Categorias (Categoria)
VALUES
    ('Comida'),
    ('Alojamiento'),
    ('Servicios'),
    ('Otros');

CREATE TABLE Roles (
    ID_rol INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Rol VARCHAR(25) NOT NULL
    );

INSERT INTO
    Roles (Rol)
VALUES
    ('Usuario'),
    ('Administrador');

CREATE TABLE Estado_cupon (
    ID_estado INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Estado VARCHAR(15) NOT NULL
    );

INSERT INTO
    Estado_cupon (Estado)
VALUES
    ('Disponible'),
    ('No disponible');



CREATE TABLE Usuarios (
    ID_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nombres VARCHAR(25) NOT NULL,
    Apellidos VARCHAR(25) NOT NULL,
    Email VARCHAR(25) NOT NULL,
    Usuario VARCHAR(25) NOT NULL,
    Contrasena VARCHAR(250) NOT NULL,
    DUI VARCHAR(10) NOT NULL,
    Fecha_nacimiento DATE NOT NULL,
    FK_rol INT NOT NULL
    );


ALTER TABLE
    Usuarios
ADD
    FOREIGN KEY (FK_rol) REFERENCES Roles(ID_rol);

INSERT INTO
    Usuarios (Nombres,Apellidos,Email,Usuario,Contrasena,DUI,Fecha_nacimiento,FK_rol)
VALUES
   ('Admin', 'Admin', 'Admin@admin.com','Admin','$2y$10$kEZEcwiqOunK/.CItPePl.7CKCvog0lW422SHTOVmAWS15HCdM5WO','00000000-0','2001-01-01',2),
   ('Usuario', 'Usuario', 'Usuario@usuario.com','Usuario','$2y$10$lPifSWjXifXarQp71/FNLePyjWGcrrAvrqH3crgmAnTdhrGGP2cJ6','11111111-1','2002-02-02',1);




CREATE TABLE Empresas (
    ID_empresa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    NIT VARCHAR(18) NOT NULL,
    Direccion VARCHAR(50) NOT NULL,
    Telefono INT NOT NULL,
    Email VARCHAR(25) NOT NULL,
    Usuario VARCHAR(25) NOT NULL,
    Contrasena VARCHAR(250) NOT NULL,
    FK_estado_aprobacion INT NOT NULL,
    Comision INT NOT NULL
    );

ALTER TABLE
    Empresas
ADD
    FOREIGN KEY (FK_estado_aprobacion) REFERENCES Estado_aprobacion(ID_estado_aprobacion);


    INSERT INTO
    Empresas (Nombre,NIT,Direccion,Telefono,Email,Usuario,Contrasena,FK_estado_aprobacion,Comision)
VALUES
   ('Apple', '1111-111111-111-1','Cupertino', 22101587,'apple@apple.com','Apple','$2y$10$0gGo/5RZymMBQes25zYuPud37wMLpY4mL/nDbnBfwjuIxr7fciBdW',1,5);
   

CREATE TABLE Cupones (
    ID_cupon INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FK_empresa INT NOT NULL,
    Titulo_cupon VARCHAR(50) NOT NULL,
    Precio_regular DECIMAL(5,2) NOT NULL,
    Precio_oferta DECIMAL(5,2) NOT NULL,
    Fecha_inicio_oferta DATE NOT NULL,
    Fecha_fin_oferta DATE NOT NULL,
    Fecha_limite_canje DATE NOT NULL,
    Cantidad_cupones INT,
    Descripcion VARCHAR(150) NOT NULL,
    Imagen VARCHAR(250) NOT NULL,
    FK_categoria INT NOT NULL,
    FK_estado_oferta INT NOT NULL
    );

ALTER TABLE
    Cupones
ADD
    FOREIGN KEY (FK_empresa) REFERENCES Empresas(ID_empresa);

ALTER TABLE
    Cupones
ADD
    FOREIGN KEY (FK_estado_oferta) REFERENCES Estado_cupon(ID_estado);

ALTER TABLE
    Cupones
ADD
    FOREIGN KEY (FK_categoria) REFERENCES Categorias(ID_categoria);


CREATE TABLE Facturas (
    ID_factura INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FK_usuario INT NOT NULL,
    Fecha_compra DATE NOT NULL,
    Monto DECIMAL(5,2) NOT NULL
    );

ALTER TABLE
    Facturas
ADD
    FOREIGN KEY (FK_usuario) REFERENCES Usuarios(ID_usuario);



CREATE TABLE Codigos_emitidos (
    ID_codigo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FK_factura INT NOT NULL,
    FK_cupon INT NOT NULL,
    Codigo VARCHAR(25) NOT NULL
    );


ALTER TABLE
   Codigos_emitidos
ADD
    FOREIGN KEY (FK_factura) REFERENCES Facturas(ID_factura);
ALTER TABLE
   Codigos_emitidos
ADD
    FOREIGN KEY (FK_cupon) REFERENCES Cupones(ID_cupon);
   