# Фильтрация

Процесс фильтрации сопровождается преобразованием обрабатываемых данных и 
приведением их к требуемому виду. Это может быть простое преобразование типа 
данных или более сложные операции. Экземпляр фильтра использует метод _filter_ 
для выполнения фильтрации данных и возврата результата:

```php
// Приведение данных к целочисленному типу.
$id = (new Filters\Int)->filter($data['id'], []);
```

Для реализации собственного фильтра, достаточно реализовать интерфейс Filter 
данного пакета.

Пример реализации собственного фильтра, выделяющего протокол из URL:

```php
use Bricks\Validation\Filter;
use Bricks\Validation\ValidateException;

class Protocol implements Filter{
  public function filter($data, array $chain){
    $match = [];
    if(preg_match('~^([a-z]:\/\/)~', $data, $match) !== 1){
        throw new ValidateException;
    }

    return $match[1];
  }
}
```
