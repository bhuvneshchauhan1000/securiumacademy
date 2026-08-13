<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
class AdminSiteSettingController extends Controller
{
    //
    protected array $fields = [
        "site_name",
        "site_url",
        "site_logo",
        "site_favicon",
        'contact_phone',
        'contact_phone_link',
        'contact_email',
        'whatsapp_url',
        'address_india',
        'address_dubai',
        'address_us',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'meta_title_default',
        'meta_description_default',
        'pay_now_usd_url',
        'pay_now_inr_url',
    ];

    public function edit()
    {
        $settings = [];
        foreach($this->fields as $field){
            $settings[$field] = SiteSetting::get($field);
        }
        return view('admin.site-settings.edit', compact('settings'));
    }

    public function update(Request $request){
        $request->validate([
            'site_logo' => ['nullable', 'image', 'max:2048'],
            'site_favicon' => ['nullable', 'image', 'max:2048'],
        ]);

        $fileFields = [
            'site_logo' => 'site-logos',
            'site_favicon' => 'site-favicons',
        ];

        foreach($this->fields as $field){
            if (isset($fileFields[$field])) {
                if ($request->hasFile($field)) {
                    $path = $request->file($field)->store($fileFields[$field], 'public');
                    SiteSetting::set($field, '/storage/' . $path);
                }
                continue;
            }
            SiteSetting::set($field, $request->input($field));
        }
        return redirect()->route('site-settings.edit')->with('success','Site settings updated successfully.');
    }
}
