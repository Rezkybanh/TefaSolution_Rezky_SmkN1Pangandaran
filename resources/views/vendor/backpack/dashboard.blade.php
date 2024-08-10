<!-- resources/views/vendor/backpack/base/dashboard.blade.php -->

@extends(backpack_view('blank'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="text-value">Lengkapi Profile</div>
                    <div>Update your profile information.</div>
                    <a href="user" class="btn btn-light mt-2">Go to My Account</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="text-value">Lowongan Kerja</div>
                    <div>View and manage job vacancies.</div>
                    <a href="category" class="btn btn-light mt-2">Go to Job Vacancies</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="text-value">Permohonan Saya</div>
                    <div>Check your requests and applications.</div>
                    <a href="" class="btn btn-light mt-2">Go to My Applications</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <div class="text-value">Survey Kepuasan</div>
                    <div>Fill out satisfaction surveys.</div>
                    <a href="profile" class="btn btn-light mt-2">Go to Surveys</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Layanan</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Layanan</th>
                                <th>Permohonan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($layanans as $layanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $layanan->nama }}</td>
                                <td><a href="{{ url('admin/layanan/' . $layanan->id . '/edit') }}" class="btn btn-sm btn-success">Pilih</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection