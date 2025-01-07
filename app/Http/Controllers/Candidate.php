<?php

namespace App\Http\Controllers;

use App\Models\Candidate as ModelsCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Period;
use App\Models\Vote;

class Candidate extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = ModelsCandidate::with('period')->get();
        // dd($candidates);
        return view('candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::where('status', 'aktif')->get();
        return view('candidate.create', compact('periods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'jargon' => 'required|string',
            'period_id' => 'required|exists:periods,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        
        // Debugging: Periksa apakah file diunggah
        if ($request->hasFile('photo')) {
            // Menyimpan file yang diunggah ke direktori 'photos' di disk 'public'
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            return back()->withErrors(['photo' => 'Photo upload failed.']);
        }

        // Debugging: Periksa data yang akan disimpan
        $data = [
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'jargon' => $request->jargon,
            'photo' => $photoPath,
            'period_id' => $request->period_id,
        ];

        // Debugging: Tampilkan data yang akan disimpan
        // dd($data);

        // Menyimpan data kandidat ke database
        ModelsCandidate::create($data);

        return to_route('candidates.index')->with('success', 'Candidate created successfully.');
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
        $candidate = ModelsCandidate::findOrFail($id);
        $periods = Period::all();
        return view('candidate.edit', compact('candidate', 'periods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'jargon' => 'required|string',
            'period_id' => 'required|exists:periods,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $candidate = ModelsCandidate::findOrFail($id);

        $data = [
            'name' => $request->name,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'jargon' => $request->jargon,
            'period_id' => $request->period_id,
        ];

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($candidate->photo) {
                Storage::disk('public')->delete('photos/'.$candidate->photo);
            }
            // Simpan foto baru
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $candidate->update($data);

        return to_route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $candidate = ModelsCandidate::findOrFail($id);

        // Hapus foto jika ada
        Vote::where('kandidat_id', $candidate->id)->delete();

        // Hapus foto jika ada
        if ($candidate->photo) {
            Storage::disk('public')->delete($candidate->photo);
        }

        // Hapus data kandidat dari database
        $candidate->delete();

        return to_route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
