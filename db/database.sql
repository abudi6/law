CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin BOOLEAN NOT NULL
);  

INSERT INTO `users` (`id`, `email`, `username`, `password`, 'admin') VALUES
(1,'email@email.com','username', 'password', 'admin');

CREATE TABLE laws (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    type VARCHAR(50),
    keyword VARCHAR(100)
);
