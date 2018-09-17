
                                                                                                                                            
    
# Collection


> Collection is the base interface which covers functionality common to all the
data structures in this library. It guarantees that all structures are
traversable, countable, and can be converted to json using json_encode().
>
> 








## Methods

### clear
Removes all values from the collection.


**Collection::clear**() : 



---


### count
Returns the size of the collection.


**Collection::count**() : int



---


### copy
Returns a shallow copy of the collection.


**Collection::copy**() : [Collection](../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**Collection::isEmpty**() : bool



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent.
Some implementations may throw an exception if an array representation
could not be created.

**Collection::toArray**() : mixed[]



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                