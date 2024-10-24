<?php

namespace App\Http\Controllers;

use App\Models\Heroi;
use App\Responses\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroiController extends Controller
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

        $customer = Heroi::create($request->all());
        return JsonResponse::success('Heroi criado com sucesso', $customer);

    }
    public function listarTodos()
    {
        $customer = Heroi::all();
        return JsonResponse::success($customer);
    }

    public function listarPeloID($id)
    {
    
        $customer = Heroi::findOrFail($id);
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

        $heroi = Heroi::findOrFail($id);
        $heroi->update($request->all());
        return JsonResponse::success('Heroi editado com sucesso', $heroi);
    }

    public function remover(Request $request, $id )
    {
        $customer = Heroi::findOrFail($id);
        $customer->delete();
        return JsonResponse::success('Heroi deletado com sucesso');
    }
}
