@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>Detail of Medicine</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Field</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Name</td>
        <td>{{$data->generic_name}}</td>
     </tr>
     <tr>
        <td>Form</td>
        <td>{{$data->form}}</td>
    </tr>
     <tr>
        <td>Formula</td>
        <td>{{$data->restriction_formula}}</td>
    </tr>
     <tr>
        <td>Category</td>
        <td>{{$data->category->name}}</td>
        </tr>
     <tr>
        <td>Description</td>
        <td>{{$data->description}}</td>
        </tr>
     <tr>
         <td>Photo</td>
        <td>
            <img src="{{ asset('images/'.$data->image) }}" 
            />
        </td>
    </tr>
     <tr>
        <td>price</td>
        <td>{{$data->price}}</td> 
      </tr>
    
    </tbody>
  </table>
</div>
@endsection