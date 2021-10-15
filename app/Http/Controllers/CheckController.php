<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Список чеков
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->managerCheck()) {
            $checks = Check::select('chek')->get();
            return view('equipment.index', compact('equipment'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return view('/home');
        }
    }


    /**
     * Прием запроса от AJAX и
     * Создание нового чека в таблице БД
     * @param Request $request
     * @return string
     */
    public function creat(Request $request): string
    {
        $request->validate([
            'check_type' => 'required',
            'photo' => 'required'
        ]);
        $custom_file_name = $request->photo->getClientOriginalName();

        $temp_data['user_id'] = Auth::user()->id;
        $temp_data['photo'] = $request->photo->storeAs('image',$custom_file_name);
        $temp_data['type'] = 'a';
        $temp_data['code'] = 'a';
        $temp_data['status']= $request['check_type'];

        Check::create($temp_data);

        return response()->json('request');
    }
}
