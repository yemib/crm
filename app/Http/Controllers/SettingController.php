<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends AppBaseController
{
    /** @var SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display the specified Setting.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function show(Request $request)
    {
        $groupName = $request->get('group', 'general');

        //return  $groupName;
        $settings = $this->settingRepository->getSyncList($groupName);

        return view('settings.show', compact('settings', 'groupName'));
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param  UpdateSettingRequest  $request
     * @return RedirectResponse
     */
    public function update(UpdateSettingRequest $request)
    {



       // return ($size = $_FILES["favicon"]['name']);

        if ($request->get('group') == Setting::COMPANY_INFORMATION) {
            $request['phone'] = preparePhoneNumber($request, 'phone');
        }

        $this->settingRepository->updateSetting($request->all());

        //can you do the update here for log and favicon okay
        $setting_logo = Setting::where('key', 'logo')->first();
        $setting_favicon = Setting::where('key', 'favicon')->first();

        if(isset($_FILES["favicon"])){
            $sizet = $_FILES["favicon"]['size'];

            if($sizet !=  0){
                $output1  = "/uploads/".upload_files($_FILES["favicon"]);
                $setting_favicon ->update(['value' => $output1]);
            }
                }

        if(isset($_FILES["logo"])){
            $size = $_FILES["logo"]['size'];
            if($size !=  0){
           $output  = "/uploads/".upload_files($_FILES["logo"]);
           $setting_logo->update(['value' => $output]);
            }

        }


  // Check if a file was selected for upload
        Flash::success(__('messages.setting.setting_updated_successfully'));

        return redirect()->back();
     }




            }
