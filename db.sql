

CREATE TABLE tbl_user(
    user_id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(30) NOT NULL,
    user_nid VARCHAR(30) NOT NULL,
    user_rol INT NOT NULL,
    user_state BOOLEAN NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE tbl_category(
    cat_id INT NOT NULL AUTO_INCREMENT,
    cat_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (cat_id)
);

CREATE TABLE tbl_item(
    item_id INT NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(30) NOT NULL,
    item_stock INT NOT NULL,
    item_category INT,
    item_pBuy DOUBLE NOT NULL,
    item_pSell DOUBLE NOT NULL,
    PRIMARY KEY (item_id),
    FOREIGN KEY (item_category) REFERENCES tbl_category(cat_id) 
);

CREATE TABLE tbl_discount(
    dis_id INT NOT NULL AUTO_INCREMENT,
    dis_type INT NOT NULL,
    dis_value DOUBLE NOT NULL,
    dis_dateStart DATE NOT NULL,
    dis_dateEnd DATA NOT NULL,
    dis_state BOOLEAN NOT NULL,
    PRIMARY KEY (dis_id)
);

CREATE TABLE tbl_salesDetailt(
    sde_id INT NOT NULL AUTO_INCREMENT,
    sde_item INT,
    sde_mount DOUBLE NOT NULL,
    sde_price DOUBLE NOT NULL,
    sde_total DOUBLE NOT NULL,
    PRIMARY KEY (sde_id),
    FOREIGN KEY (sde_item) REFERENCES tbl_item(item_id)

);


CREATE TABLE tbl_sales(
    sal_id INT NOT NULL AUTO_INCREMENT,
    sal_serial INT NOT NULL,
    sal_date DATE NOT NULL,
    sal_detail INT,
    sal_discount INT,
    PRIMARY KEY (sal_id),
    FOREIGN KEY (sal_detail) REFERENCES tbl_salesDetail(sde_id),
    FOREIGN KEY (sal_discount) REFERENCES tbl_discount(dis_id)

);