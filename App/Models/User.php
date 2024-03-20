<?php 

namespace App\Models;

use App\Database;
use Google\Cloud\Datastore\Query\Query;

class User {

    public $id, $user_name, $password;

    function __construct($user) {
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

    // Find user by email address
    public static function Find($user_id) {

        $datastore = Database::Client();

        $query = $datastore->query()
                           ->kind('users');             
        
        $results = $datastore->runQuery($query);

        foreach($results as $user) {
            if($user['ID'] == $user_id) {
                return new User($user);
            }
        }

        // Return false if user cannot be found
        return false;

    }

}
