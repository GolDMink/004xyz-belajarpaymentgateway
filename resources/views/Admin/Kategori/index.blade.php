@extends('Admin.layouts.Master')
@push('vendor_css')
<link rel="stylesheet" type="text/css"
    href="{{asset('zsh/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('zsh/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
@endpush
@section('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('zsh/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('zsh/app-assets/css/plugins/forms/pickers/form-flatpickr.css-')}}">
@endsection
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">DataTables</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Datatable</a>
                                </li>
                                <li class="breadcrumb-item active">Advanced
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="modal fade text-left" id="kategori-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel1"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="simpan-update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <section id="ajax-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Data Kategori</h4>
                            </div>
                            <div class="card-datatable">
                                <table class="ajax-datatable table" id="tables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
@push('vendor_js')
<script src="{{asset('zsh/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('zsh/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('zsh/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('zsh/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
@endpush

@push('page_js')
<script type="text/javascript">
    $(document).ready( function () {
     $('#tables').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('kategori.data')}}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            {data: 'name'},
            {data: 'aksi'},
        ]
    });

});
$(document).on('click', '.edit', function(){
    // console.log($(this).data('id'))
    var id = $(this).data('id')
    $.ajax({
        url: `/admin/Kategori/${id}/edit`,
        method : 'GET',
        success : function(data){
            // console.log(data)
            $('.modal-title').text('Edit Kategori')
            $('#kategori-edit').find('.modal-body').html(data)
            $('#kategori-edit').modal('show')
        },
        error : function(error){
            console.log(error)
        }
    })
})

$(document).on('click','#simpan-update',function(){
    var id = $('#form-edit').find('#kategori_id').val()
    var formData = $('#form-edit').serialize()
    console.log(formData)
    $.ajax({
        url : `/admin/Kategori/${id}`,
        method: 'PATCH',
        data: formData,
        success : function(data){
            console.log(data)
        },
        error: function(error){
            console.log(error)
        }

    })
})


</script>

@endpush
