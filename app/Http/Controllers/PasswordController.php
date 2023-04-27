<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.password.edit');
    }
	
	/**
 * @param UpdatePasswordRequest $request
 * @return \Illuminate\Http\RedirectResponse
 */
	public function update(UpdatePasswordRequest $request)
	{
		$request->user()->update([
			'password' => Hash::make($request->get('password'))
		]);

		// return redirect('/berita')->with('status','Data Tersimpan');
		return redirect()->route('user.password.edit')->with('status','Password Berhasil Diganti');
	}
}
