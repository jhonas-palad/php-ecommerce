use nzxt_db;

select 
	* 
from product_variant;


-- home page query
SELECT 
	product_variant.id, product.name,product.price, color.name, hex, stock, description, first_img, second_img, third_img, fourth_img
FROM 
	product_variant
INNER JOIN
	product ON product_variant.product_id = product.id
INNER JOIN
	color ON product_variant.color_id = color.id
INNER JOIN
	gallery ON product_variant.id = gallery.product_variant_id
ORDER BY
	product_variant.id
LIMIT 12;
    