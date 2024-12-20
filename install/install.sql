CREATE TABLE IF NOT EXISTS todos (
	id VARCHAR(32) PRIMARY KEY,
	title VARCHAR(512) NOT NULL,
	completed VARCHAR(1) NOT NULL DEFAULT 'N',
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME NOT NULL DEFAULT NULL,
	completed_at DATETIME NOT NULL DEFAULT NULL,
);

INSERT INTO todos (id, title) VALUES ('1', 'Learn PHP');
INSERT INTO todos (id, title) VALUES ('2', 'Learn Java');
INSERT INTO todos (id, title) VALUES ('3', 'Learn JS');