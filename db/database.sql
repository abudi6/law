CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);  

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1,'email@email.com','username', 'password');