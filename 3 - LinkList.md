### 回文链表判断

申请一个快指针和慢指针，均指向头节点。

快指针步进2步，慢指针步进1步，当快指针走完时，慢指针就会来到中间节点。





### 有环链表判断

> 如何判断一个链表是否闭环的?

定义指针F、指针S，都指向链表头部。

F指针走2步，S指针走1步，当S、F指针相遇时链表有环。如果快指针的下一步为空，则链表无环。



> 如何找到有环链表的入环节点

要找到入环节点，只需要让F指针回到原点，让F和S指针每次前进一步，当它门再次相遇的节点就是入环节点。



> 如何计算环的节点个数

要计算环的节点个数，在S和F指针相遇时均停止移动，再让F指针每一次移动一步，当再次相遇时F指针移动的次数就是环的节点个数。

这是一个数学结论。



### 题目1

> 用数组结构实现大小固定的栈和队列。

栈和队列都有共同的俩个API，分别是弹出和插入。

栈的实现：

- 定义一个index变量指向数组的起始下标。
- 插入时在index指向的下标插入元素，同时index++
- 弹出时让index--，然后弹出指向的元素，如果指向0时表示没有元素可以弹出。

队列的实现：

- 给定一个start变量，指向要弹出的数据项；给定一个end变量，指向当前要添加的数据项
- start与end解绑，它们只与队列大小size有关系。
- 插入时在end指向的下标插入数据项，同时end下标下移一位，队列大小加1。如果end是在数组尾部下移时则end指向数组的起始元素；如果end超过size大小则报错。
- 弹出元素时使用start指向的下标元素进行弹出，start与end同样下移一位，同时队列大小减1。如果队列大小等于0，则弹出元素报错。



###  题目2

> 实现一个特殊的栈，在栈的基础功能上，可以返回栈中最小的元素。
>
> 要求压入、弹出、获取最小元素的操作时间复杂度是O(1)的。

额外定义一个min栈来实现，min栈用于存储最小的栈元素。

- 添加一个数据项时，如果当前数据项小于min栈的栈顶元素，则min栈添加当前数据项；如果大于等于min栈的栈顶元素，则min栈添加自身的栈顶元素。
- 弹出一个数据项时，min栈也同步弹出数据项。



### 题目3

> 如何使用栈来模拟队列

准备俩个栈，一个push栈，一个pop栈。

- 添加一个数据项时，使用push栈正常添加
- 弹出一个数据项时，如果pop栈中没有数据项，那么将push栈中的所有数据压入到pop栈中，同时pop栈再弹出元素；如果pop栈中有数据，那么直接从pop栈中弹出数据即可。

注1：只有弹出栈为空时，压入栈才能将数据压入到弹出栈中。

注2：导出数据是全部导出，不要预留数据。



> 如何使用队列模拟栈





### 题目4

> 猫狗队列，要求如下：
>
> 用户可以调用add()方法将cat类或dog类加入到队列中。
>
> 用户可以调用popAll()方法，将队列中的实例按照进入队列的顺序先后弹出。
>
> 用户可以调用popCat()方法，将队列中cat类的实例按照队列的顺序先后弹出。
>
> 用户可以调用popDog()方法，将队列中dog类的实例按照队列的顺序先后弹出。
>
> 用户可以调用isEmpty()方法，检查队列中是否有实例。
>
> 用户可以调用isCatEmpty()方法，检查队列中是否有cat实例。
>
> 用户可以调用isDogEmpty()方法，检查队列中是否有dog实例。



### 题目5

> 设计一种结构，该结构有如下三种功能：
>
> insert(key);
>
> delete(key);
>
> getRandom();	//等概率随机返回结构中的任何一个key
>
> 要求3个方法的时间复杂度是O(1)



### 题目6

