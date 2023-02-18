 @extends('layouts.app')

@section('content')
 <div class="title-head p-5">
            <h1>Student</h1>
            <a class="btn btn-primary add-btn trigger_btn" href="{{ route('admin.student.add') }}" > Add <span><i class="fa-solid fa-circle-plus"></i></span></a>
        </div>
        <div class="container-fluid">
            <table class="table text-center" id="table_id">
                <thead>
                    <tr>
                        <th class="text-center">T2MIS</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Contact Number</th>
                        <th class="text-center">Sex</th>
                        <th class="text-center">Course</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($data as $student)
                        <tr>
                            <td class="text-center">{{$student['t2mis']}}</td>
                            <td>{{$student['first_name']}} {{$student['middle_name']}} {{$student['last_name']}}</td>
                            <td>{{$student['email']}} </td>
                            <td>{{$student['contact_number']}} </td>
                            <td>{{$student['gender']}} </td>



                            <td>{{ $student['qualification_name'][0]->name}}</td>
                            <td>
                                <a href="{{ url('/Student' , [ $student['id'] ]) }}/edit" class="btn btn-primary" role="button">Edit</a>
                            </td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
    <script type="text/javascript">
        $(document).ready(function () {
            $("#table_id").DataTable();
        });

    </script>
@endsection
