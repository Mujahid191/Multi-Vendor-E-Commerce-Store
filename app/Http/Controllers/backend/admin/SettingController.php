<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    // website Details
    public function adminWebsiteSettings(){
        $siteDetails = Settings::first();
        return view('admin.siteSetting.siteDetails', compact('siteDetails'));
    }

    // Website setting Update
    public function adminWebsiteSettingsUpdate(Request $request){
    if( empty($request->file('new_logo')) ){
        $imageName = $request->old_logo;
    }else{
        $image = $request->file('new_logo');
        $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/logo/' . $imageName);
        // Resize Image
        Image::make($image)->resize(180, 55)->save($path);

        if( !empty($request->old_logo) ){
            $previousImage = public_path('images/logo/' . $request->old_logo);
            file_exists($previousImage) ? unlink($previousImage) : '';
        }
    }
        $siteDetails = Settings::find($request->id);
        $siteDetails->support_phone = $request->support_phone;
        $siteDetails->logo = $imageName;
        $siteDetails->phone = $request->phone;
        $siteDetails->email = $request->email;
        $siteDetails->facebook = $request->facebook;
        $siteDetails->twitter = $request->twitter;
        $siteDetails->youtube = $request->youtube;
        $siteDetails->instagram = $request->instagram;
        $siteDetails->address = $request->address;
        $siteDetails->copyright = $request->copyright;
        $siteDetails->created_at = Carbon::now();
        $notification = array(
            'message' => 'Website Details Update successfully.',
            'alert-type' => 'success',
        );
        if($siteDetails->save()) {
            return redirect()->back()->with($notification);
        }
    }

    // Website SEO Routes
    public function adminWebsiteSeo(){
        $seo = Seo::first();
        return view('admin.siteSetting.siteSEO', compact('seo'));
    }

    // Website SEO Details Update
    public function adminWebsiteSeoUpdate(Request $request)
    {
        $seo = Seo::find($request->id)->update($request->all());
        $notification = array(
            'message' => 'SEO Details Update successfully.',
            'alert-type' => 'success',
        );
        if($seo) {
            return redirect()->back()->with($notification);
        }
    }
}
