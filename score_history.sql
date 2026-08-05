CREATE TABLE score_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    team_id INT NOT NULL,
    placement INT NOT NULL,
    points INT NOT NULL,
    recorded_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
