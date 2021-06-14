<h1 align="center">Simple PHP Router</h1>

<p align="center">
    <a href="https://github.com/mathleite/simple-php-router">
        <img src="https://github.com/mathleite/simple-php-router/workflows/CI/badge.svg" alt="Workflow badge">
    </a>
</p>

| SETUP  |
|:------:|
| Nginx  |
| PHP8 |
| Docker |


#### Start app
- Build Docker containers
    ```docker
    docker-compose up --build -d
    ```

- Install Composer dependencies
    ```docker
    docker exec -it php composer install
    ```

### Create your own routes

`app/Route/index.php`

```php
$route->registry('/greet', \App\Greet\GreetController::class, 'index');
```

Where:
- `/user` is the **route** that you want to *register*;
- `\App\Greet\GreetController::class` is the *Controller* **namespace**;
- `index` is a controller *function*
