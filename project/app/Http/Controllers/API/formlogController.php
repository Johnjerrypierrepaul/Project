<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\formlogResource;
use App\Models\formlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class formlogController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Formlog::all();
       return response(["data"=> formlogResource::collection($data ),"message"=>"sucesso"],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request ->all();
        /*$validator = Validator ::make ( $data,[
            "name" => array('require','max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'),
            "Lastname" => array('required', 'max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'),
            "email" => array("required" ,"max:255"),
            "telefone" => array("required" ,"max:255"),
            "sexo" => array("required", 'max:1', 'regex:/^[M|F]*$/u'),
            "estado_civil" => array("required", 'max:1', 'regex:/^[M|F]*$/u'),
            "Data_nascimento" => array("required" ,"max:255"),
            "nacionalidade" => array("required", 'max:1', 'regex:/^[M|F]*$/u')
          

        ]);
        if ($validator ->fails ()){
            return response(['error'=>$validator->errors(),"message"=>$data]);
        }*/
        $aluno= formlog:: create($data);
        return response(["data"=> new formlogResource($aluno),"message"=> "criado com sucesso"],201);
       //return(["message"=>$data]);

    }

    /**
     * Display the specified resource.
     */
    public function show(formlog $formlog)
    {
        return response(['data' => new formlogResource($formlog), 'message' => 'Retrieved successfully.'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, formlog $formlog)
    {
        $data =$request ->all();
        $validator = Validator ::make ( $data,[
            "name" => array('required', 'max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'),
            "Lastname" => array("'required', 'max:255', 'regex:/^[a-zA-Z \x{00C0}-\x{00FF}]*$/u'"),
            "email" => array("required" ,"max:255"),
            "telefone" => array("required" ,"max:255"),
            "sexo" => array("required', 'max:1', 'regex:/^[M|F]*$/u'"),
            "estado_civil" => array("required', 'max:1', 'regex:/^[M|F]*$/u'"),
            "Data_nascimento" => array("required" ,"max:255"),
            "nacionalidade" => array("required', 'max:1', 'regex:/^[M|F]*$/u'"),
          

        ]);
        if ($validator ->fails ()){
            return response(['error'=>$validator->errors(),"message"=>"validation error"]);
        }
        $aluno= formlog:: update($data);
        return response(["data"=> new formlogResource($aluno),"message"=> "atualizado com sucesso"],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(formlog $formlog)
    {
        $formlog->delete();
        return response(['message'=>'deleted']);
    }
}
