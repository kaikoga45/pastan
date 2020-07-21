<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

use App\Mail\VerifiedEmail;
use App\Mail\ForgetPass;

use Auth;
use App\User;

class authCont extends Controller
{
    public function viewLogin(){
        return view('authentication.login');
    }

    public function login(Request $req){
        if(Auth::attempt($req->only('email', 'password'))){
            $data_user = Auth::user();
            if ($data_user->email_verified == 'false') {
                if ($data_user->verified_code == 0) {
                    $generated_verified_code = rand(100000, 900000);
                    $data_user = User::where('id','=', Auth::user()->id)->first();
                    $data_user->verified_code = $generated_verified_code;
                    $data_user->image_path = 'src/images/avatar.png';
                    $data_user->save();

                    $nama = $data_user->name;
                    $code = $generated_verified_code;
                    $email = $data_user->email;

                    $data = array(
                        'name' => $nama,
                        'code' => $code
                    );
            
                    Mail::to($email)->send(new VerifiedEmail($data));

                    return redirect('/verified');
                }else{
                    return redirect('/verified');
                }
            }else{
                if($data_user->user_type == 'buyer'){
                    return redirect('/');
                }else{
                    return redirect('/seller');
                }
            }
        }else{
            return Redirect()->back()->with('loginFailed', 'Login gagal, email atau password salah!');
        }        
    }

    public function verifiedEmail(){
        $data_email = Auth::user()->email;
        return view('authentication.verified', ['data_email'=>$data_email]);
    }

    public function logout(){
        Auth::logout();
        return Redirect('/');
    }

    public function register(){
        return view('authentication.register');
    }

    public function postRegister(Request $req){
        $this->validate($req, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'user_type' => 'buyer',
            'email_verified' => 'false',
            'verified_code' => 0
        ]);
        
        return redirect('/login')->with('regSuccess', 'Pendaftaran telah berhasil. Silahkan login!');
    }

    public function checkCodeVerified(Request $req){
        $data_code = Auth::user();
        $data_code_submit = $req->code_verified;

        if($data_code->verified_code == $data_code_submit){
            $data_code->email_verified = 'true';
            $data_code->verified_code = 1;
            $data_code->save();
            return redirect('/')-with('addComplete', 'Anda telah berhasil mendaftar. Selamat datang di PasTan!');
        }else{
            return redirect()->back()->with('NotMatch', '6 Digit angka yang anda masukkan adalah salah!');
        }

    }

    /*              Forget Section              */

    public function checkForgetEmailOne(Request $req){
        $data_user = User::where('email','=', $req->inputEmail)->first();
        if(count($data_user)!=null){
            $generated_verified_code = rand(100000, 900000);;
            $data_user->verified_code = $generated_verified_code;
            $data_user->save();
            $nama = $data_user->name;
            $code = $generated_verified_code;

            $data_user_forget_pass = array(
                'name' => $nama,
                'code' => $code
            );
            
            $email = $data_user->email;

            Mail::to($email)->send(new ForgetPass($data_user_forget_pass));

            return redirect('/viewForgetStepTwo')->with('data_email', $data_user->email);
        }else{
            return redirect()->back()->with('NotFound', 'Email yang dimasukkan tidak terdaftar dalam Pastan. Silahkan registrasi akun baru!');
        }
    }

    public function checkCodeForgetTwo(Request $req){
        $code = $req->code_verified;
        $data_user = User::where('verified_code','=', $code)->first();
        if(count($data_user)>=1){
            $email = $data_user->email;
            $data_user->verified_code = 1;
            $data_user->save();
            return redirect('/viewForgetStepThree')->with('data_email_1', $email);
        }else{
            return redirect()->back()->with('NotMatch', '6 Digit angka yang anda masukkan adalah salah!');
        }
    }

    public function resetNewPass(Request $req){
        $this->validate($req, [
            'password' => 'required|min:6'
        ]);

        $data_user = User::where('email','=', $req->inputEmail)->first();
        $new_pass = bcrypt($req->password);

        $data_user->password = $new_pass;
        $data_user->save();

        return redirect('/login')->with('PassChangeSuccess', 'Kata sandi akun anda telah berhasil direset. Silahkan login!');
    }

}
