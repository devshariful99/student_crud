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
                        <h1 class="float-start">Add Student</h1>
                        <a href="{{ route('student.index') }}" class="btn btn-info btn-sm float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-striped">
                            
                        <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>:</th>
                                    <td>{{ $students->name }}</td>
                                </tr>
                                
                                    <th>Image</th>
                                    <th>:</th>
                                    <td><img src="{{ asset('storage/'.$students->image) }}" alt="{{ $students->name }}" height="50px" width="50px"></td>
                                </tr>
                                <tr>
                                    <th>Roll</th>
                                    <th>:</th>
                                    <td> {{ $students->roll }}</td>
                                </tr>
                                <tr>
                                    <th>Reg</th>
                                    <th>:</th>
                                    <td> {{ $students->reg }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>:</th>
                                    <td> <span class="{{$students->getStatusBg()}}">{{$students->getStatus()}}</span></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <th>:</th>
                                    <td> {{ $students->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <th>:</th>
                                    <td> {{ $students->updated_at }}</td>
                                </tr>
                                

                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>