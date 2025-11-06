<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    protected $clientRepo;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function indexBlade(Request $request)
    {
        $status = $request->status ?? null;
        $search = $request->search ?? null;

        $clients = $status ? $this->clientRepo->searchByStatus($status) : $this->clientRepo->all();

        if ($search) {
            $clients = $clients->filter(function ($client) use ($search) {
                return stripos($client->name, $search) !== false
                    || stripos($client->email, $search) !== false;
            });
        }

        return view('clients.index', compact('clients', 'status', 'search'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function storeBlade(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'status' => 'required|in:active,inactive',
        ]);

        $this->clientRepo->create($data);
        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    public function edit($id)
    {
        $client = $this->clientRepo->find($id);
        return view('clients.edit', compact('client'));
    }

    public function updateBlade(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:clients,email,$id",
            'status' => 'required|in:active,inactive',
        ]);

        $this->clientRepo->update($id, $data);
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroyBlade($id)
    {
        $this->clientRepo->delete($id);
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }
}
