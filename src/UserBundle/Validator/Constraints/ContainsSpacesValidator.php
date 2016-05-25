<?php

namespace UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Description of ContainsSpacesValidator
 *
 * @author eningabiye
 */
class ContainsSpacesValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if (preg_match('/\s/', $value, $matches)) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }

}
