<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Kurulum
- İlk olarak proje açıldığında ".env" dosyasındaki database APP_URL=http://localhost ve 
 DB_DATABASE= karşısına kendi database'nizi yazmalızısınız. Daha sonra kodu çalıştırıp migrate 
 ettiğinizde user ve product tabloları databasede oluşacaktır.

## Swagger-ui 
- http://127.0.0.1:8000/api/documentation adresine giderek swagger-ui görebilir ve
apinin çalışıp çalışmadığını kontrol edebilirsiniz. Swaggerda inputa yazdığınız bazı formatlar(date)
gibi  yanlış algıladığı için bazı apiler doğru çalışmıyor olabilir. Ancak postman'de denedğinizde 
doğru çalıştığını göreceksiniz. Bunun için gerekli url'leri aşağıda sıralayacağım.

## EndPoints
# POST
- http://127.0.0.1:8000/api/register		
/*kullanıcı kaydı için aşağıdaki formatı takip edin*/
{
	"name": "",
	"email": "",
	"password": ""
}

- http://127.0.0.1:8000/api/login		
/*kullanıcı ‏girişi için aşağıdaki formatı takip edin */
{
	"email": "",
	"password": ""
}

-  http://127.0.0.1:8000/api/logout		/*çıkış yapar ve token silinir*/

-  http://127.0.0.1:8000/api/addProduct	
/*product eklemek için aşağıdaki formatı takip edin*/
{
	"orderCode": "",
	"quantity": 1,
	"address": "",
	"shippingDate": "2021-12-12 18:08:05"	/*postmande çalışan swaggerda çalışmayan date formatı*/
}
# GET

- http://127.0.0.1:8000/api/user		/*tüm kullanıcıları gösterir*/


- http://127.0.0.1:8000/api/getProductById/?	
/*soru işareti yerine istediğiniz id yazarak product çağırabilirsiniz*/

- http://127.0.0.1:8000/api/getAllProduct	/*tüm productları getirir*/

- http://127.0.0.1:8000/api/deleteProduct/?	/*soru işareti yerine yazdığınız id'yi siler*/

#PUT 
- http://127.0.0.1:8000/api/updateProduct/?	
/*soru işareti yerine yazdığınız idli product güncellemek için aşağıdaki formatı takip 
edin shippingDate geçmediyse güncelleme yapmayacaktır */

{
	"orderCode": "",
	"quantity": 1,
	"address": "",
	"shippingDate": "2021-12-12 18:08:05"
}
