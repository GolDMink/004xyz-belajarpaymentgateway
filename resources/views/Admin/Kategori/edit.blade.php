<form action="{{route('Kategori.store')}}" method="POST" id="form-edit">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="kategori_id" id="kategori_id" value="{{$kategori->id}}">
                <input type="text" name="nama" id="nama" class="form-control" value="{{$kategori->name}}">
            </div>
        </div>
    </div>
</form>
