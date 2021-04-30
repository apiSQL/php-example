<?php
# curl https://php.loadfunc.com/load_func.php --output load_func.php
# curl https://loadfunc.github.io/php/load_func.php --output load_func.php
include 'load_func.php';

# Webs service with JSON
try {

    # Load functions from remote/local
    load_func(['https://php.letjson.com/let_json.php', 'https://php.defjson.com/def_json.php', 'https://php.apisql.com/api_sql.php', 'https://php.apisql.com/api_sql.php'], function ($func_url_array) {

        // Load config file from remote/local json file
        let_json('config.json', function ($config) {

            // load data from sqlite based on json configuration: config.json
            api_sql($config->db, $config->sql, function ($fetch) {

                // encode data to json
                def_json('', $fetch, function ($json) {

                    // show header with json data
                    header('Content-Type: application/json');
                    echo $json;

                });
            });
        });
    });

} catch (exception $e) {
    # Set HTTP response status code to: 500 - Internal Server Error
    http_response_code(500);
}

?>

