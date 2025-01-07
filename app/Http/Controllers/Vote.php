<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Period;
use App\Models\Student;
use App\Models\Vote as ModelsVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Vote extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ModelsVote::with('student', 'candidate', 'period');

        if ($request->has('period_id') && $request->period_id != '') {
            $query->where('periode_id', $request->period_id);
        }

        $votes = $query->get();
        $periods = Period::all();

        return view('vote.index', compact('votes', 'periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $periods = Period::where('status', 'aktif')->get();
        $candidates = Candidate::whereRelation('period', 'status', 'aktif')->get();
        return view('vote.create', compact('students', 'candidates', 'periods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'candidate_id' => 'required|exists:candidates,id',
            'period_id' => 'required|exists:periods,id',
        ]);

        ModelsVote::create([
            'siswa_id' => $request->student_id,
            'kandidat_id' => $request->candidate_id,
            'periode_id' => $request->period_id,
            'tanggal_pemilihan' => now(),
        ]);

        return to_route('votes.index')->with('success', 'Vote successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vote = ModelsVote::findOrFail($id);
        $vote->delete();

        return to_route('votes.index')->with('success', 'Vote successfully deleted.');
    }

    public function showPeriodForm()
    {
        $periods = Period::all();
        // dd($periods);
        return view('vote.period_form', compact('periods'));
    }

    public function indexByPeriod(Request $request)
    {
        // dd('Hello World');

        $periodId = $request->input('period_id');
        $period = Period::findOrFail($periodId);

        $candidates = Candidate::where('period_id', $periodId)->get();
        $votes = ModelsVote::where('periode_id', $periodId)
            ->select('kandidat_id', DB::raw('count(*) as total_votes'))
            ->groupBy('kandidat_id')
            ->get();

        $candidatesWithVotes = $candidates->map(function ($candidate) use ($votes) {
            $vote = $votes->firstWhere('kandidat_id', $candidate->id);
            $candidate->total_votes = $vote ? $vote->total_votes : 0;
            return $candidate;
        });

        return view('vote.index_by_period', compact('candidatesWithVotes', 'period'));
    }

    

}
