@extends ('layouts.app')
@section('title','createitems')
@section('content')
<div class="col container">
    <div class="row justify">
        <h1 class="text-center mt-3 mt-5 text-bolder">ADD ITEM</h1>
            <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Item Name" value="{{ old('name') }}" autofocus>
                    @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mt-2">
                    <label for="price" class="form-label">Item Price</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Item Price" value="{{ old('price') }}" autofocus>
                    @error('price')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="detail" class="form-label text-muted">Detail</label>
                    <textarea name="detail" id="detail" rows="5" class="form-control text-start" placeholder="Detail" autofocus>
                      {{ old('detail') }}
                    </textarea>
                    @error('detail')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mt-2">
                    <label for="inventory" class="form-label">Inventry </label>
                    <input type="text" name="inventory" id="inventory" class="form-control" placeholder="Enter Item Price" value="{{ old('inventory') }}" autofocus>
                    @error('inventory')
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label d-block fw-bold">
                        Category ID
                    </label>
                    @foreach ($all_categories as $category)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input"
                            @if(in_array($category->id, $selected_categories))
                            checked
                            @endif>
                            <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    {{-- Error --}}
                    @error('category')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="form-label text-muted">Image</label>
                    <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
                  <div class="form-text" id="image-info">
                    Acceptable formats:jpeg,jpg,png and gif<br>
                    Maximum file size:1048kb
                  </div>
                  @error('image')
                  <div class="text-danger small">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit"class="btn btn-warning px-5">CREATE</button>
            </form>
    </div>
</div>
@endsection