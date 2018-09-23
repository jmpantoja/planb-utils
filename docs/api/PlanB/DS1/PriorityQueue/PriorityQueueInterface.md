
                                                                                                                                            
    
# PriorityQueueInterface


> Interfaz para PriorityQueue
>
> 








## Methods

### clear
Removes all values from the collection.


**PriorityQueueInterface::clear**() : 



---


### count
Returns the size of the collection.


**PriorityQueueInterface::count**() : int



---


### copy
Creates a shallow copy of the collection.


**PriorityQueueInterface::copy**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**PriorityQueueInterface::isEmpty**() : bool



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent.
Some implementations may throw an exception if an array representation
could not be created.

**PriorityQueueInterface::toArray**() : mixed[]



---


### peek
Returns the value with the highest priority in the priority queue.


**PriorityQueueInterface::peek**() : mixed



---


### pop
Returns and removes the value with the highest priority in the queue.


**PriorityQueueInterface::pop**() : mixed



---


### push
Pushes a value into the queue, with a specified priority.


**PriorityQueueInterface::push**(mixed $value, int $priority = 0) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$value |  |
|int |$priority |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**PriorityQueueInterface::pushAll**([iterable](../../../iterable.md) $input) : [PriorityQueue](../../../PriorityQueue.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                