<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingRequest;
use App\Models\User; // Tambahkan ini untuk menggunakan model User

class TrainingRequestController extends Controller
{
    public function index()
    {
        // Menampilkan semua permintaan training yang dibuat oleh pengguna yang sedang login
        $user_id = auth()->id(); // Ambil id pengguna yang sedang login
        $trainingRequests = TrainingRequest::where('created_by', $user_id)->get();
        return view('permintaan-training.index', compact('trainingRequests'));
    }
    


    public function create()
    {
        // Mendapatkan data manager dan general manager dari model User
        $managers = User::where('occupation', 'Manager')->get();
        $generalManagers = User::where('occupation', 'General Manager')->get();

        return view('permintaan-training.create', compact('managers', 'generalManagers'));
    }

    public function store(Request $request)
    {
        // Validasi data permintaan training
        $request->validate([
            'judul_training' => 'required',
            'tanggal_training' => 'required|date',
            'trainer' => 'required',
            'jumlah_peserta' => 'required|integer',
            'tempat' => 'required',
        ]);

        // Menambahkan user_id saat membuat permintaan training
        $trainingRequest = new TrainingRequest($request->all());
        $trainingRequest->created_by = auth()->id(); // Mengisi kolom created_by dengan ID pengguna yang membuat permintaan
        $trainingRequest->save();

        return redirect()->route('training-requests.index')
            ->with('success', 'Training request created successfully.');
    }


    public function approveByManager($id)
    {
        // Mendapatkan data permintaan training berdasarkan ID
        $trainingRequest = TrainingRequest::findOrFail($id);
        
        // Pastikan hanya manager yang bisa menyetujui
        if (auth()->user()->occupation == 'Manager' && auth()->user()->name == $trainingRequest->nama_manager) {
            $trainingRequest->manager_approve = true;
            $trainingRequest->save();
        }

        return redirect()->back()->with('success', 'Training request approved by manager.');
    }

    public function approveByGeneralManager($id)
    {
        // Mendapatkan data permintaan training berdasarkan ID
        $trainingRequest = TrainingRequest::findOrFail($id);
        
        // Pastikan hanya general manager yang bisa menyetujui
        if (auth()->user()->occupation == 'General Manager' && auth()->user()->name == $trainingRequest->nama_general_manager) {
            $trainingRequest->general_manager_approve = true;
            $trainingRequest->save();
        }

        return redirect()->back()->with('success', 'Training request approved by general manager.');
    }

    public function edit($id)
    {
        // Mendapatkan data permintaan training berdasarkan ID
        $trainingRequest = TrainingRequest::findOrFail($id);
        
        // Hanya izinkan pembuat form untuk melakukan edit
        if (auth()->id() !== $trainingRequest->created_by) {
            return redirect()->route('training-requests.index')->with('error', 'You are not authorized to edit this request.');
        }

        return view('permintaan-training.edit', compact('trainingRequest'));
    }

    public function update(Request $request, $id)
    {
        // Mendapatkan data permintaan training berdasarkan ID
        $trainingRequest = TrainingRequest::findOrFail($id);
        
        // Hanya izinkan pembuat form untuk melakukan update
        if (auth()->id() !== $trainingRequest->created_by) {
            return redirect()->route('training-requests.index')->with('error', 'You are not authorized to update this request.');
        }

        // Validasi data permintaan training
        $request->validate([
            'judul_training' => 'required',
            'tanggal_training' => 'required|date',
            'trainer' => 'required',
            'jumlah_peserta' => 'required|integer',
            'tempat' => 'required',
        ]);

        $trainingRequest->update($request->all());

        return redirect()->route('training-requests.index')
            ->with('success', 'Training request updated successfully.');
    }

    public function destroy($id)
    {
        // Mendapatkan data permintaan training berdasarkan ID
        $trainingRequest = TrainingRequest::findOrFail($id);
        
        // Hanya izinkan pembuat form untuk melakukan delete
        if (auth()->id() !== $trainingRequest->created_by) {
            return redirect()->route('training-requests.index')->with('error', 'You are not authorized to delete this request.');
        }

        $trainingRequest->delete();

        return redirect()->route('training-requests.index')->with('success', 'Training request deleted successfully.');
    }

}
