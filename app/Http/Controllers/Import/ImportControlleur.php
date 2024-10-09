<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportControlleur extends Controller
{
    public function showImportForm()
    {
        return view('staffmada.import.membres');
    }
}
