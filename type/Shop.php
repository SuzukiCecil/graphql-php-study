<?php

namespace Type;

use DataSource\CityDataSource;
use DataSource\PrefectureDataSource;
use DataSource\TagDataSource;
use DataSource\UserDataSource;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class Shop extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Shop',
            'fields' => [
                'id' => [
                    'type' =>Type::id(),
                ],
                'name' => [
                    'type' => Type::string(),
                ],
                'prefecture' => [
                    'type' => Prefecture::getInstance()
                ],
                'city' => [
                    'type' => City::getInstance()
                ],
				'owner' => [
					'type' => User::getInstance()
				],
            ],
            'resolveField' => function ($value, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);
                if (method_exists($this, $method)) {
                    return $this->{$method}($value, $args, $context, $info);
                } else {
                    return $value->{$info->fieldName};
                }
            }
        ];
        parent::__construct($config);
    }

    private static $singleton;

    public static function getInstance(): self
    {
        return self::$singleton ? self::$singleton : self::$singleton = new self();
    }

    public function resolvePrefecture($value)
    {
        return PrefectureDataSource::getById($value->prefectureId);
    }

    public function resolveCity($value)
    {
        return CityDataSource::getById($value->cityId);
    }

	public function resolveOwner($value)
	{
		return UserDataSource::getById($value->cityId);
	}

}
