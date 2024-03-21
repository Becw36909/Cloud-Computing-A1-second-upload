<?php

namespace App\Models;

use App\Database;

class Post
{

    public $id, $subject, $message;

    function __construct($post)
    {
        $this->id = $post['id'];
        $this->subject = $post['subject'];
        $this->message = $post['message'];
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


    // Create/Store a new user in datastore
    public static function Store($id, $subject, $message)
    {

        $datastore = Database::Client();

        // Get current date and time
        $datetime = date('Y-m-d H:i:s');

        // Create a user entity to insert into datastore.
        $key = $datastore->key('post');
        $entity = $datastore->entity($key, [
            'id' => $id,
            'subject' => $subject,
            'message' => $message,
            'datetime' => $datetime
        ]);
        $datastore->insert($entity);
    }
        
    public static function FindRecentPosts($id)
{
    $datastore = Database::Client();

    $limit = 10;

    $query = $datastore->query()
        ->kind('post')
        ->filter('id', '=', $id) // Filter by user ID
        ->order('datetime', 'DESC') // Assuming 'datetime' is the property representing the date and time posted
        ->limit($limit);

    $results = $datastore->runQuery($query);

    $posts = [];
    foreach ($results as $post) {
        $posts[] = new Post($post);
    }

    return $posts;
}



}
