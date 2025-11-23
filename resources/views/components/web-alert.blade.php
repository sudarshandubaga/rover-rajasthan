@if ($errors->any())
    <div class="bg-red-200/50 py-2 px-5 border-s-4 border-s-red-900 text-red-900 mb-2">
        {!! implode('', $errors->all(':message')) !!}
    </div>
@endif

@if (\Session::has('success'))
    <div class="bg-green-200/50 py-2 px-5 border-s-4 border-s-green-900 text-green-900 mb-2">
        {!! \Session::get('success') !!}
    </div>
@endif
