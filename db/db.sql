-- Accounts table (../login) -
CREATE TABLE `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(16) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- https://codeshack.io/secure-login-system-php-mysql/#requirements -

-- Possible changes -
CREATE TABLE `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(16) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    `birthday` date null,
    `created_at` datetime default current_timestamp,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;















CREATE TABLE documentation (
    docId tinyint unsigned primary key auto_increment,
    docTitle varchar(100) not null unique,
    docSubject varchar(50),
    docDesc varchar(1000)
);