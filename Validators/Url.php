<?php
namespace Bricks\Validation\Validators;
use Bricks\Validation\Validator;

/**
 * Валидатор URL.
 *
 * @author Artur Sh. Mamedbekov
 */
class Url implements Validator{
  /**
   * @see Validator::isValid
   */
  public function isValid($data, array $chain){
    return filter_var($data, FILTER_VALIDATE_URL) !== false;
  }
}
