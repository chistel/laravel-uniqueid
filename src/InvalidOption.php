<?php
/**
 * Copyright (C) 2019, Chistel Brown,  - All Rights Reserved
 * @project              laravel-uniqueid
 * @file                     InvalidOption.php
 * @author               Chistel
 * @github                   <http://github.com/chistel>
 * @twitter               <http://twitter.com/chistel>
 * @lastmodified    13/10/2019, 1:48 AM
 *
 */

namespace Chistel\LaravelUniqueId;

use Exception;

class InvalidOption extends Exception
{
   /**
    * @return static
    */
	public static function missingUniqueIdField()
	{
	  	return new static('Could not determine in which field the UniqueId should be saved');
	}

   /**
    * @return static
    */
	public static function invalidMaximumLength()
	{
	  	return new static('Maximum length should be greater than zero');
	}
}
