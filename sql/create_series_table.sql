CREATE TABLE `series` (
    `series_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `release_year` DATETIME NOT NULL,
    `cover` VARCHAR(255) NOT NULL,
    `story` TEXT NOT NULL,
    `description` TEXT NOT NULL
)