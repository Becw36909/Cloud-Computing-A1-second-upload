<?php

namespace App\Models;

use App\Database;

class User
{

    public $id, $user_name, $password;

    function __construct($user)
    {
        $this->id = $user['id'];
        $this->user_name = $user['user_name'];
        $this->password = $user['password'];
    }

    // // // public static function Store($userId) {

    // // //     $datastore = Database::Client();
    // // //     // The Cloud Datastore key for the new entity
    // // //     $taskKey = $datastore->key('kind', 'name');
    // // //     // Prepares the new entity
    // // //     $task = $datastore->entity($taskKey, ['description' => 'description']);
    // // //     // Saves the entity
    // // //     $datastore->upsert($task);


    // // //     return $user;
    // // // }

    // Find user by user ID
    public static function Find($user_id)
    {

        $datastore = Database::Client();

        $query = $datastore->query()
            ->kind('user');

        $results = $datastore->runQuery($query);

        foreach ($results as $user) {
            if ($user['id'] == $user_id) {
                return new User($user);
            }
        }

        // Return false if user cannot be found
        return false;
    }

    // Find user by username
    public static function FindByUsername($username)
    {

        $datastore = Database::Client();

        $query = $datastore->query()
            ->kind('user');

        $results = $datastore->runQuery($query);

        foreach ($results as $user) {
            if ($user['user_name'] == $username) {
                return new User($user);
            }
        }

        // Return false if user cannot be found
        return false;
    }

    // Find user by username
    public static function CreateNewUser($id, $username, $password)
    {

        $datastore = Database::Client();

        // Create a user entity to insert into datastore.
        $key = $datastore->key('user');
        $entity = $datastore->entity($key, [
            'id' => $id,
            'user_name' => $username,
            'password' => $password,
        ]);
        $datastore->insert($entity);
    }
        



}
