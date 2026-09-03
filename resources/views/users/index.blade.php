@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

 <h1 class="fw-bold text-primary">
         <i class="bi bi-person-vcard-fill"></i>
       User
    </h1>
<a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create</a>

<form action="{{ route('admin.users') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Search username or email"
        >
        <button class="btn btn-sm btn-info text-white" type="submit">
            Search
        </button>
    </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
    <td>{{ $users->firstItem() + $loop->index }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role->name }}</td>
    <td>
       <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info text-white">
         Edit 
       </a>
        ||
      <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
        <button class="btn btn-sm btn-info text-white" onclick="return confirm('Yakin hapus user ini?')">
           Hapus
        </button>
     </form>
    </td>
    @endforeach
</tr>
</tbody>
</table>

@endsection