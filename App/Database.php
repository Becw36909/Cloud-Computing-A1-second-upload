<?php
Namespace App;

use Google\Cloud\Datastore\DatastoreClient;


Class Database {

    public static function Client()
    {

        return new DatastoreClient([
            'projectId' => "task-1-417810",
            'databaseId' => 'task1',
        ]);
    }
}