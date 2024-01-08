<?php

namespace App\Http\Controllers;

use App\Models\Software;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoftwareController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            return response()->json(Software::where('status', 'A')->get(), 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function show($id, Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            return response()->json(Software::find($id), 200);
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
                'sku' => 'required|unique:Software,sku|max:10',
                'price' => 'required|numeric',
            ]);

            return response()->json(Software::create([
                'name' => $request->get('name'),
                'sku' => $request->get('sku'),
                'system_operative' => $request->get('system'),
                'price' => $request->get('price'),
                'status' => 'A',
                'created_by' => $user->name,
                'license' => Str::random(100),
                'stock' => 1
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
                'sku' => 'required|unique:Software,sku|max:10',
                'price' => 'required|numeric',
            ]);

            $software = Software::findOrFail($id);
            $software->update([
                'name' => $request->get('name'),
                'sku' => $request->get('sku'),
                'system_operative' => $request->get('system'),
                'price' => $request->get('price'),
                'updated_by' => $user->name,
            ]);
            return response()->json($software, 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }

    public function delete(Request $request, $id)
    {
        $token = $request->header('Authorization');
        $user = User::where('token', $token)->first();

        if (isset($user)) {
            $software = Software::findOrFail($id);
            $software->update([
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
            $software = Software::findOrFail($id);
            $software->update([
                'status' => $software->status == 'I' ? 'A' : 'I'
            ]);
            return response('Item Eliminado', 200);
        } else {
            return response('Usuario No Autenticado', 401);
        }
    }
}
