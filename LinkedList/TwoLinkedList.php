<?php

namespace LinkedList;


use Exception;

class TwoLinkedList
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

    public function addNodeLast(int $value)
    {
        $node = new Node($value);

        if ($this->isEmptyList()) {
            $this->head = $node;
            $this->tail = $node;

        } else {
            $tail = $this->tail;
            $this->tail = $node;
            $tail->next = $this->tail;
            $this->tail->previous = $tail;
        }
        $this->count++;
    }

    public function addNodeFirst(int $value)
    {
        $node = new Node($value);

        if ($this->isEmptyList()) {
            $this->head = $node;
            $this->tail = $this->head;

        } else {
            $temp = $this->head;
            $this->head = $node;
            $this->head->next = $temp;
        }
        $this->count++;
    }


    private function isEmptyList(): bool
    {
        return $this->head === null &&
            $this->tail === null &&
            $this->getCount() === 0;
    }

    public function removeNodeFirst()
    {
        if ($this->isEmptyList()) {
            throw new Exception("try remove undefined node");
        }
        $next = $this->head->next;
        $next->previous = null;
        $this->head = $next;
    }

    public function removeNodeLast()
    {
        if ($this->isEmptyList()) {
            throw new Exception("try remove undefined node");
        }
        $previous = $this->tail->previous;
        $this->tail = $previous;
        $this->tail->next = null;
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

            if ($current->getValue() === $value) {

                if ($previous !== null) {
                    $previous->next = $current->next;

                    if ($current->next === null) {
                        $this->tail = $previous;

                    } else {
                        $current->next->previous = $previous;
                    }

                } else {
                    $this->removeNodeFirst();
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