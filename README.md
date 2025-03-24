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

## Authentication:

### POST /auth
### Sign in, log in
| Server response                               | Client request                               |
|-----------------------------------------------|----------------------------------------------|
|                                               | AT = fetch("/auth", body);                   |
| RTs.push();                                   |                                              |
| res.cookie(RT);                               |                                              |
| res.json(AT);                                 |                                              |
|                                               | localStorage.setItem(AT);                    |

400 user not found
{
    "code": 400,
    "message": "User not found",
    "descripttion": "User not found",
}

### GET /auth
#### get new refresh token
| Server                                        | Client                                       |
|-----------------------------------------------|----------------------------------------------|
|                                               | AT = fetch("/auth", {credentials}) |
| RTs.includes(RT)                              |                                              |
| jwt.verify(req.cookie.RT, SECRET);            |                                              |
| res.json(AT);                                 |                                              |
|                                               | localStorage.setItem(AT);                    |

200 OK
401 refresh token not found or invaled
{
    "code": 401,
    "message": "Refresh token is not found. You need to sign in",
    "descripttion": "Refresh token not found",
}
403 refresh token is expired
{
    "code": 401,
    "message": "Refresh token is not found. You need to sign in",
    "descripttion": "Refresh token not found",
}
### DELETE /auth
#### log out
| Server                                        | Client                                       |
|-----------------------------------------------|----------------------------------------------|
|                                               |  fetch("/auth", {credentials})     |
| RTs = RTs.filter(e => e !== req.cookie.RT);   |                                              |
| res.clearCookie(RT);                          |                                              |
|                                               | localStorage.removeItem(AT)                  |

204 OK

## Users:

### POST /users
#### create the new user, sign up
| Server                                        | Client                                       |
|-----------------------------------------------|----------------------------------------------|
|                                               |  fetch("/users")                             |
| AT = req.headers.authorization.split(" ")[1]; |                                              |
| jwt.verify(AT, SECRET);                       |                                              |

201 OK
400 user is exists
{
    "code": 400,
    "message": "The name/email is already taken",
    "descripttion": "User already exists",
}
422 data is empty or invalid
{
    "code": 422,
    "message": "Data is empty or invalid",
    "descripttion": "User data is empty or invalid",
}

### GET /users
#### get protected data
| Server                                        | Client                                       |
|-----------------------------------------------|----------------------------------------------|
|                                               |  fetch("/users", {Authorization})            |
| AT = req.headers.authorization.split(" ")[1]; |                                              |
| jwt.verify(AT, SECRET);                       |                                              |

200 OK
{
    "id": 1,
    "name": "John Doe",
}
401 Access token not found
{
    "code": 404,
    "message": "Unauthorized",
    "descripttion": "Access token not found",
}
403 Access token is invalid
{
    "code": 404,
    "message": "Access token is invalid",
    "descripttion": "Access token is invalid",
}
404 Not found
{
    "code": 404,
    "message": "Not found",
    "descripttion": "Data not found",
}

### GET /admin
#### example of page with admin permissions
| Server                                        | Client                                       |
|-----------------------------------------------|----------------------------------------------|
|                                               |  fetch("/admin", {Authorization})            |
| AT = req.headers.authorization.split(" ")[1]; |                                              |
| jwt.verify(AT, SECRET);                       |                                              |
| user.role = "admin";                          |                                              |
### GET /moderator
#### example of page with admin or moderator permissions
| Server                                        | Client                                       |
|-----------------------------------------------|----------------------------------------------|
|                                               |  fetch("/moderator", {Authorization})        |
| AT = req.headers.authorization.split(" ")[1]; |                                              |
| jwt.verify(AT, SECRET);                       |                                              |
| user.role = "admin" or "moderator";           |                                              |

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
