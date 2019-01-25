<?php

namespace Data;


class User
{
	// DBから取得可能
	public $id;
	public $name;

	// graphql-phpに上書きされる

	public function __construct(string $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}
}