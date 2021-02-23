<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Storage\Exception;

class DataNotFoundException extends StorageException
{
    /**
     * Constructor
     *
     * @param string $key
     */
    public function __construct(string $key)
    {
        parent::__construct(
            sprintf('Could not find data with key: %s', $key)
        );
    }
}
