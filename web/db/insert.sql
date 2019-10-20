INSERT INTO user_info(u_username, u_password, first_name, last_name) VALUES ('jk0348', 'opl789456', 'Juheon', 'Song');

INSERT INTO calendar(calendar_name, user_info_id) VALUES ('School Work', 1);

INSERT INTO subject_event(sesubject, calendar_id) VALUES ('Cooking', 1);
INSERT INTO subject_event(sesubject, calendar_id) VALUES ('Studying', 1);

INSERT INTO events(edescription, edate, etime, calendar_id, subject_event_id) VALUES ('Prepare ingredients before 9 am', '2019-10-19', '10:00:00', 1, 1);
INSERT INTO events(edescription, edate, etime, calendar_id, subject_event_id) VALUES ('Finish weekly chapter reading - CS313', '2019-10-27', '12:00:00', 1, 2);
