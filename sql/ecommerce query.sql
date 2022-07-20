CREATE DATABASE nzxt_db;

USE nzxt_db;
CREATE TABLE IF NOT EXISTS type(
	id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS category(
	id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    type_id INT,
    PRIMARY KEY (id),
    CONSTRAINT fk_type_id FOREIGN KEY (type_id)
    REFERENCES type(id)
);

CREATE TABLE IF NOT EXISTS product(
	id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    category_id INT,
    PRIMARY KEY (id),
    CONSTRAINT fk_category_id FOREIGN KEY (category_id)
    REFERENCES category(id)
);

CREATE TABLE IF NOT EXISTS color(
	id INT AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    hex VARCHAR(200) NOT NULL,
    PRIMARY KEY (id)

);

CREATE TABLE IF NOT EXISTS product_variant(
	id INT AUTO_INCREMENT,
    product_id INT,
    color_id INT,
    stock INT DEFAULT 0,
    PRIMARY KEY (id),
    CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES product(id),
    CONSTRAINT fk_color_id FOREIGN KEY (color_id) REFERENCES color(id)
);

CREATE TABLE IF NOT EXISTS gallery(
	id INT AUTO_INCREMENT,
    first_img VARCHAR(255),
    second_img VARCHAR(255),
    third_img VARCHAR(255),
    fourth_img VARCHAR(255),
    product_variant_id INT,
    PRIMARY KEY (id),
    CONSTRAINT fk_product_variant_id FOREIGN KEY(product_variant_id)
    REFERENCES product_variant(id)
);





INSERT INTO 
	type(name)
VALUES
	('PC');


INSERT INTO 
	category(name, description, type_id)
VALUES
	('Starter','The Starter PC Series is built by experts to give gamers a competitive advantage.', 1),
	('Streaming','The Streaming PC Series is designed to run the most popular games beautifully while smoothly operating a stream.', 1),
	('Foundation','Meet the Foundation PC', 1),
	('Creator','The Creator PC Series equips you with everything you need to power projects and save time.', 1),
	('H1 Mini','The H1 Mini PC series is packed with impressively powerful components and designed to be the ultimate small-footprint companion. This product comes built in the NZXT H1 case.', 1);

INSERT INTO 
	color(name, hex)
VALUES
	('white', '#F2F3F4'),
	('black', '#333333');
	
    
INSERT INTO 
	product(name, price, description, category_id)
VALUES
	('Starter PC', 55899.00, 'Prebuilt Mid-Tower PC', 1),
	('Starter PC Plus', 60999.00, 'Prebuilt Mid-Tower PC', 1),
	('Starter PC Pro', 65799.00, 'Prebuilt Mid-Tower PC', 1),
	('Streaming PC', 70999.00, 'Prebuilt Streaming PC', 2),
	('Streaming PC Plus', 75000.00, 'Prebuilt Streaming PC', 2),
	('Streaming PC Pro', 80399.00, 'Prebuilt Streaming PC', 2),
	('Foundation PC', 49999.00, 'Prebuilt Mid-Tower PC', 3),
    ('Creator PC', 94999.00, 'Prebuilt Creator PC', 4),
	('Creator PC Plus', 110599.00, 'Prebuilt Creator PC', 4),
	('Creator PC Pro', 129999.00, 'Prebuilt Creator PC', 4),
    ('H1 Mini PC', 130799.00, '15.6-liter Mini-ITX PC', 5),
	('H1 Mini PC Plus', 165000.00, '15.6-liter Mini-ITX PC', 5),
	('H1 Mini PC Pro', 199999.00, '15.6-liter Mini-ITX PC', 5);
    
    
    
INSERT INTO 
	product_variant(product_id, color_id, stock)
VALUES
	(1, 1, 12),
	(1, 2, 13),
	(2, 1, 12),
	(2, 2, 12),
	(3, 1, 12),
	(3, 2, 12),
	(4, 1, 12),
	(4, 2, 12),
	(5, 1, 12),
	(5, 2, 12),
	(6, 1, 12),
	(6, 2, 12),
	(7, 1, 12),
	(7, 2, 12),
	(8, 1, 12),
	(8, 2, 12),
	(9, 1, 12),
	(9, 2, 12),
	(10, 1, 12),
	(10, 2, 12),
	(11, 1, 12),
	(11, 2, 12),
	(12, 1, 12),
	(12, 2, 12),
	(13, 1, 12),
	(13, 2, 12);
    


INSERT INTO
	gallery(first_img, second_img, third_img, fourth_img, product_variant_id)
VALUES
	('/media/products/starter-pc/white/1.svg', '/media/products/starter-pc/white/2.svg', '/media/products/starter-pc/white/3.svg', '/media/products/starter-pc/white/4.svg', 1),
    ('/media/products/starter-pc/black/1.svg', '/media/products/starter-pc/black/2.svg', '/media/products/starter-pc/black/3.svg', '/media/products/starter-pc/black/4.svg', 2),
	('/media/products/starter-pc-plus/white/1.svg', '/media/products/starter-pc-plus/white/2.svg', '/media/products/starter-pc-plus/white/3.svg', '/media/products/starter-pc-plus/white/4.svg', 3),
	('/media/products/starter-pc-plus/black/1.svg', '/media/products/starter-pc-plus/black/2.svg', '/media/products/starter-pc-plus/black/3.svg', '/media/products/starter-pc-plus/black/4.svg', 4),
	('/media/products/starter-pc-pro/white/1.svg', '/media/products/starter-pc-pro/white/2.svg', '/media/products/starter-pc-pro/white/3.svg', '/media/products/starter-pc-pro/white/4.svg', 5),
	('/media/products/starter-pc-pro/black/1.svg', '/media/products/starter-pc-pro/black/2.svg', '/media/products/starter-pc-pro/black/3.svg', '/media/products/starter-pc-pro/black/4.svg', 6),
	('/media/products/streaming-pc/white/1.svg', '/media/products/streaming-pc/white/2.svg', '/media/products/streaming-pc/white/3.svg', '/media/products/streaming-pc/white/4.svg', 7),
	('/media/products/streaming-pc/black/1.svg', '/media/products/streaming-pc/black/2.svg', '/media/products/streaming-pc/black/3.svg', '/media/products/streaming-pc/black/4.svg', 8),
	('/media/products/streaming-pc-plus/white/1.svg', '/media/products/streaming-pc-plus/white/2.svg', '/media/products/streaming-pc-plus/white/3.svg', '/media/products/streaming-pc-plus/white/4.svg', 9),
	('/media/products/streaming-pc-plus/black/1.svg', '/media/products/streaming-pc-plus/black/2.svg', '/media/products/streaming-pc-plus/black/3.svg', '/media/products/streaming-pc-plus/black/4.svg', 10),
	('/media/products/streaming-pc-pro/white/1.svg', '/media/products/streaming-pc-pro/white/2.svg', '/media/products/streaming-pc-pro/white/3.svg', '/media/products/streaming-pc-pro/white/4.svg', 11),
	('/media/products/streaming-pc-pro/black/1.svg', '/media/products/streaming-pc-pro/black/2.svg', '/media/products/streaming-pc-pro/black/3.svg', '/media/products/streaming-pc-pro/black/4.svg', 12),
	('/media/products/foundation-pc/white/1.svg', '/media/products/foundation-pc/white/2.svg', '/media/products/foundation-pc/white/3.svg', '/media/products/foundation-pc/white/4.svg', 13),
	('/media/products/foundation-pc/black/1.svg', '/media/products/foundation-pc/black/2.svg', '/media/products/foundation-pc/black/3.svg', '/media/products/foundation-pc/black/4.svg', 14),
	('/media/products/creator-pc/white/1.svg', '/media/products/creator-pc/white/2.svg', '/media/products/creator-pc/white/3.svg', '/media/products/creator-pc/white/4.svg', 15),
	('/media/products/creator-pc/black/1.svg', '/media/products/creator-pc/black/2.svg', '/media/products/creator-pc/black/3.svg', '/media/products/creator-pc/black/4.svg', 16),
	('/media/products/creator-pc-plus/white/1.svg', '/media/products/creator-pc-plus/white/2.svg', '/media/products/creator-pc-plus/white/3.svg', '/media/products/creator-pc-plus/white/4.svg', 17),
	('/media/products/creator-pc-plus/black/1.svg', '/media/products/creator-pc-plus/black/2.svg', '/media/products/creator-pc-plus/black/3.svg', '/media/products/creator-pc-plus/black/4.svg', 18),
	('/media/products/creator-pc-pro/white/1.svg', '/media/products/creator-pc-pro/white/2.svg', '/media/products/creator-pc-pro/white/3.svg', '/media/products/creator-pc-pro/white/4.svg', 19),
	('/media/products/creator-pc-pro/black/1.svg', '/media/products/creator-pc-pro/black/2.svg', '/media/products/creator-pc-pro/black/3.svg', '/media/products/creator-pc-pro/black/4.svg', 20),
	('/media/products/h1-mini-pc/white/1.svg', '/media/products/h1-mini-pc/white/2.svg', '/media/products/h1-mini-pc/white/3.svg', '/media/products/h1-mini-pc/white/4.svg', 21),
	('/media/products/h1-mini-pc/black/1.svg', '/media/products/h1-mini-pc/black/2.svg', '/media/products/h1-mini-pc/black/3.svg', '/media/products/h1-mini-pc/black/4.svg', 22),
	('/media/products/h1-mini-pc-plus/white/1.svg', '/media/products/h1-mini-pc-plus/white/2.svg', '/media/products/h1-mini-pc-plus/white/3.svg', '/media/products/h1-mini-pc-plus/white/4.svg', 23),
	('/media/products/h1-mini-pc-plus/black/1.svg', '/media/products/h1-mini-pc-plus/black/2.svg', '/media/products/h1-mini-pc-plus/black/3.svg', '/media/products/h1-mini-pc-plus/black/4.svg', 24),
	('/media/products/h1-mini-pc-pro/white/1.svg', '/media/products/h1-mini-pc-pro/white/2.svg', '/media/products/h1-mini-pc-pro/white/3.svg', '/media/products/h1-mini-pc-pro/white/4.svg', 25),
	('/media/products/h1-mini-pc-pro/black/1.svg', '/media/products/h1-mini-pc-pro/black/2.svg', '/media/products/h1-mini-pc-pro/black/3.svg', '/media/products/h1-mini-pc-pro/black/4.svg', 26);




    
    


