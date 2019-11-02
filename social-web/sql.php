

CREATE DATABASE social_lab;

CREATE TABLE users(
   id INT AUTO_INCREMENT,
   email VARCHAR(50),
   phone VARCHAR(50),
   username VARCHAR(50),
   password VARCHAR(255),
   is_admin TINYINT(1),
   register_date DATETIME,
   PRIMARY KEY(id)
);

CREATE TABLE profile(
   id INT AUTO_INCREMENT,
   user_id INT,
   city VARCHAR(50),
   state VARCHAR(50),
   about TEXT,
   PRIMARY KEY(id)
   FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE posts(
   id INT AUTO_INCREMENT,
   user_id INT,
   author VARCHAR(50),
   title VARCHAR(100),
   body TEXT,
   publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id),
   FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE comments(
   id INT AUTO_INCREMENT,
   post_id INT,
   user_id INT,
   body TEXT,
   publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id),
   FOREIGN KEY(user_id) references users(id),
   FOREIGN KEY(post_id) references posts(id)
);

CREATE TABLE friend_request(
	id INT AUTO_INCREMENT,
    user1_id INT,
    user2_id INT,
    body TEXT,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(user1_id) references users(id),
    FOREIGN KEY(user2_id) references users(id)
);

CREATE TABLE friend_accept(
	id INT AUTO_INCREMENT,
    user1_id INT,
    user2_id INT,
    request_id INT,
    body TEXT,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(user1_id) references users(id),
    FOREIGN KEY(user2_id) references users(id)
    FOREIGN KEY(request_id) references friend_request(id)
);

INSERT INTO users (email, phone, username, password) values ('1234@1234.com', '123-123-1234', 'username1', '1234'), ('1234@1234.com', '123-123-1234', 'username2', '1234'), ('1234@1234.com', '123-123-1234', 'username3', '1234'), ('1234@1234.com', '123-123-1234', 'username4', '1234'), ('1234@1234.com', '123-123-1234', 'username5', '1234'), ('1234@1234.com', '123-123-1234', 'username6', '1234'), ('1234@1234.com', '123-123-1234', 'username7', '1234'), ('1234@1234.com', '123-123-1234', 'username8', '1234'), ('1234@1234.com', '123-123-1234', 'username9', '1234'), ('1234@1234.com', '123-123-1234', 'username0', '1234')

INSERT INTO posts (user_id, domain_num, author, title, body) values ('1', '4', 'Aunt Rose', 'Another Essay', ' some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words some words.')

SELECT
posts.body,
friend_accept.body
FROM posts
LEFT JOIN friend_accept ON friend_accept.user1_id = posts.user_id;

SELECT
users.*,
friend_accept.*
FROM users
LEFT JOIN friend_accept ON (friend_accept.user1_id = users.id XOR friend_accept.user2_id = users.id);


SELECT * from users LEFT JOIN friend_accept ON users.id = friend_accept.user1_id 

SELECT username from users LEFT JOIN friend_accept ON (users.id = friend_accept.user1_id OR users.id = friend_accept.user2_id) WHERE friend_accept.accept = 1


select all from friends where (1 or 2) 

SELECT
users.username,
FROM users
LEFT JOIN friend_accept ON (users.id = friend_accept.user1_id OR users.id = friend_accept.user2_id);

SELECT username FROM users WHERE NOT EXISTS (SELECT * FROM friend_accept WHERE (users.id = friend_accept.user1_id OR users.id = friend_accept.user2_id));


   SELECT username FROM users WHERE NOT EXISTS (SELECT * FROM friend_accept WHERE (friend_accept.user1_id = 1 OR friend_accept.user2_id = 1));


   CREATE TABLE profile_img (
      id int(11) not null PRIMARY KEY AUTO_INCREMENT,
      user_id int(11) not null,
      status int(11) not null,
   )

	$query5b = '(SELECT * FROM friend_accept WHERE (user2_id = '.$user2id.' OR user1_id = '.$user2id.') AND accept = 1) UNION (SELECT * FROM users WHERE (users.id = friend_accept.user1_id OR users.id = friend_accept.user2_id )';


   $querye = 'SELECT * FROM users WHERE NOT EXISTS ((SELECT * FROM friend_accept WHERE users.id = friend_accept.user1_id) UNION  (SELECT * FROM friend_accept WHERE users.id = friend_accept.user2_id));';

   if($friend['user1_id'] !== $_SESSION['userId']) {
                $profile = $friend['user1_id'];
                } elseif($friend['user2_id'] !== $_SESSION['userId']) {
                $profile = $friend['user2_id'];
                }

