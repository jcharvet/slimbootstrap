<?php

$app->get(
    '/',
    function () use ($app, $c) {
        $app->view()->setData(array(
            'title' => 'Hello World',
            'body'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        ));
        $app->render('index.html');
    }
);

$app->get(
    '/test',
    function () use ($app, $c) {
        $app->view()->setData(array(
            'title' => 'Hello World TEST',
            'body'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        ));
        $app->render('index.html');
    }
);

$app->get('/users', function () use ($app, $c) {
    // Sample log message
   // $app->log->info("Slimboostrap '/users' route");

    /* create a new user */
    $user = new Users();
    $user->email = 'John@doe.com';
    $user->password = 'test1234';
    $user->username = 'John';
    $user->save();
    echo $user->toJson();

    echo "<br />";

    /* Get all users in table */
    $users = Users::all();
    echo $users->toJson();

    echo "<br />";

    /* get user by key */
    $users = Users::find(1);
    echo $users->toJson();

    echo Users::where('id', '=', 1)->update(array('active' => 1));

    echo "<br />";

    /* Relationship */
    /* belongsTo */
    $users = Users::with('user_profile')->where('id', '=', 1)->get();
    echo $users->toJson();
});
