<?php
/**
 * Created by PhpStorm.
 * User: kiyoshisuzuki
 * Date: 2019-01-23
 * Time: 20:52
 */

namespace DataSource;


use Data\User;

class UserDataSource
{
	private static $data;

	public static function init()
	{
		// notice: IDは適当です
		self::$data = [
			"01001" => new User("1", "鈴木"),
			"13001" => new User("2", "セシル"),
		];
	}

	public static function getList(): array
	{
		return self::$data;
	}

	public static function getById(string $id): User
	{
		if (self::$data[$id]) {
			return self::$data[$id];
		}
		throw new \RuntimeException('Not Found');
	}
}