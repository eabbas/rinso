<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function createColor()
    {
        $settings = setting::all();
        return view('admin.settings.colors.createColor', ['settings' => $settings]);
    }

    public function upsertColor(Request $request)
    {
        $datas = $request->except('_token');
        foreach ($datas as $key => $data) {
            $finalData[] = ['meta_key' => $key, 'meta_value' => $data];
        }
        setting::upsert($finalData, ['meta_key'], ['meta_value']);
        return to_route('home');
    }

    public function showColors()
    {
        dd(setting::all());
    }

    public function createLogo()
    {
        return view('admin.settings.logo.createLogo');
    }

    public function upsertLogo(Request $request)
    {
        $type = request()->logoImage->getClientOriginalExtension();
        $name = $request->logoImage->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('logoImage')->storeAs('logo', $fullName, 'public');
        $logo[] = ['meta_key' => 'logo', 'meta_value' => $path];

        setting::upsert($logo, ['meta_key'], ['meta_value']);
        return 'با موفقیت ثبت شد';
    }

    public function showLogo()
    {
        $logo = setting::where('meta_key', 'logo')->first();
        return view('admin.settings.logo.singleLogo', ['logo' => $logo]);
    }

    public function createMainAds()
    {
        return view('admin.settings.mainAds.createMainAds');
    }

    public function upsertMainAds(Request $request)
    {
        $type = request()->mainAdsImage->getClientOriginalExtension();
        $name = $request->mainAdsImage->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('mainAdsImage')->storeAs('mainAds', $fullName, 'public');
        $mainAds[] = ['meta_key' => 'mainAds', 'meta_value' => $path];

        setting::upsert($mainAds, ['meta_key'], ['meta_value']);
        return 'با موفقیت ثبت شد';
    }

    public function showMainAds()
    {
        $mainAds = setting::where('meta_key', 'mainAds')->first();

        return view('admin.settings.mainAds.singleMainAds', ['mainAds' => $mainAds]);
    }

    public function createMainBanner()
    {
        return view('admin.settings.mainBanner.createMainBanner');
    }

    public function upsertMainBanner(Request $request)
    {
        $type = request()->mainBannerImage->getClientOriginalExtension();
        $name = $request->mainBannerImage->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('mainBannerImage')->storeAs('mainBanner', $fullName, 'public');
        $mainBanner[] = ['meta_key' => 'mainBanner', 'meta_value' => $path];

        setting::upsert($mainBanner, ['meta_key'], ['meta_value']);
        return 'با موفقیت ثبت شد';
    }

    public function showMainBanner()
    {
        $mainBanner = setting::where('meta_key', 'mainBanner')->first();

        return view('admin.settings.mainBanner.singleMainBanner', ['mainBanner' => $mainBanner]);
    }

    public function createSingleAds()
    {
        return view('admin.settings.singleAds.createSingleAds');
    }

    public function upsertSingleAds(Request $request)
    {
        $name = $request->singleAdsImage->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('singleAdsImage')->storeAs('singleAds', $fullName, 'public');
        $singleAds[] = ['meta_key' => 'singleAds', 'meta_value' => $path];

        setting::upsert($singleAds, ['meta_key'], ['meta_value']);
        return 'با موفقیت ثبت شد';
    }

    public function showSingleAds()
    {
        $singleAds = setting::where('meta_key', 'singleAds')->first();

        return view('admin.settings.singleAds.singleAdsImage', ['singleAds' => $singleAds]);
    }

    public function createCategoryAds()
    {
        return view('admin.settings.categoryAds.createCategoryAds');
    }

    public function upsertCategoryAds(Request $request)
    {
        $name = $request->categoryAdsImage->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('categoryAdsImage')->storeAs('categoryAds', $fullName, 'public');
        $categoryAds[] = ['meta_key' => 'categoryAds', 'meta_value' => $path];

        setting::upsert($categoryAds, ['meta_key'], ['meta_value']);
        return 'با موفقیت ثبت شد';
    }

    public function showCategoryAds()
    {
        $categoryAds = setting::where('meta_key', 'categoryAds')->first();
        return view('admin.settings.categoryAds.singleCategoyAdsImage', ['categoryAds' => $categoryAds]);
    }
}
