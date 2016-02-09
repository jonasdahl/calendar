@foreach ($rows as $row)
    @foreach ($row as $key => $val) {{ $key }}:{{ $val }}
    @endforeach
@endforeach