<?php

declare(strict_types=1);

namespace Lmc\FisherYates;

class FisherYates
{
    private array $itemsToShuffle;
    private array $shuffledItems;

    public function __construct(array $itemsToShuffle = [])
    {
        $this->setItemsToShuffle($itemsToShuffle);
    }

    private function setItemsToShuffle(array $itemsToShuffle): void
    {
        $this->itemsToShuffle = $itemsToShuffle;
    }

    /**
     * This function does not generate cryptographically secure values, and
     * must not be used for cryptographic purposes, or purposes that require
     * returned values to be unguessable.
     */
    public function shuffle(?int $seed = null): array
    {
        if ($seed !== null) {
            mt_srand($seed);
        }

        $this->shuffledItems = [];

        while (count($this->itemsToShuffle) > 0) {
            $randomNumber = $this->getRandomInteger(0, count($this->itemsToShuffle) - 1);
            $extractedItem = array_splice($this->itemsToShuffle, $randomNumber, 1);
            $this->populateShuffledItems($extractedItem[0]);
        }

        if ($seed !== null) {
            // Make the next random number after this seed less-deterministic:
            mt_srand((int)(microtime(true) * 100000) & 0xFFFFFFFF);
            mt_srand();
        }

        return $this->shuffledItems;
    }

    private function populateShuffledItems(mixed $item): void
    {
        $this->shuffledItems[] = $item;
    }

    private function getRandomInteger(int $start, int $end): int
    {
        /** @noinspection RandomApiMigrationInspection */
        return mt_rand($start, $end);
    }
}
