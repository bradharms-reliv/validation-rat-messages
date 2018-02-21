<?php

namespace Reliv\ValidationRatMessages\Api;

use Reliv\ValidationRat\Model\ValidationResult;
use Reliv\ValidationRat\Model\ValidationResultFields;

class GetMessagesValidationResultFieldsNested implements GetMessagesValidationResultFields
{
    const DEFAULT_MESSAGE = 'Value is invalid';
    const MESSAGES_KEY = 'messages';

    protected $getMessagesValidationResult;

    /**
     * @param GetMessagesValidationResult $getMessagesValidationResult
     */
    public function __construct(
        GetMessagesValidationResult $getMessagesValidationResult
    ) {
        $this->getMessagesValidationResult = $getMessagesValidationResult;
    }

    /**
     * @param ValidationResultFields $validationResultFields
     * @param array $options
     *
     * @return  array ['{field-name}' => ['{code}' => '{message}']]
     */
    public function __invoke(
        ValidationResultFields $validationResultFields,
        array $options = []
    ): array {
        $fieldResults = $validationResultFields->getFieldResults();

        return $this->buildMessagesValidationFields(
            $fieldResults,
            [],
            $options
        );
    }

    /**
     * @param array $fieldResults
     * @param array $messages
     * @param array $options
     *
     * @return array
     */
    public function buildMessagesValidationFields(
        array $fieldResults,
        array $messages = [],
        array $options = []
    ): array {
        foreach ($fieldResults as $fieldName => $validationResult) {
            $messages = $this->buildMessages(
                $fieldName,
                $validationResult,
                $messages,
                $options
            );
        }

        return $messages;
    }

    /**
     * @param string $fieldName
     * @param ValidationResult $validationResult
     * @param array $messages
     * @param array $options
     *
     * @return array
     */
    public function buildMessages(
        string $fieldName,
        ValidationResult $validationResult,
        array $messages = [],
        array $options = []
    ): array {
        if ($validationResult instanceof ValidationResultFields) {
            $options[static::KEY_FIELD_NAME] = $fieldName;
            $subMessages = $this->buildMessagesValidationFields(
                $validationResult->getFieldResults(),
                [],
                $options
            );

            $messages = [$fieldName => [static::MESSAGES_KEY => $subMessages]];

            return $messages;
        }

        $options[static::KEY_FIELD_NAME] = $fieldName;
        $messages[$fieldName] = $this->getMessagesValidationResult->__invoke(
            $validationResult,
            $options
        );

        return $messages;
    }
}
