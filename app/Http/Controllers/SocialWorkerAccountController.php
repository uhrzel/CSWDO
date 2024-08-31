<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialWorkerAccountController extends Controller
{
    /**
     * Display a listing of the social workers.
     */
    public function index()
    {
        // Fetch all users with the role of 'social-worker'
        $socialWorkers = Social::where('role', 'social-worker')->get();

        // Pass the data to the view
        return view('admin.index', compact('socialWorkers'));
    }

    public function destroy($id)
    {
        $worker = Social::find($id);
        if ($worker) {
            $worker->delete();
            return redirect()->route('admin.index')->with('success', 'Social worker account deleted successfully.');
        } else {
            return redirect()->route('admin.index')->with('error', 'Social worker not found.');
        }
    }
}
