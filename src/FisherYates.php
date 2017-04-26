<?php
namespace Lmc\FisherYates;

class FisherYates
{
    private $itemsToShuffle;
    private $shuffledItems;

    public function __construct(array $itemsToShuffle = [])
    {
        $this->setItemsToShuffle($itemsToShuffle);
    }

    public function setItemsToShuffle(array $itemsToShuffle)
    {
        $this->itemsToShuffle = $itemsToShuffle;
        $this->shuffledItems = [];
    }

    public function shuffle()
    {
        while (count($this->itemsToShuffle) > 0) {
            $randomNumber = $this->getRandomInteger(0, count($this->itemsToShuffle)-1);
            $extractedItem = array_splice($this->itemsToShuffle, $randomNumber, 1);
            $this->populateShuffledItems($extractedItem[0]);
        }

        return $this->shuffledItems;
    }

    private function populateShuffledItems($item)
    {
        $this->shuffledItems[] = $item;
    }

    private function getRandomInteger($start, $end)
    {
        return random_int($start, $end);
    }
}