
-----------------------------------------------------------------------
-- user
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [user];

CREATE TABLE [user]
(
    [id] INTEGER NOT NULL PRIMARY KEY,
    [user_name] VARCHAR(255) NOT NULL,
    [password] VARCHAR(255) NOT NULL,
    [salt] VARCHAR(255) NOT NULL
);

-----------------------------------------------------------------------
-- keywords
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [keywords];

CREATE TABLE [keywords]
(
    [id] INTEGER NOT NULL PRIMARY KEY,
    [name] VARCHAR(255) NOT NULL,
    [user_id] INTEGER NOT NULL,
    [weight] INTEGER NOT NULL
);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY ([user_id]) REFERENCES user ([id])

-----------------------------------------------------------------------
-- news
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [news];

CREATE TABLE [news]
(
    [id] INTEGER NOT NULL PRIMARY KEY,
    [bbc_id] VARCHAR(50) NOT NULL,
    [url] VARCHAR(255) NOT NULL,
    [image] VARCHAR(255) NOT NULL,
    [title] VARCHAR(10000) NOT NULL,
    [content] VARCHAR(10000) NOT NULL,
    [short_content] VARCHAR(10000) NOT NULL,
    [keywords] VARCHAR(10000) NOT NULL,
    [location] VARCHAR(10000) NOT NULL
);

-----------------------------------------------------------------------
-- location
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [location];

CREATE TABLE [location]
(
    [id] INTEGER NOT NULL PRIMARY KEY,
    [area] VARCHAR(255) NOT NULL,
    [user_id] INTEGER NOT NULL
);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY ([user_id]) REFERENCES user ([id])
