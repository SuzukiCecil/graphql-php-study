<?php
/**
 * Created by PhpStorm.
 * User: kiyoshisuzuki
 * Date: 2019-01-23
 * Time: 20:52
 */

namespace DataSource;


use Data\City;

class CityDataSource
{
    private static $data;

    public static function init()
    {
        // notice: IDは適当です
        self::$data = [
            "01001" => new City("01001", "札幌市"),
            "13001" => new City("13001", "新宿区"),
        ];
    }

    public static function getList(): array
    {
        return self::$data;
    }

    public static function getById(string $id): City
    {
        if (self::$data[$id]) {
            return self::$data[$id];
        }
        throw new \RuntimeException('Not Found');
    }
}