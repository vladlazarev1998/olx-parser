1) Install repository from git
```
git clone https://github.com/vladlazarev1998/olx-parser.git
```

2) Install composer dependencies
```
cd olx-parser 
composer install
```

3) Copy and configure env file
```
cp .env.example .env
```

4) Generate app key
```
php artisan key:generate
```

5) Download images and start docker containers
```
docker-compose up -d
```

6) Migrate DB (If using docker, go to laravel container and start migration there)
```
php artisan migrate
```

API url for subscribes with params:
```
POST: http://127.0.0.1/api/v1/subscribe

Params: 
email: test@gmail.com
url: https://www.olx.ua/d/uk/...
```
