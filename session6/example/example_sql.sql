câu 1: Lấy ra danh sách sản phẩm thuộc danh mục "Guitars" có gía lớn hơn 500
SELECT * FROM products
INNER JOIN categories
ON categories.categoryID = products.categoryID 
WHERE listPrice > 500 and categories.categoryName = "Guitars"

câu 2: Lấy ra danh sách sản phẩm được thêm vào tháng 7/2014, có giá lớn hơn 300, và sắp xếp giảm dần theo giá
SELECT * FROM products
WHERE dateAdded LIKE '2014-07-__%' and listPrice > 300 ORDER BY listPrice DESC

câu 3:Lấy ra danh sách sản phẩm mà tên có chứa chữ "o", thuộc danh mục "Basses", sắp xếp giảm dần theo tên
SELECT * FROM products
INNER JOIN categories
ON products.categoryID = categories.categoryID  
WHERE products.productName LIKE '%o%' and categories.categoryName = "Basses"
ORDER BY products.productName DESC

câu 4: Lấy ra danh sách sản phẩm mà khách hàng sử dụng gmail để mua
SELECT * FROM customers 
INNER JOIN orders ON customers.customerID = orders.orderID 
INNER JOIN orderitems ON orders.orderID = orderitems.itemID  
INNER JOIN products ON orderitems.itemID = products.productID
WHERE customers.emailAddress LIKE '%gmail%'

câu 5: Lấy ra danh sách sản phẩm có giá lơn hơn 300, đăng năm 2014, giới hạn lấy 4 sản phẩm và sắp xếp theo giảm giá giảm dần
SELECT * FROM products
WHERE listPrice > 300 AND dateAdded LIKE '2014' 
ORDER BY listPrice DESC 
LIMIT 4

câu 6: Lấy ra tên thành phố mà khách hàng đã mua sản phẩm "Yamaha FG700S"
SELECT city FROM products
INNER JOIN orderitems ON products.productID = orderitems.productID
INNER JOIN orders ON orderitems.orderID = orders.orderID
INNER JOIN customers ON orders.customerID = customers.customerID
INNER JOIN addresses ON customers.customerID = addresses.customerID
WHERE products.productName LIKE 'Yamaha FG700S'