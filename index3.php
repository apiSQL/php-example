<?php
// curl https://loadfunc.github.io/php/load_func.php --output load_func.php
include 'load_func.php';


# Load functions from external domains
load_func(["https://letjson.github.io/php/let_json.php", "https://php.apisql.com/api_sql.php"], function () {

    // Load config file
    $config = let_json("https://php.apisql.com/config.json");

    // load data from sqlite based on config
    api_sql($config->db, $config->sql, function ($fetch) {
        var_dump($fetch['firstname']);
        var_dump($fetch['lastname']);
        var_dump($fetch['address']);
    });
});
?>

