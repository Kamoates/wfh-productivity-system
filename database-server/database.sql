CREATE TABLE `chat` (
    `chatID` INT PRIMARY KEY AUTO_INCREMENT,
    `userID` INT,
    `chatroomID` INT,
    `message` VARCHAR(100),
    `chat_date` DATE
);

CREATE TABLE `chatroom` (
    `chatroomID` INT PRIMARY KEY AUTO_INCREMENT,
    `room_name` VARCHAR(15),
    `date_created` DATE,
    `chat_password` VARCHAR(10),
    `userID` INT
);

CREATE TABLE `user` (
    `userID` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(15) UNIQUE,
    `password` VARCHAR(10),
    `first_name` VARCHAR(20),
    `last_name` VARCHAR(20),
    `access` BOOLEAN
);

CREATE TABLE `mails` (
    `mailID` INT AUTO_INCREMENT PRIMARY KEY,
    `userID` INT,
    `subject` VARCHAR(40),
    `content` VARCHAR(200),
    `date` DATE
);

CREATE TABLE `task_avg` (
	`task_id` INT AUTO_INCREMENT PRIMARY KEY,
    `task_name` VARCHAR(30),
    `avg_time` FLOAT(4, 2),
    `n` INT
);

CREATE TABLE `tasks` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `taskID` INT,
    `name` VARCHAR(20),
    `description` VARCHAR(50),
    `time` FLOAT(4,2),
    `start_time` DATETIME,
    `userID` INT
);

INSERT INTO `task_avg`(`task_name`, `avg_time`, `n`) VALUES
('creating exams', 4, 0),
('computing grades', 4, 0),
('attending classes', 2, 0),
('attending meeting', 1, 0);    

INSERT INTO `chatroom` (`chatroomID`, `room_name`, `date_created`, `chat_password`, `userID`) VALUES
(1, 'My First Chat Room', '2017-09-11', 'suckdick', 2),
(2, 'Free Entrance :)', '2017-09-11', '', 3),
(3, 'Admin Chat Room', '2017-09-11', '', 1);

INSERT INTO `user` (`userID`, `username`, `password`, `first_name`, `last_name`, `access`) VALUES
(1, 'admin', 'admin123', 'John', 'Doe', true),
(2, 'user01', 'password123', 'Albert', 'Einstein', false),
(3, 'user02', 'password123', 'Isaac', 'Newton', false);

INSERT INTO `chat` (`chatID`, `userID`, `chatroomID`, `message`, `chat_date`) VALUES
(1, 2, 1, 'Hello World', '2020-06-12'),
(2, 3, 1, 'Hello World2', '2020-06-12'),
(3, 1, 1, 'Hello World3', '2020-06-12'),
(4, 1, 1, 'Hello World4', '2020-06-12');