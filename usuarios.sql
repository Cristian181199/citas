----------------------------
-- Base de datos USUARIOS --
----------------------------

--Esquema:

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE users
(
    id          bigserial       PRIMARY KEY,
    username    varchar(255)    NOT NULL UNIQUE,
    password    varchar(255)    NOT NULL,
    email       varchar(100)    NOT NULL

)