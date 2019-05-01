<?php

namespace Chistel\UniqueId;

class UniqueIdOptions
{
	/** @var string */
	public $uniqueIdField;

	/** @var int */
	public $maximumLength = 10;


	/**
	 * [create description]
	 * @return [type]
	 */
	public static function create(): self
	{
	  	return new static();
	}

	/**
	 * [saveUniqueIdTo description]
	 * @param  string $fieldName
	 * @return [type]
	 */
	public function saveUniqueIdTo(string $fieldName): self
	{
	  	$this->uniqueIdField = $fieldName;

	  	return $this;
	}

	/**
	 * [uniqueIdShouldBeNoLongerThan description]
	 * @param  int    $maximumLength
	 * @return [type]
	 */
	public function uniqueIdShouldBeNoLongerThan(int $maximumLength): self
	{
	  	$this->maximumLength = $maximumLength;

	  	return $this;
	}
}
