<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
  
    public function index()
    {    
        $clients = DB::table('clients')->orderBy('id', 'desc')->paginate(10);
        return view('clients')->with('clients', $clients);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_clients()
    {    
        $categories = DB::table('clients')->orderBy('id', 'desc')->paginate(10);
        return view('list_clients')->with('clients', $clients);
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('clients')->orderBy('id', 'desc')->paginate(10);
        return view('create_clients')->with('clients', $clients);
    }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $c = new Category;
            $c->cedula = $request->cedula;
            $c->nombre = $request->nombre; 
            $c->apellido = $request->apellido;
            $c->telefono = $request->telefono;
            if ($c->save()) {
              return redirect()->action('ClientController@index');
            }
        }
    
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $c = Category::find($id);
            return view('client')->with('client', $c);
        }
    
        /**
         * Show the form for editing the specified resource.
         *  In this case is used to update the resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $client=Category::find($id);
            $clients = DB::table('clients')->orderBy('id', 'desc')->paginate(10);
            return view('edit_client')->with(['client' => $client, 'clients' => $clients]);
        }
    
        public function update(Request $request, $id){
            DB::table('clients')->where('id', $id)->update(['cedula' => $request->cedula, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'telefono' => $request->telefono]);
            $clients = DB::table('clients')->orderBy('id', 'desc')->paginate(10);
            return view('clients')->with('clients', $clients);
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function delete($id)
        {
            DB::table('clients')->where('id', $id)->delete();
            return response()->json(['code' => 200]);
        }
    }


    