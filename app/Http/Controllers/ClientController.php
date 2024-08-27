<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected function validateClient(Request $request)
    {
        return $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle' => 'required|string',
            'suffix' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|numeric',
            'date_of_birth' => 'nullable|date',
            'pob' => 'required|string',
            'sex' => 'nullable|string',
            'educational_attainment' => 'nullable|string',
            'civil_status' => 'nullable|string',
            'religion' => 'nullable|string',
            'nationality' => 'nullable|string',
            'occupation' => 'nullable|string',
            'monthly_income' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'source_of_referral' => 'nullable|string',
            'circumstances_of_referral' => 'nullable|string|max:65535',
            'family_background' => 'nullable|string|max:65535',
            'health_history' => 'nullable|string|max:65535',
            'economic_situation' => 'nullable|string|max:65535',
            'house_structure' => 'nullable|string',
            'floor' => 'nullable|string',
            'type' => 'nullable|string',
            'number_of_rooms' => 'nullable|string',
            'appliances' => 'nullable|array',
            'appliances.*' => 'nullable|string',
            'other_appliances' => 'nullable|string',
            'monthly_expenses' => 'nullable|string',
            'indicate' => 'nullable|string',
            'assessment' => 'nullable|string',
            'recommendation' => 'nullable|string',
            'tracking' => 'nullable|string',
            'problem_identification' => 'nullable|string',
            'data_gather' => 'nullable|string',
            'eval' => 'nullable|string',
            'control_number' => 'nullable|string',
            'problem_presented' => 'nullable|string|max:65535',
            'services' => 'nullable|array',
            'services.*' => 'nullable|string',
            'requirements' => 'nullable|array',
            'requirements.*' => 'nullable|string',
            'home_visit' => 'nullable|date',
            'interviewee' => 'nullable|string',
            'interviewed_by' => 'nullable|string',
            'layunin' => 'nullable|string|max:65535',
            'result' => 'nullable|string|max:65535',
            'initial_findings' => 'nullable|string|max:65535',
            'initial_agreement' => 'nullable|string|max:65535',
            'assessment1' => 'nullable|string|max:65535',
            'case_management_evaluation' => 'nullable|string|max:65535',
            'case_resolution' => 'nullable|string|max:65535',
            'reviewing' => 'nullable|string',
            'approving' => 'nullable|string',
        ]);
    }

    public function updateStatus(Client $client, Request $request)
    {
        $statusType = $request->input('status_type');
        $statusValue = $request->input('status_value');

        $client->update([$statusType => $statusValue]);

        return redirect()->back()->with('success', "Client status updated to $statusValue.");
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateClient($request);
        $validatedData['services'] = json_encode($request->input('services', []));
        $validatedData['requirements'] = json_encode($request->input('requirements', []));
        $validatedData['appliances'] = json_encode($request->input('appliances', []));
        $validatedData['other_appliances'] = $request->input('other_appliances', '');

        $latestClient = Client::latest()->first();
        if ($latestClient) {
            $lastControlNumber = $latestClient->control_number;
            $lastNumber = (int)substr($lastControlNumber, 4);
            $nextNumber = str_pad($lastNumber + 1, 7, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '0000001';
        }

        // Generated number
        $controlNumber = "APL " . $nextNumber;
        $validatedData['control_number'] = $controlNumber;

        if ($request->input('nationality') === 'Other') {
            $validatedData['nationality'] = $request->input('other_nationality');
        } else {
            $validatedData['other_nationality'] = null;
        }

        if ($request->input('religion') === 'Other') {
            $validatedData['religion'] = $request->input('other_religion');
        } else {
            $validatedData['other_religion'] = null;
        }

        $client = Client::create($validatedData);

        return response()->json([
            'message' => 'Form submitted successfully!',
            'control_number' => $controlNumber,
        ]);
    }


    public function caselist()
    {
        $clients = Client::all();
        return view('layouts.admin.index', compact('clients'));
    }

    public function index()
    {
        $clients = Client::all();
        $trackingTotals = [
            'Problem Identification' => $clients->where('problem_identification', 'Done')->count(),
            'Data Gathering' => $clients->where('data_gather', 'Done')->count(),
            'Assessment' => $clients->where('assessment', 'Done')->count(),
            'Evaluation And Resolution' => $clients->where('eval', 'Done')->count(),
        ];

        return view('welcome', compact('clients', 'trackingTotals'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateClient($request);
        $validatedData['services'] = json_encode($request->input('services', []));
        $validatedData['requirements'] = json_encode($request->input('requirements', []));
        $validatedData['appliances'] = json_encode($request->input('appliances', []));
        $validatedData['other_appliances'] = $request->input('other_appliances', '');

        $client = Client::findOrFail($id);

        if ($request->input('nationality') === 'Other') {
            $validatedData['nationality'] = $request->input('other_nationality');
        } else {
            $validatedData['other_nationality'] = null;
        }

        if ($request->input('religion') === 'Other') {
            $validatedData['religion'] = $request->input('other_religion');
        } else {
            $validatedData['other_religion'] = null;
        }

        $client->update($validatedData);

        return redirect()->back()->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('success', 'Client deleted successfully.');
    }

    public function receivedList()
    {
        $clients = Client::all();
        return view('received_list', compact('clients'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $origin = $request->input('origin');

        $clients = Client::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('first_name', 'like', "%$query%")
                ->orWhere('last_name', 'like', "%$query%")
                ->orWhere('middle', 'like', "%$query%")
                ->orWhere('suffix', 'like', "%$query%")
                ->orWhere('age', 'like', "%$query%")
                ->orWhere('address', 'like', "%$query%")
                ->orWhere('date_of_birth', 'like', "%$query%")
                ->orWhere('pob', 'like', "%$query%")
                ->orWhere('sex', 'like', "%$query%")
                ->orWhere('educational_attainment', 'like', "%$query%")
                ->orWhere('civil_status', 'like', "%$query%")
                ->orWhere('religion', 'like', "%$query%")
                ->orWhere('nationality', 'like', "%$query%")
                ->orWhere('occupation', 'like', "%$query%")
                ->orWhere('monthly_income', 'like', "%$query%")
                ->orWhere('contact_number', 'like', "%$query%")
                ->orWhere('source_of_referral', 'like', "%$query%")
                ->orWhere('circumstances_of_referral', 'like', "%$query%")
                ->orWhere('family_background', 'like', "%$query%")
                ->orWhere('health_history', 'like', "%$query%")
                ->orWhere('economic_situation', 'like', "%$query%")
                ->orWhere('house_structure', 'like', "%$query%")
                ->orWhere('floor', 'like', "%$query%")
                ->orWhere('type', 'like', "%$query%")
                ->orWhere('number_of_rooms', 'like', "%$query%")
                ->orWhere('appliances', 'like', "%$query%")
                ->orWhere('other_appliances', 'like', "%$query%")
                ->orWhere('monthly_expenses', 'like', "%$query%")
                ->orWhere('indicate', 'like', "%$query%")
                ->orWhere('assessment', 'like', "%$query%")
                ->orWhere('recommendation', 'like', "%$query%")
                ->orWhere('tracking', 'like', "%$query%")
                ->orWhere('problem_identification', 'like', "%$query%")
                ->orWhere('data_gather', 'like', "%$query%")
                ->orWhere('eval', 'like', "%$query%")
                ->orWhere('services', 'like', "%$query%")
                ->orWhere('control_number', 'like', "%$query%")
                ->orWhere('interviewee', 'like', "%$query%")
                ->orWhere('interviewed_by', 'like', "%$query%")
                ->orWhere('reviewing', 'like', "%$query%")
                ->orWhere('approving', 'like', "%$query%");
        })->get();

        if ($origin === 'dataentry') {
            return view('dataentry', compact('clients'));
        }
        return view('dataentry', compact('clients'));
    }
}
