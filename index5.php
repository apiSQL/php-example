<?php
# curl https://php.loadfunc.com/apifunc.php --output apifunc.php
# curl https://loadfunc.github.io/php/apifunc.php --output apifunc.php
include '.apifunc\\apifunc.php';
header('Content-Type: application/json');

# Webs service with JSON output
try {

    # Load functions from remote/local
    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'https://php.apisql.com/api_sql.php',
        'https://php.lettxt.com/let_txt.php'
    ], function () {

        // Load config file from remote/local json file
        let_json('db.json', function ($db) {

            // load data from sqlite based on json configuration: config.json
            api_sql($db->db, let_txt('.apisql/get_all_members.sql'), function ($fetch) {

                // encode data to json
                echo def_json('', $fetch);
            });
        });
    });

} catch (exception $e) {
    echo def_json('', [
        'message' => $e->getMessage(),
        'error' => true
    ]);
}

?>

