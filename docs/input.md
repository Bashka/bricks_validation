# Пакетная обработка

Механизм пакетной обработки позволяет определить набор фильтров и валидаторов, 
которые будут применяться к пакету данных в указанном порядке, после чего данные 
пакета будут преобразованы в определенный вид.

Для пакетной обработки используется класс _Input_, конструктор которого 
принимает карту валидации, которая представлена в виде ассоциативного массива, 
ключами которому служат имена данных в пакете, а значениями - очередь валидации.  
Очередь валидации представляется в виде массива, элементами которого могут быть 
имена зарегистрированных в экземпляре класса _Input_ фильтров и валидаторов, а 
так же их параметры. Имена фильтров здесь должны начинаться с восклицательного 
знака, а имена валидаторов с вопросительного. Они будут применены к данным в том 
порядке, в котором они перечислены в карте.

Пример карты валидации:

```php
$input = new Input([
  'id' => ['!int', '?len', 'min' => 1], // Целое число больше нуля
  'title' => ['!str', '?len', 'max' => 256], // Строка не длинее 256 символов
]);
```

Метод _validate_ выполняет валидацию данных согласно карте валидации и 
возвращает результат в виде массива. Этот метод принимает ассоциативный массив 
данных, ключи которого должны соответствовать ключам используемой карты 
валидации:

```php
$validdata = $input->validate(['id' => '1', 'title' => 'Hello world']);
var_dump($validdata['id']); // int 1
var_dump($validdata['title']); // string "Hello world"
```

Если валидация не пройдена, метод выбрасывает исключение класса 
_ValidateException_.

# Собственные фильтры и валидаторы

Если необходимо в пакетной обработке использовать собственные фильтры и 
валидаторы, необходимо реализовать соответствующие классы и зарегистрировать их 
с помощью методов _filter_ и _validator_ соответственно. Эти методы в качестве 
первого аргумента принимают имя элемента, а в качестве второго - экземпляр 
класса этого элемента.

С помощью методов _aliasFilter_ и _aliasValidator_ можно зарегистрировать 
псевдонимы для фильтров и валидаторов. Это удобно для сокращения имен элементов.

Пример регистрации собственных фильтров и валидаторов:

```php
$input = new Input([
  'id' => ['!int', '?posi'], // Целое, положительное число
  // Строка не длинее 256 символов с удаленными пробелами с конца строки
  'title' => ['!str', '!rtrim', '?len', 'max' => 256],
]);
$input->filter('rtrim', new Rtrim);
$input->validator('positive', new Positive);
$input->aliasValidator('positive', 'posi'); // Регистрация псевдонима
```
