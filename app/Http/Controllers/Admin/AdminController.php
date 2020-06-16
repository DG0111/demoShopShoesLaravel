<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckFormAddAdmin;
use App\Http\Requests\CheckFormEditAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:Super-Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::role(['Admin','Super-Admin','Write'])->paginate(10);
        return view('admin_.admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin_.admin.add-admin',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckFormAddAdmin $request)
    {
        $user = new User();
        $user->full_name = $request->full_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->state = 1;
        $user->password = Hash::make($request->password);;

        $user->save();
        $userAddNew = User::where('email',$request->email)->first();
        $userAddNew->assignRole($request->role);

        return redirect('admin/admin')->with(['data' => 'Thêm Quản trị viên thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::all();
        $admin = User::find($id);

        $idRole = Role::where('name',$admin->getRoleNames()->first())->first();


        return view('admin_.admin.edit-admin',compact('role','admin','idRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckFormEditAdmin $request, $id)
    {
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->state = 1;
        $user->password = Hash::make($request->password);;

        $user->save();

        $userEditNew = User::where('email',$request->email)->first();
        $role = $userEditNew->getRoleNames()->first();
        $userEditNew->removeRole($role);
        $userEditNew->assignRole($request->role);
        return redirect('admin/admin')->with(['data' => 'Sửa Quản trị viên thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with(['data' => 'Xóa quản trị viên thành Công ^)^']);
    }
}
