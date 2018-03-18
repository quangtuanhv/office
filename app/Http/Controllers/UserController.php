<?php

namespace App\Http\Controllers;

use App\ChucVu;
use App\DonVi;

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	public function dangky(Request $request) {
		$validatedData = $request->validate([
			'name'     => 'required|string|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed', ]);
		if ($validatedData) {
			$user           = new User;
			$user->name     = $request->name;
			$user->password = bcrypt($request->password);
			$user->save();

			return redirect('/dangkytaikhoanmoi')->with('notification', 'Tạo tài khoản thành công đăng nhập với tài khoản vừa tạo');
		}
	}

	public function postLogin(Request $request) {

		$data = [
		'name'     => $request->name,
		'password' => $request->password,
		];
		if (Auth::attempt($data)) {
			$user = Profile::where('user_id', Auth::id())->first();
			if (is_null($user)) {
				return redirect()->route('updateProfile', ['id' => Auth::id()]);
			} else {
				return redirect('/');
			}
		} else {
			return redirect('/')->with('error', 'bạn đã nhập sai tên đăng nhập hoặc mật khẩu');
		}

	}
	public function logout() {
		Auth::logout();
		return redirect('/');
	}
	public function getUpdate($id) {
		
			$chucVu = ChucVu::all();
			$donVi  = DonVi::all();
			$role   = Role::all();
			$user   = Profile::where('user_id', $id)->first();
			if ($user == null) {
				$acc = User::where('id', $id)->first();
				return view('user.newProfile', ['chucVu' => $chucVu, 'donVi' => $donVi, 'role' => $role, 'acc' => $acc]);
			}
			return view('user.updateProfile', ['chucVu' => $chucVu, 'donVi' => $donVi, 'role' => $role, 'user' => $user]);
		}
	
	public function postUpdate(Request $req, $id) {
		$user = Profile::where('id', $id)->first();
		if ($user == null) {
			$user = new Profile;
		}
		$user->fullname  = $req->fullname;
		$user->user_id   = $id;
		$user->phone     = $req->phone;
		$user->address   = $req->address;
		$user->email     = $req->email;
		$user->note      = $req->note;
		$user->gender    = $req->gender;
		$user->avatar    = $req->avatar;
		$user->chucVu_id = $req->chucVu_id;
		$user->donVi_id  = $req->donVi_id;
		$user->role_id   = $req->role_id;
		$user->save();
		return redirect('/');
	}
	public function getShowUser() {
		
			$user = Profile::with('chucVu', 'donVi')->get();
			$us   = Profile::with('chucVu', 'donVi')->get();
			return view('contact.showContact', compact('user', 'us'));
		}
	
	public function getShow($id) {
		
			$user = Profile::where('user_id', $id)->first();

			return view('user.detail', compact('user'));
	
	}
	public function ajaxLogin(Request $req) {
		$name = $_GET["name"];
		$qr   = User::where('name', $name)->first();
		if ($qr == null) {
			echo "Tên đăng nhập không tồn tại !";
		}
	}

}
