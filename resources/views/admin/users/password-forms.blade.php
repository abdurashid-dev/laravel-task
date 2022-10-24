<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    @error('password')
    <span class="text-danger">
                            {{$message}}
                        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="exampleInputPasswordConfirmation" class="form-label">Password
        Confirmation</label>
    <input type="password" class="form-control" id="exampleInputPasswordConfirmation"
           name="password_confirmation">
    @error('password')
    <span class="text-danger">
                            {{$message}}
                        </span>
    @enderror
</div>
