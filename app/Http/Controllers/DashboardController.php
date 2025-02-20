<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request) {
        $user = $request->user();
        return view("user.dashboard");
    }

    public function profile(Request $request) {
        $user = $request->user();
        $profile = $user->profile;
        return view("user.profile")->with([
            "user" => $user,
            "profile" => $profile
        ]);
    }
    public function profileSave(UpdateProfileRequest $request, User $user) {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            if(empty($data["password"])) {
                unset($data['password']);
            }
            $user->update($data);
            $profile = $user->profile;
            $profile->update($data);
            DB::commit();
            return redirect()->back()->with("success", "berhasil update profile");
        }catch(\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with("error", "terjadi kesalahan !");
        }
    }
}
