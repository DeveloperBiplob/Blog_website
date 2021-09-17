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
                <form action="" id="addCategoryForm">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter a Category Name">
                        <span class="text-danger" id="catError"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
       </div>
   </div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="updateCategoryForm">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="hidden" name="" id="edit_cat_slug">
                    <input type="text" name="name" id="edit_name" class="form-control" placeholder="Enter New Category Name">
                    <span class="text-danger" id="catEditError"></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block">Update Category</button>
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
                rows += '<a class="btn btn-sm btn-info text-light" id="editRow" data-id="'+value.slug+'" data-toggle="modal" data-target="#editModal">Edit</a> ';
                rows += '<a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="'+value.slug+'" >Delete</a> ';
                rows += '</td>';
                rows += '</tr>';
            });
            $('#catTable').html(rows)
        }

        // SweetAlear//
        function notifaction(title = "Data Save Successffully!"){
            Swal.fire({
                icon: 'success',
                title: 'Data Save!',
                text: title,
                })
        }

        // Store
        $('body').on('submit', '#addCategoryForm', function(e){
            e.preventDefault();
            // console.log('Function is working')
            let name = $('#name');
            let catError = $('#catError');
            // console.log(name.val());

            catError.text('');
            if(name.val() === ''){
                catError.text('Input Field Must Be Not Empty!');
                return null;
            }
            axios.post("{{ route('admin.category.store') }}", {
                name : name.val()
            })
            .then((res) => {
                getAllCategory();
                name.val('');
                notifaction('Data Save Successffully!');
            })
            .catch((err) => {
                // console.log(err);

                if(err.response.data.errors.name){
                    catError.text(err.response.data.errors.name[0]);
                }
            })

        })

        // Delete
        $('body').on('click', '#deleteRow', function (){
            let slug = $(this).attr('data-id');
            let base_url = window.location.origin;
            let url = base_url + '/admin/category/' + slug;

            // console.log(url);

            axios.delete(url)
            .then((res) => {
                getAllCategory();
                notifaction('Data Delete Successfully');
            })
        })


        // Edit
        $('body').on('click', '#editRow', function (){
            let slug = $(this).attr('data-id');
            let base_url = window.location.origin;
            let url = base_url + '/admin/category/' + slug;

            // console.log(url);

            let edit_name = $('#edit_name');
            let edit_cat_slug = $('#edit_cat_slug');
            let catEditError = $('#catEditError');

            axios.get(url)
            .then((res) => {
                // let {data} = res; // ai vabe o use kora jay.
                // console.log(data);

                // Input Field e data show koranor jonno.
                let data = res.data; 
                edit_name.val(data.name)
                edit_cat_slug.val(data.slug)
            })
            .catch((err) => {
                console.log(err);
            })

        })

        // Update
        $('body').on('submit', '#updateCategoryForm', function(e){
            e.preventDefault();

            let slug = $('#edit_cat_slug').val();
            let name = $('#edit_name').val();
            let catEditError = $('#catEditError');
            
            let base_url = window.location.origin;
            let url = base_url + '/admin/category/' + slug;

            // console.log(url);

            axios.put(url, {
                name : name
            })
            .then((res) => {
                $('#editModal').modal('toggle'); // data update howar por modal ta close kore dey.
                getAllCategory();
                notifaction('Data Update Successfully!');
            })
            .catch((err) => {           
                if(err.response.data.errors.name){
                    catEditError.text(err.response.data.errors.name[0]);
                }
            })
        })

    </script>
@endpush