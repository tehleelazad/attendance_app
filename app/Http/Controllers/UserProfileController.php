<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
    }
    function login (Request $request)
    { 
         $user = User::where('email', $request->email)->first(); // Adjusted model usage

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'credentials does not match'
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }
  public function create()
        {
            $userprofile = UserProfile::all();
            // return view('role.userprofile', compact('userprofile'));
            return response()->json(['userprofile' => $userprofile]);
        }
        public function store(Request $request)
        {
            // $request->validate([
                //    'email' => 'required|email|unique:user,email',
                //    'password' => 'required|min:6',
                //    'is_active' => 'required',
                //    'role_id' => 'required|exists:role,id',
               
            // ]);  
              // Assuming user_id is provided by an authenticated user
            $user=new User;
            $user->email = $request->email;
            $user->password = Hash::make ($request->password);
            $user->role_id = $request->role_id;
            $user->save();
          
// creatinng userprofile
            $userProfile = new UserProfile;
            $userProfile->fullname = $request->fullname;
            $userProfile->lastname = $request->lastname;
            $userProfile->address = $request->address;
            $userProfile->contact = $request->contact;
            $userProfile->user_id =  $user->id;
          
            if ($request->hasFile('profileimage')) {
             
                $profileImage = $request->file('profileimage');
                $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
                $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
                $userProfile->profileimage = 'profile_images/' . basename($imagePath);
                $userProfile->save();
            return response()->json(['message' => 'User profile stored successfully.', 'userprofile' => $userProfile,'user'=>$user]);
                }
        }


        public function index()
        {
            $userProfiles = UserProfile::all();
            return view('role.userprofile', compact('userprofile'));
        }
       
        public function edit($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        // return view('role.edit_user_profile', compact('userProfile'));
        return response()->json(['message' => 'User profile stored successfully.', 'userprofile' => $userProfile,'user'=>$user]);

    }
        public function updateprofile(Request $request, $id)
{
    $userProfile = UserProfile::findOrFail($id);

    // Update specific fields if they are present in the request
    if ($request->filled('fullname')) {
        $userProfile->fullname = $request->fullname;
    }

    if ($request->filled('lastname')) {
        $userProfile->lastname = $request->lastname;
    }

    if ($request->filled('address')) {
        $userProfile->address = $request->address;
    }

    if ($request->filled('contact')) {
        $userProfile->contact = $request->contact;
    }

    if ($request->filled('user_id')) {
        $userProfile->user_id = $request->user_id;
    }

    // Update profile image if a new image is uploaded
    if ($request->hasFile('profileimage')) {
        $profileImage = $request->file('profileimage');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
        $userProfile->profileimage = 'storage/profile_images/' . basename($imagePath);
    }
    $userProfile->save();
    return response()->json(['message' => 'User profile updated successfully.', 'userprofile' => $userProfile]);
}
        public function destroy(Request $request,$id)
        {
            // dd($request);
            $user = User::findOrFail($id);
            $user->is_active=0;
             $user->save();
            return response()->json(['message' => 'User status updated  successfully.', 'user' => $user,]);
        }

        public function getUserDetails(Request $request)
    {
        $user = $request->user(); // Retrieve the authenticated user

        // $user = Auth::user();

        // return response()->json(['message' => 'User status updated',"user"=>$user,]);
        // if ($user) {
            // User is logged in, you can access their details
            // $userId = $user->id;
            $email = $user->email;
            $password=$user->password;
            $isActive = $user->is_active;
            $roleId = $user->role_id;

            // Accessing related model (assuming you have defined the relationship)
            $role = $user->role;
            $title = $role ? $role->title : null;

            // Return user details as JSON response
            return response()->json([
                'id' => $userId,
                'email' => $email,
                'is_active' => $isActive,
                'role_id' => $roleId,
                'role_name' => $roleName,
            ]);
        // } else {
            // User is not logged in
            return response()->json(['message' => 'User not logged in.'], "user"->$user);
        }
        public function updateuser(Request $request, $id){
            $user = User::findOrFail($id);
            if ($request->filled('email')) {
                $user->email = $request->email;
            }
                if ($request->filled('password')) {
                    $user->password =Hash::make ( $request->password);
                }
                if ($request->filled('is_active')) {
                    $user->is_active = $request->is_active;
                }
            
       $user->save();
       return response()->json(['message' => 'User updated successfully.', 'user' => $user]);

            }
    }