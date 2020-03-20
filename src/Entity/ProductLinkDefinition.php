<?php


namespace CrehlerAssocExperiment\Entity;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;

class ProductLinkDefinition extends MappingEntityDefinition
{
    public const ENTITY_NAME = 'product_link';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new FkField('product_source_id', 'productSourceId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class, 'product_source_version_id'))->addFlags(new PrimaryKey(), new Required()),

            (new FkField('product_destination_id', 'productDestinationId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class, 'product_destination_version_id'))->addFlags(new PrimaryKey(), new Required()),

            new ManyToOneAssociationField('productSource', 'product_source_id', ProductDefinition::class, 'id', false),
            new ManyToOneAssociationField('productDestination', 'product_destination_id', ProductDefinition::class, 'id', false),
        ]);
    }
}
