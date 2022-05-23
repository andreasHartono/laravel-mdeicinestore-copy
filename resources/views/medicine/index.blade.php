@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Medicine</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Formula</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
      <tr>
        <td>{{$d->generic_name}}</td>
        <td>{{$d->form}}</td>
        <td>{{$d->restriction_formula}}</td>
        <td>{{$d->category->name}}</td>
        <td>
            <img src="{{ asset('images/'.$d->image) }}" 
            height="100px" />
        </td>
        <td>{{$d->price}}</td>
        
      </tr>
    @endforeach
    
    </tbody>
  </table>
</div>



<div class="container">
  <h2>List of Medicine</h2>
  <div class="row">
  @foreach($data as $d)
        <div class="col-md-3" 
        style="text-align:center; border:1px solid #888 ; margin:5px; 
        padding:5px;border-radius:15px"
        >
            <img src="{{ asset('images/'.$d->image) }}" 
            height="100px" /><br>
            <a href="medicines/{{$d->id}}">
                <b>{{$d->generic_name}}</b><br>
                {{$d->form}}
            </a>
        </div>
    @endforeach
    </div>
</div>

@endsection
