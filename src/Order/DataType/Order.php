<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\GraphQL\Storefront\Order\DataType;

use DateTimeInterface;
use OxidEsales\GraphQL\Base\DataType\DateTimeImmutableFactory;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use TheCodingMachine\GraphQLite\Types\ID;

/**
 * @Type()
 */
final class Order extends AbstractOrderDataType
{
    /**
     * @Field()
     */
    public function getId(): ID
    {
        return new ID($this->order->getId());
    }

    /**
     * @Field()
     */
    public function getOrderNumber(): int
    {
        return (int)($this->order->getRawFieldData('oxordernr'));
    }

    /**
     * @Field()
     */
    public function getInvoiceNumber(): int
    {
        return (int)($this->order->getInvoiceNum());
    }

    /**
     * @Field()
     */
    public function getPaid(): ?DateTimeInterface
    {
        $paid = (string)$this->order->getRawFieldData('oxpaid');

        return DateTimeImmutableFactory::fromString($paid);
    }

    /**
     * @Field()
     */
    public function getRemark(): string
    {
        return (string)($this->order->getRawFieldData('oxremark'));
    }

    /**
     * @Field()
     */
    public function getCancelled(): bool
    {
        return (bool)($this->order->getRawFieldData('oxstorno'));
    }

    /**
     * @Field()
     */
    public function getInvoiced(): ?DateTimeInterface
    {
        $invoiceDate = (string)$this->order->getRawFieldData('oxbilldate');

        return DateTimeImmutableFactory::fromString($invoiceDate);
    }

    /**
     * @Field()
     */
    public function getOrdered(): ?DateTimeInterface
    {
        return DateTimeImmutableFactory::fromString(
            (string)$this->order->getRawFieldData('oxorderdate')
        );
    }

    /**
     * @Field()
     */
    public function getUpdated(): ?DateTimeInterface
    {
        return DateTimeImmutableFactory::fromString(
            (string)$this->order->getRawFieldData('oxtimestamp')
        );
    }
}