(SELECT
   users.id
   users.username,
   users.about,
   friend_accept.user1_id,
   friend_accept.user2_id
   FROM users
   LEFT JOIN friend_accept ON friend_accept.user1_id = users.id)
UNION
(SELECT
   users.id
   users.username,
   users.about,
   friend_accept.user1_id,
   friend_accept.user2_id
   FROM users
   LEFT JOIN friend_accept ON friend_accept.user2_id = users.id)
WHERE users.id != $user2id;


(SELECT
		users.id,
		users.username,
		users.about,
		friend_accept.user1_id,
		friend_accept.user2_id
		FROM users
		LEFT JOIN friend_accept ON friend_accept.user1_id = users.id
		WHERE users.id != 1
		AND friend_accept.user1_id IS NOT NULL
		AND friend_accept.user2_id IS NOT NULL)
		UNION 
		(SELECT
		users.id,
		users.username,
		users.about,
		friend_accept.user1_id,
		friend_accept.user2_id
		FROM users
		LEFT JOIN friend_accept ON friend_accept.user2_id = users.id
		WHERE users.id != 1
      AND friend_accept.user1_id IS NOT NULL
		AND friend_accept.user2_id IS NOT NULL)


      CREATE TABLE friend_accept1(
	id INT AUTO_INCREMENT,
    user1_id INT,
    user2_id INT,
    request_id INT,
    sender VARCHAR(55),
    accept TINYINT(1) DEFAULT 0,
    work TINYINT(1) DEFAULT 0,
    social TINYINT(1) DEFAULT 0,
    school TINYINT(1) DEFAULT 0,
    family TINYINT(1) DEFAULT 0,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(user1_id) references users(id),
    FOREIGN KEY(user2_id) references users(id),
    FOREIGN KEY(request_id) references friend_request(id)
);

SELECT username,title,body
FROM users,posts,friend_accept1
WHERE users.id = posts.user_id
AND user.id = friend_request.user1_id


SELECT username,title,body
FROM users,posts,friend_accept1
WHERE users.id = posts.user_id
AND users.id = friend_accept1.user1_id

user.username, posts.author, posts.id, posts.title, posts.body, posts.publish_date


(SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
FROM posts
INNER JOIN users
ON posts.user_id = users.id
INNER JOIN friend_accept1
ON friend_accept1.user1_id = users.id WHERE user2_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2)
UNION
(SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
FROM posts
INNER JOIN users
ON posts.user_id = users.id
INNER JOIN friend_accept1
ON friend_accept1.user2_id = users.id WHERE user1_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2)
UNION
(SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
FROM posts
INNER JOIN users
ON posts.user_id = users.id
INNER JOIN friend_accept1
ON friend_accept1.user1_id = users.id WHERE user2_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2)
UNION
(SELECT posts.author, posts.id, posts.title, posts.body, posts.publish_date, users.id as userID
FROM posts
INNER JOIN users
ON posts.user_id = users.id
INNER JOIN friend_accept1
ON friend_accept1.user2_id = users.id WHERE user1_id = 1 AND friend_accept1.accept = 1 AND posts.domain_num = 2);

$sqlImg = "SELECT * FROM profile_img WHERE user_id='$id'";
            $resultImg = mysqli_query($conn,$sqlImg);
            $rowImg = mysqli_fetch_assoc($resultImg);
            mysqli_free_result($resultImg);

                echo "<div>";

                if($rowImg['status'] == 0) {
                    echo "<img src='uploads.profile".$id.".jpg'>";
                } else {
                    echo "<img src='images/testtube.jpg'>";
                }
                echo "<div>";

                
                if($proImg['status'] == 1) {
                                echo "<img src='uploads/profile.".$tempid.".jpg'>";
                            } else {
                                echo "<img src='images/testtube.jpg'>";
                            }

