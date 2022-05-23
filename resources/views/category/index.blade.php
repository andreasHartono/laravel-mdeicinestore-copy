@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Category</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
      <tr>
        <td>{{$d->name}}</td>
        <td>{{$d->description}}</td>
      </tr>
      <tr>
        <td colspan='2'>
            <div class="row">
            @foreach($d->medicines as $m)
                <div class="col-md-3" 
                style="text-align:center; border:1px solid #888 ; margin:5px; 
                padding:5px;border-radius:15px"
                >
                    <img src="{{ asset('images/'.$m->image) }}" 
                    height="100px" /><br>
                    <b>{{$m->generic_name}}</b><br>
                    {{$m->form}}
                </div>
            @endforeach
            </div>
        </td>
      </tr>
    @endforeach
    
    </tbody>
  </table>
</div>
@endsection
