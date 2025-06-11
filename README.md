# fisher-yates

A PHP implementation of the [Fisher-Yates shuffle](https://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle) with a deterministic shuffle.

## Installing

This requires a minimum version of PHP 8.2.

Use [Composer](https://getcomposer.org):

```shell
composer require jefhar/fisher-yates
```

## Usage

```php
use Lmc\FisherYates\FisherYates;

$itemsToShuffle = ['a', 'b', 'c', 'd', 'e'];

$fy = new FisherYates($itemsToShuffle);

$result = $fy->shuffle();
```

If you need a deterministic shuffle, you can send a seed to the `shuffle` method:
```php
use Lmc\FisherYates\FisherYates;

$seed = 123_456_789;
$itemsToShuffle = ['a', 'b', 'c', 'd', 'e'];
$fy = new FisherYates($itemsToShuffle);

var_dump($fy->shuffle($seed));
```

```php
array(5) {
  [0]=>
  string(1) "d"
  [1]=>
  string(1) "a"
  [2]=>
  string(1) "b"
  [3]=>
  string(1) "e"
  [4]=>
  string(1) "c"
}
```