> 转圈打印矩阵，例如：
>
> 1   2   3   4
>
> 11 12 13 14
>
> 15 16 17 18
>
> 打印结构为：1, 2, 3, 4, 14, 18, 17, 16, 15, 11, 12, 13
>
> 要求额外空间复杂度为O(1）。



> 之字型打印矩阵。	



> 给定一个由N*M的整型矩阵和一个整数k，matrix的每一行和每一列都是有序的，实现一个函数，判断k是否在其中。
>
> 要求时间复杂度为O(N+M)，空间复杂度O(1)



类似这种题目，不要把思路现在局部下标如何变化，要从宏观方面来考虑如何调度。



### 题目7

> 打印俩个有序链表的公共部分。





### 题目8

> 给定一个链表的的头结点head，请判断该链表是否回文结构。
>
> 进阶：要求时间复杂度O(N)，额外空间复杂度O(1)。

技巧：定义一个快指针，一个慢指针，快指针步进2步，慢指针步进1步，快指针走完的时候，慢指针会来到链表的中部。

如果能找到链表中点，再将后半部分反转过来，然后依次对比，最后再反转回去。

注意：奇数个节点和偶数个节点的中间节点会有区别。





### 题目9

> 将单项链表某值划分成左边小、中间相等、右边大的形式。
>
> 说明：空间复杂度可以是O(N)或O(1)。

O(N)空间的解法：

定义一个数组存放每个节点，然后使用解决荷兰国旗问题方式的解法来做。

O(1)空间的解法：

定义三个变量，less、equal、more，遍历整个节点，小于的挂到less、大于的挂到more，等于的挂到equal，最后再拼接出来即可。



### 题目10

```java
public class Node {
    public int value;
    public Node next;
    public Node rand;
    
    public Node(int data) {
        this.value = data;
    }
}
```

>Node类中的value是节点值， next指针和正常单链表中next指针的意义一样， 都指向下一个节点， rand指针是Node类中新增的指针， 这个指针可能指向链表中的任意一个节点， 也可能指向null。
>
>给定一个由Node节点类型组成的无环单链表的头节点head， 请实现一个函数完成这个链表中所有结构的复制， 并返回复制的新链表的头节点。
>
>进阶： 不使用额外的数据结构， 只用有限几个变量， 且在时间复杂度为O(N)内完成原问题要实现的函数。 



### 题目11

> 俩个单链表相交的一系列问题。
>
> 在本题中，单链表可能有环也可能没有。给定俩个单链表的头节点head1和head2，这俩个链表可能相交，也可能不相交。
>
> 请实现一个函数，如果俩个链表相交，请返回相交的第一个节点；如果不相交返回null。

假设你已经知道如何判断一个链表是否闭环，并将其实现成函数。

获取俩个链表的入环节点，会有三种情况，如果都为空则俩个链表都是无环链表；一个是有环链表，一个是无环链表；或者俩个都是有环链表。



对于无环链表：

如果俩个无环链表相交，它们的最后一个节点一定是相同的，因为单链表只有一个next指针；如果不相交则最后一个节点是不同的。

- 分别遍历俩个单环链表，统计俩个链表各自的长度，并且分别获取最后一个节点。
- 对最后的俩个节点进行比较，判断是否相交。
- 如果相交，再次回到俩个单链表头部，计算俩个链表差值的绝对值，让长链表先走该绝对值的步数，然后俩个链表再同时前进，碰到的相同节点一定是相交的节点。



一个有环，一个无环，这俩个链表必然不会相交。

俩个有环链表会有三种情况：

- 俩个有环链表不相交。

- 俩个有环链表的入环节点相同

  如果入环节点相同，可以肯定的是，刨去整个环，求它们相交节点等于求俩个无环链表相交的问题。

- 俩个有环链表的入环节点不同

  如果入环节点不同，那么可以肯定俩个入环节点要么在同一个环上，要么不在同一个环上。

  因此可以让其他一个入环节点继续向下走，另外一个节点不懂，当它碰到自己时，如果有找到另外一个节点则表示在同一个环上，这时俩个入环节点都是单链表的相交节点；

  如果没有则表示不在同一个环上。



### 题目12

> 反转单向链表和双向链表。
