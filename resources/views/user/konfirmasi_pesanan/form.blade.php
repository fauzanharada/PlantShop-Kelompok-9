<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Atas Nama</label>

    <div class="col-md-6">
        {{ Form::text('atas_nama', null, ['class' => 'form-control', 'autofocus' => 'true', 'placeholder' => 'Atas Nama']) }}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Bank</label>

    <div class="col-md-6">
        {{ Form::text('bank', null, ['class' => 'form-control', 'placeholder' => 'Bank']) }}
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Foto</label>

    <div class="col-md-6">
        {{ Form::file('foto_bukti_pembayaran', null, ['class' => 'form-control']) }}
    </div>
</div>

