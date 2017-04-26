# fisher-yates

A PHP implementation of the [Fisher-Yates shuffle](https://en.wikipedia.org/wiki/Fisher%E2%80%93Yates_shuffle)

## Installing

Use [Composer](https://getcomposer.org):

```
composer require lifemeetscode/fisher-yates
```

## Usage

```
$itemsToShuffle = ['a', 'b', 'c', 'd', 'e'];

$fy = new FisherYates($itemsToShuffle);

$result = $fy->shuffle();
```

