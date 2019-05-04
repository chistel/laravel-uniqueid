# laravel-uniqueid is simliar to [Spatie Sluggable](https://github.com/spatie/laravel-sluggable) as it was mimicked from it.

but the difference is that it's meant to use unique string for model routes.


## Installation

You can install the package via composer:
``` bash
composer require chistel/laravel-uniqueid
```

## Usage

Your Eloquent models should use the `Chistel\LaravelUniqueId\HasUniqueId` trait and the `Chistel\LaravelUniqueId\UniqueIdOptions` class.

The trait contains an abstract method `getUniqueIdOptions()` that you must implement yourself. 

Here's an example of how to implement the trait:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Chistel\LaravelUniqueId\HasUniqueId;
use Chistel\LaravelUniqueId\UniqueIdOptions;

class UserModel extends Model
{
   use HasUniqueId;
    
   /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'user_unique_id';  // this is the unique key column 
	}
	/**
	* Get the options for generating model uniqueId.
	*/
	public function getUniqueIdOptions() : UniqueIdOptions
	{
	  	return UniqueIdOptions::create()
	   	->saveUniqueIdTo('user_unique_id') // this is the unique key column 
	      	->uniqueIdShouldBeNoLongerThan(8);
	}
}
```
the uniqueid is only available on model creating.
