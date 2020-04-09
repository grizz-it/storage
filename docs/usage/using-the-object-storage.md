# GrizzIT Storage - Using the object storage

The [ObjectStorage](../../src/Component/ObjectStorage.php) is an implementation
of the [StorageInterface](../../src/Common/StorageInterface.php) to temporarily
store information within a process of the application. All information that is
stored in the storage will be lost when the process ends. The storage interface
enforces implementation to expose all `ArrayAccess` and `Traversable`
functionalities. This means that the storage can be used like an array and
iterated over in a `foreach`. The storage can be instantiated with a data set
by providing it in the constructor (this is not required).

```php
<?php

use GrizzIt\Storage\Component\ObjectStorage;

$storage = new ObjectStorage(['foo' => 'bar']);
echo $storage['foo']; // outputs bar

$storage['foo'] = 'baz';
echo $storage['foo']; // outputs baz
```

The object can still be treated like an object and provides a list of methods,
which can be invoked for similar functionality.

## Further reading

[Back to usage index](index.md)
