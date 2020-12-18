<div>
    <h2>Multiple Files Uploads</h2>

    <form wire:submit.prevent="uploadMultipleFiles" >
        <div class="row">
            <div class="col-md-3">
                <label for="">Pictures</label>
                <input type="file" class="form-control" wire:model="pictures" multiple >
                @error('pictures.*')
                    <span style="color: red;" >{{ $message }}</span>
                @enderror

                <h2>Preview Images</h2>
                <!-- Loading Message for Images -->
                <div wire:loading wire:target="pictures">Uploading Pictures...</div>
                @if( !empty( $pictures ) )
                    <div>
                        @foreach ( $pictures as $picture )
                            <img src="{{ $picture->temporaryUrl() }}" alt="" style="width: 100px;" >
                        @endforeach
                    </div>
                @endif 
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" >Upload Pictures</button>
            </div>
        </div>
    </form>

</div>