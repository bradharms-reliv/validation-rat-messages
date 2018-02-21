<?php

namespace Reliv\ValidationRatMessages;

use Reliv\ValidationRatMessages\Api\FindCodeMessage;
use Reliv\ValidationRatMessages\Api\FindCodeMessageConfigFactory;
use Reliv\ValidationRatMessages\Api\GetMessageParams;
use Reliv\ValidationRatMessages\Api\GetMessageParamsFromOptionsFactory;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResult;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultBasicFactory;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFields;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFieldsByOptionFactory;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFieldsFlatWithSquareBrackets;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFieldsFlatWithSquareBracketsFactory;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFieldsNested;
use Reliv\ValidationRatMessages\Api\GetMessagesValidationResultFieldsNestedFactory;
use Reliv\ValidationRatMessages\Api\ParseMessageParams;
use Reliv\ValidationRatMessages\Api\ParseMessageParamsSingleBracketsFactory;

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
                    FindCodeMessage::class => [
                        'factory' => FindCodeMessageConfigFactory::class
                    ],

                    GetMessageParams::class => [
                        'factory' => GetMessageParamsFromOptionsFactory::class
                    ],

                    GetMessagesValidationResult::class => [
                        'factory' => GetMessagesValidationResultBasicFactory::class
                    ],

                    GetMessagesValidationResultFields::class => [
                        'factory' => GetMessagesValidationResultFieldsByOptionFactory::class
                    ],

                    GetMessagesValidationResultFieldsFlatWithSquareBrackets::class => [
                        'factory' => GetMessagesValidationResultFieldsFlatWithSquareBracketsFactory::class
                    ],

                    GetMessagesValidationResultFieldsNested::class => [
                        'factory' => GetMessagesValidationResultFieldsNestedFactory::class
                    ],

                    ParseMessageParams::class => [
                        'factory' => ParseMessageParamsSingleBracketsFactory::class
                    ],
                ],
            ],

            'validation-rat-messages-formats' => [
                'nested' => GetMessagesValidationResultFieldsNested::class,
                'flat-square-brackets' => GetMessagesValidationResultFieldsFlatWithSquareBrackets::class,
            ]
        ];
    }
}
