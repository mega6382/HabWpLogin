# HabWpLogin

WP Login functionality for external sources.

Installation
-----------

Copy files from `wp-site` directory to the root of your WordPress website.

Copy files from `other-site` directory to where you want to access this API from.


How To Use
----------

Send POST params `user` and `pass` to *hab-wp-login.php*	located inside `wp-site`. And it will return user data like json_encoded: username, name, email, rank, capabilities etc.

To use script inside `other-site`. Simply include the *HabWpLogin.php*, to your code and call the `HabWpLogin` class. here is an example:

    <?php
    
    include "path/to/HabWpLogin.php";
    //Login Data username and password
    $data = [
    		"user" => "user123",
    		"pass" => "pass123",
    	];
    //Path to the hab-wp-login.php located on the server with wordpress installation.
    $pathWp = "path/to/hab-wp-login.php";
    
    //Contains the array with user information
    $login = HabWpLogin::doLogin($data, $pathWp);
    
To use multiple authentications to keep the info about user updated, in the above mentioned test call you will get all kinds of data about user, one of those will be user_pass which will contain user's password's hash. You can authenticate using that with the following example, by simply adding another param hash:

    include "path/to/HabWpLogin.php";
    //Login Data username and password
    $data = [
            "user" => "user123",
            "pass" => "$P$ABCDE123456789",
            "hash" => 1,
        ];
    //Path to the hab-wp-login.php located on the server with wordpress installation.
    $pathWp = "http://X/hab-wp-login.php";

    //Contains the array with user information
    $login = HabWpLogin::doLogin($data, $pathWp);
    var_dump($login);
