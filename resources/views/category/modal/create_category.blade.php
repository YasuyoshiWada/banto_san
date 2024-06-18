{{-- @section('styles')
<link rel="stylesheet" href="{{ mix('/css/login-forget.css') }}">
@endsection --}}

<style>
    .resend-color {
        background-color:#ccccff;
        border-radius: 0.5vw;
    }
    .btn-color1 {
        background-color:#003366;
    }
</style>

<div id="category-create" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal">
        <div class="modal-content">
            <form action="{{ route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body container-fluid">
                    <div class="row text-center">
                        <h3 class="modal-title">EDIT CATEGORY</h3>
                    </div>
                    <div class="row">
                        <label for="name" class="form-label">Enter New category name</label>
                        <input type="text" id="name" name="name" class="form-control form-control-xl" required>
                    </div>
                    <div class="row">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file" id="image" name="image" class="form-control form-control-xl" required>
                    </div>
                    <div class="row text-center mt-4">
                        <button type="submit" class="btn btn-color1">Save Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
