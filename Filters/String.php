<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Фильтр строк.
 *
 * @author Artur Sh. Mamedbekov
 */
class String implements Filter{
  /**
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    return (string) $data;
  }
}
