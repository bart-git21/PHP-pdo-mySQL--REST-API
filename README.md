# The [PHP](https://www.php.net/) and MySQL REST Api application

### Description:
```
API for http requests to english MySQL database
```

# Technologies Used
Backend: PHP.
Authentication: no.
Data format: JSON.
Deployment: GitHub.

# Features
Return all english table lists or the specific id list.
Create the new list.
Update the specific id list.

# Usage

## Installation
### Prereqisites
- PHP server installed

### Clone the repository
```
$ git clone https://github.com/bart-git21/PHP-pdo-mySQL--REST-API--english.git
```

## Run the application
Start the frontend application.
Open your browser and navigate to the client side

### Base URL
http://localhost/
```
$ npm run start
```

# API Endpoints

## Common Http status codes
|Http code|body                 |Description                                |
|---------|---------------------|-------------------------------------------|
|200      |OK                   |Successful request                         |
|201      |Created              |Resource created                           |
|204      |OK                   |Successful request but no content          |
|400      |Bad Request          |Missing a reqired parameter or the server could not understand the request|
|401      |Unauthorized         |Required user authentication               |
|403      |Forbidden            |The server understood the request but the user does not have permission to access the requested resource|
|404      |Not Found            |The requested resource could not be found  |
|405      |Not Found            |The HTTP method used is not allowed for the requested resource |
|422      |Empty request        |The received data is empty                 |
|500      |Internal Server Error|An unexpected condition was encoured. There was an unexpected error on the server side|
