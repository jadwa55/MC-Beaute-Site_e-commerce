<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function card($id, $qty)
    {
        // [
        //     ['id' => 1 , 'qty'=> 3],
        //     ['id' => 1 , 'qty'=> 3],
        //     ['id' => 1 , 'qty'=> 3],
        //     ['id' => 1 , 'qty'=> 3],
        //     ['id' => 1 , 'qty'=> 3],
        // ]

        $cardItem = session('card') ?? [];

        if (!in_array($id, array_column($cardItem, 'id'))) {
            if ($qty != 0) { // create
                $data = ['id' => $id, 'qty' => $qty];
                // $this->stockOnCart($id, $qty);
                session()->push('card', $data);
                return redirect()->back();
            }
            return redirect()->back();
        } else {

            if ($qty == 0) { // delete
                if (($key = array_search($id, array_column($cardItem, 'id'))) !== false) {
                    // $this->stockOnCart($id, 0, $cardItem[$key]['qty'] ?? 0);
                    unset($cardItem[$key]); //inset=delete item by $key
                }

                session(['card' => $cardItem]);
                return redirect()->back();
            } else if (isset($cardItem[array_column($cardItem, 'id')[0] - 1]['id'])) { // update , desactive in view now
                $cardItem[array_column($cardItem, 'id')[0] - 1]['qty'] = $qty;
            }

            session(['card' => $cardItem]);

            return redirect()->back();
        }
    }


    public function index()
    {
        $card = session('card');
        $cardId =  array_column($card??[], 'id');

        $items = Project::whereIn('id', $cardId)->get();

        // return array_values($card);
        return view('projects.card',[
            'projects' => $items,
            'cards' => array_values($card??[])
        ]);
    }

}
