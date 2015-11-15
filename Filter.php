<?php
namespace Bricks\Validation;

/**
 * Описание фильтра.
 *
 * @author Artur Sh. Mamedbekov
 */
interface Filter{
  /**
   * Фильтрует данные.
   *
   * @param mixed $data Фильтруемые данные.
   * @param array $chain Массив фильтров и валидаторов, применяемых к 
   * фильтруемым данным.
   *
   * @return mixed Результат фильтрации.
   */
  public function filter($data, array $chain);
}
