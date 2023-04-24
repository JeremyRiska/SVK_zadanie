Running the app. 
1. clone repository and open root folder in console. 
2. type composer install to install all dependencies
3. run npm install to get all front-end packages
4. run migrations using command php artisan migrate 
    If this throws an error, migrations need to be executed directly from app container.
    4.1 type docker ps to get list of containers.
    4.2 Copy the id of app container.
    4.3 exectue docker exec -it < container_id > bash
    4.4 now in var/www/html container folder execute migration script
5. run npm run dev command 
6. app is on localhost port 8092, database is on 8091