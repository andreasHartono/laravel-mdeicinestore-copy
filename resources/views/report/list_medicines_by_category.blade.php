@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List Medicines by Category</h2>
  <p>ID Category : {{$id_category}} with name : {{$namecategory}}</p>
  <hr>
  <p>Total rows : {{$getTotalData}}</p>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Formula</th>
        <th>Photo</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach($result as $d)
      <tr>
        <td>{{$d->generic_name}}</td>
        <td>{{$d->form}}</td>
        <td>{{$d->restriction_formula}}</td>
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
@endsection