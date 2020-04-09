# GrizzIT Storage - Create a storage

Creating a new storage can be done by creating a new class which implements
the [StorageInterface](../../src/Common/StorageInterface.php). To prevent
having to implement all methods which are required by the `StorageInterface`,
it is also possible to extend the
[ObjectStorage](../../src/Component/ObjectStorage.php) class. By choosing this
approach, certain methods which require the custom logic can simply be
overwritten. However the parent object should still be updated, to keep the
class up to date with the latest changes.

For example, a class which should write to a file when a new value is being
set can be extended like so:

```php
<?php

namespace MyCompany\MyStorage\Component;

use GrizzIt\Storage\Component\ObjectStorage;

class MyFileStorage extends ObjectStorage
{
    /**
     * Sets data on a specific key within the storage.
     *
     * @param string|int $key
     * @param mixed  $data
     *
     * @return void
     */
    public function set($key, $data): void
    {
        $object = json_decode(file_get_contents('my-file.json'), true);
        $object[$key] = $data;
        file_put_contents('my-file.json', json_encode($object));

        parent::set($key, $data);
    }
}
```

Ofcourse, this isn't a pretty example, but an example nonetheless.

## Further reading

[Back to development index](index.md)
