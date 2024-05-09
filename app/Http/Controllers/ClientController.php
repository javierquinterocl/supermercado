<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use Illuminate\Support;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = CLient::all();
        return view("clients.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        //
    
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/clients'))
            {
                mkdir('uploads/clients',0777,true);
            }
            $image->move('uploads/clients',$imagename);
        }else{
            $imagename = "";
        }

        $client = new Client();
        $client->name = $request->name;
        $client->document = $request->document;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->image = $imagename;
        $client->status = 1;
        $client->registerby = $request->user()->id;
        $client->save();

        return redirect()->route('clients.index')->with('successMsg','El registro se guardó exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $client = Client::find($id);
        
        return view("clients.edit", compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request,$id)
    {
        $client = Client::find($id);
			$image = $request->file('image');
			$slug = str::slug($request->name);
			if (isset($image))
			{
				$currentDate = Carbon::now()->toDateString();
				$imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

				if (!file_exists('uploads/clients'))
				{
					mkdir('uploads/clients',0777,true);
				}
				$image->move('uploads/clients',$imagename);
			}else{
				$imagename = $client->image;
			}
			

           
            $client->name = $request->name;
            $client->document = $request->document;
            $client->email = $request->email;
            $client->address = $request->address;
            $client->phone = $request->phone;
            $client->image = $imagename;
            $client->status = 1;
            $client->registerby = $request->user()->id;
            $client->save();
    
            return redirect()->route('clients.index')->with('successMsg','El registro se guardó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        return redirect()->route('clients.index')->with('sucess','Producto eliminado correctacmente');
        

    }
    public function changeclienturl(Request $request){
        $client = Client::find($request->client_id);
        $client->status = $request->status;
        $client->save();
    }
}