ALTER TABLE users ADD pic_status VARCHAR(3) NOT NULL DEFAULT 0;

$value = ($condition) ? 'Truthy Value' : 'Falsey Value';


INSERT INTO profile_img (user_id, status) VALUES ('1', '0'), ('16', '0'), ('17', '0'), ('18', '0'), ('29', '0'), ('30', '0'), ('31', '0'), ('32', '0'), ('33', '0'), ('34', '0'), ('35', '0'), ('36', '0'), ('37', '0'), ('38', '0');




$query = 'SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 2 AND friend_accept1.social = 1';
$query = 'SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 3 AND friend_accept1.school = 1
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 4 AND friend_accept1.family = 1';










$query = 'SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1';
$query = 'SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user2_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user1_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1
UNION
SELECT
posts.domain_num,
posts.author,
posts.body,
posts.title,
posts.publish_date,
users.id AS userID,
users.username
FROM posts
INNER JOIN users ON users.id = posts.user_id
INNER JOIN friend_accept1 ON users.id = friend_accept1.user1_id WHERE friend_accept1.user2_id = '.$user2id.' AND friend_accept1.accept = 1 AND posts.domain_num = 1 AND friend_accept1.work = 1';

?>

<?php

// change username

// if(isset($_POST['username-update'])) {

//    $msg = '';
//    $msgClass = '';
//    $msgButton = 0;

//    $username1 = htmlspecialchars($_POST['username1']);
//    $username2 = htmlspecialchars($_POST['username2']);
//    $username3 = htmlspecialchars($_POST['username3']);
//    $password1 = htmlspecialchars($_POST['password1']);

//    if(empty($username1) || empty($username2) || empty($username3) || empty($password1)) {
//        // error fill in all fields
//        $msg = 'please fill in all fields';
//        $msgClass = 'reg-dang';
//        $msgButton = 2;
//    } elseif($username2 !== $username3) {
//        // error usernames do not match   
//        $msg = 'user names do not match';
//        $msgClass = 'reg-dang';
//        $msgButton = 2;   
//    } 
//    // elseif($upass1 !== $upass2) {
//    //     // error passwords do not match   
//    //     $msg = 'passwords do not match';
//    //     $msgClass = 'reg-dang';
//    //     $msgButton = 2;
//    // } 
//    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username3)) {
//        // error invalid username    
//        $msg = 'invalid username';
//        $msgClass = 'reg-dang';
//        $msgButton = 2;
//    } else {
//        $sql = "SELECT username FROM users WHERE username=?";
//        $stmt = mysqli_stmt_init($conn);

//        if(!mysqli_stmt_prepare($stmt, $sql)) {
//            // error sql error
//            $msg = 'sql error';
//            $msgClass = 'reg-dang';
//            $msgButton = 2;
//        } else {
//            mysqli_stmt_bind_param($stmt, "s", $username3);
//            mysqli_stmt_execute($stmt);
//            mysqli_stmt_store_result($stmt);
//            $resultCheck = mysqli_stmt_num_rows($stmt);

//            if($resultCheck > 0) {
//                // error username taken
//                $msg = 'username unavailable';
//                $msgClass = 'reg-dang';
//                $msgButton = 2;
//            } else {
//                $sqlxyz = "SELECT * FROM users WHERE username=?";
//                $stmt = mysqli_stmt_init($conn);
//                if (!mysqli_stmt_prepare($stmt, $sqlxyz)) {
//                    $msg = 'data error';
//                    $msgClass = 'reg-dang';
//                    $msgButton = 2;
//                } else {
//                mysqli_stmt_bind_param($stmt, "s", $username1);
//                mysqli_stmt_execute($stmt);
//                $result = mysqli_stmt_get_result($stmt);
   
