<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return User::findOrFail($id)->toArray();
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
		return view('admin.users.edit', ['user' => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// validate request
		$validateUser = Validator::make($request->get('User'), User::$rules);

		if ($validateUser->fails()) {
			return redirect()->back()->withErrors($validateUser)->withInput();
		}

		$user = User::findOrFail($id);
		$user->name = $request->input('User.name');
		$user->email = $request->input('User.email');
		$user->save();

		return redirect()->route('admin.users.edit', ['user' => $user])->with('announcement', 'Thông tin tài khoản đã được cập nhật!');
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

	public function changePassword()
	{
		return view('admin.users.changepassword', ['user' => Auth::user()]);
	}

	public function updatePassword(Request $request)
	{
		$messages = [
			'password.confirmed' => 'Bạn vui lòng xác nhận chính xác mật mã mới.',
		];
		
		$validateUser = Validator::make($request->get('User'), User::$rulesChangePassword, $messages);

		if ($validateUser->fails()) {
			return redirect()->back()->withErrors($validateUser)->withInput();
		}

		$user = User::findOrFail(Auth::user()->id);
		$user->fill([
			'password' => Hash::make($request->input('User.password'))
		])->save();
		return redirect()->route('admin.users.changepassword')->with('announcement', 'Mật mã đã được cập nhật!');
	}
}
