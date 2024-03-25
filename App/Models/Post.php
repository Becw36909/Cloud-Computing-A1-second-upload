<?php

namespace App\Models;

use App\Database;
use DateTime;


class Post
{

    public $key, $id, $username, $subject, $message, $created, $updated_at, $image_path;

    function __construct($post)
    {
        $this->key = $post->key()->pathEndIdentifier() ?? null;
        $this->id = $post['id'];
        $this->username = $post['user_name'];
        $this->subject = $post['subject'];
        $this->message = $post['message'];
        $this->created = $post['created_at'];
        $this->updated_at = $post['updated_at'];
        $this->image_path = $post['image_path'];

    }

    // Create/Store a new post in datastore
    public static function Store($id, $username, $subject, $message, $image_path)
    {

        $datastore = Database::Client();

        // Get current date and time
        $created = new DateTime();

        // Create a post entity to insert into datastore.
        $key = $datastore->key('post');
        $entity = $datastore->entity($key, [
            'id' => $id,
            'user_name' => $username,
            'subject' => $subject,
            'message' => $message,
            'created_at' => $created,
            'updated_at' => $created,
            'image_path' => $image_path,

        ]);
        $datastore->insert($entity);
    }

    // Find post by post key
    public static function Find($key)
    {

        $datastore = Database::Client();
        $key = $datastore->key('post', $key);

        $query = $datastore->query()
            ->kind('post')
            ->filter('__key__', '=', $key ); // Filter by user ID

        $results = $datastore->runQuery($query);

        foreach ($results as $post) {
                return new Post($post);
            
        }

        // Return false if post cannot be found
        return false;
    }

    // Find posts by user id
    public static function FindUserPosts($id)
    {

        $datastore = Database::Client();
        $posts = [];


        $query = $datastore->query()
            ->kind('post')
            ->filter('id', '=', $id); // Filter by user ID

        $results = $datastore->runQuery($query);


        foreach ($results as $entity) {
            $posts[] = new Post($entity);
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
        ->order('updated_at', 'DESCENDING') 
        ->limit(10);

        $results = $datastore->runQuery($query);

        foreach ($results as $entity) {
            $posts[] = new Post($entity);
        }

        return $posts;
    }

    
    // Update post 
    public function UpdatePost($key, $subject, $message, $image_path)
    {

        $datastore = Database::Client();

        $updated_at = new DateTime();

        $transaction = $datastore->transaction();
        $key = $datastore->key('post', $this->key);
        $post = $transaction->lookup($key);
        $post['subject'] = $subject;
        $post['message'] = $message;
        $post['updated_at'] = $updated_at;
        $post['image_path'] = $image_path;
        $transaction->update($post);
        $transaction->commit();
    }

}
