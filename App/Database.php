<?php

Namespace App;

use Google\Cloud\Firestore\FirestoreClient;

class Database {

      public static function Client()
      {
            return new FirestoreClient([
                  'keyFilePath' => '../s3903758-a1-c7625651eacc.json',
                  'projectId' => 's3903758-a1',
            ]);
      }
}