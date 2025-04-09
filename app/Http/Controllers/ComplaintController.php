<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Inertia\Inertia;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('viewjs/complaint/index', [
            'complaints' => Complaint::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('viewjs/complaint/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        $complaint = Complaint::create($request->all());
        return redirect()->route('complaint.show', ['complaint' => $complaint]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        return Inertia::render(
            'viewjs/complaint/show',
            ['complaint' => $complaint]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        return Inertia::render(
            'viewjs/complaint/edit',
            ['complaint' => $complaint]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update($request->all());
        return redirect()->route('complaint.show', ['complaint' =>$complaint]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
