<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationEvent;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'ID' => 1,
            'Name' => 'Ahmed Nabil',
        ];
        
        event(new NotificationEvent($data));
        return view('welcome');
    }
}
