<?php
// curl https://loadfunc.github.io/php/load_func.php --output load_func.php
include 'load_func.php';

# Load functions from remote/local
load_func([
    'https://php.letjson.com/let_json.php',
    'https://php.defjson.com/def_json.php',
    'https://php.apisql.com/api_sql.php'
], function ($func_url_array) {

    // Load config file from remote/local json file
    let_json('db.json', function ($db) {

        var_dump($db);

        // load data from sqlite based on json configuration: db.json
        api_sql($db->db, $db->read, function ($fetch) {

            // WRITE data from sqlite
            def_json('data.json', $fetch, function () {

                // READ saved DATA from sqlite
                var_dump( let_json('data.json') );
            });
        });
    });

});
?>

