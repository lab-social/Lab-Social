CREATE TABLE messages(
id INT AUTO_INCREMENT,
   sender VARCHAR(50),
   sender_id INT,
   reciever VARCHAR(50),
   reciever_id INT,
   title VARCHAR(50),
   body TEXT,
   publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id),
   FOREIGN KEY (sender_id) REFERENCES users(id),
   FOREIGN KEY (reciever_id) REFERENCES users(id)
);

CREATE TABLE messages(
id INT AUTO_INCREMENT,
   sender VARCHAR(50),
   subject VARCHAR(50),
   body TEXT,
   publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id),
);

CREATE TABLE mailboxes(
id INT AUTO_INCREMENT,
   message_id INT,
   username VARCHAR(50),
   user_id INT,
   mailbox VARCHAR(50),
   PRIMARY KEY(id),
   FOREIGN KEY (message_id) REFERENCES messages(id),
   FOREIGN KEY (user_id) REFERENCES users(id)
);


SELECT * FROM mailbox LEFT JOIN messages ON message.id = mailboxe.message_id WHERE user_mailboxes.user = "$user" AND user_mailboxes.mailbox = "Out";

ALTER TABLE messages ADD uni_id VARCHAR(100);