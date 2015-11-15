<?php
namespace Bricks\Validation;

/**
 * Описание валидатора.
 *
 * @author Artur Sh. Mamedbekov
 */
interface Validator{
  /**
   * Проверяет данныe.
   *
   * @param mixed $data Проверяемые данные.
   * @param array $chain Массив фильтров и валидаторов, применяемых к 
   * проверяемым данным.
   *
   * @return bool true - если проверка успешна.
   */
  public function isValid($data, array $chain);
}
