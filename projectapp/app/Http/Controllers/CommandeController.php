<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Project;
use App\Models\ProjectCommande;
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

        foreach($input->item as $item){

            $stock= Project::find($item['id']);

            if($stock->quantite < $item['quantite'] ){


                session()->flash('alert', 'Quantity of '.$stock->name.' not available');


                return redirect(route('panier'));
            }

            //check if quantity in valable or not
            //insert $item->id_product, $item->quantite, $Commande->id in ProjectComment
        }


        $Commande=Commande::create([
            // 'address'=>'hermez',
            'user_id'=>Auth::user()->id,
            'address'=>Auth::user()->address,
        ]);


        foreach($input->item as $item){

            $stock= Project::find($item['id']);

            $stock->update(['quantite' => $stock['quantite'] - $item['quantite'] ]);

            ProjectCommande::create([
                'quantite'=> $item['quantite'],
                'commande_id' => $Commande->id,
                'project_id' => $item['id'],
            ]);

        }

        session(['card' => []]);

        session()->flash('alert', 'commande saved');


        return redirect(route('panier'));




    }
}
