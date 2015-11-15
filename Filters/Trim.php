<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Отсечение начальных и конечных пробелов.
 *
 * @author Artur Sh. Mamedbekov
 */
class Trim implements Filter{
  /**
   * Параметры:
   *   - trim [optional] - удаляемый символ (по умолчанию удаляются пробельные 
   *   символы)
   *
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    return trim($data, isset($chain['trim'])? $chain['trim'] : " \t\n\r\0\x0B");
  }
}
