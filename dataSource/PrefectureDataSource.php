<?php

namespace DataSource;


use Data\Prefecture;

class PrefectureDataSource
{
    private static $data;

    public static function init()
    {
        self::$data = [
            "1" => new Prefecture("1", "北海道"),
            "13" => new Prefecture("13", "東京都"),
        ];
    }

    public static function getList(): array
    {
        return self::$data;
    }

    public static function getById(string $id): Prefecture
    {
        if (self::$data[$id]) {
            return self::$data[$id];
        }
        throw new \RuntimeException('Not Found');
    }
}