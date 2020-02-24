<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## payment-gateway - Customer Transactions API
##### Description
The project was based on the following [functional requirements](https://drive.google.com/open?id=0B__SCzsIDKBBY05BeDY2UVcyWUpxVnZEajZuclBxX2RDenRz).
This implementation was carried through with the following technical specifications:
- PHP Framework Laravel 5.8
- MySql Database system.
- Nginx Web Server
- Docker was used for development environment.

###Installation
After cloning the repository on the master branch, carry on the following (Docker will need to be installed on the system):
````
- docker-compose -up -d
- docker-compose exec db mysql -u root -pmysql
   myslq> 'CREATE DATABASE psp_media;'
- rename .env.example to .env
- docker-compose exec app composer install
- http://localhost:8070 -> you should be able to see the laravel main page.
````
###Configuration
After the installation process, we need to prepare the database with the designated schema for the Api calls.
```
- docker-compose exec app migrate:install
- docker-compose exec app migrate
``` 

###Usage
The following is the route list with all the Rest APIs. 
 
| Method   | URI                                             |Action                                                | Middleware |
|----------|-------------------------------------------------|------------------------------------------------------|------------|        
| GET      | api/customers                                   | App\Http\Controllers\CustomerController@index        | api        |
| POST     | api/customers                                   | App\Http\Controllers\CustomerController@store        | api        |
| PUT      | api/customers/{id}                              | App\Http\Controllers\CustomerController@update       | api        |
| POST     | api/transactions/customer/{customerId}/deposit  | App\Http\Controllers\TransactionsController@deposit  | api        |
| POST     | api/transactions/customer/{customerId}/withdraw | App\Http\Controllers\TransactionsController@withdraw | api        |
| GET      | api/transactions/report                         | App\Http\Controllers\TransactionsController@report   | api        |

Sample Api calls taken from Postman:

```
{
	"variables": [],
	"info": {
		"name": "psp",
		"_postman_id": "838fa7c6-7634-228e-cbde-2357627fa827",
		"description": "",
		"schema": "https://schema.getpostman.com/json/collection/v2.0.0/collection.json"
	},
	"item": [
		{
			"name": "http://localhost:8070/api/customers",
			"request": {
				"url": "http://localhost:8070/api/customers",
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/x-www-form-urlencoded",
						"description": ""
					}
				],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "email",
							"value": "redi_testo@edco.ms",
							"description": "",
							"type": "text"
						},
						{
							"key": "firstName",
							"value": "Redi",
							"description": "",
							"type": "text"
						},
						{
							"key": "lastName",
							"value": "Linxa",
							"description": "",
							"type": "text"
						},
						{
							"key": "gender",
							"value": "m",
							"description": "",
							"type": "text"
						},
						{
							"key": "country",
							"value": "AL",
							"description": "",
							"type": "text"
						}
					]
				},
				"description": ""
			},
			"response": []
		},
		{
			"name": "http://localhost:8070/api/customers/1",
			"request": {
				"url": "http://localhost:8070/api/customers/1",
				"method": "PUT",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/x-www-form-urlencoded",
						"description": ""
					}
				],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "email",
							"value": "redi_dodo@edco.ms",
							"description": "",
							"type": "text"
						},
						{
							"key": "firstName",
							"value": "Redi5",
							"description": "",
							"type": "text"
						},
						{
							"key": "lastName",
							"value": "Linxa3",
							"description": "",
							"type": "text"
						},
						{
							"key": "gender",
							"value": "m",
							"description": "",
							"type": "text"
						},
						{
							"key": "country",
							"value": "AL",
							"description": "",
							"type": "text"
						}
					]
				},
				"description": ""
			},
			"response": []
		},
		{
			"name": "http://localhost:8070/api/transactions/customer/1/deposit",
			"request": {
				"url": "http://localhost:8070/api/transactions/customer/1/deposit",
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/x-www-form-urlencoded",
						"description": ""
					}
				],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "amount",
							"value": "30",
							"description": "",
							"type": "text"
						}
					]
				},
				"description": ""
			},
			"response": []
		},
		{
			"name": "http://localhost:8070/api/transactions/customer/1/withdraw",
			"request": {
				"url": "http://localhost:8070/api/transactions/customer/1/withdraw",
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/x-www-form-urlencoded",
						"description": ""
					}
				],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "amount",
							"value": "30",
							"description": "",
							"type": "text"
						}
					]
				},
				"description": ""
			},
			"response": []
		},
		{
			"name": "http://localhost:8070/api/transactions/report?dateFrom=2019-12-13&dateTo=2019-12-14",
			"request": {
				"url": {
					"raw": "http://localhost:8070/api/transactions/report?dateFrom=2019-12-13&dateTo=2019-12-14",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8070",
					"path": [
						"api",
						"transactions",
						"report"
					],
					"query": [
						{
							"key": "dateFrom",
							"value": "2019-12-13",
							"equals": true,
							"description": ""
						},
						{
							"key": "dateTo",
							"value": "2019-12-14",
							"equals": true,
							"description": ""
						}
					],
					"variable": []
				},
				"method": "GET",
				"header": [],
				"body": {},
				"description": "Report request"
			},
			"response": []
		}
	]
}
```
