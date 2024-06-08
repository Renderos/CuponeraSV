CREATE TABLE IF NOT EXISTS carrito (
    ID_carrito INT NOT NULL AUTO_INCREMENT,
    ID_usuario INT NOT NULL,
    ID_cupon INT NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY (ID_carrito),
    FOREIGN KEY (ID_usuario) REFERENCES usuarios(ID_usuario),
    FOREIGN KEY (ID_cupon) REFERENCES cupones(ID_cupon)
)  ENGINE=INNODB;