//                if ($row = mysqli_fetch_assoc($result)) {
//                    $passcheck = password_verify($username1, $row['password']);
//                    if ($passcheck == false) {
//                        $msg = 'wrong password';
//                        $msgClass = 'reg-dang';
//                        $msgButton = 2;
//                    } elseif($passcheck == true) {
//                         // $sql = "INSERT INTO users (username, email, phone, password, firstname, lastname, about, city, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
//                                    $sqlx = "UPDATE users SET 
//                                    status=?
//                                    WHERE user_id = {$_SESSION['userId']}";

//                            $stmt = mysqli_stmt_init($conn);
                           
//                            if(!mysqli_stmt_prepare($stmt, $sqlx)) {
//                                // error sql error
//                                $msg = 'sql error';
//                                $msgClass = 'reg-dang';
//                                $msgButton = 2;
//                            } else {
//                                // $hashedPwd = password_hash($upass1, PASSWORD_DEFAULT);
//                                // mysqli_stmt_bind_param($stmt, "sssssssss", $uname1, $uemail, $uphone, $hashedPwd, $ufirst, $ulast, $uabout, $ucity, $ustate);
//                                mysqli_stmt_bind_param($stmt, "s", $username3);
//                                mysqli_stmt_execute($stmt);
//                                // success 
//                                $msg = 'successfully registered';
//                                $msgClass = 'reg-success';
//                                $msgButton = 1; 
//                            } 

//                        } else {
//                        $msg = 'password error';
//                        $msgClass = 'reg-dang';
//                        $msgButton = 2;
//                    } 
//                } else {
//                    $msg = 'username error';
//                    $msgClass = 'reg-dang';
//                    $msgButton = 2;
//            }
//        }
//    }
// } 
   
// }

// }


// if(isset($_POST['username-update'])) {

//    $msg = '';
//    $msgClass = '';
//    $msgButton = 0;

//    $username1 = htmlspecialchars($_POST['username1']);
//    $username2 = htmlspecialchars($_POST['username2']);
//    $password1 = htmlspecialchars($_POST['password1']);
//    $username3 = htmlspecialchars($_POST['username3']);
   
//    if(empty($username1) || empty($username2) || empty($username3) || empty($password1)) {
//       // error fill in all fields
//       $msg = 'please fill in all fields';
//       $msgClass = 'reg-dang';
//       $msgButton = 2;
//       }else {
//          $sql = "SELECT * FROM users WHERE username=?;";
//          $stmt = mysqli_stmt_init($conn);
//          if (!mysqli_stmt_prepare($stmt, $sql)) {
//              $msg = 'data error';
//              $msgClass = 'reg-dang';
//              $msgButton = 2;
//          } else {
 
//              mysqli_stmt_bind_param($stmt, "s", $lusername);
//              mysqli_stmt_execute($stmt);
//              $result = mysqli_stmt_get_result($stmt);
 
//              if ($row = mysqli_fetch_assoc($result)) {
//                  $passcheck = password_verify($lpassword, $row['password']);
//                  if ($passcheck == false) {
//                      $msg = 'wrong password';
//                      $msgClass = 'reg-dang';
//                      $msgButton = 2;
//                  } else if ($passcheck == true) {
//                      // success
//                      if($username2 !== $username3) {
//                         // error usernames do not match   
//                         $msg = 'user names do not match';
//                         $msgClass = 'reg-dang';
//                         $msgButton = 2;   
//                     }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username3)) {
//                      // error invalid username    
//                      $msg = 'invalid username';
//                      $msgClass = 'reg-dang';
//                      $msgButton = 2;
//                      } $sqlx = "UPDATE users SET 
//                      status=?
//                      WHERE user_id = {$_SESSION['userId']}";

//              $stmt = mysqli_stmt_init($conn);
             
//              if(!mysqli_stmt_prepare($stmt, $sqlx)) {
//                  // error sql error
//                  $msg = 'sql error';
//                  $msgClass = 'reg-dang';
//                  $msgButton = 2;
//              } else {
//                  mysqli_stmt_bind_param($stmt, "s", $username3);
//                  mysqli_stmt_execute($stmt);
//                  // success 
//                  $msg = 'successfully registered';
//                  $msgClass = 'reg-success';
//                  $msgButton = 1; 
//              } 
//                      // success

