<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Фильтр URL.
 *
 * @author Artur Sh. Mamedbekov
 */
class Url implements Filter{
  /**
   * Параметры:
   *   - url - выделяемый компонент URL (protocol - протокол; host - хост; port 
   *   - порт; user - пользователь; pass - пароль; path - адрес ресурса; query - 
   *   параметры запроса (после ?); fragment - хвост запроса (после #))
   *
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    if($chain['url'] == 'protocol'){
      $type = PHP_URL_SCHEME;
    }
    elseif($chain['url'] == 'host'){
      $type = PHP_URL_HOST;
    }
    elseif($chain['url'] == 'port'){
      $type = PHP_URL_PORT;
    }
    elseif($chain['url'] == 'user'){
      $type = PHP_URL_USER;
    }
    elseif($chain['url'] == 'pass'){
      $type = PHP_URL_PASS;
    }
    elseif($chain['url'] == 'path'){
      $type = PHP_URL_PATH;
    }
    elseif($chain['url'] == 'query'){
      $type = PHP_URL_QUERY;
    }
    elseif($chain['url'] == 'fragment'){
      $type = PHP_URL_FRAGMENT;
    }

    return (string) parse_url($data, $type);
  }
}
