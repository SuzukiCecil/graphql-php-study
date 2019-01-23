<?php

require_once './vendor/autoload.php';

use GraphQL\Server\StandardServer;
use GraphQL\Type\Schema;

try {
    \DataSource\ShopDataSource::init();
    \DataSource\PrefectureDataSource::init();
    \DataSource\CityDataSource::init();

    $queryType = \Type\Query::getInstance();

    $schema = new Schema([
        'query' => $queryType,
    ]);

    $server = new StandardServer([
        'schema' => $schema
    ]);

    $server->handleRequest();
} catch (\Exception $e) {
    StandardServer::send500Error($e);
}
