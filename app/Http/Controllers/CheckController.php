<?php

namespace App\Http\Controllers;

use App\Http\Traits\TempData;
use App\Models\Check;
use Illuminate\Http\Request;


class CheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Список всех чеков
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $checks = Check::leftJoin('users', function($join) {
            $join->on('checks.user_id', '=', 'users.id');
        })->paginate(8);
        return view('list', compact('checks'));
    }


    /**
     * Прием запроса от AJAX и
     * Создание нового чека в таблице БД
     * @return string
     */
    public function creat(Request $request): string
    {
        $temp_data_trait = new TempData();
        $temp_data = $temp_data_trait->get($request);
        Check::create($temp_data);

        return response()->json('request');
    }

}
