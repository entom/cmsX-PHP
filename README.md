# cmsX-PHP
CMS build on Laravel5, Material design, AngularJS
## Instructions
- installing packages in root folder, php vendors and something with npm
```
composer install
npm install
```
- preparing database
```
php artisan migrate (making database)
```
- making test data:
```
 php artisan db:seed --class=DeptsTableSeeder 
 php artisan db:seed --class=ShopBrandsTableSeeder
 php artisan db:seed --class=ShopCategoriesTableSeeder
 php artisan db:seed --class=ShopProductsTableSeeder
```
- installing packages in public folder, dashboard folder
```
cd public/ 
npm install
cd dashboard/
npm install
bower install
```

## Description
- I have made a field "admin" in users table, which is responsible for user role - this field allow to login as admin or block access for non admin users. There is also a middleware "Admin" which is checking if user is authenticated and if is he admin or not.
