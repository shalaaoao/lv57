<?php

namespace App\Http\Controllers;

use App\Http\Model\StarLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StarController extends Controller
{
    public function lists(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 20);

        $data = StarLog::query()->orderByDesc('id')->forPage($page, $limit)->get();
        $sum_num = StarLog::sumStar();
        $usable_num = StarLog::usableStar();

        return \view('Star.star-list', ['data' => $data, 'sum_num' => $sum_num, 'usable_num' => $usable_num]);
    }
}
