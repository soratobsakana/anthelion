-- Accounts table (../login) -
CREATE TABLE `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(16) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    `joined_at` datetime default current_timestamp,
    `country` varchar(30),
    `biography` varchar(240),
    `twitter` varchar(15),
    `instagram` varchar(30),
    `github` varchar(39),
    `discord` varchar(39),
    `website` varchar(200),
    `pfp` varchar(100) not null default '/assets/anthelion/default.png',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- https://codeshack.io/secure-login-system-php-mysql/#requirements -

-- Possible changes -
CREATE TABLE `users` (
	`user_id` int(11) AUTO_INCREMENT,
  `username` varchar(16) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) UNIQUE NOT NULL,
  `joined_at` datetime default current_timestamp,
  `country` varchar(30),
  `biography` varchar(240),
  

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- For pictures -
CREATE TABLE images (
  `image_id` int (11) AUTO_INCREMENT,
  `route` varchar(200) NOT NULL,
  `type` varchar(50)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Image and user relation -
CREATE TABLE users_images (
  `user_id` int(11),
  `image_id` int(11),
  PRIMARY KEY(user_id, image_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(image_id) REFERENCES images(image_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
















CREATE TABLE documentation (
    docId tinyint unsigned primary key auto_increment,
    docTitle varchar(100) not null unique,
    docSubject varchar(50),
    docDesc varchar(1000)
);