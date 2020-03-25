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
| Postgres |


#### Start app
- Build Docker containers
    ```bash
    docker-compose up --build -d
    ```

- Install Composer dependencies
    ```bash
    docker exec -it php7 composer install
    ```
- Create Alias
    - Enter inside php7 container
        ```bash
          docker exec -i php7 bash
        ```
    - Run script
        ```bash
          ./scripts/create_linux_alias.sh  
        ```
    - Run Migrations
        ```bash
          migrate
        ```
### Receive Slack notifications with Webhooks
- Configure .env application
    ```bash
    cp .env.example .env
    ```
- Set  your Slack Api Webhook in .env
    ```dotenv
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
