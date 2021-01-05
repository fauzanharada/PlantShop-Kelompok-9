<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Harga Produk</label>

    <div class="col-md-6">
        {{ Form::text('harga_produk', null, ['class' => 'form-control', 'autofocus' => 'true', 'placeholder' => 'Harga Produk']) }}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Detail Produk</label>

    <div class="col-md-6">
        {{ Form::textarea('detail_produk', null, ['class' => 'form-control', 'placeholder' => 'Detail Produk', 'size' => '5x3']) }}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Kategori</label>

    <div class="col-md-6">
        {{ Form::select('uuid_kategori', $kategori, null, ['placeholder' => '-- Pilih Kategori --', 'id' => 'kategori', 'class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Foto</label>

    <div class="col-md-6">
        {{ Form::file('foto', null, ['class' => 'form-control']) }}
    </div>
</div>

