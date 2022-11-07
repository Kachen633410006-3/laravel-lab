@extends('layouts.app')
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Setting</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    @foreach($profile as $pf)
    <?php $i = $i+1; ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$pf->firstname}}</td>
      <td>{{$pf->lastname}}</td>
      <td>{{$pf->email}}</td>
      <td>{{$pf->mobile}}</td>
      <td><button class="btn btn-primary" onclick='getEdit("<?php echo $pf->id ?>")'>Edit</button>
      <button class="btn btn-danger" onclick='delProfile("<?php echo $pf->id ?>")'>Delete</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="form">Create Profile</a>
</div>
@endsection

<script>
    function delProfile(id){
        Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

      if (result.isConfirmed) {
        $.post('delProfile',{id:id},function(response){
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          ).then((result)=>{

              location.reload();
          })
          });
      }
    })
    
  }

  function getEdit(id){
    location.href = "edit_" + id;
  }
</script>