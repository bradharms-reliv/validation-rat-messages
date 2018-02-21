<?php

namespace Reliv\ValidationRatMessages\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface ParseMessageParams
{
    /**
     * @param string $message
     * @param array  $messageParams
     *
     * @return string
     */
    public function __invoke(
        string $message,
        array $messageParams
    ): string;
}
