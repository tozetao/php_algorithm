### 布隆过滤器
布隆过滤器是一个大集合的概念，主要是为了在一个非常大的集合中确定某个数据项是否存在的一个过滤器，它会有一定的失误率；

- 失误率：如果一个数据项存在集合中，BloomFilter一定会确定该数据项在集合中，但是一个不存在集合中的数据项，BloomFilter也可能有几率认为它存在集合中。

#### 落地结构

工程上是一个大数组结构，数组中的每个位置都代表某段比特位，例如：

```php
int[] array = new int[100];
```

在这个长度100的int型数组中，array[0]表示0-31的bit位，array[1]表示32-63的bit位，所以该数据能够表示3200个bit位，每个bit位非0即1。

- 描黑操作

  先计算在哪个整数上描黑，再计算在该整数上哪个bit位上描黑，例如要在2985个bit位上描黑，先确定整数位：floor(2985/32)，再确定bit位：2985%32。



#### 失误率





#### 数的划分

- 问题：假定s作为基础划分数量，问一个数能进行多少次划分？

  解答：如果不满一份的数量，结果将小于1；如果满足一份的数量，结果等于1；如果超过一份的数量，结果大于1；所以x/s的结果向上取整，即是划分的次数。

  注：在计算机中由于索引是从0开始的，所以需要向下取整。



布隆过滤器就是比特类型的数组，一个位的数不是0就是1，假设这个数组最低位是0，最高位是m-1，长度是m，
长度是m的bit位数组，大小是m/8个字节。

添加一个url
在有这个数组后，添加一个url时，准备k个哈希函数，分别是h1-hk，url经过k个哈希函数计算后会得到v1-vh个哈希值，
将v1-vh个哈希值分别%m，计算出来的k个值会在0至m-1之间，只需要相应的k个位改为1即可。

注意哈希函数要独立的非重复实现的。

- 验证一个url
  将url经过k个哈希函数计算并模以m，查看k个值对应的位是否为1，只要有1个值对应的位不为1，那么就认为非重复，相反则重复。

- 失误率
    因为布隆规律器空间太小，它已经有相当多的位置变黑了，在查询一个url是，位是1的概率就很高了，自然出错。
    例如处理1亿个url时，布隆过滤器m只有10个空间，假设有4个哈希函数，%10后的4个值分布在m空间上，重复的概率是很高的，

- 预期失误率的计算
    假设样本量为n，失误率为p，求布隆过滤器m的比特位大小和哈希函数个数。

    m = - (n*lnP) / (ln2)^2
    k = ln2 * m/n 约等于 0.7 * m/2

    由于m和k求出来的结果可能是小数，所以要向上取整，取整后概率P也发生变化，
    P = (1 - E的负n*k/m次方)的k次方

    假设有10亿个url，要求失误率为万分之一，求m和k。