<x-admin.admin-layout>

<div class="main-card">
    <div class="header">
        Create Category
        <a class="btn-sm btn-blue" href="{{ route('admin.categories.index') }}">All Categories</a>
    </div>

    <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="name" class="text-xs required">Name</label>
                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="text-xs">Description</label>

                <div class="form-group">
                    <input type="text" id="description" name="description" class="{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}">
                </div>
                @if($errors->has('description'))
                    <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                @endif
                
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">Save</button>
        </div>
    </form>
</div>

</x-admin.admin-layout>
