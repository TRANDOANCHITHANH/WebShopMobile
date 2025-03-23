<input type="hidden" name="id" class="id-product" value="{{ $porductSize['id'] }}">
<div class="position-relative row form-group">
    <label for="size" class="col-md-3 text-md-right col-form-label">Thông số</label>
    <div class="col-md-9 col-xl-9">
        <input required name="size" id="size" value="{{ $porductSize['size'] }}"
            placeholder="Thông số sản phẩm" type="number" class="form-control input size-update">
        <p>
        <div class="error error-size"></div>
        </p>
    </div>

</div>
<div class="position-relative row form-group">
    <label for="type_size" class="col-md-3 text-md-right col-form-label">Đơn vị</label>
    <div class="col-md-6 col-xl-6">
        <select required name="type_size" id="typeSize" placeholder="Thông số sản phẩm" type="number"
            class="form-control input">
            <option value="">--Chọn--</option>
            <option value="1" {{ $porductSize['type_size'] == 1 ? 'selected' : '' }}>Inch</option>
            <option value="2" {{ $porductSize['type_size'] == 2 ? 'selected' : '' }}>GB</option>
            <option value="3" {{ $porductSize['type_size'] == 3 ? 'selected' : '' }}>mAh</option>
            <option value="4" {{ $porductSize['type_size'] == 4 ? 'selected' : '' }}>m</option>
            <option value="5" {{ $porductSize['type_size'] == 5 ? 'selected' : '' }}>W</option>
        </select>
        <p>
        <div class="error error-type_size"></div>
        </p>
    </div>
</div>
<div class="position-relative row form-group">
    <label for="name" class="col-md-3 text-md-right col-form-label">Giá nhập</label>
    <div class="col-md-9 col-xl-8">
        <input required name="price_import" placeholder="Giá nhập" type="number"
            class="form-control price_import-update input" value={{ $porductSize['price_import'] }}>
        <p>
        <div class="error error-price_import"></div>
        </p>
    </div>
</div>
<div class="position-relative row form-group">
    <label for="name" class="col-md-3 text-md-right col-form-label">Giá bán</label>
    <div class="col-md-9 col-xl-8">
        <input required name="price_sell" placeholder="Giá bán" type="number"
            class="form-control price_sell-update input" value={{ $porductSize['price_sell'] }}>
        <p>
        <div class="error error-price_sell"></div>
        </p>
    </div>
</div>
<div class="position-relative row form-group">
    <label for="content" class="col-md-3 text-md-right col-form-label">Ảnh thêm</label>
    <div class="col-md-6">
        <input name="img[]" id="imageUpload" type="file" multiple class="form-control input">
        <p>
        <div class="error error-img"></div>
        </p>
    </div>

</div>
<div class="position-relative row form-group">
    <div class="col-md-12 row">
        @foreach ($porductSize['img'] as $item)
        <div class="col-md-4 mb-2 d-flex flex-column justify-content-md-center item-img" style="height: 50px">
            <img src="{{ asset('storage/ProductSize/' . $item['path']) }}" alt=""
                style="width: 100%;height:100%">
            <button type="button" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm remove-img"
                data-id="{{ $item['id'] }}"> <i class="bi bi-trash"></i></button>
        </div>
        @endforeach
    </div>
</div>
<div class="position-relative row form-group mb-1 mt-2">
    <div class="col-md-12 text-right col-xl-12">
        <button type="button" id="update" class="btn-shadow btn-hover-shine btn btn-primary">
            <span class="btn-icon-wrapper pr-2 opacity-8">
                <i class="bi bi-download"></i>
            </span>
            <span>Lưu</span>
        </button>
    </div>
</div>