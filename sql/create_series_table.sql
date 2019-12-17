CREATE TABLE `series` (
    `series_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `release_year` INT NOT NULL,
    `story` TEXT NOT NULL,
    `description` TEXT NOT NULL,
    `addtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
)