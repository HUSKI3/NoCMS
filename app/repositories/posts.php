<?php
namespace PostsRepo;
require_once("app/repositories/repo.php");

class PostsRepo extends Repository {
    // Get all with a given author
    function getAll($id)
    {
            $sql = "SELECT * FROM blog_posts WHERE author=?";
            $posts = sql_query_sane($this->conn, $sql, [$id]);

            return $posts;
    }

    function getAllPublic($id)
    {
            $sql = "SELECT * FROM blog_posts WHERE author=? AND visibility='public'";
            $posts = sql_query_sane($this->conn, $sql, [$id]);

            return $posts;
    }

    function getAllPublicLatest()
    {
            $sql = "SELECT * FROM blog_posts WHERE visibility='public' ORDER BY posted_date DESC LIMIT 10;";
            $posts = sql_query($this->conn, $sql);

            return $posts;
    }


    function getOne($id, $userid)
    {
            $sql = "SELECT * FROM blog_posts WHERE blogpostid=? AND author=?";
            $posts = sql_query_sane($this->conn, $sql, [$id, $userid]);
            $num = count($posts);

            if ($num == 0) {
                return null;
            } 
            return $posts[0];
    }

    function saveOne($id, $userid, $title, $content)
    {
            $sql = "UPDATE blog_posts SET title=?, content=? WHERE blogpostid=? AND author=?;";
            $posts = sql_commit_sane($this->conn, $sql, [$title, $content, $id, $userid]);
    }

    function changevisOne($id, $userid) 
    {
            $sql = `UPDATE blog_posts 
            SET visibility = CASE WHEN visibility = 'public' THEN 'private' 
            ELSE 'public' END 
            WHERE blogpostid=? AND author=?;`;
            $posts = sql_commit_sane($this->conn, $sql, [$id, $userid]);
    }

    // Public
    function getOnePublic($id) 
    {
        $sql = "SELECT * FROM blog_posts WHERE blogpostid=? AND visibility='public'";
        $posts = sql_query_sane($this->conn, $sql, [$id]);
        $num = count($posts);

        if ($num == 0) {
                return null;
        } 

        return $posts[0];

    }

    public function newOne($userid) {
        $title = 'Untitled Document';
        $content = 'This is the beginning of your wonderful post.';
        $cover_image = 'http://placekitten.com/286/180';
        $visibility = 'private';
        $sql = "INSERT INTO blog_posts (author, coverimage, title, content, visibility) VALUES (?, ?, ?, ?, ?)";
        // sql_commit_sane (DBSANECOMMIT of DBCOMMON) returns a last_rowid, null (Nil) if failed 
        return sql_commit_sane($this->conn, $sql, [$userid, $cover_image, $title, $content, $visibility]);
    }

    public function deletePost($id, $userid) {
        $sql = "DELETE FROM blog_posts WHERE blogpostid = ? AND author = ?;";
        sql_commit_sane($this->conn, $sql, [$id, $userid]);
        // Nothing to return
    }
}

?>