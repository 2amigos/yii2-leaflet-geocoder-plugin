<?php

namespace tests\overrides;

use dosamigos\leaflet\plugins\geocoder\ServiceNominatimAsset;

class TestServiceNominatimAsset extends ServiceNominatimAsset
{
    public $sourcePath = '@tests/../../src/assets';

    public $depends = [
        'tests\overrides\TestGeoCoderAsset'
    ];
}
