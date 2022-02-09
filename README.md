# Exam Registration App Demo
Playing with CodeIgniter framework. A simple exam registration app.

## Running the Project 
The project requires only Docker CE installed on your system. PHP and MariaDB will be installed inside the containers. For more info, see `docker-compose.yml` file in the root directory.

Once you the docker running:

Go to the root directory
```
docker-compose up
```

Connect myapp container (e.g. for Mac `ci-era-myapp-1`, for Windows `ci-era_myapp_1`)
```
docker exec -it ci-era-myapp-1 bash
cd myapp
```

Run the following Database migration and Seeder files
```
php spark migrate
php spark db:seed MySeeder
```

You should be able to access the app on `http://localhost:8080/`

## Demo Login Credentials

You can find the login credentials being inserted through Seeder files. See `UserSeeder.php`

### Students (Email => Password)
`a.student@concordia.ab.ca` =>  `QwErTy!2#4` <br />
`b.student@concordia.ab.ca` =>  `1234Pwrd!` <br />
`c.student@concordia.ab.c` =>  `sF#r9sdfj` <br />

### Professor (Email => Password)
`a.professor@concordia.ab.ca` =>  `%T^Y123A`

