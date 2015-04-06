<?php

namespace tests;

use tests\overrides\TestGeoCoderAsset;
use tests\overrides\TestServiceBingAsset;
use tests\overrides\TestServiceMapQuestAsset;
use tests\overrides\TestServiceNominatimAsset;
use yii\web\AssetBundle;

class AssetsTest extends TestCase
{
    public function testGeoCoderAssetRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestGeoCoderAsset::register($view);
        $this->assertCount(2,$view->assetBundles);
        $this->assertTrue($view->assetBundles['tests\\overrides\\TestGeoCoderAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('leaflet-src.js', $content);
        $this->assertContains('l.control.geocoder.js', $content);

    }

    public function testServiceBingAssetRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestServiceBingAsset::register($view);
        $this->assertCount(3,$view->assetBundles);
        $this->assertTrue($view->assetBundles['tests\\overrides\\TestServiceBingAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('leaflet-src.js', $content);
        $this->assertContains('l.control.geocoder.bing.js', $content);

    }

    public function testServiceMapQuestAssetRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestServiceMapQuestAsset::register($view);
        $this->assertCount(3,$view->assetBundles);
        $this->assertTrue($view->assetBundles['tests\\overrides\\TestGeoCoderAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('leaflet-src.js', $content);
        $this->assertContains('l.control.geocoder.mapquest.js', $content);

    }

    public function testServiceNominatimAssetRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestServiceNominatimAsset::register($view);
        $this->assertCount(3,$view->assetBundles);
        $this->assertTrue($view->assetBundles['tests\\overrides\\TestGeoCoderAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('leaflet-src.js', $content);
        $this->assertContains('l.control.geocoder.nominatim.js', $content);

    }
}
