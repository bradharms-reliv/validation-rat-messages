<?php

namespace Reliv\ValidationRatMessages\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface FindCodeMessage
{
    const OPTION_INVALID_MESSAGE = 'invalid-message';
    const DEFAULT_INVALID_MESSAGE = 'Value is invalid';

    /**
     * @param string $code
     * @param array  $options
     *
     * @return string
     */
    public function __invoke(
        string $code,
        array $options = []
    ):string;
}