//                  } else {
//                      $msg = 'password error';
//                      $msgClass = 'reg-dang';
//                      $msgButton = 2;
//                  }
//              } else {
//                  $msg = 'username error';
//                  $msgClass = 'reg-dang';
//                  $msgButton = 2;
//              }
//          }
//      }
// }

if(isset($_POST['username-update'])) {

    //     $msg = '';
    //     $msgClass = '';
    //     $msgButton = 0;
     
    //     $username1 = htmlspecialchars($_POST['username1']);
    //     $username2 = htmlspecialchars($_POST['username2']);
    //     $password1 = htmlspecialchars($_POST['password1']);
    //     $username3 = htmlspecialchars($_POST['username3']);
        
    //     if(empty($username1) || empty($username2) || empty($password1) || empty($username3)) {
    //        // error fill in all fields
    //        $msg = 'please fill in all fields';
    //        $msgClass = 'reg-dang';
    //        $msgButton = 2;
    //        } else {
    //           $sql = "SELECT * FROM users WHERE username=?";
    //           $stmt = mysqli_stmt_init($conn);
    //           if (!mysqli_stmt_prepare($stmt, $sql)) {
    //               $msg = 'data error';
    //               $msgClass = 'reg-dang';
    //               $msgButton = 2;
    //           } else {
    //               mysqli_stmt_bind_param($stmt, "s", $username1);
    //               mysqli_stmt_execute($stmt);
    //               $result = mysqli_stmt_get_result($stmt);
      
    //               if ($row = mysqli_fetch_assoc($result)) {
    //                   $passcheck = password_verify($password1, $row['password']);
    //                   if ($passcheck == false) {
    //                       $msg = 'wrong password';
    //                       $msgClass = 'reg-dang';
    //                       $msgButton = 2;
    //                   } elseif($passcheck == true) {
    //                       // success
    //                       if($username2 !== $username3) {
    //                          // error usernames do not match   
    //                          $msg = 'user names do not match';
    //                          $msgClass = 'reg-dang';
    //                          $msgButton = 2;   
    //                      }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username3)) {
    //                       // error invalid username    
    //                       $msg = 'invalid username';
    //                       $msgClass = 'reg-dang';
    //                       $msgButton = 2;
    //                       } else { 
    //                         $sqlx = "UPDATE users 
    //                         SET username=?
    //                         WHERE user_id = {$_SESSION['userId']}";
    
    //                         $stmt2 = mysqli_stmt_init($conn);
                  
    //                         if(!mysqli_stmt_prepare($stmt2, $sqlx)) {
    //                             // error sql error
    //                             $msg = 'sql error';
    //                             $msgClass = 'reg-dang';
    //                             $msgButton = 2;
    //                         } else {
    //                             mysqli_stmt_bind_param($stmt2, "s", $username3);
    //                             mysqli_stmt_execute($stmt2);
    //                             // success 
    //                             $msg = 'successfully registered';
    //                             $msgClass = 'reg-success';
    //                             $msgButton = 1; 
    //                         } 
                        
    //                     }
    //                 } 
    //             }
    //         }
    //     }
    // }
    

// change username
if(isset($_POST['username-update'])) {

    $msg = '';
    $msgClass = '';
    $msgButton = 0;
 
    $username1 = htmlspecialchars($_POST['username1']);
    $username2 = htmlspecialchars($_POST['username2']);
    $password1 = htmlspecialchars($_POST['password1']);
    $username3 = htmlspecialchars($_POST['username3']);
    
    if(empty($username1) || empty($username2) || empty($password1) || empty($username3)) {
       // error fill in all fields
       $msg = 'please fill in all fields';
       $msgClass = 'reg-dang';
       $msgButton = 2;
       } else if ($username2 !== $username3) {
        // error usernames do not match   
        $msg = 'user names do not match';
        $msgClass = 'reg-dang';
        $msgButton = 2;
       } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username3)) {
        // error invalid username    
        $msg = 'invalid username';
        $msgClass = 'reg-dang';
        $msgButton = 2;
        } else {
        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $msg = 'data error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            $sqlzzz = "SELECT username FROM users WHERE username=?";
                    $stmt2 = mysqli_stmt_init($conn);
            
                    if(!mysqli_stmt_prepare($stmt2, $sqlzzz)) {
                        // error sql error
                        $msg = 'sql error';
                        $msgClass = 'reg-dang';
                        $msgButton = 2;
                    } else {
                        mysqli_stmt_bind_param($stmt2, "s", $username3);
                        mysqli_stmt_execute($stmt2);
                        mysqli_stmt_store_result($stmt2);
                        $resultCheck = mysqli_stmt_num_rows($stmt2);
            
                        if($resultCheck > 0) {
                            // error username taken
                            $msg = 'username unavailable';
                            $msgClass = 'reg-dang';
                            $msgButton = 2;
                        } else {
            mysqli_stmt_bind_param($stmt, "s", $username1);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($password1, $row['password']);
                if ($passcheck == false) {
                    $msg = 'wrong password';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else if ($passcheck == true) {
//
            $sqlx = "UPDATE users 
            SET username=?
            WHERE user_id = {$_SESSION['userId']}";

            $stmt2 = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt2, $sqlx)) {
                // error sql error
                $msg = 'sql error';
                $msgClass = 'reg-dang';
                $msgButton = 2;
            } else {
                mysqli_stmt_bind_param($stmt2, "s", $username3);
                mysqli_stmt_execute($stmt2);
                // success 
                $msg = 'successfully registered';
                $msgClass = 'reg-success';
                $msgButton = 1; 
                                header("Location: profile-edit.php");
                                exit(); }

                } else {
                    $msg = 'password error';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                }
            } else {
                $msg = 'username error';
                $msgClass = 'reg-dang';
                $msgButton = 2;
            }
        }
    }
}
}

