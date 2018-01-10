<?php

class UnionFind
{

}
/*

1和2是同伙
3和4是同伙
5和2是同伙
4和6是同伙
2和6是同伙
8和7是同伙
9和7是同伙
1和6是同伙
2和4是同伙

用一个数组存储强盗和强盗头子的关系，数组下标代表强盗自身，值对应所属强盗boss，
初始化时每个强盗所属boss是自身。

- 开始合并同伙，遵循靠左原则，遵循擒贼先擒王的规则。

- 1和2是同伙，让1号成为boss，将索引2的值改成1，表示2号强盗以及旗下所有强盗都归属1号强盗
1 1 3 4 5 6 7 8 9 10
1 2 3 4 5 6 7 8 9 10

- 3和4是同伙
1 1 3 3 5 6 7 8 9 10
1 2 3 4 5 6 7 8 9 10

- 5和2是同伙，继续使用靠左原归并，发生冲突，因为2号属于1号强盗，这时候遵循擒贼先擒王原则，将1号归属于5号。
- 注：为了提高寻找树的祖先速度，会将1号和2号都归属于5号强盗
5 5 3 3 5 6 7 8 9 10
1 2 3 4 5 6 7 8 9 10

- 4和6是同伙
5 5 3 3 5 3 7 8 9 10
1 2 3 4 5 6 7 8 9 10

- 2和6是同伙
5 5 5 3 5 5 7 8 9 10
1 2 3 4 5 6 7 8 9 10

- 8和7是同伙
5 5 5 3 5 5 8 8 9 10
1 2 3 4 5 6 7 8 9 10

- 9和7是同伙
5 5 5 3 5 5 9 9 9 10
1 2 3 4 5 6 7 8 9 10

- 1和6是同伙
5 5 5 3 5 5 9 9 9 10
1 2 3 4 5 6 7 8 9 10

- 2和4是同伙
5 5 5 5 5 5 9 9 9 10
1 2 3 4 5 6 7 8 9 10


## 本质
并查集的本质是维护一个森林，刚开始的时候每个点都是独立的，可以理解为每个点就是一颗只有一个节点的树。

然后通过条件来进行合并，合并的过程是寻找根节点的过程，合并过程要遵守靠左原则和擒贼先擒王规则，
在每次判断俩个节点是否在同一颗树中的时候，必须找到其根节点，要判断俩个节点是否是同一个根节点才行。


*/