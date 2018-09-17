
                                                                                                                                            
    
# TraitCollection


> Common to structures that implement the base collection interface.
>
> 








## Methods

### clear
Removes all values from the collection.


**TraitCollection::clear**() : [Collection](../../../Collection.md)



---


### isEmpty
Returns whether the collection is empty.
This should be equivalent to a count of zero, but is not required.
Implementations should define what empty means in their own context.

**TraitCollection::isEmpty**() : bool



---


### count
Returns the size of the collection.


**TraitCollection::count**() : int



---


### jsonSerialize
Returns a representation that can be natively converted to JSON, which is
called when invoking json_encode.


**TraitCollection::jsonSerialize**() : mixed[]



---


### copy
Creates a shallow copy of the collection.


**TraitCollection::copy**() : [Collection](../../../Collection.md)



---


### toArray
Returns an array representation of the collection.
The format of the returned array is implementation-dependent. Some
implementations may throw an exception if an array representation
could not be created (for example when object are used as keys).

**TraitCollection::toArray**() : mixed[]



---


### __debugInfo
Invoked when calling var_dump.


**TraitCollection::__debugInfo**() : mixed[]



---


                                                                                                                                                                                                                                                                                                                                                                                                            
    
                                                                                                                                                                                                                                                                             
                