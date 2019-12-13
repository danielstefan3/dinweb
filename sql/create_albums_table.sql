CREATE TABLE `albums` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `year_started` INT NOT NULL,
    `artist` VARCHAR(255) NOT NULL,
    `cover` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL
)