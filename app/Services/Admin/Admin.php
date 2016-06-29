<?php
/**
 * Author: Mrold
 * Email: <lostphper@sina.com>
 * Github: https://github.com/mrold
 * Date: 2016/6/23
 * Time: 11:11
 */

namespace App\Services\Admin;


class Admin
{
    protected $assetPath;

    protected $pluginAssetPath;

    protected $staticAssetPath;

    public function __construct()
    {
        $this->assetPath = 'assets/admin';
        $this->pluginAssetPath = 'assets/public/plugins';
        $this->staticAssetPath = 'assets/public/static';
    }

    public function asset($path)
    {
        return asset($this->assetPath . '/' . trim($path, '/'));
    }

    public function pluginAsset($path)
    {
        return asset($this->pluginAssetPath . '/' . trim($path, '/'));
    }

    public function staticAsset($path)
    {
        return asset($this->staticAssetPath . '/' . trim($path, '/'));
    }
}