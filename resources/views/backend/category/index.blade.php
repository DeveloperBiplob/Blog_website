@extends('../layouts.backend_master')
@section('title', 'Category')
@section('master-content')
   <div class="row">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h3>Categories</h3>
               </div>
               <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Sl</th>
                               <th>Name</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       {{-- <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>Delete</td>
                        </tr>
                        @empty
                            <span>Data not Found</span>
                        @endforelse
                       </tbody> --}}

                       <tbody id="catTable"></tbody>
                       
                   </table>
               </div>
           </div>
       </div>
       <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
                <form action="" >
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter a Category Name">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
       </div>
   </div>
@endsection

@push('script')
    <script>
        function getAllCategory(){
            axios.get("{{ route('admin.fetch-category') }}")
            .then((res) => {
                // console.log(res.data)
                table_data_row(res.data)
            })
        }
        getAllCategory();

        function table_data_row(data) {
            var	rows = '';
            var i = 0;
            $.each( data, function( key, value ) {
                rows += '<tr>';
                rows += '<td>'+ ++i +'</td>';
                rows += '<td>'+value.name+'</td>';
                rows += '<td data-id="'+value.id+'" class="text-center">';
                rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.id+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.id+'" >Delete</a> ';
                rows += '</td>';
                rows += '</tr>';
            });
            $('#catTable').html(rows)
        }

    </script>
@endpush