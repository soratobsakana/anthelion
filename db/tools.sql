-- CURRENT TOOLS IN ANTHELION
-- IMAGES: server side for shareX / user uploads / images are displayed in grid
-- MUSIC: built-in player and file management for artists/albums/songs / user uploads
-- NOTES: simple notes app / text goes in textarea and simply store singledly on ../notes
-- CALENDAR: calendar with functionality (might remove this one since will prob not be used at all)
-- CONTACT: not sure if a table is needed for this (links at bio could be enough)
-- ANIME: anime selector / complete anime player / user can't upload / just a premise for ikanaide.com
-- MANGA: manga selector / manga reader / user can't upload / a premise just like anime one
-- LINKS: built-in link-shortener / ability to make and share groups of links with descriptions
-- TYPING: built-in typing app / follow text while changing colors / doesn't save stats
-- PORTFOLIO: list up the projects with a title, description and image
-- DOCUMENTATION: structure of Subject > Unit > Subunit > Content
-- BOOKMARKS: list up user-choosing titles for each link user wants to bookmark

-- Every tool will offer the posibility of making the content public

-- IMAGES ------------------------
CREATE TABLE images (
    `image_id` int(11) auto_increment,
    `path` varchar(255) unique not null,
    `public` char(1) not null default '0'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- BOOKMARKS ------------------------
CREATE TABLE bookmarks (
    `bookmark_id` int(11) auto_increment,
    `title` varchar(100) not null,
    `link` varchar(500) not null,
    
    `public` char(1) not null default '0'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;





CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE tool () ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;