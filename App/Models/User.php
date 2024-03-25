<?php

namespace App\Models;

use App\Database;

class User
{

    public $key, $id, $user_name, $password, $image_path;

    function __construct($user)
    {
        $this->key = $user->key()->pathEndIdentifier() ?? null;
        $this->id = $user['id'];
        $this->user_name = $user['user_name'];
        $this->password = $user['password'];
        // Set imagePath to 'image_path' if it exists, otherwise set to null
        $this->image_path = $user['image_path'] ?? null;
    }

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

    // Create/Store a new user in datastore
    public static function Register($id, $username, $password, $image_path)
    {

        $datastore = Database::Client();

        // Create a user entity to insert into datastore.
        $key = $datastore->key('user');
        $entity = $datastore->entity($key, [
            'id' => $id,
            'user_name' => $username,
            'password' => $password,
            'image_path' => $image_path // Include the image path in the entity
        ]);
        $datastore->insert($entity);
    }

    // Update user password
    public function UpdatePassword($newPassword)
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
