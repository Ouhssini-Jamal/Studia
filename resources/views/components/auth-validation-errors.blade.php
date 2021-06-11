@props(['errors'])
@if ($errors->any())
    <div {{ $attributes }} class="alert w-50  alert-danger">
        <div class="font-medium text-red-600" style="color:red;">
            {{ __('Whoops! Something went wrong.') }}
        </div>
            <div class="mb-3 mt-3">   
                @foreach ($errors->all() as $error)
                    <div style="color:red;">{{ $error }}</div>
                @endforeach
            </div>
    </div>
@endif
