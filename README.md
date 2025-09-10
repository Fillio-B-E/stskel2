# Website BOOKED
BOOKED is a website made for you convenience when you want to make a reservation at a restaurant. You can reserve tables and order food before going to the restaurant anywhere anytime.


# Installation
1. Setup
```
git clone https:https://github.com/Fillio-B-E/stskel2.git folder_name
```

2. Install PHP library and JS library
```
composer install
```

3. Install JS library
```
npm install
```

4. Make .env file
```
cp .env.example .env
```

5. Check if DB_CONNECTION in .env file is using mysql. If DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD is commented, uncomment them

6. Generate a app key
```
php artisan key:generate
```

7. Add the project
```
git add .
```

8. Git commit
```
git commit -m "feat: implement page_name"
```

9. Git push
```
git push -u origin branch_name
```

10. Create branch
```
git checkout -b name/task
```

11. Take file
```
git checkout main
```
