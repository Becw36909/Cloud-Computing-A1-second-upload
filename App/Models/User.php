<?php

namespace App\Models;
use App\Database;

class User 
{
    public static function find($userID) {
        $client = Database::client();

       $query= $client->collection('users')->where('ID', '=', $userID);
       $snapshot  = $query->documents();
     
      foreach($snapshot as $user) {
        return $user;
      }

      return false;
}
}