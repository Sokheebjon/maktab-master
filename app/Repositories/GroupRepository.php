<?php


namespace App\Repositories;

use App\Models\Group_user;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GroupRepository implements GroupRepositoryInterface
{
    public function all()
    {
        return Group::orderBy('id', 'desc')->get();
    }

    public function create(){
        return User::where('role', 2)->get();
    }

    /**
     * @param Request $request
     * @return Group
     */

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required'
        ]);
        Group::create($request->all());
    }

    /**
     * @param Request $request
     * @param Group $group
     */
    public function updateId(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $group->update($request->all());
    }

    public function deleting(Group $group){
        try {
            $group->delete();
        } catch (\Exception $e) {

        }
    }

    public function group_user(Group $group)
    {
        $users = Group::find($group->id)->users;

        return $users;
    }

    public function group_user_store(Request $request, Group $group)
    {
        $full_text = preg_split("/(\r\n|\n|\r)/", $request->about);

        for ($i = 0; $i < count($full_text); $i++) {

            $last_id = User::all()->last()->id;
            $last_id++;
            $full_row = explode(' ', $full_text[$i]);

            if ($full_row[0] != '') {
                if (array_key_exists(2, $full_row))
                    $data['date'] = $full_row[2];
                else
                    $data['date'] = null;

                $data['name'] = $full_row[0] . ' ' . $full_row[1];
                $username = explode(' ', $data['name']);
                $data['username'] = $username[0] . '_' . $last_id;
                $date['date'] = Carbon::parse($data['date']);

            } else {
                return back()->with('error', 'Ism yoki foydalanuvchi nomi belgilanmagan');
            }

            try {
                User::create([
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'password' => Hash::make($data['username']),
                    'role' => 3,
                    'birth_date' => $data['date'],
                    'avatar' => 'media/ave.jpeg'
                ]);
            } catch (QueryException $e) {
                return back()->with('error', $e->errorInfo[2]);
            }
            $request['user_id'] = $last_id;
            Group_user::create($request->all());
        }
    }

}
