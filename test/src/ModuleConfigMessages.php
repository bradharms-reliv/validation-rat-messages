<?php

namespace Reliv\ValidationRatMessages;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigMessages
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            /**
             * ===== Input Validation Messages =====
             * [
             *    '{code-1}' => 'code-1 Message with param ({test-param})',
             *    '{code-2}' => [
             *       '__default' => 'Default code-2 message',
             *       '{field-name}' => 'Field code-2 message'
             *    ],
             * ],
             */
            'validation-rat-messages' => [],
        ];
    }
}
