<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        return view('layouts.social-worker.index', compact('clients'));
    }

    public function show(Client $client)
    {
        $familyMembers = FamilyMember::where('client_id', $client->id)->get();
        return view('layouts.social-worker.index', compact('client', 'familyMembers'));
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
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'middle' => 'nullable|string|max:255',
                'suffix' => 'nullable|string|max:10',
                'address' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date',
                'pob' => 'nullable|string|max:255',
                'sex' => 'nullable|string|in:Male,Female',
                'educational_attainment' => 'nullable|string',
                'civil_status' => 'nullable|string',
                'religion' => 'nullable|string',
                'nationality' => 'nullable|string',
                'occupation' => 'nullable|string',
                'monthly_income' => 'nullable|string',
                'contact_number' => 'nullable|string',
                'source_of_referral' => 'nullable|string',
                'house_structure' => 'nullable|string',
                'floor' => 'nullable|string',
                'type' => 'nullable|string',
                'number_of_rooms' => 'nullable|string',
                'monthly_expenses' => 'nullable|string',
                'indicate' => 'nullable|string',
                'tracking' => 'nullable|string',
                'other_appliances' => 'nullable|string',
                'appliances' => 'nullable|array',
                'appliances.*' => 'string',
                'circumstances_of_referral' => 'nullable|string',
                'family_background' => 'nullable|string',
                'health_history' => 'nullable|string',
                'economic_situation' => 'nullable|string',
                'problem_presented' => 'nullable|string',
                'problem_identification' => 'nullable|string',
                'services' => 'nullable|array',
                'services.*' => 'string',
                'home_visit' => 'nullable|string',
                'interviewee' => 'nullable|string',
                'layunin' => 'nullable|string',
                'resulta' => 'nullable|string',
                'initial_agreement' => 'nullable|string',
                'data_gather' => 'nullable|string',
                'assessment1' => 'nullable|string',
                'assessment' => 'nullable|string',
                'case_management_evaluation' => 'nullable|string',
                'case_resolution' => 'nullable|string',
                'tracking' => 'nullable|string',
                'reviewing' => 'nullable|string',
                'approving' => 'nullable|string',
                'eval' => 'nullable|string',
            ]);

            // Find the client by ID
            $client = Client::findOrFail($id);

            // Process fields with ucwords() if they are strings
            $client->first_name = is_string($request->input('first_name')) ? ucwords($request->input('first_name')) : $client->first_name;
            $client->last_name = is_string($request->input('last_name')) ? ucwords($request->input('last_name')) : $client->last_name;
            $client->middle = is_string($request->input('middle')) ? ucwords($request->input('middle')) : $client->middle;
            $client->suffix = is_string($request->input('suffix')) ? ucwords($request->input('suffix')) : $client->suffix;
            $client->address = is_string($request->input('address')) ? ucwords($request->input('address')) : $client->address;
            $client->pob = is_string($request->input('pob')) ? ucwords($request->input('pob')) : $client->pob;
            $client->sex = is_string($request->input('sex')) ? ucwords($request->input('sex')) : $client->sex;
            $client->educational_attainment = is_string($request->input('educational_attainment')) ? ucwords($request->input('educational_attainment')) : $client->educational_attainment;
            $client->civil_status = is_string($request->input('civil_status')) ? ucwords($request->input('civil_status')) : $client->civil_status;
            $client->religion = is_string($request->input('religion')) ? ucwords($request->input('religion')) : $client->religion;
            $client->nationality = is_string($request->input('nationality')) ? ucwords($request->input('nationality')) : $client->nationality;
            $client->occupation = is_string($request->input('occupation')) ? ucwords($request->input('occupation')) : $client->occupation;
            $client->monthly_income = is_string($request->input('monthly_income')) ? ucwords($request->input('monthly_income')) : $client->monthly_income;
            $client->contact_number = is_string($request->input('contact_number')) ? ucwords($request->input('contact_number')) : $client->contact_number;
            $client->source_of_referral = is_string($request->input('source_of_referral')) ? ucwords($request->input('source_of_referral')) : $client->source_of_referral;
            $client->house_structure = is_string($request->input('house_structure')) ? ucwords($request->input('house_structure')) : $client->house_structure;
            $client->floor = is_string($request->input('floor')) ? ucwords($request->input('floor')) : $client->floor;
            $client->type = is_string($request->input('type')) ? ucwords($request->input('type')) : $client->type;
            $client->number_of_rooms = is_string($request->input('number_of_rooms')) ? ucwords($request->input('number_of_rooms')) : $client->number_of_rooms;
            $client->monthly_expenses = is_string($request->input('monthly_expenses')) ? ucwords($request->input('monthly_expenses')) : $client->monthly_expenses;
            $client->indicate = is_string($request->input('indicate')) ? ucwords($request->input('indicate')) : $client->indicate;
            $client->tracking = is_string($request->input('tracking')) ? ucwords($request->input('tracking')) : $client->tracking;
            $client->other_appliances = is_string($request->input('other_appliances')) ? ucwords($request->input('other_appliances')) : $client->other_appliances;
            $client->circumstances_of_referral = is_string($request->input('circumstances_of_referral')) ? ucwords($request->input('circumstances_of_referral')) : $client->circumstances_of_referral;
            $client->family_background = is_string($request->input('family_background')) ? ucwords($request->input('family_background')) : $client->family_background;
            $client->health_history = is_string($request->input('health_history')) ? ucwords($request->input('health_history')) : $client->health_history;
            $client->economic_situation = is_string($request->input('economic_situation')) ? ucwords($request->input('economic_situation')) : $client->economic_situation;
            $client->problem_presented = is_string($request->input('problem_presented')) ? ucwords($request->input('problem_presented')) : $client->problem_presented;
            $client->problem_identification = is_string($request->input('problem_identification')) ? ucwords($request->input('problem_identification')) : $client->problem_identification;
            $client->home_visit = is_string($request->input('home_visit')) ? ucwords($request->input('home_visit')) : $client->home_visit;
            $client->interviewee = is_string($request->input('interviewee')) ? ucwords($request->input('interviewee')) : $client->interviewee;
            $client->interviewed_by = is_string($request->input('interviewed_by')) ? ucwords($request->input('interviewed_by')) : $client->interviewed_by;
            $client->layunin = is_string($request->input('layunin')) ? ucwords($request->input('layunin')) : $client->layunin;
            $client->resulta = is_string($request->input('resulta')) ? ucwords($request->input('resulta')) : $client->resulta;
            $client->initial_agreement = is_string($request->input('initial_agreement')) ? ucwords($request->input('initial_agreement')) : $client->initial_agreement;
            $client->data_gather = is_string($request->input('data_gather')) ? ucwords($request->input('data_gather')) : $client->data_gather;
            $client->assessment1 = is_string($request->input('assessment1')) ? ucwords($request->input('assessment1')) : $client->assessment1;
            $client->assessment = is_string($request->input('assessment')) ? ucwords($request->input('assessment')) : $client->assessment;
            $client->case_management_evaluation = is_string($request->input('case_management_evaluation')) ? ucwords($request->input('case_management_evaluation')) : $client->case_management_evaluation;
            $client->case_resolution = is_string($request->input('case_resolution')) ? ucwords($request->input('case_resolution')) : $client->case_resolution;
            $client->tracking = is_string($request->input('tracking')) ? ucwords($request->input('tracking')) : $client->tracking;
            $client->reviewing = is_string($request->input('reviewing')) ? ucwords($request->input('reviewing')) : $client->reviewing;
            $client->approving = is_string($request->input('approving')) ? ucwords($request->input('approving')) : $client->approving;
            $client->eval = is_string($request->input('eval')) ? ucwords($request->input('eval')) : $client->eval;

            // Handle appliances field if it's an array
            if ($request->has('appliances')) {
                $client->appliances = implode(',', $request->input('appliances'));
            }
            if ($request->has('services')) {
                $client->services = implode(',', $request->input('services'));
            }

            // Update the client record
            $client->fill($validatedData);
            $client->save();

            return response()->json(['client' => $client]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error updating client: ' . $e->getMessage());

            return response()->json(['error' => 'An error occurred while updating the client.'], 500);
        }
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with('deleted_client_success', 'Client deleted successfully.');
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
