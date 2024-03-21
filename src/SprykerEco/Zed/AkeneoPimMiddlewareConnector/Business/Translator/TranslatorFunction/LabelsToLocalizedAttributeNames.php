<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\AkeneoPimMiddlewareConnector\Business\Translator\TranslatorFunction;

use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\AbstractTranslatorFunction;
use SprykerMiddleware\Zed\Process\Business\Translator\TranslatorFunction\TranslatorFunctionInterface;

class LabelsToLocalizedAttributeNames extends AbstractTranslatorFunction implements TranslatorFunctionInterface
{
    /**
     * @var string
     */
    protected const KEY_NAME = 'name';

    /**
     * @param mixed $value
     * @param array $payload
     *
     * @return mixed
     */
    public function translate($value, array $payload)
    {
        $defaultLocales = $this->getLocales();

        $key = $this->options['key'] ?? static::KEY_NAME;

        if (!$value && $defaultLocales) {
            $code = $payload['category_key'];
            foreach ($defaultLocales as $locale) {
                $value[$locale] = [
                    $key => $code,
                ];
            }

            return $value;
        }

        return array_map(function ($value) use ($key) {
            return [
                $key => $value,
            ];
        }, $value);
    }

    /**
     * @return array
     */
    protected function getLocales(): array
    {
        return $this->options['defaultLocales'] ?? [];
    }
}
