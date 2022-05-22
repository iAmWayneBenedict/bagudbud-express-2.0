<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
@extends('layouts.admin-layouts')

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
@section('content')
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Applications</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">applications</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Applications Table
                            </div>
                            <div class="card-body mt-3">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Vehicle Type</th>
                                            <th>Date Applied</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Vehicle Type</th>
                                            <th>Date Applied</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (isset($data))
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $row->rider_id }}</td>
                                                    <td>{{ $row->f_name . " " . $row->l_name }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->vehicle_type }}</td>
                                                    <td>{{ $row->apply_date }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <form action="/applications/verify" method="post">
                                                                @csrf
                                                                <button type="submit" class="hire-now btn btn-primary me-2" name="id" value="{{ $row->rider_id }}"><i class="bi bi-person-plus"></i></button>
                                                            </form>
                                                            <form action="">
                                                                <button class="delete-item-btn btn btn-danger"><i class="bi bi-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                {{ app('request')->input('fail') }}
                @if (app('request')->input('success'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: "You have successfully verified!"
                        })
                    </script>
                @elseif (app('request')->input('fail'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: "Verification Error!"
                        })
                    </script>
                @endif
                <script>
                    $(() => {
                        $('table').click( e => {
                            if (e.target.classList.contains('hire-now') || e.target.parentElement.classList.contains('hire-now')) {
                                let self = e.target.tagName === "I" ? e.target.parentElement : e.target;
                                let nodelist = self.parentElement.parentElement.parentElement.children;
                                self.innerHTML = "";
                                self.innerHTML = '<i class="bi bi-person-check"></i>';
                                self.classList.remove('btn-primary');
                                self.classList.add('btn-success');

                                
                                
                            } else if (e.target.classList.contains('delete-item-btn') || e.target.parentElement.classList.contains('delete-item-btn')) {
                                let self = e.target.tagName === "I" ? e.target.parentElement : e.target;
                                let nodelist = self.parentElement.parentElement.parentElement.children;

                                    
                            }
                        });

                        
                    })
                </script>
@endsection