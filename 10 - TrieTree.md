### 前缀树

前缀树一般用于字符串检索；与其他树不同，前缀树是由节点和边组成，边对应数据数据项，而节点存储相对于边的信息。



节点落地结构

```php
class TrieNode
{
    public $end;
    
    // public TrieNode[] nexts;
    public $map;
    
    public $pass;
}
```

- end

  end变量存储由多少条边是以当前节点作为结束的。

  这里的边是抽象的，可以认为是由多少个数据项是以当前节点作为结束的。

- map

  map是边的集合，它映射的是每条边所对应的下一个节点。

  例如一个节点有走向A的路，会使用HashTable，以key是字符A，value是下一个节点来进行存储，以表示当前节点有走向A的路。

- pass

  该变量表示有多少条边经过该节点，由于边对应着具体的字符，也表示有多少个字符经过该节点，可以用于计算一个字符作为前缀出现的次数。



### API

insert($word)，假设要插入字符串"acb"，会有以下步骤：

- 将字符串切割成字符数组。

- 遍历整个字符数组，寻找每个字符（每条边）对应的节点。

  以头节点作为当前节点，从map中寻找是否有a字符对应的节点，如果没有新建节点，以字符a作为key，新节点作为value存储到map中；如果有，将当前节点设置为下一个节点。

  同时当前节点的pass变量加1，表示有多少个字符经过该节点。

- 重复步骤2处理字符c和b，直到遍历结束。
- 在遍历结束后，当前节点将会指向最后一个节点，将该节点的end变量加1，表示有字符串以该节点作为结尾。



delete($word)

- 将字符串切割成字符数组。

- 遍历整个字符数组，以头节点作为当前节点，寻找每个字符对应的节点。

  每寻找到一个字符对应的节点，都会将节点的pass变量减1，如果减少后的pass变量等于0，表示没有任何字符经过该节点，因此可以将该字符对应的节点置空。

- 在遍历结束后，将当前节点的end变量减-，表示该字符串已经从树中移除。



search()



prefixNums()

查找一个字符串前缀出现的次数。





### 时间复杂度

在建立后前缀树后，查询某个字符串是否在数组中，跟样本量是没关系的，跟样本的数据大小有关。