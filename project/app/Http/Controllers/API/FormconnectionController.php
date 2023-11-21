<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormconnectionResource;
use App\Models\Formconnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormconnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Formconnection::all();
       return response(["data"=> FormconnectionResource::collection($data ),"message"=>"sucesso"],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request ->all();
        $validator = Validator ::make ( $data,[
            "nome" => array("required" ,"max:255"),
            "email" => array("required" ,"max:255"),
            
          

        ]);
        if ($validator ->fails ()){
            return response(['error'=>$validator->errors(),"message"=>"validation error"]);
        }
        $aluno= Formconnection:: create($data);
        return response(["data"=> new FormconnectionResource($aluno),"message"=> "criado com sucesso"],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Formconnection $formconnection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formconnection $formconnection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formconnection $formconnection)
    {
        //
    }
}
