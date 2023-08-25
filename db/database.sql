
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    admin BOOLEAN NOT NULL
);

INSERT INTO users (email, username, password, admin) VALUES
('email@email.com', 'username', 'password', TRUE);


CREATE TABLE laws (
    lawId INT AUTO_INCREMENT PRIMARY KEY,
    lawTitle VARCHAR(255) NOT NULL,
    lawDescription TEXT NOT NULL,
    type VARCHAR(50),
    keywords VARCHAR(100)
);


CREATE TABLE IF NOT EXISTS annotations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    annotationtext VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE annotations (
    id INT AUTO_INCREMENT PRIMARY KEY,
)