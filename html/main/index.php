<?php
    require_once __DIR__.'/../../php/classes/postClass.php';
    require_once __DIR__.'/../renderFunction.php';
    require_once __DIR__.'/../../php/dbConfig.php';
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MyOwnSmallTweeter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="well">
                Here should be a Form to create a new post as a certain user.
            </div>
            <?php 
                $allPosts = postWithEmail::loadAllPostsWithUserEmailOrderedByTime($conn);
                foreach($allPosts as $postWithEmailObject){
                    $data = [
                        'email' => $postWithEmailObject->getEmail(),
                        'content' => $postWithEmailObject->getContent(),
                        'date'    => $postWithEmailObject->getDateOfCreation()
                    ];
                 echo render('postTemplate.html', $data);
                }
            ?> 
     
        </div>
    </body>
</html>


