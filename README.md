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
('GIGABYTE 32" 144Hz Curved Gaming Monitör',
'DÜNYANIN İLK 31.5" UHD 144HZ KAVİSLİ OYUN MONİTÖRÜ
Yüksek kavis ve hızlı yenileme hızı ile GIGABYTE oyun monitörleri, nihai derinlemesine sürükleyici oyun deneyimi için yepyeni bir deneyim getiriyor. Kullanıcılar, savurganlığa ihtiyaç duymadan gerçekten üst düzey performansın keyfini çıkarabilir.
SuperSpeed ​​VA teknolojisi, şimdiye kadarki en akıcı oyun deneyimi için yanıt süresini 1ms MPRT/2ms GTG-ye düşürür!
Size ayrıntılı görüntü kalitesi ve akıcı oyun deneyimi sunan yüksek çözünürlük ve hızlı yenileme hızı!
Fantastik renkli ekran ve %93 DCI-P3 süper geniş renk gamı.
En yeni HDMI 2.1, yeni nesil konsolları destekleyen 4K@144Hz-lik daha yüksek bir bant genişliği sağlayarak oyun deneyiminizi geliştirebilir ve maceradan nişancılık oyunlarına kadar çeşitli oyunlarda rekabet avantajı sunar.
KVM özelliği, tek bir klavye, video ve fare seti aracılığıyla birden fazla cihazı kontrol etmenizi sağlar. Özel KVM düğmemizle, anahtarlama cihazlarının daha kolay olamayacağını göreceksiniz! Bir çırpıda gibi hızlı!',
27100,
'./upload/pro1.jpg',
'GIGABYTE'),

('ASUS 32" ROG Swift 160Hz FastIPS Gaming Monitör',
'Profesyonel oyuncular için tasarlanan 160Hz yenileme hızına sahip 32 inç 4K (3840 x 2160) mini LED oyuncu monitörü
ASUS Fast IPS teknolojisi, yüksek kare oranlarıyla akıcı oyun görüntülerini 1ms tepki süresi (griden griye) ile sunar
576 bağımsız LED bölgesinden oluşan Tam Yerel Işık Kısma (FALD) arka aydınlatma sistemi ve 1000 nit parlaklıkla DisplayHDR 1000 sertifikası
HDMI® 2.1, Playstation® 5 ve Xbox Series X konsollarda kroma alt örnekleme (4:4:4) olmadan gerçek 4K 120Hz oyun deneyimi sunar
HDMI® 2.1, USB merkezi, monitörün üst kısmında bulunan bir adet tripod soketi ve Display Stream Compression (DSC) teknolojisiyle DisplayPort™ 2.1’in de dahil olduğu kapsamlı bağlantı seçenekleri
DCI-P3 %96 geniş renk gamıyla Quantum-dot ekran, gerçekçi renkler ve daha pürüzsüz renk geçişleri sağlar
AMD FreeSync Premium Pro akıcı, düşük gecikmeli ve yırtılmayan görüntüler sunar',
80867,
'./upload/pro2.jpg',
'ASUS'),

('ASUS TUF GAMING 27" Premium Gaming Monitör',
'TUF Gaming VG279Q1A, ultra yüksek 165Hz yenileme hızına sahip 27 inç boyutunda bir Full HD (1920 x 1080) IPS ekran. Oyuncular ve etkileyici oyun deneyimi arayan herkes için tasarlanan bu monitör iddialı özelliklerle donatıldı. Elbette hepsi bunlarla sınırlı değil... Özel ELMB teknolojisi; 1 ms MPRT tepki süresi ve Adaptive-Sync (FreeSync™ Premium) teknolojisiyle hiçbir yırtılma veya takılma olmadan inanılmaz akıcı bir oyun deneyimi sunuyor.',
8595,
'./upload/pro3.jpg',
'ASUS'),
('ViewSonic 24" FastIPS FHD Gaming Monitör',
'Ne sıklıkta veya ne zaman oynarsanız oynayın, Omni VX2428 ile her zaman kazanırsınız. AMD FreeSync™ Premium, VESA Adaptive Sync ve VESA clearMR-den oluşan üçlü sertifikasıyla, bozulma olmadan oyun oynamanın ve gelişmiş netliğin keyfini çıkarmanızı sağlar. Keskin çerçeveler ve olağanüstü renk performansı, hızlı bir IPS paneli tarafından sağlanırken, VX2428-in yüksek 180Hz yenileme hızı, pürüzsüz görselleri ve minimum giriş gecikmesini destekler. Bu kadar iyi olmayacağını düşünebilirsiniz, ama öyle. Sadece işi yapmakla kalmayacak - yorucu oyun oturumları, video ve fotoğraf düzenleme veya ofis işleriniz olsun - şık, güzel tasarlanmış bir monitör üzerinde çalışacaksınız.',
5116,
'./upload/pro4.jpg',
'ViewSonic')

```        


('NAME',
'DESCRIPTION',
100.00,
'./upload/product1.jpg',
'SELLER'),