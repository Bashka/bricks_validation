<?php
namespace Bricks\Validation\Filters;
use Bricks\Validation\Filter;

/**
 * Фильтр путей в файловой системе.
 *
 * @author Artur Sh. Mamedbekov
 */
class Path implements Filter{
  /**
   * Параметры:
   *   - path - тип фильтра (dir - адрес каталога, содержащего ресурс;
   *   basename - полное имя ресурса; name - имя ресурса; ext - расширение 
   *   ресурса)
   *
   * @see Filter::filter
   */
  public function filter($data, array $chain){
    if($chain['path'] == 'dir'){
      $type = PATHINFO_DIRNAME;
    }
    elseif($chain['path'] == 'basename'){
      $type = PATHINFO_BASENAME;
    }
    elseif($chain['path'] == 'name'){
      $type = PATHINFO_FILENAME;
    }
    elseif($chain['path'] == 'ext'){
      $type = PATHINFO_EXTENSION;
    }

    return pathinfo($data, $type);
  }
}
