@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people me-2"></i>
            Manajemen User
        </h2>

        <a href="{{ route('admin.users.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah User
        </a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search --}}
    <form action="{{ route('admin.users') }}"
          method="GET"
          class="mb-3">

        <div class="input-group">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Cari nama atau email">

            <button
                type="submit"
                class="btn btn-info text-white">
                <i class="bi bi-search"></i>
                Search
            </button>

        </div>

    </form>

    {{-- Table --}}
    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-primary">

                <tr>
                    <th width="60">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>
                            {{ $users->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>

                            @if($user->role)

                                @if($user->role->code === 'ADM')

                                    <span class="">
                                        {{ $user->role->name }}
                                    </span>

                                @else

                                    <span class="">
                                        {{ $user->role->name }}
                                    </span>

                                @endif

                            @else

                                <span class="badge bg-secondary">
                                    Tidak ada role
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                {{-- Edit --}}
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="btn btn-info text-white">

                                    <i class="bi bi-pencil"></i>
                                    Edit

                                </a>

                                {{-- Delete --}}
                                @if(auth()->id() !== $user->id)

                                    <form
                                        action="{{ route('admin.users.destroy', $user) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-info text-white">

                                            <i class="bi bi-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-4">

                            <h5 class="text-muted">
                                Data user tidak tersedia.
                            </h5>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-3">

        {{ $users->links() }}

    </div>

</div>

 {{-- TOMBOL KEMBALI

    <div class="mt-4">

        <a href="{{ url('/dashboard') }}"
           class="btn btn-primary fw-bold">

            ← Kembali

        </a>

    </div> --}}


</div>

@endsection