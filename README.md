# CENG434 Project 

# 190444082 - Ahmet Enes KÜÇÜKMADAN

# 190444038 - Enes Çağatay SÖZEN

This project was created using HTML, CSS, PHP, and MySQL. 

To run it, follow these steps:

1. You need to install XAMPP on your computer and activate the Apache and MySQL servers from the XAMPP program.

2. Install the project in the "C:\xampp\htdocs" directory.

3. To view the project, open your web browser and go to "http://localhost/Ceng434-ShoppingProject/ShoppingProject/mainmenu.php".

4. To update the data in the project, you can go to "http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=productdb&table=producttable".

```sql
INSERT INTO producttable (product_name, product_description, product_price, product_image, product_seller)
VALUES ('Dell - Inspiron 16.0" 2-in-1 Touch Laptop -13th Gen Intel Evo i7 - 16GB Memory - 1TB SSD - Platinum Silver
','Embark on your adventure with the Inspiron 16 2-in-1 Laptop’s elevated audio in any mode, a larger-than-life screen and an upscale design. ',799.99,'./upload/product1.jpg', 'Dell'),
       ('HP - 15.6" Touch-Screen Laptop - Intel Core i3 - 8GB Memory - 256GB SSD - Natural Silver','Do more from anywhere. All-day long. Designed to keep you productive and entertained from anywhere, the HP 15.6-inch Laptop PC combines long lasting battery life with a thin and portable, microedge bezel design. ',329.99,'./upload/product2.jpg', 'HP'),
       ('HP - Envy 2-in-1 16" Wide Ultra XGA Touch-Screen Laptop - Intel Core Ultra 7 - 16GB Memory - 1TB SSD - Glacier Silver','Power your every passion. The HP ENVY Laptop is designed to help you power your passions with built-in AI technology that delivers hard-hitting processing power to help you do more faster. This innovative tech comes in a thin and light, versatile 2-in-1 design so you can use it as a tablet or a laptop letting you work however you want, wherever you want. ',799.99,'./upload/product3.jpg', 'HP'),
       ('MacBook Air 13.6" Laptop - Apple M2 chip - 8GB Memory - 256GB SSD - Midnight','Supercharged by the next-generation M2 chip, the redesigned MacBook Air combines incredible performance and up to 18 hours of battery life into its strikingly thin aluminum enclosure.',999.00,'./upload/product4.jpg', 'Apple')
```