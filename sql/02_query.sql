USE nzxt_ecommerce_db;

INSERT INTO 
    category (category_name)
VALUES
    ('pc'),
    ('keyboard'),
    ('cases');


INSERT INTO 
    series (
        series_name, 
        series_description,
        series_category_id
        )
VALUES
    (
    'Starter PC Series',
    'The Starter PC Series is built by experts to give gamers a competitive advantage.', 
    1
    ),
    (
    'Streaming PC Series', 
    'The Streaming PC Series is designed to run the most popular games beautifully while smoothly operating a stream.', 
    1
    ),
    
    (
    'Foundation PC Series', 
    "The NZXT Foundation PC can handle most of today's popular titles so there's no fear of missing out.", 
    1
    ),

    (
    'Creator PC Series', 
    "The Creator PC Series equips you with everything you need to power projects and save time.", 
    1
    ),
    ('Function', 'The NZXT Function Keyboard is aesthetically sleek, hot-swappable, and available in three versatile sizes to suit any space and use-case.', 2),
	('H7', 'H7 cases are flexible, easy to build in, and spacious with plenty of room for a wide range of components.', 3),
	('H210 Series', 'The H210 is a small chassis with a spacious interior supporting radiators up to 240mm.', 3);

INSERT INTO
    colorway(colorway_name, colorway_hex)
VALUES
    ('purple', '#7322c1'),
    ('white', '#F2F3F4'),
    ('black', '#333333');
 

-- INSERT INTO 
--     product (product_name, product_series_id)
-- VALUES
--     ('Starter PC', 1),
--     ('Starter PC Plus', 1),
--     ('Starter PC Pro', 1),
--     ('Streaming PC', 2),
--     ('Streaming PC Plus', 2),
--     ('Streaming PC Pro', 2),
--     ('Foundation PC', 3),
--     ('Creator PC', 4),
--     ('Creator PC Plus', 4),
--     ('Creator PC Pro', 4);

    


-- INSERT INTO 
--     product_attribute(product_id, colorway_name, product_price, product_stock)
-- VALUES
--     (1, 'white', 56173.77, 10),
--     (1, 'black', 56173.77, 13),
--     (2, 'white', 61853.00, 14),
--     (2, 'black', 61853.00, 9),
--     (3, 'white', 73042.77, 11),
--     (3, 'black', 73042.77, 5),
--     (4, 'white', 78665.77, 10),
--     (4, 'black', 78665.77, 4),
--     (5, 'white', 84288.77, 5),
--     (5, 'black', 84288.77, 7),
--     (6, 'white', 89911.77, 8),
--     (6, 'black', 89911.77, 3),
--     (7, 'white', 50550.77, 9),
--     (7, 'black', 50550.77, 7),
--     (8, 'white', 101157.77, 8),
--     (8, 'black', 101157.77, 9),
--     (9, 'white', 146141.77, 5),
--     (9, 'black', 146141.77, 5),
--     (10, 'white', 224863.77, 6),
--     (10, 'black', 224863.77, 4);





 