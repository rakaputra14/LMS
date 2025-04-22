<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\major;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Instructors";

        // eager load roles
        $datas = Instructor::with('user.majors')->get();

        return view('instructors.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::doesntHave('roles')->get();
        $majors = Major::all();
        return view('instructors.create', compact('users', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $instructor = Instructor::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'is_active' => $request->is_active,
        ]);

        // Assign majors to the USER, not instructor (majors_detail pivot)
        $user = User::findOrFail($request->user_id);
        $user->majors()->sync($request->majors_id);

        $instrukturRole = Role::where('name', 'instruktur')->first();
        if ($instrukturRole) {
            $user->roles()->sync([$instrukturRole->id]);
        }

        return redirect()->route('instructors.index')->with('success', 'Instruktur created and role assigned.');
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
        $instructor = Instructor::with('user.majors')->findOrFail($id);
        $users = User::doesntHave('roles')->orWhere('id', $instructor->user_id)->get();
        $majors = Major::all();

        return view('instructors.edit', compact('instructor', 'users', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $instructor = Instructor::findOrFail($id);

        $instructor->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'is_active' => $request->is_active,
            'photo' => $request->hasFile('photo')
                ? $request->file('photo')->store('photos')
                : $instructor->photo,
        ]);

        // Sync the majors to the user's pivot table
        $instructor->user->majors()->sync($request->majors_id);

        return redirect()->route('instructors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::findOrFail($id);

        if ($instructor->user) {
            $instructor->user->majors()->detach();

            $instructor->user->roles()->where('name', 'instruktur')->delete();
        }

        $instructor->delete();

        return redirect()->route('instructors.index');
    }
}
