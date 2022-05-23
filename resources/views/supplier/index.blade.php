@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Supplier</h2>

  @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>
            <a href="{{route('suppliers.create')}}" 
            class="btn btn-info">Tambah (biasa)</a>
        </th>
        <th>
            <a href="#modalCreate" data-toggle='modal'
            class="btn btn-info">Tambah (modal)</a>
        </th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
      <tr id='tr_{{$d->id}}'>
        <td>{{$d->name}}</td>
        <td>{{$d->address}}</td>
        <th>
            <a href="{{url('suppliers/' . $d->id . '/edit') }}" class="btn btn-warning">Edit</a>
            
            
            <form method="POST" action="{{url('suppliers/'.$d->id)}}" >
                @csrf
                @method('DELETE')
                <input type='submit' value='Hapus' class="btn btn-danger"
                onclick="if(!confirm('apakah anda yakin menghapus data {{$d->name}}')) return false;"   
                />
            </form>
        </th>
        <th>
          <a href="#modalEdit" data-toggle='modal' 
            onclick="getEditForm({{$d->id}})"
            class="btn btn-warning">Edit (modal 1)</a>
          
            <a class="btn btn-danger"
                onclick="if(confirm('apakah anda yakin menghapus data {{$d->name}}')) 
                deleteDataRemoveTR({{$d->id}});"   
                >Hapus 2 </a>
        </th>  
      </tr>
    @endforeach
    
    </tbody>
  </table>
</div>



<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" >
    <form role="form" method="POST" action="{{url('suppliers')}}" >
      @csrf
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Supplier</h4>
      </div>
      <div class="modal-body">
        
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" 
                        name="name" placeholder="isikan nama supplier">
                        <span class="help-block">
                        *tulis nama lengkap perusahaan </span>
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address"
                        class="form-control" rows="3"></textarea>
                    </div>

                   
                    
                </div>
                
            
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-info">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalContent" >
   
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script>
function getEditForm(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("suppliers.getEditForm")}}',
    data:{
      '_token':'{{csrf_token()}}',
      'id':id
    },
    success:function(data){
      $('#modalContent').html(data.msg)
    }
  });
}


function deleteDataRemoveTR(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("suppliers.deleteData")}}',
    data:{
      '_token':'{{csrf_token()}}',
      'id':id
    },
    success:function(data){
     if(data.status=='ok')
     {
       alert(data.msg);
       $('#tr_'+id).remove()
     }
    }
  });
}
</script>
@endsection
