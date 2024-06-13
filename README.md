# Pure PHP CMS
Personal Pure PHP Content Management System

1. Download Source Files to PHP host directory (eg. xampp/htdocs)
2. Run server & database (eg. Apache & MySQL)
3. Create database & tables
```
CREATE DATABASE cms;

USE cms;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
4. Configure database permissions in [config/db.php](src/config/db.php)
5. Access server (eg. localhost/cms)