<?php

namespace Reliv\ValidationRatMessages\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ParseMessageParamsSingleBrackets implements ParseMessageParams
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
    ): string {
        foreach ($messageParams as $param => $messageParam) {
            $message = str_replace(
                '{' . $param . '}',
                $messageParam,
                $message
            );
        }

        return $message;
    }
}
