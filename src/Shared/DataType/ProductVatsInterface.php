<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\GraphQL\Storefront\Shared\DataType;

interface ProductVatsInterface
{
    public function getVatRate(): float;

    public function getVatPrice(): float;
}
