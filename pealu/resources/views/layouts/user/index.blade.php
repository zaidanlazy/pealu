@extends('layouts.app')

@section('content')
<!-- Font Awesome 6.5.1 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">{{ __('Dashboard') }}</div>
               <div class="card-body">
                  @if($message = Session::get('delete'))
                     <div class="alert alert-danger" role="alert">
                       <strong>{{$message}}</strong>
                     </div>
                  @endif
                  @if($message = Session::get('edit'))
                     <div class="alert alert-success" role="alert">
                       <strong>{{$message}}</strong>
                     </div>
                  @endif

                   <a href="{{Route('user.create')}}" class="btn btn-success btn-md m-4">
                     <i class="fa fa-plus"></i> Tambah User
                   </a>
                   
                   <table class="table table-striped table-bordered">
                     <thead>
                       <tr>
                           <th>No.</th>
                           <th>Username</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>Level</th>
                           <th>Aksi</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach($user as $users) 
                       <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$users->name}}</td>
                         <td>{{$users->nama_lengkap}}</td>
                         <td>{{$users->email}}</td>
                         <td>
                             @if ($users->roles->isNotEmpty())
                                 {{ $users->roles->pluck('roles')->implode(', ') }}
                             @else
                                 -
                             @endif
                         </td>
                         <td>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <a href="{{ route('user.edit', $users->id) }}" 
                                class="btn btn-success mx-1 shadow d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px; padding: 0;">
                                  <i class="fa-solid fa-pen"></i> <!-- Versi Font Awesome 6 -->

                              </a>
                          </div>
  
                          <div class="input-group-prepend">
                              <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{$users->id}}" 
                                class="btn btn-danger d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px; padding: 0;">
                                  <i class="fa fa-lg fa-fw fa-trash"></i>
                              </a>
                          </div>
                      </div>
                        </td>
                       </tr>
                       @endforeach
                     </tbody>
                   </table>
                   {{ $user->links() }}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@foreach($user as $users)
<!-- Modal Delete -->
<div class="modal fade" id="delete{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b>{{ $users->nama }}</b></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">keluar</button>
                <form action="{{ route('user.destroy', $users->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach