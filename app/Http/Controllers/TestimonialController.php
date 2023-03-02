<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $testimonial = Testimonial::all();
        return view('testimonial.dashboard', compact('testimonial'));
    }

    /**
     * Show the form for list resources in view page.
     */
    public function list()
    {
        $testimonial = Testimonial::all()->where('Etat','=','Approuved');
        return view('testimonial.index', compact('testimonial'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Titre' => 'required',
            'Message' => 'required | max:300',
            'Doc' => 'mimes:jpeg,png,docx,doc | max:2000'
        ]);

        if ($request->hasFile('Doc')) {
            $name = $request->file('Doc')->getClientOriginalName();
            // get image in storage folder
            $request->file('Doc')->storeAs('/public/Docs',$name);
        }
        $data = [
            'Titre' => $request->Titre,
            'Message' => $request->Message,
            'Doc' => $name,
        ];
        Testimonial::create($data);
        return redirect()->back()->with('success', 'testimonial has been add');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update([
            'Etat' => $request->Etat,
        ]);
        return to_route('testimonial.dashboard');
    }
}
