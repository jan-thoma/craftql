<?php

namespace markhuot\CraftQL\Types;

use markhuot\CraftQL\Builders\InterfaceBuilder;
use markhuot\CraftQL\FieldBehaviors\AssetTransformArguments;

class VolumeInterface extends InterfaceBuilder {

    function boot() {
        $this->addIntField('id');
        $this->addStringField('url')
            ->use(new AssetTransformArguments);

        $this->addStringField('width')
            ->use(new AssetTransformArguments);

        $this->addStringField('height')
            ->use(new AssetTransformArguments);

        $this->addIntField('size');
        $this->addField('folder')->type(VolumeFolder::class);
        $this->addStringField('mimeType');
        $this->addStringField('title');
        $this->addStringField('extension');
        $this->addStringField('filename');
        $this->addDateField('dateCreatedTimestamp');
        $this->addDateField('dateCreated');
        $this->addDateField('dateUpdatedTimestamp');
        $this->addDateField('dateUpdated');
    }

    function getResolveType() {
        return function ($type) {
            return ucfirst($type->volume->handle).'Volume';
        };
    }

}