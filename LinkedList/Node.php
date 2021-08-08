<?php
namespace LinkedList;

class Node
{
    public ?int $value = null;
    public ?Node $next = null;
    public ?Node $previous = null;


    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext($next): void
    {
        $this->next = $next;
    }



}