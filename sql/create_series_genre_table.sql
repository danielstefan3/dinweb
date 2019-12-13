CREATE TABLE `series_genre` (
    `series_id` INT NOT NULL,
    `genre_id` INT NOT NULL,
    CONSTRAINT FK_series_genre_series FOREIGN KEY (series_id)
    REFERENCES series(series_id),
    CONSTRAINT FK_series_genre_genre FOREIGN KEY (genre_id)
    REFERENCES genre(genre_id)
)