<?php

namespace App\Http\Controllers;


use App\Models\Vilao;
use App\Responses\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VilaoController extends Controller
{
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder' => 'required|numeric',
        ]);
        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message'=> 'Validation error',
                'errors' => $validator->errors()
            ],422);
        }

        $customer = Vilao::create($request->all());
        return JsonResponse::success('Vilão criado com sucesso', $customer);

    }
    public function listarTodos()
    {
        $customer = Vilao::all();
        return JsonResponse::success($customer);
    }

    public function listarPeloID($id)
    {
    
        $customer = Vilao::findOrFail($id);
        return JsonResponse::success(data: $customer);
    }

    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder' => 'required|numeric',
        ]);
        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message'=> 'Validation error',
                'errors' => $validator->errors()
            ],422);
        }

        $vilao = Vilao::findOrFail($id);
        $vilao->update($request->all());
        return JsonResponse::success('Vilão editado com sucesso', $vilao);
    }

    public function remover(Request $request, $id )
    {
        $customer = Vilao::findOrFail($id);
        $customer->delete();
        return JsonResponse::success('Vilão deletado com sucesso');
        
    }
}
