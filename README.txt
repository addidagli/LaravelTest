* İlk olarak proje açıldığında ".env" dosyasındaki database APP_URL=http://localhost ve 
 DB_DATABASE= karşısına kendi database'nizi yazmalızısınız. Daha sonra kodu çalıştırıp migrate 
 ettiğinizde user ve product tabloları databasede oluşacaktır.

* Daha sonra http://127.0.0.1:8000/api/documentation adresine giderek swagger-ui görebilir ve
apinin çalışıp çalışmadığını kontrol edebilirsiniz. Swaggerda inputa yazdığınız bazı formatlar(date)
gibi  yanlış algıladığı için bazı apiler doğru çalışmıyor olabilir. Ancak postman'de denedğinizde 
doğru çalıştığını göreceksiniz. Bunun için gerekli url'leri aşağıda sıralayacağım.

*POST --->  http://127.0.0.1:8000/api/register		
//kullanıcı kaydı için aşağıdaki formatı takip edin
{
	"name": "",
	"email": "",
	"password": ""
}

*POST --->  http://127.0.0.1:8000/api/login		
//kullanıcı ‏girişi için aşağıdaki formatı takip edin 
{
	"email": "",
	"password": ""
}

*POST --->  http://127.0.0.1:8000/api/logout		//çıkış yapar ve token silinir

*GET --->   http://127.0.0.1:8000/api/user		//tüm kullanıcıları gösterir

*POST --->  http://127.0.0.1:8000/api/addProduct	
//product eklemek için aşağıdaki formatı takip edin
{
	"orderCode": "",
	"quantity": 1,
	"address": "",
	"shippingDate": "2021-12-12 18:08:05"	//postmande çalışan swaggerda çalışmayan date formatı
}

*GET ---> http://127.0.0.1:8000/api/getProductById/?	
//soru işareti yerine istediğiniz id yazarak product çağırabilirsiniz

*GET ---> http://127.0.0.1:8000/api/getAllProduct	//tüm productları getirir

*GET ---> http://127.0.0.1:8000/api/deleteProduct/?	//soru işareti yerine yazdığınız id'yi siler

*PUT ---> http://127.0.0.1:8000/api/updateProduct/?	
//soru işareti yerine yazdığınız idli product güncellemek için aşağıdaki formatı takip 
edin shippingDate geçmediyse güncelleme yapmayacaktır

{
	"orderCode": "",
	"quantity": 1,
	"address": "",
	"shippingDate": "2021-12-12 18:08:05"
}