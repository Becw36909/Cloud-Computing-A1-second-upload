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
  

  public static function GetImageDataFromBucket($userId)
  {
    // Register the gs:// stream wrapper
    $storage = new StorageClient();
    $storage->registerStreamWrapper();

    // Google Cloud Storage bucket name
    $bucketName = 's3903758-task1';

    // Construct the image file name using the user ID
    $fileName = $userId;

    // Specify the path to the image file in the bucket
    $filePath = "gs://{$bucketName}/{$fileName}";

    // Read the image file contents from the bucket
    $imageData = file_get_contents($filePath);

    // Check if the image data was retrieved successfully
    if ($imageData !== false) {
      // Return the image data
      return $imageData;
    } else {
      // If the file does not exist or could not be read, return null or handle accordingly
      return null;
    }
  }
  

}

