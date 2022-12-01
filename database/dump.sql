CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lastName  VARCHAR(255) NOT NULL,
    firstName VARCHAR(20)  NOT NULL,
    mail      VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    roles     INT          NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
    id      INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title   VARCHAR(200)    NOT NULL,
    content TEXT,
    date    DATETIME,
    image   VARCHAR(200)    NOT NULL,
    author  VARCHAR(40)     NOT NULL,
    idUser INT              NOT NULL,
    FOREIGN KEY(idUser) REFERENCES User (id)
);

CREATE TABLE IF NOT EXISTS Comment
(
    id      INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    date    DATETIME,
    author  VARCHAR(40)     NOT NULL,
    idUser  INT             NOT NULL,
    idPost  INT             NOT NULL,
    idComment INT,
    FOREIGN KEY(idUser) REFERENCES User (id),
    FOREIGN KEY(idPost) REFERENCES Post (id),
    FOREIGN KEY(idComment) REFERENCES Comment (id)
);




