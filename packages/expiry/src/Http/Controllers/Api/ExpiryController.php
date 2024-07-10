<?php

namespace Moox\Expiry\Http\Controllers\Api;

use Illuminate\Http\Request;
use Moox\Expiry\Models\Expiry;
use App\Http\Controllers\Controller;

class ExpiryController extends Controller
{
    public function index()
    {
        return Expiry::all();
    }

    public function show($id)
    {
        return Expiry::findOrFail($id);
    }

    public function store(Request $request)
    {
        $expiry = Expiry::create($request->all());
        return response()->json($expiry, 201);
    }

    public function update(Request $request, $id)
    {
        $expiry = Expiry::findOrFail($id);
        $expiry->update($request->all());
        return response()->json($expiry, 200);
    }

    public function destroy($id)
    {
        Expiry::destroy($id);
        return response()->json(null, 204);
    }
}
