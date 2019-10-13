DROP TABLE events;
DROP TABLE subject_event;
DROP TABLE calendar;
DROP TABLE user_info;

CREATE TABLE user_info (
    user_info_id        SERIAL NOT NULL PRIMARY KEY,
    u_username           VARCHAR(20) NOT NULL,
    u_password           VARCHAR(20) NOT NULL,
    first_name           VARCHAR(20) NOT NULL,
    last_name            VARCHAR(20) NOT NULL
);
CREATE TABLE calendar (
    calendar_id         SERIAL NOT NULL PRIMARY KEY,
    calendar_name       VARCHAR(20) NOT NULL,
    user_info_id        INT NOT NULL REFERENCES user_info(user_info_id)
);

CREATE TABLE subject_event (

    subject_event_id    SERIAL NOT NULL PRIMARY KEY,
    sesubject           VARCHAR(200) NOT NULL
);

CREATE TABLE events (

    event_id            SERIAL NOT NULL PRIMARY KEY,
    edescription        VARCHAR(200) NOT NULL,
    edate               DATE NOT NULL,
    etime               TIME NOT NULL,
    calendar_id         INT NOT NULL REFERENCES calendar(calendar_id),
    subject_event_id    INT NOT NULL REFERENCES subject_event(subject_event_id)
);

