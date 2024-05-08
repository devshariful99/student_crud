<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <h1 class="float-start">Student List</h1>
                        <a href="{{ route('student.create') }}" class="btn btn-info btn-sm float-end">Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-striped">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Roll</th>
                                <th>Registration</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$student->image) }}" alt="{{ $student->name }}" height="50px" width="50px">
                                    </td>
                                    <td>{{ $student->roll }}</td>
                                    <td>{{ $student->reg }}</td>
                                    <td><span class="{{$student->getStatusBg()}}">{{$student->getStatus()}}</span></td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($student->created_at)) }}</td>
                                    <td>{{ ($student->created_at == $student->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($student->updated_at)) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('student.show',$student->id) }}" class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('student.edit',$student->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('student.delete',$student->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{ route('student.status',$student->id) }}" class="{{$student->getBtnStatusBg()}}">{{$student->getBtnStatus()}}</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>