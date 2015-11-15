<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Фильтр длины строки.
 *
 * @author Artur Sh. Mamedbekov
 */
class StringRange implements Filter{
  /**
   * Параметры:
   *   - min [optional] - минимальная длина строки
   *   - max [optional] - максимальная длина строки
   *   - pad [optional] - символ-заполнитель, используемый для расширения строки 
   *   (по умолчанию используется пробел)
   *
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    $length = mb_strlen($data, 'utf8');
    if(isset($chain['min']) && $length < $chain['min']){
      $pad = isset($chain['pad'])? $chain['pad'] : ' ';
      return str_pad($data, $chain['min'], $pad);
    }
    elseif(isset($chain['max']) && $length > $chain['max']){
      return mb_substr($data, 0, $chain['max'], 'utf8');
    }
    else{
      return $data;
    }
  }
}
