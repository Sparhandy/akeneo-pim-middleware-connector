<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\AkeneoPimMiddlewareConnector\Business\Translator\TranslatorFunction;

use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\AbstractTranslatorFunction;
use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\TranslatorFunctionInterface;

class AddAttributeValues extends AbstractTranslatorFunction implements TranslatorFunctionInterface
{
    /**
     * @var string
     */
    protected const KEY_OPTIONS = 'options';

    /**
     * @var string
     */
    protected const KEY_VALUES = 'values';

    /**
     * @var string
     */
    protected const KEY_VALUE_TRANSLATIONS = 'value_translations';

    /**
     * @param mixed $value
     * @param array $payload
     *
     * @return mixed
     */
    public function translate($value, array $payload)
    {
        foreach ($value as $inputValueKey => $item) {
            $item[static::KEY_VALUES] = array_keys($payload[static::KEY_OPTIONS]);
            $item[static::KEY_VALUE_TRANSLATIONS] = [];
            foreach ($payload[static::KEY_OPTIONS] as $optionKey => $optionValue) {
                if (isset($optionValue[$inputValueKey])) {
                    $item[static::KEY_VALUE_TRANSLATIONS][$optionKey] = $optionValue[$inputValueKey];

                    continue;
                }
                $item[static::KEY_VALUE_TRANSLATIONS][$optionKey] = $optionKey;
            }
            $value[$inputValueKey] = $item;
        }

        return $value;
    }
}
