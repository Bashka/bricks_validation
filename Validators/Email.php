<?php
namespace Bricks\Validation\Validators;
use Bricks\Validation\Validator;

/**
 * Валидатор адресов электронной почты.
 *
 * @author Artur Sh. Mamedbekov
 */
class Email implements Validator{
  /**
   * @see Validator::isValid
   */
  public function isValid($data, array $chain){
    return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
  }
}
