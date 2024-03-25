<?php

Namespace App;

use Google\Cloud\Storage\StorageClient;

Class Storage {

  public static function UploadImageToCloudStorage($imageFile, $fileName)
  {
      $storage = new StorageClient();
  
      // Google Cloud Storage bucket name
      $bucketName = 's3903758-task1';
  
      $bucket = $storage->bucket($bucketName);
  
      // Upload file to Google Cloud Storage bucket with the given file name
      $object = $bucket->upload(
          fopen($imageFile['tmp_name'], 'r'),
          [
              'name' => $fileName,
          ]
      );
  
      // Construct the URL to the uploaded image
      $imageUrl = "https://storage.googleapis.com/{$bucketName}/{$fileName}";
  
      // Return the URL of the uploaded image
      return $imageUrl;
  }


}

