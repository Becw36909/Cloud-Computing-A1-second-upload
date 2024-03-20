<?php
Namespace App;

use Google\Cloud\Datastore\DatastoreClient;


Class Database {

    public static function Client()
    {

        $keyFilePath = __DIR__ . '/../s3903758-a1-task1-4196ee66073a.json';

        return new DatastoreClient([
            'projectId' => " s3903758-a1-task1",
            'keyFilePath' => $keyFilePath,
            'databaseId' => 'assignment1',
        ]);
    }
}