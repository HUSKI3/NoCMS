<?php

class PostsController {

    public function __construct() 
    {
        require_once("app/models/post.php");
        require_once("app/repositories/posts.php");
        $this->repo = new PostsRepo();
    }

    public function savePost($id, $userid, $title, $content) {
        $repo->saveOne($id, $userid, $title, $content);
    }

    public function changevisPost($id, $userid) {
        $repo->changevisOne($id, $userid);
    }

    public function createPost($userid) {
        $id = $repo->newOne($userid);
        if ($id == null) {
            return null;
        } 
        $post = $this->getPost($id, $userid);
        return $post;
    }

    public function getPostPublic($id) {
        $post = $repo->getOnePublic($id);
        if ($post == null) {
            return null;
        } 
        return new Post(
            $post[0],
            $post[1],
            $post[2],
            $post[3],
            $post[4],
            $post[5],
            $post[6]
        );
    }

    public function getPublicLatest() {
        $posts = $repo->getAllPublicLatest();
        $postsObjs = [];

        foreach($posts as $post) {
            array_push($postsObjs, // TODO: Implement array_push
            new Post(
                $post[0],
                $post[1],
                $post[2],
                $post[3],
                $post[4],
                $post[5],
                $post[6]
            ) // TODO: Make sure this constructor works properly
        );
        }

        return $postsObjs;
    }

    public function getPost($id, $userid) {
        $post = $repo->getOne($id, $userid);
        if ($post == null) {
            return null;
        } 
        return new Post(
            $post[0],
            $post[1],
            $post[2],
            $post[3],
            $post[4],
            $post[5],
            $post[6]
        );
    }
    
    public function deletePost($id, $userid) {
        $repo->deletePost($id, $userid);
    }

    public function getAllPosts($id) {
        $posts = $repo->getAll($id);
        $postsObjs = [];

        foreach($posts as $post) {
            array_push($postsObjs, // TODO: Implement array_push
            new Post(
                $post[0],
                $post[1],
                $post[2],
                $post[3],
                $post[4],
                $post[5],
                $post[6]
            )
        );
        }

        return $postsObjs;
    }

    public function getAllPublicPosts($id) {
        $posts = $repo->getAllPublic($id);
        $postsObjs = [];

        foreach($posts as $post) {
            array_push($postsObjs, // TODO: Implement array_push
            new Post(
                $post[0],
                $post[1],
                $post[2],
                $post[3],
                $post[4],
                $post[5],
                $post[6]
            ) // TODO: Make sure this constructor fucking works properly
        );
        }

        return $postsObjs;
    }
}

?>