<?php

namespace BlogBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class NotContainsPercent
 *
 * @Annotation
 * @package BlogBundle\Validator\Constraints
 */
class NotContainsPercent extends Constraint {
    const NOT_ALLOWED_CHARACTER = '%';
    public $message = 'The string "%string%" contains the character ' . self::NOT_ALLOWED_CHARACTER . ', which is not allowed!';
}
