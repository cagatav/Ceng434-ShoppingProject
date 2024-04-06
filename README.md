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
VALUES 
        ('Dell - Inspiron 16.0" 2-in-1 Touch Laptop -13th Gen Intel Evo i7 - 16GB Memory - 1TB SSD - Platinum Silver
        ','Embark on your adventure with the Inspiron 16 2-in-1 Laptop’s elevated audio in any mode, a larger-than-life screen and an upscale design. ',799.99,'./upload/product1.jpg', 'Dell'),
       ('HP - 15.6" Touch-Screen Laptop - Intel Core i3 - 8GB Memory - 256GB SSD - Natural Silver','Do more from anywhere. All-day long. Designed to keep you productive and entertained from anywhere, the HP 15.6-inch Laptop PC combines long lasting battery life with a thin and portable, microedge bezel design. ',329.99,'./upload/product2.jpg', 'HP'),
       ('MacBook Air 13.6" Laptop - Apple M2 chip - 8GB Memory - 256GB SSD - Midnight','Supercharged by the next-generation M2 chip, the redesigned MacBook Air combines incredible performance and up to 18 hours of battery life into its strikingly thin aluminum enclosure.',999.00,'./upload/product4.jpg', 'Apple'),
       ('MacBook Air 13.3" Laptop - Apple M1 chip - 8GB Memory - 256GB SSD - Gold - Gold','Apple’s thinnest and lightest notebook gets supercharged with the Apple M1 chip. Tackle your projects with the blazing-fast 8-core CPU. Take graphics-intensive apps and games to the next level with the 7-core GPU. And accelerate machine learning tasks with the 16-core Neural Engine. All with a silent, fanless design and the longest battery life ever — up to 18 hours.¹ MacBook Air. Still perfectly portable. Just a lot more powerful. ',699.99,'./upload/product5.jpg', 'Apple'),
       ('Apple - iPhone 14 Pro Max 128GB - Gold (Verizon)','iPhone 14 Pro Max. Capture incredible detail with a 48MP Main camera. Experience iPhone in a whole new way with Dynamic Island and Always-On display. And get peace of mind with groundbreaking safety features.',999.99,'./upload/product6.jpg', 'Apple'),
       ('Samsung - Galaxy S24 Ultra 512GB - Titanium Black','The new era of mobile AI is here. Do more with an epic Galaxy. Wondering where the cool museum that your favorite influencer visited is located? Simply Circle to Search with Google and start planning your own trip to the Louvre. Then get ready to experience local flavors by calling ahead with Live Translate to make a reservation in French, even if all you know is “Bonjour.” Capture every detail of your candlelight meal with impressive Nightography and zoom in to see the live violinist playing across the room. Once you’re back in your hotel, elevate your pics from good to great right on your Galaxy S24 Ultra. You can even use your built in S Pen to add fun doodles before posting. Unleash new ways to create, connect and more with Galaxy S24 Ultra. Galaxy AI is here.',1319.99,'./upload/product7.jpg', 'Samsung'),
       ("Samsung - Galaxy Z Flip5 256GB - Graphite","Meet the phone that’s tiny, trendy and totally flex worthy. With a full cover screen, you can reply to texts, preview photos and access even more widgets than before with your Galaxy Z Flip5 folded shut. And with Flex Mode, you can capture hands free selfies and videos from any angle. A compact, durable design makes this pocket sized phone perfect for life on the go. Plus, personalize your phone from the outside in with a customizable cover screen and four stylish covers to show off your style. Flex a phone as bold as you are with Galaxy Z Flip5.",899.99,'./upload/product8.jpg', 'Samsung'),
       ("Google - Pixel 7 Pro 512GB - Snow","Introducing Pixel 7 Pro, Google’s best-of-everything phone. Powered by Google Tensor G2, it’s fast and secure, with an immersive display and amazing battery life. The best Pixel camera yet includes a telephoto lens and pro-level features like Macro Focus. And with the certified Titan M2 security chip and a built-in VPN, Pixel helps protect your personal data.",1099.00,'./upload/product3.jpg', 'Google')
```