### ATuPuerta API 

### INSTALLATION

1. Clone repo

```bash
$ git clone https://github.com/ATuPuerta/atupuerta-api.git/
```

2. Install dependencies

```bash
$ composer install
```

3. Init enviroment

```bash
$ php init
```

Select enviroment for development or production.

4. Config file `common\main-local.php` adn setup database

```php
<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=yourserver;dbname=yourdbname',
            'username' => 'yourusername',
            'password' => 'yourpassword',
            'charset' => 'utf8',
        ],

        ...
    ],
];
```

5. Run migrations

```bash
$ php yii migrate
```

Select yes to apply migrations

6. Run local server

```bash
$ php yii serve -t api/web/
```

Server run at localhost:8080 by default, use -p options to change port

### API Swagger
`/api/docs`

### API Swagger JSON
`/api/api-json`

### API Endpoints Examples

`GET` `/` : Return api name and las api version (v1)

`POST` `/v1/login` : Send in request body username and password. Return jwt access token.

This endpoints require jwt access token in Authorization header, authentication method Bearer Token
---

`GET` `/v1/users` : Return all registered users

`POST` `/v1/users` : Create user , require request body with username, password and email.

`GET` `/v1/users/:id` : Return user by id

`GET` `/v1/users/:id?fields=username,email` : Return specific fields of an user by id.

`GET` `/v1/users/:id?expand=created_at` : Return extra fields

Example:

`GET` `http://localhost:8080/v1/users/1?fields=username,email&expand=created_at`

return

```json
{
    "username": "admin",
    "email": "admin@example.com",
    "created_at": 1587932567
}
```

`PUT` `/v1/users/:id` : Update user data, require request body. NOTE: Password can not be update with this endpoint.

`DELETE` `/v1/users/:id` : Delete user.

####### NOTE: ATUPUERTA API IS IN CONSTRUCTION ;)