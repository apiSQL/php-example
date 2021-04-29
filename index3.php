<?php
// curl https://loadfunc.github.io/php/load_func.php --output load_func.php
include 'load_func.php';

# Load functions from remote/local
//load_func(['https://letjson.github.io/php/let_json.php', 'https://php.apisql.com/api_sql.php'], function () {
load_func(['https://php.letjson.com/let_json.php', 'https://php.defjson.com/def_json.php', 'https://php.apisql.com/api_sql.php'], function ($func_url_array) {

    // Load config file from remote/local json file
//    let_json('https://example.php.apisql.com/config.json', function($config){
    let_json('config.json', function($config){

        // load data from sqlite based on json configuration: config.json
        api_sql($config->db, $config->sql, function ($fetch) {

            def_json('data.json', $fetch, function ($data){

                let_json('data.json', function($data){
                    var_dump($data);
                });
            });
        });
    });

});
?>

