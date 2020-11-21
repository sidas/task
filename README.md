## Project brief
* Create a system which allows you to manage items;
* Each item must have: name, price, quantity, category, and (optional) description.
* Laravel version must be not older than 5 years.
* Features: item create/show; category create/show; see all products that belongs to category;
* Make API endpoint ('/api/items/{id}') which will show item. Item details must be provided in JSON;
* Authorization is needed;

## Extra features
* Full crud for category and items been made;
* Docker configuration;
* Installed Mess detector and Code sniffer;
* Seeder created for admin user;
* Created tests for category and items crud;

## Project setup
```
docker-sync-stack start
docker exec app_task chmod -R 777 storage
docker exec app_task chmod -R 777 bootstrap
docker exec app_task npm install && npm run dev
docker exec app_task php artisan migrate
docker exec app_task php artisan db:seed --class=UserSeeder
```


## Project access
After seeding you will be able to login as admin.  
Logins:  
admin@admin.com  
test 
