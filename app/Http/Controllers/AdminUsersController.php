<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Image;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreUserRequest $request)
    {
        $input = $request->all();

        $input['profile_photo'] = 'default.jpg';

        if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
            $input['profile_photo'] = $this->photoUpload($request);
        }

        $input['password'] = bcrypt($request['password']);

        $user = User::create($input);

        if ($input['profile_photo'] != 'default.jpg') {
            $photo = new Photo(['file_name' => $input['profile_photo']]);
            $user->photos()->save($photo);
        }

        return redirect('admin/users')->with('message', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();

        if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
            $input['profile_photo'] = $this->photoUpload($request);
            $photo = new Photo(['file_name' => $input['profile_photo']]);
            $user->photos()->save($photo);
            $user->update(['profile_photo' => $input['profile_photo']]);
        }

        if (!empty($request['password'])) {
            $input['password'] = bcrypt($request['password']);
            $user->update($input);
        } else {
            $user->update($request->only('name', 'email', 'role_id', 'is_active'));
        }

        return redirect('admin/users')->with('message', 'User successfully updated!');
    }


    private function photoUpload($request)
    {
        $image_file = $request->file('profile_photo');
        $image_name = time() . '_' . $image_file->getClientOriginalName();
        $destinationPath = public_path('/images/users');

        Image::make($image_file->getRealPath())->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);

        return $image_name;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
