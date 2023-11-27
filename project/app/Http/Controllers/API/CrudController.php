<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CrudResource;
use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $data=Crud::all();
        return response(["data"=> CrudResource::collection($data ),"message"=>"sucesso"],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { $data =$request ->all();
        /*$validator = Validator ::make ( $data,[
            "name" => array('require','max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'),
            "Lastname" => array('required', 'max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'),
            "email" => array("required" ,"max:255"),
            

        ]);
        if ($validator ->fails ()){
            return response(['error'=>$validator->errors(),"message"=>$data]);
        }*/
        $plano= Crud:: create($data);
        return response(["data"=> new CrudResource($plano),"message"=> "criado com sucesso"],201);
       //return(["message"=>$data]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Crud $crud)
    {
        return response(['data' => new CrudResource($crud), 'message' => 'Retrieved successfully.'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crud $crud)
    {
        $data =$request ->all();
        /*$validator = Validator ::make ( $data,[
            "m-nome" => array('required', 'max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'),
            "m-funcao" => array("'required', 'max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'"),
            "m-salario" => array("required" ,"max:255"),
            
          

        ]);
        if ($validator ->fails ()){
            return response(['error'=>$validator->errors(),"message"=>"validation error"]);
        }*/
        $plano= Crud:: update($data);
        return response(["data"=> new CrudResource($plano),"message"=> "atualizado com sucesso"],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
        return response(['message'=>'deleted']);
    }
}
