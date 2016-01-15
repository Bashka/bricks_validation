<?php
namespace Bricks\Validation\Validators;
use Bricks\Validation\Validator;

/**
 * Валидатор IP-адресов.
 *
 * @author Artur Sh. Mamedbekov
 */
class Ip implements Validator{
  /**
   * Параметры:
   *   - ip [optional] - тип IP адреса (6 - IPv6, 4 - IPv4) (по умолчанию 
   *   используется значение 4)
   *
   * @see Validator::isValid
   */
  public function isValid($data, array $chain){
    if(isset($chain['ip']) && $chain['ip'] == '6'){
      return filter_var($data, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
    else{
      return filter_var($data, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }
  }
}
