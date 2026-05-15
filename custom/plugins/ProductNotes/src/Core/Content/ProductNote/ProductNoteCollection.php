<?php declare(strict_types=1);

namespace ProductNotes\Core\Content\ProductNote;


use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class ProductNoteCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ProductNoteEntity::class;
    }
}