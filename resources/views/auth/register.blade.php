<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" name="password" required>
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-group">
        <label for="department">Department</label>
        <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}" required>
    </div>

    <div class="form-group">
        <label for="occupation">Occupation</label>
        <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>
