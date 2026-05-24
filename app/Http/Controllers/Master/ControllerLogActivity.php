<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ModelLogActivity;

class ControllerLogActivity extends Controller
{
    public function index()
    {
        $data = ModelLogActivity::with('user')
            ->latest()
            ->get();

        return view('admin.log.index', compact('data'));
    }
}