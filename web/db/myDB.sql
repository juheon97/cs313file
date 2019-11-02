CREATE TABLE user_info (
    user_info_id         SERIAL NOT NULL PRIMARY KEY,
    u_username           VARCHAR(30) NOT NULL,
    u_password           VARCHAR(30) NOT NULL,
    first_name           VARCHAR(30) NOT NULL,
    last_name            VARCHAR(30) NOT NULL
);
CREATE TABLE form (
    form_id         SERIAL PRIMARY KEY,
    form_name       VARCHAR(30) NOT NULL,
    user_info_id        INT NOT NULL REFERENCES user_info(user_info_id)
);

CREATE TABLE events (

    event_id            SERIAL NOT NULL PRIMARY KEY,
    esubject            VARCHAR(200) NOT NULL,
    edescription        VARCHAR(max) NOT NULL,
    edate               DATE NOT NULL,
    etime               TIME NOT NULL,
    form_id             INT NOT NULL REFERENCES form(form_id)
);

