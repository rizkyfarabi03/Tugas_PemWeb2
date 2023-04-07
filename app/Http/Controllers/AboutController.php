<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data['nama'] = 'Petunjuk Login';
        $data['email'] = 'email: rizkyfarabi03@gmail.com';
        $data['pw'] = 'pasword: rizky03';

        return view('about', $data);
    }

}
