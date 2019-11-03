INSERT INTO user_info(u_username, u_password, first_name, last_name) VALUES ('jk0348', 'opl789456', 'Juheon', 'Song');

INSERT INTO form(form_name, user_info_id) VALUES ('School Work', 1);
INSERT INTO form(form_name, user_info_id) VALUES ('Courses', 1);
INSERT INTO form(form_name, user_info_id) VALUES ('Week day', 1);

INSERT INTO events(esubject, edescription, edate, form_id) VALUES ('Rel 351', 'Finish writing Journal 6', '2019-10-19', 1);
INSERT INTO events(esubject, edescription, edate, form_id) VALUES ('CS 313', 'Finish reading chapter I', '2019-10-27', 1);