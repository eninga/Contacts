<?php

namespace UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of ContainsSpaces
 *
 * @author eningabiye
 */

/**
 * @Annotation
 */
class ContainsSpaces extends Constraint {

    public $message = 'Le nom d\'utilisateur ne doit pas contenir des espaces, vous pouvez utilisé des points (.) à la place';

}
