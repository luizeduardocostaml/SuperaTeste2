<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Http\Requests\EditAdressRequest;
use App\Http\Requests\StoreAdressRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
{
    public function store(StoreAdressRequest $request)
    {
        $request->validated();

        $address = new Adress();

        $id = Auth::id();

        $address->user_id = $id;
        $address->active = '0';
        $address->cep = $request->cep;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->complement = $request->complement;
        $address->city = $request->city;
        $address->uf = $request->uf;

        $address->save();

        return redirect()->route('dashboard')->with('addressSuccess', 'Endereço cadastrado com sucesso!');
    }

    public function getStore()
    {
        return view('address.store');
    }

    public function edit(EditAdressRequest $request, $id)
    {
        $request->validated();

        $address = Adress::find($id);

        $address->cep = $request->cep;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->complement = $request->complement;
        $address->city = $request->city;
        $address->uf = $request->uf;

        $address->save();

        return redirect()->route('dashboard')->with('addressSuccess', 'Endereço Alterado com sucesso!');
    }

    public function getEdit($id)
    {
        $address = Adress::find($id);

        return view('address.edit', ['address' => $address]);
    }

    public function destroy($id)
    {
        Adress::destroy($id);

        return redirect()->route('dashboard')->with('addressSuccess', 'Endereço apagado com sucesso!');
    }

    public function setActive($id)
    {
        try {
            $active = Adress::where('active', 1)->firstOrFail();

            $active->active = '0';

            $address = Adress::find($id);

            $address->active = '1';

            $active->save();
            $address->save();

        } catch (ModelNotFoundException $e){
            $address = Adress::find($id);

            $address->active = '1';

            $address->save();
        }

        return redirect()->route('dashboard')->with('addressSuccess', 'Endereço definido como padrão com sucesso!');
    }
}
