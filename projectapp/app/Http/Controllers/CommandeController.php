<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::all();

        return view('commandes.index',[
            'commandes' => $commandes
        ]);
    }



    public function save(Request $input)
    {

        $Commande=Commande::create([
            'address'=>'hermez',
            'user_id'=>Auth::user()->id
        ]);

        foreach($input->item as $item){


        }

        return $input;
        // return 'cammande saved';


    }
}
