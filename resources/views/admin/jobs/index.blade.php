@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Jobs</h2>
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Add New Job</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>COMPANY LOGO</th>
                            <th>COMPANY NAME</th>
                            <th>EXPERIENCE</th>
                            <th>SALARY</th>
                            <th>LOCATION</th>
                            <th>SKILLS</th>
                            <th>EXTRA</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ Str::limit($job->description, 50) }}</td>
                            <td>
                                <img src="{{ $job->company_logo }}" alt="Company Logo" class="company-logo">
                            </td>
                            <td>{{ $job->company_name }}</td>
                            <td>{{ $job->experience }}</td>
                            <td>${{ $job->salary_min }}-{{ $job->salary_max }} Lacs PA</td>
                            <td>{{ $job->location }}</td>
                            <td>
                                @foreach($job->skills as $skill)
                                <span class="badge bg-light text-dark me-1">{{ $skill }}</span>
                                @endforeach
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $job->work_type }}</span>
                                <span class="badge bg-warning text-dark">{{ $job->employment_type }}</span>
                            </td>
                            <td>
                                <a href="#" class="text-danger delete-btn">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.company-logo {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

.table th {
    font-size: 0.85rem;
    font-weight: 600;
    color: #666;
}

.badge {
    font-weight: 500;
    padding: 0.5em 0.75em;
}

.delete-btn {
    text-decoration: none;
}

.delete-btn:hover {
    text-decoration: underline;
}
</style>
@endsection 