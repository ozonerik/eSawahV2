@push('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush
    <div>
    <x-content_header name="Profile" >
        <li class="breadcrumb-item active">Profile</a></li>
    </x-content_header>
    <div class="row mx-1 pb-3">
        <x-card_profile name="Profile Picture" width="3" order="1" smallorder="1">
            <form wire:submit.prevent="updatephoto" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="custom-file" wire:ignore>
                        <input type="file" id="formFile"  wire:model="photo" wire:target="photo" wire:loading.attr="disabled" class="custom-file-input form-control @error('photo') is-invalid @enderror" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-md-right text-center">
                <button class="btn btn-primary" type="submit" wire:target="photo" wire:loading.attr="disabled">
                    <span wire:target="photo" wire:loading.class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span wire:target="photo" wire:loading.class="sr-only">Save</span>
                </button>
                </div>
            </form>
        </x-card_profile>
        <x-card_section2 name="Profile Information" type="primary" width="9" order="2" smallorder="2">
        <form wire:submit.prevent="updateprofile">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group text-md-right text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </x-card-section2>
    </div>
    <div class="row mx-1 pb-3">
        <div class="col-12 col-md-3"></div>
        <x-card_section2 name="Update Password" type="primary" width="9" order="3" smallorder="3">
        <form wire:submit.prevent="updatepasswd">
            <div class="form-group">
                <label for="currentpassword">Current Password</label>
                <input wire:model="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="currentpassword" placeholder="Current Password">
                @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="newpassword">New Password</label>
                <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="newpassword" placeholder="New Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input wire:model="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword" placeholder="Confirm Password">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group text-md-right text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </x-card-section2>
    </div>
</div>