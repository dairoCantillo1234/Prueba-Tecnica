# docker-centos-laravel-postgis

## Used software
- MySQL
- Apache
- PHP 71
- Composer
- laravel command

## Init project
```
cp app
./vendor/bin/sail up -d
./vendor/bin/sail php artisan migrate
```

## Stop project
```
./vendor/bin/sail down
```

## Run tests
```
./vendor/bin/sail php artisan test
```
