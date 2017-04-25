<?php

use Lmc\FisherYates\FisherYates;
use PHPUnit\Framework\TestCase;

class FisherYatesTest extends TestCase {

    public function testShuffledItemsContainSameAsOriginal()
    {
        $itemsToShuffle = ['a', 'b', 'c', 'd', 'e'];
        $fy = new FisherYates($itemsToShuffle);

        $shuffled = $fy->getShuffledItems();

        $this->assertEquals($itemsToShuffle, $shuffled, "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

}