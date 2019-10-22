<?php

/* sql stuff */

CREATE TABLE users (
    id_user int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username_user TINYTEXT NOT NULL,
    email_user TINYTEXT NOT NULL,
    pwd_user LONGTEXT NOT NULL
    );


?>