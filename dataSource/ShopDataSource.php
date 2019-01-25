<?php

namespace DataSource;


use Data\Shop;

class ShopDataSource
{
    private static $data;

    public static function init()
    {
        self::$data = [
            "1" => new Shop("1", "エキテン整骨院", "1", "01001", "1"),
            "2" => new Shop("2", "エキテン青果店", "13", "13001", "2"),
            "3" => new Shop("3", "エキテンカフェ", "13", "13001", "1"),
        ];
    }

    public static function getList(): array
    {
        return self::$data;
    }

    public static function popularList(): array
    {
        return [self::$data["1"],];
    }

    public static function getById(string $id): Shop
    {
        if (self::$data[$id]) {
            return self::$data[$id];
        }
        throw new \RuntimeException('Not Found');
    }
}