<!-- version: "3"
services:
  php:
    build: './php/'
    volumes:
      - ./public:/var/www/html/
  apache:
    build: './apache/'
    depends_on: 
      - php
      - mysql
    ports:
      - "8080:80"
    volumes:
      - ./public:/var/www/html/
  mysql:
    image: mysql:5.7
    restart: always
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql
      # Initially creates employees table
      - ./public/dump:/docker-entrypoint-initdb.d/
    environment:
      MYSQL_ROOT_PASSWORD: "passwd"
      MYSQL_DATABASE: "mydb"
      MYSQL_USER: "user1"
      MYSQL_PASSWORD: "passwd"
volumes:
    db_data:



version: "3.8"

services:
  php-backend:
    build: './php/'
    container_name: php-backend
    volumes:
      - ./public:/var/www/html/
      # - ./public/dump:/docker-entrypoint-initdb.d/  # Directory for initial SQL scripts
    environment:
      # Update MySQL connection details for RDS
      environment:
        MYSQL_HOST: "database-1-instance-1.c3qw4u6g6zrr.ap-northeast-1.rds.amazonaws.com"
        MYSQL_PORT: "3306"
        MYSQL_DATABASE: "mydb"
        MYSQL_USER: "user1"
        MYSQL_PASSWORD: "mypassword"
    ports:
      - "9000:9000"

  apache:
    build: './apache/'
    depends_on:
      - php-backend
    ports:
      - "8080:80"
    volumes:
      - ./public:/var/www/html/
    environment:
      MYSQL_HOST: "database-1-instance-1.c3qw4u6g6zrr.ap-northeast-1.rds.amazonaws.com"
      MYSQL_PORT: "3306"
      MYSQL_DATABASE: "mydb"
      MYSQL_USER: "user1"
      MYSQL_PASSWORD: "mypassword"



# No MySQL service since you're using RDS

volumes:
  db_data: {}  # Defined, but not used since we're not running a MySQL container


/mnt/c/Users/Pavilion/Desktop/docker/docker-project/php/Dockerfile


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> -->