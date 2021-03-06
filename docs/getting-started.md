# Введение

Данный пакет реализует механизмы фильтрации и валидации отдельных данных или 
целых пакетов, что позволяет принимать в приложении проверенные и подготовленные 
для дальнейшей работы данные. Для фильтрации данных используются классы модуля 
_Filters_, а для валидации - модуля _Validators_. Они могут использоваться 
отдельно для фильтрации и валидации отдельных данных с помощью методов _filter_ 
и _isValid_ соответственно.

Пример фильтрации данных:

```php
$id = (new Filters\Int)->filter($data['id'], []);
```

Пример валидации данных:

```php
$isValid = (new Validators\Length)->isValid($data['id'], ['min' => 1]);
```

Для фильтрации и валидации пакетов данных используется класс _Input_, для 
которого необходимо заранее определить карту валидации.

Пример пакетной валидации:

```php
$input = new Input([
  'id' => ['!int', '?len', 'min' => 1],
  'title' => ['!str', '?len', 'max' => 256]
]);
$data = $input->validate(['id' => $data['id'], 'title' => $data['title']]);
```
