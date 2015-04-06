<?php

namespace tests\overrides;

use dosamigos\leaflet\plugins\geocoder\GeoCoderAsset;

class TestGeoCoderAsset extends GeoCoderAsset
{
    public $sourcePath = '@tests/../../src/assets';
}
