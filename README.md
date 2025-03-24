# This is the base php REST API.

# Project Overview:
The web-based single page application using PHP server.
API for http requests to english MySQL database.

# Technologies Used
Frontend: JavaScript, TypeScript, jQuery, CSS, Bootstrap.
Backend: PHP, PDO.
Database: MySQL.
Authentication: no.
Data format: JSON.
Deployment: GitHub.

# Base URL
http://localhost/index.php

# Features
- Return all english table lists or the specific id list. 
- Create the new list. 
- Update the specific id list.

# Usage

## Installation
### Prereqisites
- Node.js and npm installed
- MySQL installed
- PHP Server installed

### Clone the repository
```
$ git clone bart-git21/PHP-pdo-mySQL--REST-API--english
```

## Environment Variables
Create a .env file in the root directory and add the following variables:
```
HOST=127.0.0.1
```

## Dependencies:
- PDO: MySQL connection;

## Run the application
```
Open the index.php file in the browser.
```

### Base URL
http://localhost/api/

# API Endpoints

### GET /api/english/
### get all english table lists
{
    "code": 400,
    "message": "User not found",
    "descripttion": "User not found",
}

## Common Http status codes
|Http code|body                 |Description                                |
|---------|---------------------|-------------------------------------------|
|200      |OK                   |Successful request                         |
|201      |Created              |Resource created                           |
|204      |OK                   |Delete refresh token                       |
|400      |Bad Request          |Missing a reqired parameter or the server could not understand the request|
|401      |Unauthorized         |Required user authentication               |
|403      |Forbidden            |The server understood the request but refuzes to authorized it|
|404      |Not Found            |The requested resource could not be found  |
|405      |Method Not Allowed   |The method used in the request is not supported for the target resource, such as attempting to use a POST method when only GET requests are allowed.  |
|422      |empty request        |The received data is empty                 |
|500      |Internal Server Error|An unexpected condition was encoured. The server was unable to fulfil the request|
