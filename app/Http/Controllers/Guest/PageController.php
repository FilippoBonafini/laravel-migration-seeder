<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Train;

class PageController extends Controller
{
    public function index()
    {
        //dd(\Carbon\Carbon::now('Europe/Rome'));

        // $train_list = Train::all(); -> mostra tutti i treni
        // $train_list = Train::orderBy('orario_partenza', 'desc')->get(); ->mostra tutti i treni in ordine di data
        $train_list = Train::where('orario_partenza', '>', \Carbon\Carbon::now('Europe/Rome'))
            ->orderBy('orario_partenza', 'asc')
            ->get(); // -> mostra tutti i treni in ordine di data escludendo quelli precedenti
        //dalla data e all'ora odierna (utilizza la libreria carbon per trovare la data odierna)



        return view('home', compact('train_list'));
    }
}
