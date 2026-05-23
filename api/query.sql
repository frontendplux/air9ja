CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    icon VARCHAR(255),
    image VARCHAR(255),
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    image VARCHAR(255),
    author VARCHAR(255),
    description TEXT,
    content LONGTEXT,
    views INT DEFAULT 0,
    status ENUM('published','draft') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) DEFAULT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    token VARCHAR(255) DEFAULT NULL,
    verified ENUM('yes','no') 
    DEFAULT 'no',
    status ENUM('active','unsubscribed') 
    DEFAULT 'active',
    ip_address VARCHAR(100) DEFAULT NULL,
    user_agent TEXT DEFAULT NULL,
    subscribed_at TIMESTAMP 
    DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid varchar(300) not null,

    fullname VARCHAR(255) NOT NULL,

    username VARCHAR(100) NOT NULL UNIQUE,

    email VARCHAR(255) NOT NULL UNIQUE,

    phone VARCHAR(20) DEFAULT NULL,

    password VARCHAR(255) NOT NULL,

   profile_image VARCHAR(255) DEFAULT NULL,
    bio TEXT DEFAULT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    status ENUM('active','inactive','banned') 
    DEFAULT 'active',
    email_verified ENUM('yes','no') 
    DEFAULT 'no',

    verify_token VARCHAR(255) DEFAULT NULL,

    reset_token VARCHAR(255) DEFAULT NULL,

    last_login TIMESTAMP NULL DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP
);