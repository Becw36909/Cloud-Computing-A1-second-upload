<?php

Namespace App;

use Google\Cloud\Storage\StorageClient;

  $storage = new StorageClient();
  $storage->registerStreamWrapper();

  $storage = new StorageClient();

  $bucket = $storage->bucket('s3903758-task1');


  
  // Upload a file to the bucket.
  $bucket->upload(
      fopen('/data/file.txt', 'r')
  );
  
  
  // Download and store an object from the bucket locally.
  $object = $bucket->object('file_backup.txt');
  $object->downloadToFile('/data/file_backup.txt');
?>