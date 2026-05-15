<?php declare(strict_types=1);

namespace ProductNotes\Core\Content\ProductNote;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductNoteDefinition extends EntityDefinition
{
    public const string ENTITY_NAME = 'product_note';


    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return ProductNoteEntity::class;
    }

    public function getCollectionClass(): string
    {
        return ProductNoteCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->setFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->setFlags(new Required()),
            (new ReferenceVersionField(ProductDefinition::class, 'product_version_id'))->setFlags(new Required()),
            (new LongTextField('note', 'note'))->setFlags(new Required()),
            (new BoolField('solved', 'solved'))->setFlags(new Required()),
            (new ManyToOneAssociationField(
                'product',
                'product',
                ProductDefinition::class,
                'id',
                false
            ))
        ]);
    }
}