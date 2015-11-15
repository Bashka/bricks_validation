<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Фильтр длины целого числа.
 *
 * @author Artur Sh. Mamedbekov
 */
class IntRange implements Filter{
  /**
   * Параметры:
   *   - min [optional] - нижняя граница диапазона
   *   - max [optional] - верхняя граница диапазона
   *
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    if(isset($chain['min']) && $data < $chain['min']){
      return $chain['min'];
    }
    elseif(isset($chain['max']) && $data > $chain['max']){
      return $chain['max'];
    }
    else{
      return $data;
    }
  }
}
