<?php
require_once 'LinkedList\Node.php';
require_once 'LinkedList\OneLinkedList.php';
require_once 'LinkedList\TwoLinkedList.php';

use LinkedList\one\Node;
use LinkedList\one\OneLinkedList;
use LinkedList\one\TwoLinkedList;

$list = new TwoLinkedList();
$node = new Node(5);
$node2 = new Node(3);
$node3 = new Node(5);
$node4 = new Node(66);
$node5 = new Node(9);

$list->addNodeLast($node);
$list->addNodeLast($node2);
$list->addNodeLast($node3);
$list->addNodeLast($node4);
$list->addNodeLast($node5);

$list->remove(9);

//output 5 3 5 66
$list->printList();

//$part = [5, 3]
$part = $list->copyTo(2);
