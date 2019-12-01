CREATE TABLE `albums` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `artist` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `year` INT NOT NULL,
    `cover` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL
)