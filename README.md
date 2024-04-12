# CENG434 E-Commerce Project

This project was created using HTML, CSS, PHP, and MySQL.

## Project Contributors
- 190444082 - Ahmet Enes KÜÇÜKMADAN
- 190444038 - Enes Çağatay SÖZEN

## Running the Project

1. You must install XAMPP on your computer and activate the Apache and MySQL servers from the XAMPP program.

2. Install the project in the "C:\xampp\htdocs" directory.

3. To view the project, open your web browser and go to "http://localhost/Ceng434-ShoppingProject/ShoppingProject/Home.php".

## Updating Data

To update the data in the project, you can go to "http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=productdb&table=producttable".

Add the SQL codes at the bottom to the "producttable" table as SQL.

SQL Rule:
```sql
('NAME',
'DESCRIPTION',
1PRICE0.00,
'./upload/IMAGE.jpg',
'SELLER')
``` 
SQL codes:

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
464,
'./upload/pro1.jpg',
'GIGABYTE')

,('ASUS 32" ROG Swift 160Hz FastIPS Gaming Monitör',
'Profesyonel oyuncular için tasarlanan 160Hz yenileme hızına sahip 32 inç 4K (3840 x 2160) mini LED oyuncu monitörü
ASUS Fast IPS teknolojisi, yüksek kare oranlarıyla akıcı oyun görüntülerini 1ms tepki süresi (griden griye) ile sunar
576 bağımsız LED bölgesinden oluşan Tam Yerel Işık Kısma (FALD) arka aydınlatma sistemi ve 1000 nit parlaklıkla DisplayHDR 1000 sertifikası
HDMI® 2.1, Playstation® 5 ve Xbox Series X konsollarda kroma alt örnekleme (4:4:4) olmadan gerçek 4K 120Hz oyun deneyimi sunar
HDMI® 2.1, USB merkezi, monitörün üst kısmında bulunan bir adet tripod soketi ve Display Stream Compression (DSC) teknolojisiyle DisplayPort™ 2.1’in de dahil olduğu kapsamlı bağlantı seçenekleri
DCI-P3 %96 geniş renk gamıyla Quantum-dot ekran, gerçekçi renkler ve daha pürüzsüz renk geçişleri sağlar
AMD FreeSync Premium Pro akıcı, düşük gecikmeli ve yırtılmayan görüntüler sunar',
577.45,
'./upload/pro2.jpg',
'ASUS')

,('ASUS TUF GAMING 27" 165Hz Premium Gaming Monitör',
'TUF Gaming VG279Q1A, ultra yüksek 165Hz yenileme hızına sahip 27 inç boyutunda bir Full HD (1920 x 1080) IPS ekran. Oyuncular ve etkileyici oyun deneyimi arayan herkes için tasarlanan bu monitör iddialı özelliklerle donatıldı. Elbette hepsi bunlarla sınırlı değil... Özel ELMB teknolojisi; 1 ms MPRT tepki süresi ve Adaptive-Sync (FreeSync™ Premium) teknolojisiyle hiçbir yırtılma veya takılma olmadan inanılmaz akıcı bir oyun deneyimi sunuyor.',
159.28,
'./upload/pro3.jpg',
'ASUS')

,('ViewSonic 24" 180Hz FreeSync Fast IPS FHD Gaming Monitör',
'Ne sıklıkta veya ne zaman oynarsanız oynayın, Omni VX2428 ile her zaman kazanırsınız. AMD FreeSync™ Premium, VESA Adaptive Sync ve VESA clearMR-den oluşan üçlü sertifikasıyla, bozulma olmadan oyun oynamanın ve gelişmiş netliğin keyfini çıkarmanızı sağlar. Keskin çerçeveler ve olağanüstü renk performansı, hızlı bir IPS paneli tarafından sağlanırken, VX2428-in yüksek 180Hz yenileme hızı, pürüzsüz görselleri ve minimum giriş gecikmesini destekler. Bu kadar iyi olmayacağını düşünebilirsiniz, ama öyle. Sadece işi yapmakla kalmayacak - yorucu oyun oturumları, video ve fotoğraf düzenleme veya ofis işleriniz olsun - şık, güzel tasarlanmış bir monitör üzerinde çalışacaksınız.',
109.99,
'./upload/pro4.jpg',
'ViewSonic')

