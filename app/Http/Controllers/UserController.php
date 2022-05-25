<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
  public function show(string $name)
  {
      $user = User::where('name', $name)->first();
      $age = null;
      if(isset($user->birthday)){
        $now = date('Ymd');
        $adjustedBirthday = str_replace("-", "", $user->birthday);
        $age = floor(($now - $adjustedBirthday) / 10000);
      }

      return view('users.show', [
          'user' => $user,
          'age' => $age,
      ]);
  }
  public function edit(string $name)
  {
    $user = User::where('name', $name)->first();
    return view('users.edit', compact('user'));
  }

  public function update(UserRequest $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->gender = $request->gender;
    $user->birthday = $request->birthday;
    $user->address = $request->address;
    $user->self_introduction = $request->self_introduction;

    $user->save();
    return redirect()->route('users.show', $user->name);
  }


  public function editPassword()
  {
    return view('users.editPassword');
  }

  protected function validator(array $data)
    {
        return Validator::make($data,[
            'new_password' => 'required|string|min:6|confirmed',
            ]);
    }
  public function updatePassword(Request $request)
  {
    $user = Auth::user();
    if(!password_verify($request->current_password,$user->password))

      {
        return redirect()->route('password.edit')
            ->with('flash_message','パスワードが違います');
      }
      $this->validator($request->all())->validate();

      $user->password = bcrypt($request->new_password);
      $user->save();

      return redirect()->route('users.show', $user->name)
          ->with('flash_message','パスワードの変更が終了しました');

  }
}
