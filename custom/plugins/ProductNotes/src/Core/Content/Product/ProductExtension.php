<?php declare(strict_types=1);

namespace ProductNotes\Core\Content\Product;

use ProductNotes\Core\Content\ProductNote\ProductNoteDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;

class ProductExtension extends EntityExtension
{
    public const string EXTENSION_NAME = 'productNotes';

    public function getEntityName(): string
    {
        return ProductNoteDefinition::ENTITY_NAME; //product
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                self::EXTENSION_NAME,
                ProductNoteDefinition::class,
                'product_id')
        );
    }
}