,('MSI CREATOR 16 AI STUDIO A1VIG-024TR ULTRA 9 185H RTX4090 2TB SSD 16" UHD+ 120Hz Gaming Notebook',
'İşlemci: Intel® Core™ Ultra 9 185H (24M Cache, up to 5.10 GHz)
İşletim Sistemi: Windows11 Pro High-End Standard Version
Ekran: 16" 16:10 UHD+ (3840x2400), MiniLED, 120Hz, 100% DCI-P3 (Typ.)
Chipset: Integrated SoC
Ekran Kartı: RTX4090, GDDR6 16GB
Hafıza: DDR V 64GB (32GB*2, 5600MHz)
Hafıza Yuvası: 2 Slot
Maksimum Hafıza: Max 96GB
Depolama Kapasitesi: 2TB NVMe SSD
Depolama Seçenekleri: 2x M.2 SSD slot (NVMe PCIe Gen4)
Ön Kamera: "IR FHD type (30fps@1080p) with HDR 3D Noise Reduction+ (3DNR+)"
Klavye: Single Backlit Keyboard (White)
Pil: 4 cell, 99.99Whr
Güç Adaptörü: 240W
Boyutlar: 355.8 x 259.7 x 19.95 mm
Ağırlık: 1.99 kg',
949.59,
'./upload/pro4.jpg',
'MSI')

,('LENOVO IdeaPad Duet 5 12IAU7 i7-1255U 16GB DDR4 Iris Xe Graphics 512GB SSD 12.4" 240Hz W11H Notebook',
'LENOVO IDEAPAD DUET
Daha fazla ve zahmetsizce yaratın,
Ayrılabilir Bluetooth® klavyeli çok yönlü 12,35" 2si 1 arada dizüstü bilgisayar,
En iyi Intel Core işlemciler ve tamamen işlevsel USB-C bağlantı noktaları.
Intel® WiFi 6E ile hızlı bağlantı ve hızlı pil şarjı.
Geniş renk yelpazesi ve Dolby Vision® ile çarpıcı 2,5K ekran,
Kolayca taşınabilir ve dayanıklıdır.',
949.99,
'./upload/pro5.jpg',
'Lenovo')

,('GIGABYTE AORUS 7 9MF i5-12500H RTX4050 GDDR6 6GB 512GB SSD 17.3" FHD 360Hz Gaming Notebook',
'Yepyeni AORUS 7, güçlü performansı ve mobiliteyi, NVIDIA DLSS 3, ultra verimli Ada Lovelace kemeri ve desteklenen güçlü 12. Max-Q Technologies, herhangi bir AAA oyununu sorunsuz çalıştırmanın gücünü hissedin. Yüksek ekran-gövde oranına sahip 360 Hz oyun paneli, oyuncuların bir sinema salonu veya birinci sınıf e-spor odası gibi pürüzsüz, yüksek kaliteli görsellere kapılmalarını sağlar.
Dünyanın İlk Dört Taraflı Süper İnce Çerçeveli Oyun Dizüstü Bilgisayarı
AORUS 7, son derece pürüzsüz bir görsel şölen ve muhteşem bir geniş renk gamı ile kusursuz daldırma için dört taraflı süper ince çerçeveli ekrana sahiptir. Yüksek yenileme hızı, herhangi bir gölgelenmeyi ortadan kaldırarak oyuncuların savaş alanına hükmederken muhteşem görsellerin keyfini çıkarmasına olanak tanır.',
959.99,
'./upload/pro6.jpg',
'GIGABYTE')

,('RAZER Blade 17 i7-12800H 16GB DDR5 RTX 3060 GDDR6 6GB 1TB SSD 17.3" QHD 240Hz Gaming Notebook',
'Yeni Razer Blade 17 her zamankinden daha güçlü, tasarımı ve geliştirilmiş termal özellikleriyle kompakt olmasına rağmen Blade 17, Profesyonelleri en yeni NVIDIA ve Intel işlemcilerle güçlendiriyor. Hareket halindeyken performans gerektiren AAA oyunlarına dayanabilen, oyun sırasında canlı video akışı yapabilen veya başyapıtlar yaratabilen Blade 17, güçlü bir mobil masaüstü bilgisayardır.
Uygulamaları yüklerken, oyunları çalıştırırken ve diğer günlük bilgisayar görevlerini gerçekleştirirken daha hızlı, daha sorunsuz bir deneyimin keyfini çıkarırken, DDR4-e kıyasla 1600 MHz-lik artışla hızı hissedin.
Razer Blade 17-nin üretebileceği yeni keşfedilen gücün tamamı, buna uygun bir termal performans olmadan anlamsız olacaktır. Daha fazla kanatçık, fan ve daha büyük sıvı kapasitesiyle güncellenen sistem, termal eşiği en üst düzeye çıkarmak ve dizüstü bilgisayardaki FPS-nin her onsunu sıkıştırmak için nanopartikül termal engelleyicilerini ve sunucu sınıfı bileşenlerini en üst düzeye çıkarır. Bu sistem yalnızca dizüstü bilgisayarın maksimum düzeyde performans göstermesini sağlamakla kalmıyor, aynı zamanda Razer Blade dizüstü bilgisayarların başka hiçbir yerde bulunamayacak kadar ince bir form faktörünü koruyabilmesini de sağlıyor.',
1949.99,
'./upload/pro7.jpg',
'Razer')
```        


