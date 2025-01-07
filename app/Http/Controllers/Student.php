<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Period;
use App\Models\Student as ModelsStudent;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class Student extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = ModelsStudent::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kelas' => 'required|string',
            'nis' => 'required|integer|digits:10',
            'email' => 'required|email',
        ], [
            'nis.digits' => 'The NIS must be 10 digits.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->nis),
            'role' => 'user',
        ]);

        $student = ModelsStudent::create([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'password' => bcrypt($request->nis),
            'nis' => $request->nis,
        ]);

        $student->user_id = User::where('email', $request->email)->first()->id;
        $student->save();

        session()->flash('success', 'Student created successfully!');
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
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
    public function edit($id)
    {
        // dd($id);
        $student = ModelsStudent::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kelas' => 'required|string',
            'nis' => 'required|integer|digits:10',
            'email' => 'required|email',
            'status' => 'required|in:sudah,belum',
        ], [
            'nis.digits' => 'The NIS must be 10 digits.',
        ]);

        $student = ModelsStudent::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'email' => $request->email,
            'status' => $request->status,
            'password' => bcrypt($request->nis)
        ]);
        $user = User::findOrFail($student->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->nis),
        ]);

        session()->flash('success', 'Student updated successfully!');
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = ModelsStudent::findOrFail($id);
        $student->delete();
        $user = User::findOrFail($student->user_id);
        $user->delete();
        session()->flash('success', 'Student deleted successfully!');
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    /**
     * Show the form for role user.
     */
    public function index_user()
    {
        // return "hello world";
        $user = auth()->user();
        $student = ModelsStudent::where('user_id', $user->id)->firstOrFail();
        // dd($user);

        $period = Period::where('status', 'aktif')->first();
    
        if (!$period) {
            session()->flash('error', 'Tidak ada periode yang dibuka.');
            return redirect()->route('students.index_user')->with('error', 'Tidak ada periode yang dibuka.');
        }
    
        $candidates = Candidate::where('period_id', $period->id)->get();
    
        if ($student->status == 'sudah') {
            $vote = $student->votes()->where('periode_id', $period->id)->first();
            if ($vote) {
                $chosenCandidate = Candidate::find($vote->kandidat_id);
                return view('user.index', compact('chosenCandidate', 'period', 'student'));
            } else {
                session()->flash('error', 'Tidak ada vote yang ditemukan.');
                return redirect()->route('students.index_user')->with('error', 'Tidak ada vote yang ditemukan.');
            }
        }
    
        if ($candidates->isEmpty()) {
            session()->flash('error', 'Belum ada candidate yang terdaftar.');
            return redirect()->route('students.index_user')->with('error', 'Belum ada candidate yang terdaftar.');
        }
    
        return view('user.index', compact('candidates', 'period', 'student'));
    }
    
    public function vote( string $id)
    {
        $user = auth()->user();
        $student = ModelsStudent::where('user_id', $user->id)->firstOrFail();
        if ($student->status == 'sudah') {
            session()->flash('error', 'Anda sudah melakukan vote.');
            return redirect()->route('students.index_user')->with('error', 'Anda sudah melakukan vote.');
        }
        $period = Period::where('status', 'aktif')->first();
        if (!$period) {
            session()->flash('error', 'Tidak ada periode yang dibuka.');
            return redirect()->route('students.index_user')->with('error', 'Tidak ada periode yang dibuka.');
        }
        
        
        $student->votes()->create([
            'kandidat_id' => $id,
            'periode_id' => $period->id,
            'tanggal_pemilihan' => now(),
        ]);
        $student->update(['status' => 'sudah']);

        session()->flash('success', 'Vote submitted successfully!');
        return to_route('students.index_user')->with('success', 'Vote submitted successfully.');
    }

    public function resetAllStatuses()
    {
        ModelsStudent::query()->update(['status' => 'belum']);

        session()->flash('success', 'All student statuses reset successfully!');
        return redirect()->route('students.index')->with('success', 'All student statuses reset successfully.');
    }
}
