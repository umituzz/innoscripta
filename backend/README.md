<p>Kuruluma geçmeden önce lütfen sisteminizde composer,git, php ve docker uygulamalarının sorunsuz çalıştığına emin olunuz.</p>
## Kurulum Aşamaları

<p>
İlk önce proeyi git ile çalışmak istediğimiz alana klonlayalım 

```bash 
git clone https://github.com/umituzz/innoscripta
```

daha sonra 
```cd innoscripta```
ile ilgili klasör içerisine geçip orada çalışmaya başlayabiliriz</p>

```bash 
composer install --ignore-platform-reqs
cp .env.example. env
php artisan key:generate
```
<p>

<p>Horizon paketi Windows platformunda pcntl eklentisine ihtiyaç duyduğu için sisteminizde yok ise eğer --ignore-platform-reqs ile kurulum yapabilirsiniz.</p>
<p>Sail komutunu çalıştırırken permission denied hatası alırsanız klasöre yetki vermelisiniz. chmod -R 777 refrigerator gibi, şu an full yetki siz yetkiyi kendinize göre ayarlayabilirsiniz.</p>

```php artisan sail:install```
ile mysql ve redis kurulumunu yapın, 0,3 girebilirsiniz
daha sonrasında ```./vendor/bin/sail up``` ile konteynırları kaldırın, arka planda kaldırmak için -d kullanabilirsiniz 
```./vendor/bin/sail up -d``` </p>
<p>Daha sonrasında docker ps ile kurulumunu yaptığınız konteynırlarda bir sorun var mı yok mu kontrol edin. Var ise logları kontrol edin ve lütfen bilgisayarınız Docker ile herhangi bir sorunu olmadığını kontrol edin.</p>

<p> Sail ile mysql kurulumu yapıldıktan sonra projenin ismi veritabanı olarak belirlenir. Ve kullanıcı ismi sail ve şifre de password olarak belirlenir otomatik olarak. 
.env dosyasında DATABASE ile ilgili kısımda bunu görebilirsiniz
Veritabanı ayarlamaları sorunsuz bir şekilde bittikten sonra veritabanındaki tabloları oluşturup verileri ekleyebiliriz. Bunun için;


<p>

```php artisan setup``` komutuyla veritabanını sıfırlayabilir ve de redis'e verileri ekleyebilirsiniz 
</p>
<p>

```docker exec -it backend-laravel.test-1 bash``` ile laravel konteynır içerisine girip veritabanı ile ilgili işlemleri yapabiliriz.
php artisan migrate ile tablolar oluşturulabilir ve daha sonrasında
php artisan db:seed ile önceden hazırlanan veriler getirilebilir.
kısayol: php artisan migrate:fresh --seed ile veritabanı sıfırlayıp verileri ekleyebiliriz tek komut ile
Daha sonrasında bir veritabanı arayüzü ile ilgili verileri girerek bağlantı yapabiliriz. Sunucu localhost, port:3306 olarak belirlenir. Veritabanı adı ve diğer bilgiler zaten daha önceden ayarlanmıştı oradan bakıp girebilirsiniz.
</p>

<p>kök dizinde screenshots klasörü altında mysql altında Phpstorm ile mysql bağlantı kurulma işleminin ekran görüntülerini ekledim, oradan bakabilirsiniz ek not olarak</p>

<p> .env dosyasında ilgili anahtarlar redis olarak belirlenmelidir.

```bash
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
```

</p>


<p> Admin kullanıcı giriş bilgileri: email:admin@innoscripta.com password:123456789 </p>

<p>User kullanıcı giriş bilgileri: email:user@innoscripta.com password:123456789</p>


<p>Zamanlanmış görevleri takip edebilmek için

```php artisan schedule:work``` 
komutu ile izlemeye alabiliriz</p>
<p>Kuyrukta bekleyen görevleri takip edebilmek için 

```php artisan queue:work``` 
komutu ile izlemeye alabiliriz</p>

<p>
Gönderilen mailleri almak için mailtrap.io uygulamasının ücretsiz test uygulamasını kullanabiliriz. Bunun için .env dosyasındaki mail ile ilgili ayarlamaları yapmamız gerekmektedir.
Mail kullanıcı adı ve şifresini girmeniz gerekmektedir. Ücretsiz hesap oluşturmak için https://mailtrap.io/ 

```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_NAME="${APP_NAME}"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
 ```

</p>

<p>

```php artisan horizon``` ile kuyruğa alınan işlemleri panel üzerinden görebilirsiniz, bu işlemi laravel konteynır içerisinde gerçekleştirmelisiniz.  

</p>

<p>Zamanlanmış görevler her bir dakika olarak ayarlanmıştır bunun nedeni test aşamasında işlemleri hemen görebilmek içindir. Ama bunu değiştirebilirsiniz. Console/Kernel.php dosyasında değişiklik yapabilirsiniz.
https://laravel.com/docs/10.x/scheduling#schedule-frequency-options sitesinde opsiyonlarınıza bakabilirsiniz.</p>


```php artisan test --coverage-html=coverge``` ile testleri çalıştırabilir ve de coverage oranlarını görüntüleyebilirsiniz. Bu komut coverage altında bir klasör oluşturacaktır ve oradaki kök dizinde index.html dosyasından tüm oranları görebilirsiniz.

<p>
Şöyle bir yetki sorunuyla karşılaşırsanız, docker konteynır içerisinde şu komutları çalıştırabilirsiniz 
</p>
<p>
The stream or file "/var/www/html/storage/logs/laravel.log" could not be opened in append mode: Failed to open stream: Permission denied The exception occurred while attempting to log: The stream or file "/var/www/html/storage/logs/laravel.log" could not be opened in append mode: Failed to open stream: Permission denied
</p>
<p>

``` 
chmod -R 775 /var/www/html/storage/logs/
chmod -R 775 /var/www/html/storage/framework/sessions/
```

</p>
