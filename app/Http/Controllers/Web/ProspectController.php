<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\ProspectCreateRequest;
use App\Http\Requests\ProspectDeleteAndUpdateRequest;
use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProspectController extends Controller
{
    public function index()
    {
        $prospects = Auth::user()->prospects();
        return view('prospects', compact('prospects'));
    }

    public function store(ProspectCreateRequest $request)
    {
        Auth::user()->prospects()->create($request->all());
        return Auth::user()->refresh();
    }

    public function update(ProspectDeleteAndUpdateRequest $request, Prospect $prospect)
    {
        $prospect->update($request->all());
        return $prospect->fresh();
    }

    public function destroy(ProspectDeleteAndUpdateRequest $request, Prospect $prospect)
    {
        $prospect->delete();

        return [
            'message' => 'O Prospecto foi deletado com sucesso.'
        ];
    }
}
