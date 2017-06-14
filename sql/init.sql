-- htu_student表
CREATE TABLE "htu_student" (
    "id" varchar(20) NOT NULL,
    "name" varchar(255) NOT NULL,
    "grade" int4 NOT NULL,
    "major" text NOT NULL,
    "sex" int2 NOT NULL,
    "collage" varchar(255) NOT NULL,
    "password" varchar(128),
    PRIMARY KEY ("id")
);

CREATE INDEX "student_name" ON "htu_student" USING btree ("name");

-- htu_admin表
CREATE TABLE "htu_admin" (
    "id" serial4 NOT NULL,
    "username" varchar(255) NOT NULL,
    "password" varchar(32),
    PRIMARY KEY ("id")
);

CREATE INDEX "admin_username" ON "htu_admin" USING btree ("username");
INSERT INTO htu_admin (username,password) VALUES ('admin',md5('admin'));

-- htu_teacher表
CREATE TABLE "htu_teacher" (
    "id" serial4 NOT NULL,
    "name" varchar(255),
    "collage" varchar(255),
    "password" varchar(32),
    PRIMARY KEY ("id")
);

CREATE INDEX "teacher_name" ON "htu_teacher" USING btree ("name");

CREATE TABLE "htu_subject" (
    "id" serial4,
    "name" varchar(255),
    "collage" varchar(255),
    "teacher" int4,
    PRIMARY KEY ("id"),
    CONSTRAINT "teacher_id" FOREIGN KEY ("teacher") REFERENCES "htu_teacher" ("id") ON DELETE SET NULL ON UPDATE NO ACTION
);

CREATE INDEX "subject_name" ON "htu_subject" USING btree ("name");

CREATE TABLE "htu_score" (
    "student" varchar(20) NOT NULL,
    "subject" int4 NOT NULL,
    "score" int4 DEFAULT NULL,
    PRIMARY KEY ("student", "subject"),
    CONSTRAINT "student_id" FOREIGN KEY ("student") REFERENCES "htu_student" ("id") ON DELETE CASCADE,
    CONSTRAINT "subject_id" FOREIGN KEY ("subject") REFERENCES "htu_subject" ("id") ON DELETE CASCADE
);




