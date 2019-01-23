<?php

namespace Data;


class Shop
{
    // DBから取得可能
    public $id;
    public $name;
    public $prefectureId;
    public $cityId;

    // graphql-phpに上書きされる
    public $prefecture;
    public $city;
//    public $owner;

    public function __construct(string $id, string $name, string $prefectureId, string $cityId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->prefectureId = $prefectureId;
        $this->cityId = $cityId;
    }
}
