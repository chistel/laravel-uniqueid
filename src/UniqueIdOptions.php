<?php
/**
 * Copyright (C) 2019, Chistel Brown,  - All Rights Reserved.
 *
 * @project              laravel-uniqueid
 * @file                     UniqueIdOptions.php
 *
 * @author               Chistel
 * @github                   <http://github.com/chistel>
 * @twitter               <http://twitter.com/chistel>
 * @lastmodified    13/10/2019, 1:47 AM
 */

namespace Chistel\LaravelUniqueId;

class UniqueIdOptions
{
    /** @var string */
    public $uniqueIdField;

    /** @var int */
    public $maximumLength = 10;

    /**
     * [create description].
     *
     * @return [type]
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * [saveUniqueIdTo description].
     *
     * @param string $fieldName
     *
     * @return [type]
     */
    public function saveUniqueIdTo(string $fieldName): self
    {
        $this->uniqueIdField = $fieldName;

        return $this;
    }

    /**
     * [uniqueIdShouldBeNoLongerThan description].
     *
     * @param int $maximumLength
     *
     * @return [type]
     */
    public function uniqueIdShouldBeNoLongerThan(int $maximumLength): self
    {
        $this->maximumLength = $maximumLength;

        return $this;
    }
}
