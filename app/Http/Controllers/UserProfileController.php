<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function create()
    {
        $userprofile = UserProfile::all();
        return view('role.userprofile', compact('userprofile'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'fullname' => 'required',
        //     'lastname' => 'required',
        //     'address' => 'required',
        //     'contact' => 'required',
        //     'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'user_id' => 'required|exists:users,id',
        // ]);
      

        // Assuming user_id is provided by an authenticated user
        $userProfile = new UserProfile;
       
        $userProfile->fullname = $request->fullname;
        $userProfile->lastname = $request->lastname;
        $userProfile->address = $request->address;
        $userProfile->contact = $request->contact;
        $userProfile->user_id = $request->user_id;
      
        if ($request->hasFile('profileimage')) {
         
            $profileImage = $request->file('profileimage');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
            $userProfile->profileimage = 'profile_images/' . basename($imagePath);

        
        }
        // dd($userProfile);
        $userProfile->save();

        return redirect()->back()->with('success', 'User profile created successfully.');
    }

    

    public function index()
    {
        $userProfiles = UserProfile::all();
        return view('role.userprofile', compact('userprofile'));
    }
   
    public function edit($id)
{
    $userProfile = UserProfile::findOrFail($id);
    return view('role.edit_user_profile', compact('userProfile'));
}


    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'fullname' => 'required',
        //     'lastname' => 'required',
        //     'address' => 'required',
        //     'contact' => 'required',
        //     'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'user_id' => 'required|exists:users,id',
        // ]);

        $userProfile = UserProfile::findOrFail($id);
        $userProfile->fullname = $request->fullname;
        $userProfile->lastname = $request->lastname;
        $userProfile->address = $request->address;
        $userProfile->contact = $request->contact;
        $userProfile->user_id = $request->user_id;
        $userProfile->save();
        if ($request->hasFile('profileimage')) {
         
            $profileImage = $request->file('profileimage');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
            $userProfile->profileimage = 'storage/profile_images/' . basename($imagePath);
        
        }
        // dd($userProfile);
        $userProfile->save();


        return redirect()->route('userprofile')->with('success', 'User profile updated successfully.');
    }
    

    public function destroy($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        $userProfile->delete();

        return redirect()->back()->with('success', 'User profile deleted successfully.');
    }



}