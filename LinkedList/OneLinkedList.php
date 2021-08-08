<?php


namespace LinkedList\one;


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

    public function addNodeLast(Node $node)
    {
        if ($this->isEmptyList()) {
            $this->head = $node;

        } else {
            $this->tail->next = $node;
            $node->previous = $this->tail;
        }
        $this->tail = $node;
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

            if ($current->getValue() === $value) {

                if ($previous !== null) {
                    $previous->setNext($current->getNext());

                    if ($current->getNext() === null) {
                        $this->tail = $previous;
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