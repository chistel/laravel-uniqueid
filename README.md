# UniqueId is simliar to [Spatie Sluggable](https://github.com/spatie/laravel-sluggable) as it was mimicked from it.

but the difference is that it's meant to use unique string for model routes.


## Installation

You can install the package via composer:
``` bash
composer require chistel/uniqueid
```

## Usage

Your Eloquent models should use the `Chistel\UniqueId\HasUniqueId` trait and the `Chistel\UniqueId\UniqueIdOptions` class.

The trait contains an abstract method `getSlugOptions()` that you must implement yourself. 

Here's an example of how to implement the trait:

```php
<?php

namespace App;

use Chistel\UniqueId\HasUniqueId;
use Chistel\UniqueId\UniqueIdOptions;
use Illuminate\Database\Eloquent\Model;

class YourEloquentModel extends Model
{
    use HasUniqueId;
    
    /**
     * Get the options for generating model uniqueId.
     */
    public function getUniqueIdOptions() : UniqueIdOptions
    {
        return UniqueIdOptions::create()
         ->saveUniqueIdTo('user_unique_id')
            ->uniqueIdShouldBeNoLongerThan(8);
    }
}
```
the uniqueid is only available on model creating.
