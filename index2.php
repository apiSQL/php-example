<?php
// curl https://loadfunc.github.io/php/load_func.php --output load_func.php
include 'load_func.php';

# Function Async
load_func(["https://php.apisql.com/api_sql.php"], function () {
    api_sql('sqlite:db.sqlite3', "SELECT * FROM `member` ORDER BY `lastname` ASC", function ($fetch) {
        var_dump($fetch);
        var_dump($fetch['firstname']);
        var_dump($fetch['lastname']);
        var_dump($fetch['address']);
    });
});

# Function Async
load_func(["https://letjson.github.io/php/let_json.php", "https://php.apisql.com/api_sql.php"], function () {
    $objs[] = let_json("../../plesk.json");

    api_sql('sqlite:db.sqlite3', "SELECT * FROM `member` ORDER BY `lastname` ASC", function ($fetch) {
        var_dump($fetch['firstname']);
        var_dump($fetch['lastname']);
        var_dump($fetch['address']);
    });
});
?>

