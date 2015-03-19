
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
