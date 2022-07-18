CREATE DATABASE IF NOT EXISTS nzxt_ecommerce_db;

USE nzxt_ecommerce_db;


CREATE TABLE IF NOT EXISTS category(
    category_id INT AUTO_INCREMENT,
    category_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (category_id)
);


CREATE TABLE IF NOT EXISTS series(
    series_id INT AUTO_INCREMENT,
    series_name VARCHAR(255) NOT NULL,
    series_description TEXT DEFAULT "",
    series_category_id INT NOT NULL,
    PRIMARY KEY(series_id),
    CONSTRAINT fk_series_category_id FOREIGN KEY (series_category_id)
    REFERENCES category(category_id)

);



CREATE TABLE IF NOT EXISTS colorway(
    colorway_name VARCHAR(100) NOT NULL,
    colorway_hex VARCHAR(20) NOT NULL,
    PRIMARY KEY (colorway_name)
);


-- CREATE TABLE IF NOT EXISTS product_attribute(
--     product_name VARCHAR(255) NOT NULL,
--     colorway_name VARCHAR(100),
--     product_price DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
--     product_stock INT DEFAULT 0,
--     PRIMARY KEY (product_id, colorway_name),
--     CONSTRAINT fk_product_name FOREIGN KEY (product_name)
--     REFERENCES product(product_name),
--     CONSTRAINT fk_colorway_name FOREIGN KEY (colorway_name)
--     REFERENCES colorway(colorway_name)
-- );




CREATE TABLE IF NOT EXISTS product(
    product_id INT AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_series_id INT(11) NULL,
    product_price DECIMAL(10,2) DEFAULT 0.00 NOT NULL,
    product_stock INT DEFAULT 0,
    colorway_name VARCHAR(100),
    PRIMARY KEY(product_id),
    CONSTRAINT fk_product_series_id FOREIGN KEY (product_series_id)
    REFERENCES series(series_id),
    CONSTRAINT fk_colorway_name FOREIGN KEY (colorway_name)
    REFERENCES colorway(colorway_name)
);





CREATE TABLE IF NOT EXISTS image(
    image_id VARCHAR(100) NOT NULL,
    image_name VARCHAR(255) NOT NULL,
    image_type VARCHAR(100) NULL,
    image_size FLOAT NOT NULL,
    image_path VARCHAR(512) NOT NULL,
    image_product_id INT,
    PRIMARY KEY (image_id),
    CONSTRAINT fk_image_product_id FOREIGN KEY (image_product_id)
    REFERENCES product(product_id)
);

