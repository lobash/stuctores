<?php

namespace LinkedList;

use Exception;

class OneLinkedList
{
    private ?Node $tail = null;
    private ?Node $head = null;
    public int $count = 0;

    public function printList()
    {
        $current = $this->head;
        while ($current !== null) {
            echo "$current->value ";
            $current = $current->getNext();
        }
    }

    public function add(int $value)
    {
        $node = new Node($value);

        if ($this->isEmptyList()) {
            $this->head = $node;
            $this->tail = $node;

        } else {
            $this->tail->next = $node;
            $this->tail = $node;
        }
        $this->count++;
    }


    private function isEmptyList(): bool
    {
        return $this->head === null && $this->tail === null;
    }

    public function removeNodeFirst()
    {
        if ($this->isEmptyList()) {
            throw new Exception("try remove undefined node");
        }
        $next = $this->head->next;
        $this->head = $next;
    }

    /**
     * @throws Exception
     */
    public function remove(int $value): void
    {
        if ($this->isEmptyList()) {
            throw new Exception("try remove undefined node");
        }

        /** @var Node|null $previous */
        $previous = null;
        $current = $this->head;

        while ($current !== null) {

            if ($current->value === $value) {

                if ($previous === null) {
                    $this->removeNodeFirst();

                } else {
                    $previous->next = $current->next;
                    if ($current->next === null) {
                        $this->tail = $previous;
                    }
                }
                $this->count--;
            }
            $previous = $current;
            $current = $current->getNext();

        }
    }

    public function getCount(): int
    {
        return $this->count;
    }


    public function copyTo(int $index): array
    {
        if ($this->isEmptyList()) {
            throw new Exception("try remove undefined node");
        }

        $array = [];
        $current = $this->head;
        $i = 0;
        while ($i < $index) {
            $array[] = $current->getValue();
            if ($current->getNext() !== null) {
                $current = $current->getNext();
            }
            $i++;
        }

        return $array;
    }
}