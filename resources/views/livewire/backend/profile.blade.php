    <div>
    <x-content_header name="Profile" >
        <li class="breadcrumb-item active">Profile</a></li>
    </x-content_header>
    <div class="row mx-1 pb-3">
        <x-card_profile name="Profile Picture" width="3" order="1" smallorder="1"/>
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
            <div class="form-group">
                <label for="currentpassword">Current Password</label>
                <input type="password" class="form-control" id="currentpassword" placeholder="Current Password">
            </div>
            <div class="form-group">
                <label for="newpassword">New Password</label>
                <input type="password" class="form-control" id="newpassword" placeholder="New Password">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password">
            </div>
            <div class="form-group text-md-right text-center">
                <button wire:click="onRead" class="btn btn-primary">Save</button>
            </div>
        </x-card-section2>
    </div>
</div>