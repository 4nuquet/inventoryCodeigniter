

CREATE tbl_user(
    user_id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(30) NOT NULL,
    user_nid VARCHAR(30) NOT NULL,
    user_rol INT NOT NULL,
    user_state BOOLEAN NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE tbl_category(
    cat_id INT NOT AUTO_INCREMENT,
    cat_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (cat_id)
);

CREATE tbl_item(
    item_id INT NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(30) NOT NULL,
    item_stock INT NOT NULL,
    item_category INT,
    item_pBuy DOUBLE NOT NULL,
    item_pSell DOUBLE NOT NULL,
    PRIMARY KEY (item_id),
    FOREIGN KEY (item_category) REFERENCES tbl_category(cat_id) 
);

CREATE TABLE tbl_sales(
    sales_id INT NOT AUTO_INCREMENT


);

