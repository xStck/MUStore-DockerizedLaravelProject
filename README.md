# MUStore-DockerizedLaravelProject

<br>
<h2 align="center">Project description</h2><br>
The project is a dockerized music store that allows you to "buy" product which are in data base. It is possible only when the user is logged in (he must register first). The user can also edit his cart.
<br>
<h2 align="center">For the project to work properly, it is necessary to:</h2><br>
1. In terminal (being in application folder - /MUStore/) run command: <br>
1.1. composer install <br>
1.2. npm install<br>
1.3. cp .env.example .env<br>
1.4. php artisan key:generate<br>
2. In terminal (being in main folder of project - where is docker-compose.yml) run command: docker-compose -p MUStore up <br>
3. In terminal: <br>
3.1. docker exec php php artisan migrate<br>
3.2. docker exec php php artisan db:seed --class=DatabaseSeeder<br>
4. Run store in web browers: http://localhost:8080/
