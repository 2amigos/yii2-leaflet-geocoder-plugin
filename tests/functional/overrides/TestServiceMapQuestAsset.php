<?php

namespace tests\overrides;

use dosamigos\leaflet\plugins\geocoder\ServiceMapQuestAsset;

class TestServiceMapQuestAsset extends ServiceMapQuestAsset
{
    public $sourcePath = '@tests/../../src/assets';

    public $depends = [
        'tests\overrides\TestGeoCoderAsset'
    ];
}
