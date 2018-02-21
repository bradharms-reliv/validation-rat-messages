<?php

namespace Reliv\ValidationRatMessages\Api;

use Reliv\ArrayProperties\Property;
use Reliv\ValidationRatMessages\Model\MessagesConfig;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class FindCodeMessageConfig implements FindCodeMessage
{
    protected $codeMessages;
    protected $defaultInvalidMessage;

    /**
     * @param array  $codeMessages
     * @param string $defaultInvalidMessage
     */
    public function __construct(
        array $codeMessages,
        string $defaultInvalidMessage = self::DEFAULT_INVALID_MESSAGE
    ) {
        $this->codeMessages = $codeMessages;
        $this->defaultInvalidMessage = $defaultInvalidMessage;
    }

    /**
     * @param string $code
     * @param array  $options
     *
     * @return string
     */
    public function __invoke(
        string $code,
        array $options = []
    ): string {
        $defaultInvalidMessage = Property::get(
            $options,
            self::OPTION_INVALID_MESSAGE,
            $this->defaultInvalidMessage
        );

        $message = Property::get(
            $this->codeMessages,
            $code,
            $defaultInvalidMessage
        );

        if (empty($message)) {
            return $defaultInvalidMessage;
        }

        if (is_string($message)) {
            return $message;
        }

        if (!is_array($message)) {
            return $defaultInvalidMessage;
        }

        $fieldName = Property::getString(
            $options,
            MessagesConfig::KEY_FIELD_NAME
        );

        if (empty($fieldName)) {
            // Default message
            return Property::getString(
                $message,
                MessagesConfig::KEY_DEFAULT,
                $defaultInvalidMessage
            );
        }

        $fieldMessage = Property::getString(
            $message,
            $fieldName
        );

        if (!empty($fieldMessage)) {
            return $fieldMessage;
        }

        return Property::getString(
            $message,
            MessagesConfig::KEY_DEFAULT,
            $defaultInvalidMessage
        );
    }
}
