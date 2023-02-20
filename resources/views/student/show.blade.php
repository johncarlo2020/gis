 @extends('layouts.app')

 @section('content')
     <div class="title-head p-5">
         <h1>Student</h1>
         <a class="btn btn-primary add-btn trigger_btn" href="{{ route('admin.student.add') }}"> Add <span><i
                     class="fa-solid fa-circle-plus"></i></span></a>
     </div>
     <div class="filter-container" id="filter_container">
         <div class="text">
             <h6>Filter results</h6>
         </div>
         <div class="form-container card p-3 ">
             <form>
                 <div class="row student-input">
                     <div class="col">
                         <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Course</label>
                             <select class="form-select" aria-label="Default select example">
                                 <option selected>Open this select menu</option>
                                 <option value="1">One</option>
                                 <option value="2">Two</option>
                                 <option value="3">Three</option>
                             </select>
                         </div>
                     </div>
                     <div class="col">
                         <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Scholarship</label>
                             <select class="form-select" aria-label="Default select example">
                                 <option selected>Open this select menu</option>
                                 <option value="1">One</option>
                                 <option value="2">Two</option>
                                 <option value="3">Three</option>
                             </select>
                         </div>
                     </div>
                     <div class="col">
                         <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label">Batch number</label>
                             <input type="text" class="form-control" id="exampleInputEmail1"
                                 aria-describedby="emailHelp">
                         </div>
                     </div>
                 </div>
                 <div class="d-flex justify-content-end mt-3">
                     <button type="submit" class="btn btn-sm btn-success rounded-pill px-4 ">filter</button>
                 </div>
             </form>
         </div>
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
                         <td class="text-center">{{ $student['t2mis'] }}</td>
                         <td>{{ $student['first_name'] }} {{ $student['middle_name'] }} {{ $student['last_name'] }}</td>
                         <td>{{ $student['email'] }} </td>
                         <td>{{ $student['contact_number'] }} </td>
                         <td>{{ $student['gender'] }} </td>

                         <td>{{ $student['qualification_name'][0]->name }}</td>
                         <td>
                             <a href="{{ url('/Student', [$student['id']]) }}/edit" class="btn btn-primary"
                                 role="button">Edit</a>
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

     <style>
         div#filter_container {
             display: block;
             margin-top: 15px;
             clear: both;
             margin-bottom: 29px;
         }
     </style>
     <script type="text/javascript">
         $(document).ready(function() {
             var table = $("#table_id");
             $(table).DataTable();

             var $buttonFilter = $('<button>').text('Filter');
             var $buttonExport = $('<button>').text('Export');
             var $iconfilter = $('<i>').addClass('fa-solid fa-filter ml-1');
             var $iconExport = $('<i>').addClass('fa-solid fa-file-export ml-2');

             var filter = $("#filter_container");
             $buttonFilter.addClass('btn btn-sm btn-primary rounded-pill px-3 mr-2 ml-2');
             $buttonExport.addClass('btn btn-sm btn-success rounded-pill px-3');
             $buttonFilter.attr('id', 'btn_filter');
             $buttonExport.attr('id', 'btn_export');

             //append icons and button
             $('#table_id_filter').append($buttonFilter, $buttonExport);
             $buttonFilter.append($iconfilter);
             $buttonExport.append($iconExport);
             //append to filter tab
             $('#table_id_wrapper').children().eq(2).before(filter);

             $(filter).hide();

             $buttonFilter.click(function() {
                 $(filter).toggle();
             });



         });
     </script>
 @endsection
