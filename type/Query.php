<?php

namespace Type;

use DataSource\PostDataSource;
use DataSource\ShopDataSource;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class Query extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'shops' => [
                    'type' => Type::listOf(Shop::getInstance()),
                ],
                'shop' => [
                    'type' => Shop::getInstance(),
                    'args' => [
                        'id' => [
                            'type' => Type::id(),
                        ],
                    ]
                ],
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                switch($info->fieldName) {
                    case 'shops':
                        return ShopDataSource::getList();
                    case 'shop':
                        return ShopDataSource::getById($args['id']);
                }
                throw new \RuntimeException('query not found');
            }
        ];
        parent::__construct($config);
    }

    private static $singleton;

    public static function getInstance(): self
    {
        return self::$singleton ? self::$singleton : new self();
    }
}
