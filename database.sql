
CREATE DATABASE IF NOT EXISTS project_management;
USE project_management;

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    status ENUM('Pending', 'In Progress', 'Completed')
        DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    task_name VARCHAR(150) NOT NULL,
    priority ENUM('Low', 'Medium', 'High') DEFAULT 'Medium',
    status ENUM('Pending', 'In Progress', 'Completed')
        DEFAULT 'Pending',
    due_date DATE NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id)
        ON DELETE CASCADE
);

INSERT INTO projects (name, description, status)
VALUES ('College Website', 'Sample academic project', 'In Progress');

INSERT INTO tasks (project_id, task_name, priority, status)
VALUES (1, 'Design Homepage', 'High', 'In Progress');
