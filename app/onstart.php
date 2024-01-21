<?php
// Move this to onstart.php or app.php later
$posts_sql = `
CREATE TABLE IF NOT EXISTS blog_posts (
  blogpostid INTEGER PRIMARY KEY AUTOINCREMENT,
  author INTEGER,
  coverimage TEXT,
  title TEXT,
  content TEXT,
  visibility TEXT DEFAULT 'private',
  posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (author) REFERENCES user(id)
);
`;

$users_sql = `
CREATE TABLE IF NOT EXISTS user (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username TEXT NOT NULL UNIQUE,
  name TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL
);`;
$conn = sql_connect("db.sql");
sql_query($conn, $posts_sql);
sql_query($conn, $users_sql);
?>