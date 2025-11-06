<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function storeClientDetails(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        $client = $this->clientRepository->create($validated);

        return response()->json([
            'status' => 'success',
            'client' => $client
        ]);
    }
}
