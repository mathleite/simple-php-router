<h1 align="center">Simple PHP Router</h1>

<p align="center">
    <a href="https://github.com/mathleite/simple-php-router">
        <img src="https://github.com/mathleite/simple-php-router/workflows/CI/badge.svg" alt="Workflow badge">
    </a>
</p>

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
### Receive Slack notifications with Webhooks
- Configure .env application
    ```bash
    cp .env.example .env
    ```
- Set  your Slack Api Webhook in .env
    ```env
    SLACK_API_WEBHOOK=your_webhook_here
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