//

// MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM

//


if (isset($_POST['password-update'])) {

    $username4 = $_POST['username4'];
    $password5 = $_POST['password2'];
    $password6 = $_POST['password3'];
    $password7 = $_POST['password4'];

    if (empty($username3) || empty($password5) || empty($password6) || empty($password7)) {
        $msg = 'please fill in all fields';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } else {
        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $msg = 'data error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username5);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passcheck = password_verify($password5, $row['password']);
                if ($passcheck == false) {
                    $msg = 'wrong password';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else if ($password6 !== $password7) {
                    // error passwords do not match   
                    $msg = 'passwords do not match';
                    $msgClass = 'reg-dang';
                    $msgButton = 2;
                } else if ($passcheck == true) {
                    
                    $sqlaabb = "UPDATE users 
                    SET password=?
                    WHERE id = {$_SESSION['userId']}";
                            
                            if(!mysqli_stmt_prepare($stmt, $sqlaabb)) {
                                // error sql error
                                $msg = 'sql error';
                                $msgClass = 'reg-dang';
                                $msgButton = 2;
                            } else {
                                $hashedPwd = password_hash($password6, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
                                mysqli_stmt_execute($stmt);
                                // success 
                                $msg = 'successfully registered';
                                $msgClass = 'reg-success';
                                $msgButton = 1;
                                header("Location: profile-edit.php");
                                exit();
                            }
                        }
                    } else {
                        $msg = 'password error';
                        $msgClass = 'reg-dang';
                        $msgButton = 2; } 
                }
            } 
        } else {
            $msg = 'username error';
            $msgClass = 'reg-dang';
            $msgButton = 2;
        }
    }

}




for($i = 0;$i = $res;$i = $i){
    $sqlc = "SELECT * FROM posts WHERE id=?";
    $stmtc = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmtc, $sqlc)) {
        // error sql error
        $msg = 'sql error';
        $msgClass = 'reg-dang';
        $msgButton = 2;
    } else {
        mysqli_stmt_bind_param($stmtc, "s", $uname1);
        mysqli_stmt_execute($stmtc);
        mysqli_stmt_store_result($stmtc);
        $resultCheck = mysqli_stmt_num_rows($stmtc);

        if($resultCheck > 0) {
            // error username taken
            $res=1;
        } else {
            $res=0;
}
    
}
}
