<?php
require_once 'LinkedList\Node.php';
require_once 'LinkedList\OneLinkedList.php';
require_once 'LinkedList\TwoLinkedList.php';

use LinkedList\Node;
use LinkedList\OneLinkedList;
use LinkedList\TwoLinkedList;

$list = new TwoLinkedList();
$list->addNodeLast(5);
$list->addNodeLast(3);
$list->addNodeLast(5);
$list->addNodeLast(66);
$list->addNodeLast(9);

$list->remove(9);

//output 5 3 5 66
//$list->printList();

//$part = [5, 3]
$part = $list->copyTo(2);


$list2 = new OneLinkedList();
//$list->add(1);
$list2->add(1);
//$list->add(3);
//$list->add(3);
//$list->add(3);
$list2->add(3);
$list2->add(3);
$list2->add(66);
$list2->add(1);

////$list2 containt 3 3 3 66 1
//$list2->removeNodeFirst();
//
////$list2 contains 3 66 1
$list2->remove(3);
$list2->printList();