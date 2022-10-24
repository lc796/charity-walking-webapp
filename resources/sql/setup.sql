CREATE TABLE IF NOT EXISTS tbl_users (
  user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  is_admin BOOLEAN NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_teams (
    team_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(80) NOT NULL
);

CREATE TABLE IF NOT EXISTS tbl_distance_travelled (
    distance_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    log_date DATETIME NOT NULL,
    team_id INTEGER NOT NULL,
    distance_walked_miles INTEGER NOT NULL,
    FOREIGN KEY (team_id) REFERENCES tbl_teams(team_id)    
);