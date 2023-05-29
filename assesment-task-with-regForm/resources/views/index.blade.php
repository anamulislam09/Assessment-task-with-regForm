@extends('layouts.app');

@section('content')
<div class="container">
  <div class="card my-5">
    <div class="card-header"><h1>Employee List</h1></div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Skills</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach ( $data as $list)
         <tr>
          <td>{{$loop->iteration}}</td>
          <td><img style="width:80px" src="/{{$list->image}}" alt=""></td>
          <td>{{$list->name}}</td>
          <td>{{$list->email}}</td>
          <td>{{$list->address_details}}</td>
          <td>{{$list->langague}}</td>
          <td>
            {{--  <a href="{{ route('editemployee', $list->id) }}" class="btn btn-primary">Edit</a>| --}}
            <form method="POST" action="{{ route('editemployee',$list->id) }}">
              @csrf
              {{-- @method('delete') --}}
              <button type='submit' class="btn btn-primary" class="text-inverse" data-toggle="tooltip">Edit
              </button>
              </form>

          <form method="POST" action="{{ route('deleteemployee',$list->id) }}">
            @csrf
            @method('delete')
            <button type='submit' class="btn btn-danger" class="text-inverse" data-toggle="tooltip">Delete
            </button>
            </form>

          </td> 

        </tr>
           
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection