# cmsX-PHP
CMS build on Laravel5, Material design, AngularJS
## Instructions
- composer install (installing vendors)
- npm install (installing packages in root folder)
- php artisan migrate (making database)
- making test data:

 php artisan db:seed --class=DeptsTableSeeder
 
 php artisan db:seed --class=ShopBrandsTableSeeder
 
 php artisan db:seed --class=ShopCategoriesTableSeeder
 
 php artisan db:seed --class=ShopProductsTableSeeder

- cd public/ 
- npm install (installing packages when in public folder)
- cd dashboard/
- npm install (installing packages when in dashboard folder)
- bower install (installing packages when in dashboard folder)

## Description
- I have made a field "admin" in users table, which is responsible for user role - this field allow to login as admin or block access for non admin users. There is also a middleware "Admin" which is checking if user is authenticated and if is he admin or not.
