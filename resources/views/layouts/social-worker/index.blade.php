@extends('layouts.app')

@section('title', 'Access Data')

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
        @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
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
                            <!--         <th>Edit</th> -->
                            <th>Delete</th>
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
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#viewClientModal{{ $client->id }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('social-worker.delete', $client->id) }}" method="POST" class="d-inline" id="delete-form-{{ $client->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $client->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

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

@foreach ($clients as $client)
<!-- Modal for Viewing Client Details -->
<div class="modal fade" id="viewClientModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="viewClientModalLabel{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewClientModalLabel{{ $client->id }}">Client Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>View Client History</h5>
                <ul>
                    <li>✔️ Problem Identification</li>
                    <li>✔️ Data Gathering</li>
                    <li>✔️ Assessment</li>
                    <li>✔️ Evaluation And Resolution</li>
                </ul>
                <p><strong>Control No.:</strong> {{ $client->control_number }}</p>
                <p><strong>First Name:</strong> {{ $client->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $client->last_name }}</p>
                <p><strong>Middle Name:</strong> {{ $client->middle }}</p>
                <p><strong>Suffix:</strong> {{ $client->suffix }}</p>
                <p><strong>Age:</strong> {{ $client->age }}</p>
                <p><strong>Sex:</strong> {{ $client->sex }}</p>
                <p><strong>Date of Birth:</strong> {{ $client->date_of_birth }}</p>
                <p><strong>Place of Birth:</strong> {{ $client->pob }}</p>
                <p><strong>Educational Attainment:</strong> {{ $client->educational_attainment }}</p>
                <p><strong>Civil Status:</strong> {{ $client->civil_status }}</p>
                <p><strong>Religion:</strong> {{ $client->religion }}</p>
                <p><strong>Nationality:</strong> {{ $client->nationality }}</p>
                <p><strong>Occupation:</strong> {{ $client->occupation }}</p>
                <p><strong>Monthly Income:</strong> {{ $client->monthly_income }}</p>
                <p><strong>Address:</strong> {{ $client->address }}</p>
                <p><strong>Contact Number:</strong> {{ $client->contact_number }}</p>
                <p><strong>Source of Referral:</strong> {{ $client->source_of_referral }}</p>
                <p><strong>House Structure:</strong> {{ $client->house_structure }}</p>
                <p><strong>Floor:</strong> {{ $client->floor }}</p>
                <p><strong>Type:</strong> {{ $client->type }}</p>
                <p><strong>Number of Rooms:</strong> {{ $client->number_of_rooms }}</p>
                <p><strong>Appliances:</strong> {{ $client->appliances }}</p>
                <p><strong>Monthly Expenses:</strong> {{ $client->monthly_expenses }}</p>
                <p><strong>Services and Requirements:</strong> {{ $client->services_and_requirements }}</p>
                <p><strong>Indicate:</strong> {{ $client->indicate }}</p>
                <p><strong>Status:</strong> {{ $client->status }}</p>
                <p><strong>Created At:</strong> {{ $client->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $client->updated_at }}</p>
                <p><strong>Circumstances of Referral:</strong> {{ $client->circumstances_of_referral }}</p>
                <p><strong>Family Background:</strong> {{ $client->family_background }}</p>
                <p><strong>Health History Of The Applicant:</strong> {{ $client->health_history }}</p>
                <p><strong>Economic Situation:</strong> {{ $client->economic_situation }}</p>
                <p><strong>Assessment:</strong> {{ $client->assessment }}</p>
                <p><strong>Recommendation:</strong> {{ $client->recommendation }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Generate PDF</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(clientId) {
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
                document.getElementById(`delete-form-${clientId}`).submit();
            }
        });
    }
</script>