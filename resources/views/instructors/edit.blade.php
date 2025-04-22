@extends('layouts.main')
@section('title', 'Add New Users')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Instruktur</h5>
                        <form action="{{ route('instructors.update', $instructor->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="user_id" class="form-label">User</label>
                                <select name="user_id" class="form-control" required>
                                    <option disabled selected>-- Pilih User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $instructor->user_id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $instructor->title }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" name="gender" class="form-control" value="{{ $instructor->gender }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $instructor->address }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $instructor->phone }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label><br>
                                @if ($instructor->photo)
                                    <img src="{{ asset('storage/' . $instructor->photo) }}" alt="Photo" width="50"
                                        class="mb-2"><br>
                                @endif
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="is_active" class="form-label">Status</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" {{ $instructor->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$instructor->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Majors</label><br>
                                @foreach ($majors as $major)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="majors_id[]"
                                            value="{{ $major->id }}" {{ $instructor->user->majors->contains($major->id) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $major->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
