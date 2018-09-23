
                                                                                                                                            
    
# QueueInterface


> Interfaz para Queue
>
> 








## Methods

### clear
Removes all values from the collection.


**QueueInterface::clear**() : 



---


### count
Returns the size of the collection.


**QueueInterface::count**() : int



---


### copy
Returns a shallow copy of the collection.


**QueueInterface::copy**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**QueueInterface::isEmpty**() : bool



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent.
Some implementations may throw an exception if an array representation
could not be created.

**QueueInterface::toArray**() : mixed[]



---


### peek
Returns the value at the front of the queue without removing it.


**QueueInterface::peek**() : mixed



---


### pop
Returns and removes the value at the front of the Queue.


**QueueInterface::pop**() : mixed



---


### push
Pushes one value onto the top of the queue.


**QueueInterface::push**(mixed $input) : [Queue](../../../Queue.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$input |  |

---


### pushAll
Pushes zero or more values onto the top of the queue.


**QueueInterface::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                