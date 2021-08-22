<script>
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
} );

</script>
