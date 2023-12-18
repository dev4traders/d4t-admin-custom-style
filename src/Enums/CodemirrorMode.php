<?php

namespace D4T\Admin\CustomStyle\Enums;

use D4T\Core\Contracts\D4TEnum;
use D4T\Core\Traits\D4TEnumTrait;

enum CodemirrorMode: string implements D4TEnum
{
    use D4TEnumTrait;

    case PHP = 'text/x-php';
    case CSS = 'text/css';
}
