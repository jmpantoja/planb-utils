
                                                                                                                                            
    
# StackInterface


> Interfaz para Stack
>
> 








## Methods

### clear
Removes all values from the collection.


**StackInterface::clear**() : 



---


### count
Returns the size of the collection.


**StackInterface::count**() : int



---


### copy
Returns a shallow copy of the collection.


**StackInterface::copy**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**StackInterface::isEmpty**() : bool



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent.
Some implementations may throw an exception if an array representation
could not be created.

**StackInterface::toArray**() : mixed[]



---


### peek
Returns the value at the top of the stack without removing it.


**StackInterface::peek**() : mixed



---


### pop
Returns and removes the value at the top of the stack.


**StackInterface::pop**() : mixed



---


### push
Pushes one value onto the top of the stack.


**StackInterface::push**(mixed $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|mixed |$input |  |

---


### pushAll
Pushes zero or more values onto the top of the stack.


**StackInterface::pushAll**([iterable](../../../iterable.md) $input) : [Stack](../../../Stack.md)


|Parameters: | | |
| --- | --- | --- |
|[iterable](../../../iterable.md) |$input |  |

---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                