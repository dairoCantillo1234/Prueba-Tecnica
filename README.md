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

## Diagrama de Arquitectura

![image](https://user-images.githubusercontent.com/95891125/145512462-78fd3ddf-99c6-4259-9a19-3f4753b319b5.png)

##  Estimación de Desarrollo
- Estimación: 4h y 0 min.
- Formulario HTML validaciones básicas: 60 min.
- Base de Datos MySQL en Docker con el modelo de base de datos: 30 min.
- API Rest CRUD con Laravel consumiendo base de datos: 60 min.
- Diagrama de arquitectura: 20 min.
- Lista de tareas: 30 min.
- Test unitarios: 20 min.
- Subir a GitHub: 20 min.
## Tiempo Real: 6 hora y 20 min
