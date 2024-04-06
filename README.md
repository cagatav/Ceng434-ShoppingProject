# CENG434 Project 

# 190444038 - Enes Çağatay SÖZEN
>>>>>>> 17d2102531cf75e0bb6d3cb133802d83c30b274a

This project was created using HTML, CSS, PHP, and MySQL. 

To run it, follow these steps:

1. You need to install XAMPP on your computer and activate the Apache and MySQL servers from the XAMPP program.

2. Install the project in the "C:\xampp\htdocs" directory.

3. To view the project, open your web browser and go to "http://localhost/Ceng434-ShoppingProject/ShoppingProject/mainmenu.php".

4. To update the data in the project, you can go to "http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=productdb&table=producttable".

```sql
INSERT INTO producttable (product_name, product_description, product_price, product_image, product_seller)
VALUES ('Apple MacBook Pro','Description1',1799,'./upload/product1.png', 'unknown'),
       ('Sony E7 Headphones','Description2',147,'./upload/product2.png', 'unknown'),
       ('Sony Xperia Z4','Description3',459,'./upload/product3.png', 'unknown'),
       ('Samsung Galaxy A50','Description4',278,'./upload/product4.png', 'unknown')
```

