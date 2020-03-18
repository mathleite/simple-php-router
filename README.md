# Simple PHP Router

| SETUP  |
|:------:|
| Nginx  |
| PHP7.4 |
| Docker |


#### Start app
- Build Docker containers
    ```docker
    docker-compose up --build -d
    ```

- Install Composer dependencies
    ```docker
    docker exec -it php7 composer install
    ```

### Create your own routes

`app/Route/index.php`

```php
$route->registry('/user', \App\User\UserController::class, 'index');
```

Where:
- `/user` is the **route** that you want to *register*;
- `\App\User\UserController::class` is the *Controller* **namespace**;
- `index` is a controller *function*
