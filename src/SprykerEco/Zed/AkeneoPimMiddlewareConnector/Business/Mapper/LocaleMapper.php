<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\AkeneoPimMiddlewareConnector\Business\Mapper;

class LocaleMapper implements LocaleMapperInterface
{
    /**
     * @var string
     */
    protected const KEY_COLUMN_LOCALE_NAME = 'spy_locale.locale_name';

    /**
     * @var string
     */
    protected const KEY_COLUMN_LOCALE_ID = 'spy_locale.id_locale';

    /**
     * @param array $payload
     *
     * @return array
     */
    public function map(array $payload): array
    {
        return [
            $payload[static::KEY_COLUMN_LOCALE_NAME] => $payload[static::KEY_COLUMN_LOCALE_ID],
        ];
    }
}
