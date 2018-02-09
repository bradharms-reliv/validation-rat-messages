<?php

namespace Reliv\ValidationRatMessages;

use Reliv\ValidationRatMessages\Api\GetMessagesValidationResult;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultBasicFactory;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFields;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFieldsBasicFactory;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfig
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'config_factories' => [
                    GetMessagesValidationResult::class => [
                        'factory' => GetMessagesValidationResultBasicFactory::class
                    ],
                    GetMessagesValidationResultFields::class => [
                        'factory' => GetMessagesValidationResultFieldsBasicFactory::class
                    ],
                ],
            ],
        ];
    }
}
