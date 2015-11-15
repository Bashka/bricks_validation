<?php
namespace Bricks\Validation\Validators;
use Bricks\Validation\Validator;

/**
 * Валидатор данных на предмет их присутствия.
 *
 * @author Artur Sh. Mamedbekov
 */
class NoEmpty implements Validator{
  /**
   * @see Validator::isValid
   */
  public function isValid($data, array $chain){
    if($data instanceof \Countable){
     return count($data) > 0;
    }
    else{
      return isset($data[0]);
    }
  }
}
