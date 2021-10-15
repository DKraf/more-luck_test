<?php


namespace App\Http\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempData
{
    /**
     * Возвращает массив для записи в таблицу
     * @param $request
     * @return array
     */
    public function get($request): array
    {
        $request->validate([
            'check_type' => 'required',
            'photo' => 'required'
        ]);
        $custom_file_name = $request->photo->getClientOriginalName();
        $checked = $this->assignStatusAndCode($request['check_type']);
        $temp_data['user_id'] = Auth::user()->id;
        $temp_data['photo'] = $request->photo->storeAs('image', $custom_file_name);
        $temp_data['type'] = ($request['check_type']) ? 'Призовой' : 'Обычный';
        $temp_data['code'] = $checked['code'];
        $temp_data['status'] = (bool)$checked['status'];
        return $temp_data;
    }

    private function assignStatusAndCode(bool $check_type): array
    {
        $hour = $this->parityTimeCheck();
        $out_data['status'] =  (($hour) && ($check_type)) || ((!$hour) && (!$check_type));
        $out_data['code'] =  (($out_data['status']) && $check_type ) ? $this->generateRandomString() : '';
        return $out_data;
    }

    private function parityTimeCheck(): bool
    {
        $hour = date("H");
        $out_data = false;
        if (((int)$hour % 2) == 0) {
            $out_data = true;
        }
        return $out_data;
    }

    private function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
