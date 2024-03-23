<?php

namespace App\Models;

use App\Database;
use DateTime;


class Post
{

    public $key, $id, $username, $subject, $message, $datetime;

    function __construct($post)
    {
        $this->key = $post->key()->pathEndIdentifier() ?? null;
        $this->id = $post['id'];
        $this->username = $post['user_name'];
        $this->subject = $post['subject'];
        $this->message = $post['message'];
        $this->datetime = $post['datetime'];

    }

    // Create/Store a new post in datastore
    public static function Store($id, $username, $subject, $message)
    {

        $datastore = Database::Client();

        // Get current date and time
        $datetime = new DateTime();

        // Create a post entity to insert into datastore.
        $key = $datastore->key('post');
        $entity = $datastore->entity($key, [
            'id' => $id,
            'user_name' => $username,
            'subject' => $subject,
            'message' => $message,
            'datetime' => $datetime
        ]);
        $datastore->insert($entity);
    }

    // Find post by user ID
    public static function Find($id)
    {

        $datastore = Database::Client();

        $query = $datastore->query()
            ->kind('post');

        $results = $datastore->runQuery($query);

        foreach ($results as $post) {
            if ($post['id'] == $id) {
                return new Post($post);
            }
        }

        // Return false if post cannot be found
        return false;
    }


    // Find all post by user ID
    public static function FindUserPosts($id)
    {
        $datastore = Database::Client();

        $query = $datastore->query()
            ->kind('post')
            ->filter('id', '=', $id) // Filter by user ID
            ->order('datetime', 'DESCENDING'); // Assuming 'datetime' is the property representing the date and time posted

        $results = $datastore->runQuery($query);

        $posts = [];
        foreach ($results as $post) {
            $posts[] = new Post($post);
        }

        return $posts;
    }

    // Find all posts
    public static function FindRecentPosts()
    {
        $datastore = Database::Client();
        $posts = [];


        $query = $datastore->query()
            ->kind('post')
            ->order('datetime', 'DESCENDING') 
            ->limit(10);

        $results = $datastore->runQuery($query);

        foreach ($results as $entity) {
            $posts[] = new Post($entity);
        }

        return $posts;
    }

    // Update post - FINISH
    public function UpdatePost($newPassword)
    {

        $datastore = Database::Client();

        $transaction = $datastore->transaction();
        $key = $datastore->key('user', $this->key);
        $user = $transaction->lookup($key);
        $user['password'] = $newPassword;
        $transaction->update($user);
        $transaction->commit();
    }

}
