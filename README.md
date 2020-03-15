# Price-monitor-web-app
Price monitor web app is webapp monitoring for e-commerce fabelio

installing step :

-install laravel on your local computer 
https://laravel.com/docs/7.x#installation

-clone this project 

-create database in your mysql the name is monitoring_price_app

-run this query in database mysql monitoring_price_app
CREATE TABLE `products` (
 `product_id` int(5) NOT NULL AUTO_INCREMENT,
 `url` varchar(255) NOT NULL,
 `category_name` varchar(255) NOT NULL,
 `product_name` varchar(255) NOT NULL,
 `price` int(11) NOT NULL,
 `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
 `description` text NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1

-run php artisan migrate

-run php artisan serve

-register if you want to login for this app
