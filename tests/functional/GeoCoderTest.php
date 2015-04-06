<?php

namespace tests;


use dosamigos\leaflet\plugins\geocoder\GeoCoder;
use dosamigos\leaflet\plugins\geocoder\ServiceBing;
use dosamigos\leaflet\plugins\geocoder\ServiceMapQuest;
use dosamigos\leaflet\plugins\geocoder\ServiceNominatim;

class GeoCoderTest extends TestCase
{
   public function testNominatimEncode() {
       $nominatim = new ServiceNominatim();
       $geocoder = new GeoCoder([
           'service' => $nominatim
       ]);
       $this->assertEquals($nominatim, $geocoder->getService());
       $content = $geocoder->encode();
       file_put_contents(__DIR__ . '/data/service.nominatim.bin', $content);
       $this->assertEquals('plugin:geocoder', $geocoder->getPluginName());
       $this->assertEquals(file_get_contents(__DIR__ . '/data/service.nominatim.bin'), $content);
   }

    public function testBingEncode() {
        $bing = new ServiceBing(['key' => 'bogus-key']);
        $geocoder = new GeoCoder([
            'service' => $bing
        ]);
        $this->assertEquals($bing, $geocoder->getService());
        $content = $geocoder->encode();
        file_put_contents(__DIR__ . '/data/service.bing.bin', $content);
        $this->assertEquals(file_get_contents(__DIR__ . '/data/service.bing.bin'), $content);
    }

    public function testMapQuestEncode() {
        $quest = new ServiceMapQuest(['key' => 'bogus-key']);
        $geocoder = new GeoCoder([
            'service' => $quest
        ]);
        $this->assertEquals($quest, $geocoder->getService());
        $content = $geocoder->encode();
        file_put_contents(__DIR__ . '/data/service.mapquest.bin', $content);
        $this->assertEquals(file_get_contents(__DIR__ . '/data/service.mapquest.bin'), $content);
    }

}
