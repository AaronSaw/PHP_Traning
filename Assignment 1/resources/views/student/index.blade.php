@extends('template')
@section('title')
    student
@endsection

@section('content')
    <div class="container">
        <div class="row  justify-content-center  ">
            <div class="col-7">
                <div class=" d-flex  justify-content-between mb-3">
                    <a href="{{ route('student.create') }}" class=" btn btn-warning shadow">Create Student</a>
                    <a href="{{ route('welcome') }}" class=" btn btn-success shadow">welcome</a>
                </div>
                <div class="card border-0">
                    <div class="card-body">
                        <table class="table border-0">
                            <thead>
                                <th>#</th>
                                <th>Student</th>
                                <th>Age</th>
                                <th>Action</th>
                                <th>Major</th>
                                <th>Created</th>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->age }}</td>
                                        <td>{{ \App\Models\Major::find($student->major_id)->major }}</td>
                                        <td class="">
                                            <a href="{{ route('student.edit', $student->id) }}"
                                                class=" btn btn-sm btn-outline-success">edit</a>
                                            <form action="{{ route('student.destroy', $student->id) }}"
                                                class=" d-inline-block" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class=" btn  btn-sm btn-outline-danger">del</button>
                                            </form>
                                        </td>
                                        <td>{{ $student->created_at->format(' d-M-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection