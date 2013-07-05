<?php

namespace Clue\Redis\Protocol;

use Clue\Redis\Protocol\ProtocolInterface;
use Clue\Redis\Protocol\ProtocolExtPhpiredis;
use Clue\Redis\Protocol\ProtocolBuffer;

/**
 * Simple static factory method used to instanciate the best available protocol implementation
 */
class Factory
{
    /**
     * instanciate the best available protocol implementation
     *
     * @return ProtocolInterface
     */
    public static function create()
    {
        if (function_exists('phpiredis_reader_create')) {
            return new ProtocolExtPhpiredis();
        }
        return new ProtocolBuffer();
    }
}
