<?php

namespace tests\overrides;

use dosamigos\leaflet\plugins\geocoder\ServiceBingAsset;

class TestServiceBingAsset extends ServiceBingAsset
{
    public $sourcePath = '@tests/../../src/assets';

    public $depends = [
        'tests\overrides\TestGeoCoderAsset'
    ];
}
