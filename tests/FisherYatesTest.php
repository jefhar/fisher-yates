<?php

use Lmc\FisherYates\FisherYates;
use PHPUnit\Framework\TestCase;

class FisherYatesTest extends TestCase {

    public function testShuffledItemsContainSameAsOriginal(): void
    {
        $itemsToShuffle = ['a', 'b', 'c', 'd', 'e'];
        $fy = new FisherYates($itemsToShuffle);

        $shuffled = $fy->shuffle();

        $this->assertEqualsCanonicalizing($itemsToShuffle, $shuffled);
    }

    public function testShuffledWithSeedIsDeterministic():void
    {
        $seed = 123_456_789;
        $itemsToShuffle = ['a', 'b', 'c', 'd', 'e'];
        $fy = new FisherYates($itemsToShuffle);

        $shuffled = $fy->shuffle($seed);

        $this->assertEquals(['d', 'a', 'b', 'e', 'c'], $shuffled);
    }
}
