<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Mail\JobApplicationReceived;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    public function create() { return view('applications.create'); }

    public function store(StoreJobApplicationRequest $req)
    {
        $file = $req->file('cv');
        $path = $file->store('cvs','public'); // storage/app/public/cvs

        $app = JobApplication::create([
            'name'         => $req->name,
            'email'        => $req->email,
            'phone'        => $req->phone,
            'desired_role' => $req->desired_role,
            'education'    => $req->education,
            'notes'        => $req->notes,
            'cv_path'      => $path,
            'ip'           => $req->ip(),
            'submitted_at' => now(),
        ]);

        Mail::to($req->email)->send(new JobApplicationReceived($app));

        return redirect()->route('applications.create')
            ->with('success','Currículo enviado com sucesso!');
    }
}
