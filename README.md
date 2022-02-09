# ci-era
Playing with CodeIgniter framework. A simple exam registration app.

# Running the Project 
The project requires only Docker CE installed on your system. Once you the docker running:

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