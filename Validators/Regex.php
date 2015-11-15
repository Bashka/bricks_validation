<?php
namespace Bricks\Validation\Validators;
use Bricks\Validation\Validator;

/**
 * Валидатор на основе регулярного выражения.
 *
 * @author Artur Sh. Mamedbekov
 */
class Regex implements Validator{
  /**
   * Параметры:
   *   - regex - применяемое регулярное выражение
   *
   * @see Validator::isValid
   */
  public function isValid($data, array $chain){
    return preg_match($chain['regex'], $data) === 1;
  }
}
