<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseeController extends Controller
{


    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/localhost-4a84a-d5a50c170236.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://localhost-4a84a.firebaseio.com/')
            ->create();
        
        $database = $firebase->getDatabase();
 
        $newPost = $database
            ->getReference('blog/posts')
            ->push([
                'title' => 'Post title',
                'body' => 'This should probably be longer.'
            ]);
        
        $newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        $newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        
        $newPost->getChild('title 2')->set('Changed post title 2');
        $newPost->getValue(); // Fetches the data from the realtime database
        var_dump(  $newPost->getValue());
       // $newPost->remove();
    }
}
