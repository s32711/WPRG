CREATE DATABASE IF NOT EXISTS blog_s32711;
USE blog_s32711;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(50) UNIQUE NOT NULL,
                       email VARCHAR(100) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       role ENUM('admin', 'author', 'user') DEFAULT 'user'
);

CREATE TABLE posts (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       content TEXT NOT NULL,
                       image VARCHAR(255),
                       created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                       author_id INT,
                       FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE comments (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          post_id INT,
                          user_id INT,
                          content TEXT NOT NULL,
                          created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
                          FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);