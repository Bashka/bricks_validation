<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Фильтр целых чисел.
 *
 * @author Artur Sh. Mamedbekov
 */
class Int implements Filter{
  /**
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    return (int) $data;
  }
}
