@extends('layouts.main')
@section('title', 'Data Instruktur')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title ?? '' }}</h5>
                        <div class="mt4 mb-3">
                            <div align="right" class="mb-3">
                                <a class="btn btn-primary" href="{{ route('instructors.create') }}">Tambah Instruktur</a>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->gender == 1 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>
                                                @if($data->photo)
                                                    <img src="{{ asset('storage/'.$data->photo) }}" alt="Photo" width="50" height="50">
                                                @else
                                                    <span>No Photo</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->user && $data->user->majors->count())
                                                    @foreach ($data->user->majors as $major)
                                                        <span class="badge bg-info">{{ $major->name }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No Major</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('instructors.edit', $data->id) }}" class="btn btn-sm btn-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form class="d-inline" action="{{ route('instructors.destroy', $data->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
