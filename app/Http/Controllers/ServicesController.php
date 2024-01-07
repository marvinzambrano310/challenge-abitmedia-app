<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            return response()->json(Services::where('status', 'A')->get(), 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function show($id, Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            return response()->json(Services::find($id), 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function store(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            $request->validate([
                'name' => 'required|string|max:255',
                'system' => 'required|string|max:255',
                'sku' => 'required|unique:services,sku|max:10',
                'price' => 'required|float',
            ]);

            return response()->json(Services::create([
                'name' => $request->get('name'),
                'sku' => $request->get('sku'),
                'price' => $request->get('price'),
                'status' => 'A',
                'created_by' => $user->name,
            ]), 201);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function update(Request $request, $id)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            $request->validate([
                'name' => 'required|string|max:255',
                'system' => 'required|string|max:255',
                'sku' => 'required|unique:services,sku|max:10',
                'price' => 'required|float',
            ]);

            $service = Services::findOrFail($id);
            $service->update([
                'name' => $request->get('name'),
                'sku' => $request->get('sku'),
                'price' => $request->get('price'),
                'updated_by' => $user->name,
            ]);
            return response()->json($service, 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function delete(Request $request, $id)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            $service = Services::findOrFail($id);
            $service->update([
                'status' => 'D'
            ]);
            return response('Item Eliminado', 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function status(Request $request, $id)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            $service = Services::findOrFail($id);
            $service->update([
                'status' => $service->status == 'I' ? 'A' : 'I'
            ]);
            return response('Item Eliminado', 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }
}
