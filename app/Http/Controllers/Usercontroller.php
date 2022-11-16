<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class Usercontroller extends Controller
{
    //
    public function userLoad()
    {
        return view('userdata');
    }
    public  function userAdd(Request $request)
    {
        // return $request;$file=
        $file = $request->file('file');
        $fileName = time() . '' . $file->getClientOriginalName();
         $filePath = $file->storeAs('images', $fileName, 'public');
         $mailId=$request->email;
        $user = UserData::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'file' => $filePath,
        ]);
        $this->mailTest($mailId,$fileName);
        return response()->json(['res' => 'done']);
    }

    // Mail function
    public function mailTest($mailId,$fileName)
    {
        $path = public_path('storage/images/'.$fileName);
        if (File::exists($path)) {
            $data = ['name' => 'dddd', 'email' => 'soumadip@elphill.com'];
            $user['to'] = $mailId;
            Mail::send('mailtemp', $data, function ($message) use ($user, $path) {
                $message->to($user['to'])->subject("test mail");
                $message->attach($path);
            });
        }
    }
}
