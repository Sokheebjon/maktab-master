<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminRepository implements AdminRepositoryInterface
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function teacher_store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'avatar' => ['mimes:jpeg,jpg,png,gif|max:10000']
        ]);
        $image = $request->file('avatar');

        if ($image) {
            $filename = date('Y-m-d-H:i:s') . "-" . $image->getClientOriginalName();
            $fullpath = 'media/' . $filename;

            Image::make($image->getRealPath())
                ->resize(300, 300)
                ->save($fullpath);
            $request->avatar = $fullpath;
        } else {
            $request->avatar = 'media/ave.jpeg';
        }
        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'] == 2 ? 2 : 3,
            'birth_date' => $request['birth_date'],
            'avatar' => $request->avatar
        ]);
    }

    public function all_teacher()
    {
        $teacher = User::where('role', 2)->get();
        return $teacher;
    }

    public function all_student()
    {
        $student = User::where('role', 3)->orderBy('id', 'desc')->get();
        return $student;
    }

    public function change_profile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users' . ($user->id ? ",id,$user->id" : ''),
            'email' => 'string|email|max:255|unique:users' . ($user->id ? ",id,$user->id" : ''),
            'avatar' => ['mimes:jpeg,jpg,png,gif|max:10000']
        ]);

        if (is_null($request->password)) {
            unset($request['password']);
        } else {
            $request->validate([
                'password' => ['required', 'string', 'min:4', 'confirmed'],
            ]);
            $request['password'] = Hash::make($request['password']);
        }
        $image = $request->file('avatar');

        if ($image) {
            if ($user->avatar)
//&& $user->avatar->getClientOriginalName() != "ave.jpeg"
                unlink($user->avatar);
            $filename = date('Y-m-d-H:i:s') . "-" . $image->getClientOriginalName();
            $fullpath = 'media/' . $filename;
            Image::make($image->getRealPath())
                ->resize(300, 300)
                ->save($fullpath);
        } else
            $fullpath = 'media/' .'ave.jpeg';

        $user->update(array_merge($request->all(), ['avatar' => $fullpath]));
        $student = User::where('role', $request->role)->orderBy('id', 'desc')->get();
        return $student;

    }

    public function deleting(User $user)
    {
        $user->delete();
    }
}
