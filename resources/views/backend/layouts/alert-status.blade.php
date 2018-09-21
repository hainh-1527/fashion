@if (session('success'))
    <div class="alert alert-success">
        <strong>{{ __('success') }}!</strong>
        {{ session('success') }}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info">
        <strong>{{ __('info') }}!</strong>
        {{ session('info') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        <strong>{{ __('warning') }}!</strong>
        {{ session('warning') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        <strong>{{ __('error') }}!</strong>
        {{ session('error') }}
    </div>
@endif
