@extends('layouts.app')

@section('title', 'Access Data')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Access Data</h1>
        </div>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="section-body">
            <div class="table-responsive">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control" placeholder="Case Listing ID">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="margin-left:5px;" type="submit">Search</button>
                            </div>
                        </div>

                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Control No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Name </th>
                            <th>Suffix </th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth </th>
                            <th>Civil Status </th>
                            <th>Religion</th>
                            <th>Nationality</th>
                            <th>Occupation</th>
                            <th>Montyly Income </th>
                            <th>Contact Number </th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody id="searchResults">
                        @foreach ($clients as $client)
                        <tr>
                            <td class="control-num">{{ $client->control_number }}</td>
                            <td class="first-name">{{ $client->first_name }}</td>
                            <td class="last-name">{{ $client->last_name }}</td>
                            <td class="middle-name">{{ $client->middle }}</td>
                            <td class="suffix">{{ $client->suffix }}</td>
                            <td class="age">{{ $client->age }}</td>
                            <td class="sex">{{ $client->sex }}</td>
                            <td class="birthday">{{ $client->date_of_birth }}</td>
                            <td class="pob">{{ $client->pob }}</td>
                            <td class="civil-status">{{ $client->civil_status }}</td>
                            <td class="religion">{{ $client->religion }}</td>
                            <td class="nationality">{{ $client->nationality }}</td>
                            <td class="occupation">{{ $client->occupation }}</td>
                            <td class="income">{{ $client->monthly_income }}</td>
                            <td class="contact-number">{{ $client->contact_number }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            // Real-time search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('#searchResults tr');

                tableRows.forEach(row => {
                    const controlNum = row.querySelector('.control-num').textContent.toLowerCase();
                    const fName = row.querySelector('.first-name').textContent.toLowerCase();
                    const lName = row.querySelector('.last-name').textContent.toLowerCase();
                    const mName = row.querySelector('.middle-name').textContent.toLowerCase();
                    const suffix = row.querySelector('.suffix').textContent.toLowerCase();
                    const age = row.querySelector('.age').textContent.toLowerCase();
                    const sex = row.querySelector('.sex').textContent.toLowerCase();
                    const birthday = row.querySelector('.birthday').textContent.toLowerCase();
                    const place = row.querySelector('.pob').textContent.toLowerCase();
                    const civilStatus = row.querySelector('.civil-status').textContent.toLowerCase();
                    const religion = row.querySelector('.religion').textContent.toLowerCase();
                    const nationality = row.querySelector('.nationality').textContent.toLowerCase();
                    const occupation = row.querySelector('.occupation').textContent.toLowerCase();
                    const income = row.querySelector('.income').textContent.toLowerCase();
                    const contactNum = row.querySelector('.contact-number').textContent.toLowerCase();


                    if (controlNum.includes(searchTerm) || fName.includes(searchTerm) || lName.includes(searchTerm) || mName.includes(searchTerm) ||
                        suffix.includes(searchTerm) || age.includes(searchTerm) || sex.includes(searchTerm) || birthday.includes(searchTerm) ||
                        place.includes(searchTerm) || civilStatus.includes(searchTerm) || religion.includes(searchTerm) || nationality.includes(searchTerm) ||
                        occupation.includes(searchTerm) || income.includes(searchTerm) ||
                        contactNum.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    </section>
</div>

@endsection

@push('scripts')
<!-- JS Libraries -->

<!-- Page Specific JS File -->
@endpush