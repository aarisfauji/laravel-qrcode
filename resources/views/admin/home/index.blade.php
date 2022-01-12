@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Admin home</div>

               <div class="card-body">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $idx => $user)
                           <tr>
                              <td>{{ $idx + 1 }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
                              <td>
                                 @if ($user->hasVerifiedEmail())
                                    <span class="badge bg-primary">Verified</span>
                                 @else
                                    <span class="badge bg-danger">Unverified</span>
                                 @endif
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="card-footer">
                  <a class="btn btn-primary" href="{{ route('users.verification') }}">User verification</a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
