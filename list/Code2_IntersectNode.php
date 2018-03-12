<?php

/*
 *
题目：
    俩个单链表相交的一系列问题

    在本题中，单链表可能有环，也可能无环，给定俩个单链表的头节点head1和head2，
    这俩个链表可能相交也可能不相交。请实现一个函数，如果俩个链表相交，请返回相交的第一个节点，
    如果不相交，返回null。

    要求：如果链表1的长度为n，链表2的长度为m，时间复杂度要达到O(N+M)，额外空间复杂度为O(1)

 */
class IntersectNode
{
    //俩个无环链表是否相交
    public function isIntersect($link1, $link2)
    {
        $lastNode1 = null;
        $lastNode2 = null;

        while($link1!= null || $link2 != null)
        {
            if($link1 != null)
            {
                $lastNode1 = $link1;
                $link1 = $link1->next;
            }

            if($link2 != null)
            {
                $lastNode2 = $link2;
                $link2 = $link2->next;
            }
        }

        //俩个无环链表相交了
        if($lastNode1 == $lastNode2)
        {

        }

        return null;
    }
}

$obj = new IntersectNode();
$ref =& $obj;

var_dump($ref);



/*

俩个单链表相交会有这几种情况：

- 俩个无环的链表相交

- 一个有环的链表和一个无环的链表相交
    一个有环的链表和一个无环的链表，节点是不可能相交的，如果相交会破坏链表的next指针结构。

- 俩个有环链表相交
    俩个有环的链表，会有3种可能，
    第一种是俩个有环的链表都是独立的
    第二种是B链表的尾部节点指向A链表的环中某个节点，
    最后是B链表的尾部节点指向A链表非环节点中的某个节点

    如果A链表的入环节点等于B链表的入环节点，属于最后种情况，我们将环屏蔽掉，在求相交节点其实是求无环链表的相交节点。

    如果俩个入环节点都不相等，则属于第一和第二俩种情况，这时候用A链表的入环节点往下一个节点遍历，如果能找到B链表的入环节点则属于第二种情况，
    否则属于第一种情况，针对第二种情况，俩个入环节点都可以算作相交的点，只不过距离不同。
*/