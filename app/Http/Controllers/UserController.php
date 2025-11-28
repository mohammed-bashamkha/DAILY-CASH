<?php
namespace App\Http\Controllers;

use App\Http\Requests\EditMyAccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function showRegister()
    {
        return view('Auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->onlyInput('email');
    }

    public function showLogin()
    {
        return view('Auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function deleteMyAccount(Request $request) {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete(); // حذف جميع التوكنات المرتبطة بالمستخدم
            $user->delete(); // حذف حساب المستخدم
            return response()->json(['message' => 'Account deleted successfully'], 200);
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    public function updateMyAccount(EditMyAccountRequest $request) {
        $user = $request->user();
        if($user->id !== Auth::user()->id){
            return back()->withErrors(['message' => 'غير مصرح لك بتعديل هذا الحساب'])->onlyInput('id');
        }

        $data = $request->validated();

        if ($user) {
            if ($request->has('name')) {
                $user->name = $request->name;
            }
            if ($request->has('email')) {
                $user->email = $request->email;
            }
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
            if($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('Images','public');
                $user->profile_picture = $path;
            }
            $user->save();

            return redirect()->route('account.show')->with('success', 'تم تحديث الحساب بنجاح.');
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    public function showMyAccount(Request $request) {
        $user = $request->user();
        return view('account.show', compact('user'));
    }

    public function editMyAccount()
    {
        $user = Auth::user();
        return view('account.edit',compact('user'));
    }
}
