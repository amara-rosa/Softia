<?php

namespace Softia\Challenge\Browser;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Interface PageInterface
 */
interface PageInterface
{
    /**
     * @return UriInterface
     */
    public function getUrl(): UriInterface;

    /**
     * @return StreamInterface
     */
    public function getContent(): StreamInterface;
}
