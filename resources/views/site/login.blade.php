@extends('site._template')
@section('content')
<!-- Login Form -->
<div class="container my-5">
      <div style="height: 60vh;" class="d-flex flex-column justify-content-center align-items-center">
            <h1>LOGIN</h1>
            <div class="border border-primary rounded py-5 px-3">
                  <form action="{{ route('request.login') }}" method="POST" data-type="json">
                        @csrf
                        <div class="form-floating mb-2">
                              <input type="text" id="email" class="form-control" name="email" placeholder="Email">
                              <label for="email" class="mb-5 pt-2 "><i class="fas fa-user"></i> Email</label>

                        </div>
                        <div class="form-floating mb-2">
                              <input type="password" id="password" class="form-control" name="password" placeholder="password">
                              <label for="password" class="mb-5 pt-2"><i class="fas fa-lock"></i> Password</label>

                        </div>
                        <div class="d-grid">
                              <button type="submit" class="btn btn-info rounded-pill ">login</button>
                              <div class="d-none justify-content-center mt-2 load">
                                    <div class="spinner-border" role="status">
                                          <span class="visually-hidden">Loading...</span>
                                    </div>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>@endsection

@push('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
@endpush
