<?php
/**
 * Copyright (C) 2019, Chistel Brown,  - All Rights Reserved
 * @project              laravel-uniqueid
 * @file                     HasUniqueId.php
 * @author               Chistel
 * @github                   <http://github.com/chistel>
 * @twitter               <http://twitter.com/chistel>
 * @lastmodified    13/10/2019, 1:48 AM
 *
 */

namespace Chistel\LaravelUniqueId;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
trait HasUniqueId
{
	protected $uniqueIdOptions;

	/**
	* Get the options for generating the uniqueId.
	*/
	abstract public function getUniqueIdOptions(): UniqueIdOptions;

   /**
    *
    */
	protected static function bootHasUniqueId()
	{
	  	static::creating(function (Model $model) {
	      $model->generateUniqueId();
	  	});
	}
	/**
	* Handle adding UniqueId on model creation.
	*/
	protected function generateUniqueId()
	{
		$this->uniqueIdOptions = $this->getUniqueIdOptions();

		$this->addUniqueId();
	}

	/**
	* Add the UniqueId to the model.
	*/
	protected function addUniqueId()
	{
		$this->guardAgainstInvalidUniqueIdOptions();

		$uniqueId = $this->makeUniqueIdUnique();

		$uniqueIdField = $this->uniqueIdOptions->uniqueIdField;

		$this->$uniqueIdField = $uniqueId;

	}

	/**
	* Make the given UniqueId unique.
	*/
	protected function makeUniqueIdUnique(): string
	{
		do {
		   $uniqueId = Str::random($this->uniqueIdOptions->maximumLength);
		   $checkCode = static::where($this->uniqueIdOptions->uniqueIdField, $uniqueId)->exists();
		} while($checkCode > 0);

		return $uniqueId;
	}

	/**
	* This function will throw an exception when any of the options is missing or invalid.
	*/
	protected function guardAgainstInvalidUniqueIdOptions()
	{
		if (! strlen($this->uniqueIdOptions->uniqueIdField)) {
		   throw InvalidOption::missingUniqueIdField();
		}

		if ($this->uniqueIdOptions->maximumLength <= 0) {
		   throw InvalidOption::invalidMaximumLength();
		}
	}
}

