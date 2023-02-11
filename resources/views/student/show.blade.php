 @extends('layouts.app')

@section('content')
 <div class="title-head p-5">
            <h1>Student</h1>
            <a class="btn btn-primary add-btn trigger_btn" href="{{ route('admin.student.add') }}" > Add <span><i class="fa-solid fa-circle-plus"></i></span></a>
        </div>
        <div class="container-fluid">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection