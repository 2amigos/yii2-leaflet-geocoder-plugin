<?php

namespace tests;


use dosamigos\leaflet\plugins\geocoder\GeoCoder;
use dosamigos\leaflet\plugins\geocoder\ServiceBing;
use dosamigos\leaflet\plugins\geocoder\ServiceMapQuest;
use dosamigos\leaflet\plugins\geocoder\ServiceNominatim;

class GeoCoderTest extends TestCase
{
   public function testNominatim() {
       $nominatim = new ServiceNominatim();
       $geocoder = new GeoCoder([
           'name' => 'testName',
           'service' => $nominatim
       ]);
       $this->assertEquals($nominatim, $geocoder->getService());
       $content = $geocoder->encode();

       $this->assertEquals('plugin:geocoder', $geocoder->getPluginName());
       $this->assertEquals(file_get_contents(__DIR__ . '/data/service.nominatim.bin'), $content);
   }

    public function testBing() {
        $bing = new ServiceBing(['key' => 'bogus-key']);
        $geocoder = new GeoCoder([
            'service' => $bing
        ]);
        $this->assertEquals($bing, $geocoder->getService());
        $content = $geocoder->encode();

        $this->assertEquals(file_get_contents(__DIR__ . '/data/service.bing.bin'), $content);
        $this->setExpectedException('yii\base\InvalidConfigException');
        $quest = new ServiceBing();
    }

    public function testMapQuest() {
        $quest = new ServiceMapQuest(['key' => 'bogus-key']);
        $geocoder = new GeoCoder([
            'service' => $quest
        ]);
        $this->assertEquals($quest, $geocoder->getService());
        $content = $geocoder->encode();

        $this->assertEquals(file_get_contents(__DIR__ . '/data/service.mapquest.bin'), $content);

        $this->setExpectedException('yii\base\InvalidConfigException');
        $quest = new ServiceMapQuest();
    }

}
