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
                            <th>Edit</th>
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#openEditModal{{ $client->id }}">
                                    <i class="fas fa-edit"></i>
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

<div class="modal fade" id="openEditModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="openEditModal{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openEditModal{{ $client->id }}Label">Edit Applicant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" value="{{ $client->first_name }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" value="{{ $client->last_name }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="middle">Middle Name</label>
                            <input type="text" class="form-control" id="middle" name="middle" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" value="{{ $client->middle }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="suffix">Suffix</label>
                            <select name="suffix" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="suffix" required>
                                <option value="" selected disable>Select Suffix</option>
                                <option value="Jr." {{ $client->suffix == 'Jr.' ? 'selected' : '' }}>Jr. (Junior)</option>
                                <option value="Sr." {{ $client->suffix == 'Sr.' ? 'selected' : '' }}>Sr. (Senior)</option>
                                <option value="II" {{ $client->suffix == 'II' ? 'selected' : '' }}>II (Second)</option>
                                <option value="III" {{ $client->suffix == 'III' ? 'selected' : '' }}>III (Third)</option>
                                <option value="IV" {{ $client->suffix == 'IV' ? 'selected' : '' }}>IV (Fourth)</option>
                                <option value="None" {{ $client->suffix == 'None' ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" value="{{ $client->address }}" required>

                        </div>
                        <div class="col-md-4 form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="date_of_birth" value="{{ $client->date_of_birth }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="pob">Place of Birth</label>
                            <input type="text" class="form-control" id="pob" name="pob" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" value="{{ $client->pob }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="sex">Sex</label>
                            <select class="form-control" id="sex" name="sex" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                                <option value="Male" {{ $client->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $client->sex == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="educational_attainment">Educational Attainment</label>
                            <select name="educational_attainment" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="educational_attainment" required>
                                <option value="" disabled selected>Select Educational Attainment</option>
                                <option value="Grade 1" {{ $client->educational_attainment == 'Grade 1' ? 'selected' : '' }}>Grade 1</option>
                                <option value="Grade 2" {{ $client->educational_attainment == 'Grade 2' ? 'selected' : '' }}>Grade 2</option>
                                <option value="Grade 3" {{ $client->educational_attainment == 'Grade 3' ? 'selected' : '' }}>Grade 3</option>
                                <option value="Grade 4" {{ $client->educational_attainment == 'Grade 4' ? 'selected' : '' }}>Grade 4</option>
                                <option value="Grade 5" {{ $client->educational_attainment == 'Grade 5' ? 'selected' : '' }}>Grade 5</option>
                                <option value="Grade 6" {{ $client->educational_attainment == 'Grade 6' ? 'selected' : '' }}>Grade 6</option>
                                <option value="Grade 7" {{ $client->educational_attainment == 'Grade 7' ? 'selected' : '' }}>Grade 7</option>
                                <option value="Grade 8" {{ $client->educational_attainment == 'Grade 8' ? 'selected' : '' }}>Grade 8</option>
                                <option value="Grade 9" {{ $client->educational_attainment == 'Grade 9' ? 'selected' : '' }}>Grade 9</option>
                                <option value="Grade 10" {{ $client->educational_attainment == 'Grade 10' ? 'selected' : '' }}>Grade 10</option>
                                <option value="Grade 11" {{ $client->educational_attainment == 'Grade 11' ? 'selected' : '' }}>Grade 11</option>
                                <option value="Grade 12" {{ $client->educational_attainment == 'Grade 12' ? 'selected' : '' }}>Grade 12</option>
                                <option value="College 1st Year" {{ $client->educational_attainment == 'College 1st Year' ? 'selected' : '' }}>College 1st Year</option>
                                <option value="College 2nd Year" {{ $client->educational_attainment == 'College 2nd Year' ? 'selected' : '' }}>College 2nd Year</option>
                                <option value="College 3rd Year" {{ $client->educational_attainment == 'College 3rd Year' ? 'selected' : '' }}>College 3rd Year</option>
                                <option value="College 4th Year" {{ $client->educational_attainment == 'College 4th Year' ? 'selected' : '' }}>College 4th Year</option>
                                <option value="College Graduate" {{ $client->educational_attainment == 'College Graduate' ? 'selected' : '' }}>College Graduate</option>
                                <option value="Postgraduate" {{ $client->educational_attainment == 'Postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                                <option value="Other" {{ $client->educational_attainment == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="civil_status">Civil Status</label>
                            <select class="form-control" id="civil_status" name="civil_status" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                                <option value="Single" {{ $client->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $client->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorced" {{ $client->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="Widowed" {{ $client->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="religion">Religion</label>
                            <select name="religion" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="religion" required>
                                <option value="" selected disabled>Select Religion</option>
                                <option value="Christianity" {{ $client->religion == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                <option value="Catholic" {{ $client->religion == 'Catholic' ? 'selected' : '' }}>Catholic</option>
                                <option value="Islam" {{ $client->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Hinduism" {{ $client->religion == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                <option value="Buddhism" {{ $client->religion == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                <option value="Judaism" {{ $client->religion == 'Judaism' ? 'selected' : '' }}>Judaism</option>
                                <option value="Iglesia ni Cristo" {{ $client->religion == 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                <option value="Muslim" {{ $client->religion == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                                <option value="Other" {{ ($client->religion == 'Other' || $client->religion) ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="other_religion">Other Religion</label>
                            <input type="text" class="form-control" id="other_religion" name="other_religion" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" value="{{$client->religion}}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="nationality">Nationality</label>
                            <select name="nationality" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="nationality" required>
                                <option value="" selected disabled>Select Nationality</option>
                                <option value="Filipino" {{ $client->nationality == 'Filipino' ? 'selected' : '' }}>Filipino</option>
                                <option value="American" {{ $client->nationality == 'American' ? 'selected' : '' }}>American</option>
                                <option value="British" {{ $client->nationality == 'British' ? 'selected' : '' }}>British</option>
                                <option value="Canadian" {{ $client->nationality == 'Canadian' ? 'selected' : '' }}>Canadian</option>
                                <option value="Australian" {{ $client->nationality == 'Australian' ? 'selected' : '' }}>Australian</option>
                                <option value="Indian" {{ $client->nationality == 'Indian' ? 'selected' : '' }}>Indian</option>
                                <option value="Other" {{ ($client->nationality == 'Other' || $client->nationality) ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="other_nationality">Other Nationality</label>
                            <input type="text" class="form-control" id="other_nationality" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" name="other_nationality" value="{{$client->nationality}}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" id="occupation" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" name="occupation" value="{{ $client->occupation }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="monthly_income">Monthly Income</label>
                            <select class="form-control" id="monthly_income" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" name="monthly_income" required>
                                <option value="" disabled selected>Select Monthly Income</option>
                                <option value="No Income" {{ $client->monthly_income == 'No Income' ? 'selected' : '' }}>No Income</option>
                                <option value="100 PHP - 500 PHP" {{ $client->monthly_income == '100 PHP - 500 PHP' ? 'selected' : '' }}>100 PHP - 500 PHP </option>
                                <option value="500 PHP - 1000 PHP" {{ $client->monthly_income == ' 500 PHP - 1000 PHP' ? 'selected' : '' }}>500 PHP - 1000 PHP</option>
                                <option value="1000 PHP - 2000 PHP" {{ $client->monthly_income == '1000 PHP - 2000 PHP' ? 'selected' : '' }}>1000 PHP - 2000 PHP</option>
                                <option value="2000 PHP - 5000 PHP" {{ $client->monthly_income == '2000 PHP - 5000 PHP' ? 'selected' : '' }}>2000 PHP - 5000 PHP</option>
                                <option value="5000 PHP - 6000 PHP" {{ $client->monthly_income == '5000 PHP - 6000 PHP' ? 'selected' : '' }}>5000 PHP - 6000 PHP</option>
                                <option value="6000 PHP - 7000 PHP" {{ $client->monthly_income == '6000 PHP - 7000 PHP' ? 'selected' : '' }}>6000 PHP - 7000 PHP</option>
                                <option value="7000 PHP - 8000 PHP" {{ $client->monthly_income == '7000 PHP - 8000 PHP' ? 'selected' : '' }}>7000 PHP - 8000 PHP</option>
                                <option value="8000 PHP - 9000 PHP" {{ $client->monthly_income == '8000 PHP - 9000 PHP' ? 'selected' : '' }}>8000 PHP - 9000 PHP</option>
                                <option value="9000 PHP - 10,000 PHP" {{ $client->monthly_income == '9000 PHP - 10,000 PHP' ? 'selected' : '' }}>9000 PHP - 10,000 PHP</option>
                                <option value="Above 20,000 PHP" {{ $client->monthly_income == 'Above 20,000 PHP' ? 'selected' : '' }}>Above 20,000 PHP</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="tel" name="contact_number" class="form-control" id="contact_number" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" placeholder="Enter Contact Number" value="{{ $client->contact_number }}" oninput="this.value=this.value.replace(/[^0-9+#*]/g,'');" required>
                            <div class="invalid-feedback">Invalid contact number. Please enter only numbers, +, *, and #.</div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="source_of_referral">Source of Referral</label>
                            <input type="text" class="form-control" id="source_of_referral" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" name="source_of_referral" value="{{ $client->source_of_referral }}" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="house_structure">House Structure</label>
                            <select name="house_structure" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="house_structure" required>
                                <option value="Wood" {{ $client->house_structure == 'Wood' ? 'selected' : '' }}>Wood</option>
                                <option value="Semi-concrete" {{ $client->house_structure == 'Semi-concrete' ? 'selected' : '' }}>Semi-concrete</option>
                                <option value="Concrete" {{ $client->house_structure == 'Concrete' ? 'selected' : '' }}>Concrete</option>
                                <option value="Others" {{ $client->house_structure == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="floor">Floor/Lot Area (sqm)</label>
                            <select name="floor" class="form-control" id="floor" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                                <option value="" disabled selected>Select Floor/Lot Area</option>
                                <option value="0-50" {{ $client->floor == '0-50' ? 'selected' : '' }}>0-50 sqm</option>
                                <option value="51-100" {{ $client->floor == '51-100' ? 'selected' : '' }}>51-100 sqm</option>
                                <option value="101-150" {{ $client->floor == '101-150' ? 'selected' : '' }}>101-150 sqm</option>
                                <option value="151-200" {{ $client->floor == '151-200' ? 'selected' : '' }}>151-200 sqm</option>
                                <option value="201-300" {{ $client->floor == '201-300' ? 'selected' : '' }}>201-300 sqm</option>
                                <option value="301-400" {{ $client->floor == '301-400' ? 'selected' : '' }}>301-400 sqm</option>
                                <option value="401-500" {{ $client->floor == '401-500' ? 'selected' : '' }}>401-500 sqm</option>
                                <option value="501+" {{ $client->floor == '501+' ? 'selected' : '' }}>501+ sqm</option>
                            </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="type" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="Apartment" {{ $client->type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                <option value="Townhouse" {{ $client->type == 'Townhouse' ? 'selected' : '' }}>Townhouse</option>
                                <option value="Single-Family Home" {{ $client->type == 'Single-Family Home' ? 'selected' : '' }}>Single-Family Home</option>
                                <option value="Other" {{ $client->type == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="number_of_rooms">Number Of Rooms</label>
                            <select name="number_of_rooms" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="number_of_rooms" required>
                                <option value="" disabled selected>Select Number Of Rooms</option>
                                <option value="1" {{ $client->number_of_rooms == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $client->number_of_rooms == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $client->number_of_rooms == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $client->number_of_rooms == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $client->number_of_rooms == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ $client->number_of_rooms == '6' ? 'selected' : '' }}>6</option>
                                <option value="7" {{ $client->number_of_rooms == '7' ? 'selected' : '' }}>7</option>
                                <option value="8" {{ $client->number_of_rooms == '8' ? 'selected' : '' }}>8</option>
                                <option value="9" {{ $client->number_of_rooms == '9' ? 'selected' : '' }}>9</option>
                                <option value="10" {{ $client->number_of_rooms == '10' ? 'selected' : '' }}>10</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="monthly_expenses">Monthly Expenses</label>
                            <select name="monthly_expenses" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="monthly_expenses" required>
                                <option value="" disabled selected>Select Monthly Expenses</option>
                                <option value="Below 1,000 PHP" {{ $client->monthly_expenses == 'Below 1,000 PHP' ? 'selected' : '' }}>Below 1,000 PHP</option>
                                <option value="1,000 PHP - 5,000 PHP" {{ $client->monthly_expenses == '1,000 PHP - 5,000 PHP' ? 'selected' : '' }}>1,000 PHP - 5,000 PHP</option>
                                <option value="5,000 PHP - 10,000 PHP" {{ $client->monthly_expenses == '5,000 PHP - 10,000 PHP' ? 'selected' : '' }}>5,000 PHP - 10,000 PHP</option>
                                <option value="10,000 PHP - 15,000 PHP" {{ $client->monthly_expenses == '10,000 PHP - 15,000 PHP' ? 'selected' : '' }}>10,000 PHP - 15,000 PHP</option>
                                <option value="15,000 PHP - 20,000 PHP" {{ $client->monthly_expenses == '15,000 PHP - 20,000 PHP' ? 'selected' : '' }}>15,000 PHP - 20,000 PHP</option>
                                <option value="20,000 PHP - 25,000 PHP" {{ $client->monthly_expenses == '20,000 PHP - 25,000 PHP' ? 'selected' : '' }}>20,000 PHP - 25,000 PHP</option>
                                <option value="25,000 PHP - 30,000 PHP" {{ $client->monthly_expenses == '25,000 PHP - 30,000 PHP' ? 'selected' : '' }}>25,000 PHP - 30,000 PHP</option>
                                <option value="30,000 PHP - 35,000 PHP" {{ $client->monthly_expenses == '30,000 PHP - 35,000 PHP' ? 'selected' : '' }}>30,000 PHP - 35,000 PHP</option>
                                <option value="35,000 PHP - 40,000 PHP" {{ $client->monthly_expenses == '35,000 PHP - 40,000 PHP' ? 'selected' : '' }}>35,000 PHP - 40,000 PHP</option>
                                <option value="40,000 PHP - 45,000 PHP" {{ $client->monthly_expenses == '40,000 PHP - 45,000 PHP' ? 'selected' : '' }}>40,000 PHP - 45,000 PHP</option>
                                <option value="45,000 PHP - 50,000 PHP" {{ $client->monthly_expenses == '45,000 PHP - 50,000 PHP' ? 'selected' : '' }}>45,000 PHP - 50,000 PHP</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="indicate">Indicate If The Client Is</label>
                            <select name="indicate" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="indicate" required>
                                <option value="" selected disabled>Indicate If The Client Is</option>
                                <option value="House Owner" {{ $client->indicate == 'House Owner' ? 'selected' : '' }}>House Owner</option>
                                <option value="House Renter" {{ $client->indicate == 'House Renter' ? 'selected' : '' }}>House Renter</option>
                                <option value="Sharer" {{ $client->indicate == 'Sharer' ? 'selected' : '' }}>Sharer</option>
                                <option value="Settler" {{ $client->indicate == 'Settler' ? 'selected' : '' }}>Settler</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="tracking">Status</label>
                            <select name="tracking" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="tracking">
                                <option value="" selected disable>Select Status</option>
                                <option value="Approved" {{ $client->tracking == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Pending" {{ $client->tracking == 'Pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="other_appliances">Other Appliances</label>
                            <input type="text" class="form-control" id="other_appliances" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" name="other_appliances" value="{{ $client->other_appliances }}">
                        </div>


                        <div class="col-md-4 form-group">
                            <label>Appliances</label><br>
                            <div class="form-check-row">
                                <?php
                                $clientAppliances = is_array($client->appliances) ? $client->appliances : json_decode($client->appliances, true);

                                $clientAppliances = is_array($clientAppliances) ? $clientAppliances : [];

                                $appliances = ['Refrigerator', 'Washing Machine', 'Television', 'Microwave', 'Air Conditioner', 'Electric Fan'];
                                ?>
                                @foreach($appliances as $appliance)
                                <div class="form-check">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="appliances[]" value="{{ $appliance }}" id="{{ strtolower(str_replace(' ', '-', $appliance)) }}" {{ in_array($appliance, $clientAppliances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $appliance)) }}">{{ $appliance }}</label>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" id="nextBtn1{{ $client->id }}">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="nextModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal{{ $client->id }}Label">Family Composition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4 form-group">
                            <label for="first_lastname">Family Lastname</label>
                            <input type="text" class="form-control" id="first_lastname" name="first_lastname" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_firstname">Family Firstname</label>
                            <input type="text" class="form-control" id="fam_firstname" name="fam_firstname" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_middlename">Family Middlename</label>
                            <input type="text" class="form-control" id="fam_middlename" name="fam_middlename" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_relationship">Relationship to Client</label>
                            <select name="fam_relationship" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="fam_relationship" required>
                                <option value="" disabled selected>Relationship to client</option>
                                <option value="Mother" {{ $client->fam_relationship == 'Mother' ? 'selected' : '' }}>Mother</option>
                                <option value="Father" {{ $client->fam_relationship == 'Father' ? 'selected' : '' }}> Father</option>
                                <option value="Brother" {{ $client->fam_relationship == 'Brother' ? 'selected' : '' }}>Brother</option>
                                <option value="Sister" {{ $client->fam_relationship == 'Sister' ? 'selected' : '' }}>Sister</option>
                                <option value="Cousin" {{ $client->fam_relationship == 'Cousin' ? 'selected' : '' }}>Cousin</option>
                                <option value="Uncle" {{ $client->fam_relationship == 'Uncle' ? 'selected' : '' }}> Uncle</option>
                                <option value="Auntie" {{ $client->fam_relationship == 'Auntie' ? 'selected' : '' }}>Auntie</option>
                                <option value="GrandFather" {{ $client->fam_relationship == 'GrandFather' ? 'selected' : '' }}>GrandFather</option>
                                <option value="GrandMother" {{ $client->fam_relationship == 'GrandMother' ? 'selected' : '' }}>GrandMother</option>

                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_birthday">Date of birthday</label>
                            <input type="date" name="fam_birthday" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="fam_birthday" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_age">Age </label>
                            <input type="text" class="form-control" id="fam_age" name="fam_age" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_gender">Sex</label>
                            <select name="fam_gender" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="fam_gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" {{ $client->fam_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $client->fam_gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_status">Civil Status</label>
                            <select name="fam_status" class="form-control" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" id="fam_status" required>
                                <option value="Single" {{ $client->fam_status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $client->fam_status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorced" {{ $client->fam_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="Widowed" {{ $client->fam_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>

                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_education">Educatonal Attainment</label>
                            <input type="text" class="form-control" id="fam_education" name="fam_education" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_occupation">Occuption</label>
                            <input type="text" class="form-control" id="fam_occupation" name="fam_occupation" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fam_income">Monthly Income</label>
                            <select class="form-control" id="fam_income" style="border: none; border-bottom: 1px solid black; outline: none; width: 200px;" name="fam_income" required>
                                <option value="" disabled selected>Select Monthly Income</option>
                                <option value="No Income" {{ $client->fam_income == 'No Income' ? 'selected' : '' }}>No Income</option>
                                <option value="100 PHP - 500 PHP" {{ $client->fam_income == '100 PHP - 500 PHP' ? 'selected' : '' }}>100 PHP - 500 PHP </option>
                                <option value="500 PHP - 1000 PHP" {{ $client->fam_income == ' 500 PHP - 1000 PHP' ? 'selected' : '' }}>500 PHP - 1000 PHP</option>
                                <option value="1000 PHP - 2000 PHP" {{ $client->fam_income == '1000 PHP - 2000 PHP' ? 'selected' : '' }}>1000 PHP - 2000 PHP</option>
                                <option value="2000 PHP - 5000 PHP" {{ $client->fam_income == '2000 PHP - 5000 PHP' ? 'selected' : '' }}>2000 PHP - 5000 PHP</option>
                                <option value="5000 PHP - 6000 PHP" {{ $client->fam_income == '5000 PHP - 6000 PHP' ? 'selected' : '' }}>5000 PHP - 6000 PHP</option>
                                <option value="6000 PHP - 7000 PHP" {{ $client->fam_income == '6000 PHP - 7000 PHP' ? 'selected' : '' }}>6000 PHP - 7000 PHP</option>
                                <option value="7000 PHP - 8000 PHP" {{ $client->fam_income == '7000 PHP - 8000 PHP' ? 'selected' : '' }}>7000 PHP - 8000 PHP</option>
                                <option value="8000 PHP - 9000 PHP" {{ $client->fam_income == '8000 PHP - 9000 PHP' ? 'selected' : '' }}>8000 PHP - 9000 PHP</option>
                                <option value="9000 PHP - 10,000 PHP" {{ $client->fam_income == '9000 PHP - 10,000 PHP' ? 'selected' : '' }}>9000 PHP - 10,000 PHP</option>
                                <option value="Above 20,000 PHP" {{ $client->fam_income == 'Above 20,000 PHP' ? 'selected' : '' }}>Above 20,000 PHP</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prevBtn{{ $client->id }}"> <i class="fas fa-arrow-left"></i>Back</button>

                    <button type="button" class="btn btn-primary" id="nextBtn2{{ $client->id }}">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="nextModal2{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal2{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal2{{ $client->id }}Label">Edit Applicant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="circumstances_of_referral">Circumstances of Referral</label>
                        <textarea name="circumstances_of_referral" class="form-control" id="circumstances_of_referral" placeholder="Referred by barangay due to inability to afford expenses." rows="3">{{ $client->circumstances_of_referral }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="family_background">Family Background</label>
                        <textarea name="family_background" class="form-control" id="family_background" placeholder="Lives with spouse and three children, aged 10, 8, and 5." rows="3">{{ $client->family_background }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="health_history">Health History of the Applicant</label>
                        <textarea name="health_history" class="form-control" id="health_history" placeholder="Diagnosed with hypertension and diabetes." rows="3">{{ $client->health_history }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="economic_situation">Economic Situation</label>
                        <textarea name="economic_situation" class="form-control" id="economic_situation" placeholder="Primary earner of the family with no other sources of income." rows="3">{{ $client->economic_situation }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prevBtn1{{ $client->id }}"> <i class="fas fa-arrow-left"></i>Back</button>
                    <button type="button" class="btn btn-primary" id="nextBtn3{{ $client->id }}">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="nextModal3{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal3{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal3{{ $client->id }}Label">Edit Applicant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="problem_presented">Problem Presented</label>
                        <textarea name="problem_presented" class="form-control" id="problem_presented" placeholder="The request for burial assistance was submitted due to the financial difficulties faced by the family in managing funeral expenses." rows="5" style="width: 100%; min-height: 150px;">{{ $client->problem_presented }}</textarea>
                    </div>
                    <div class="form-group" style="margin-top:20px;">
                        <label for="problem_identification">Problem Identification</label>
                        <select name="problem_identification" class="form-control" id="problem_identification">
                            <option value="" disabled selected>Select Problem Identification</option>
                            <option value="Done" {{ $client->problem_identification == 'Done' ? 'selected' : '' }}>✔️ Done</option>
                            <option value="Incomplete" {{ $client->problem_identification == 'Incomplete' ? 'selected' : '' }}>❌ Incomplete</option>
                            <option value="Processing" {{ $client->problem_identification == 'Processing' ? 'selected' : '' }}>🔄 Processing</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prevBtn2{{ $client->id }}"> <i class="fas fa-arrow-left"></i>Back</button>

                    <button type="button" class="btn btn-primary" id="nextBtn3{{ $client->id }}">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="nextModal4{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal4{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal4{{ $client->id }}Label">Edit Applicant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <h2>Services</h2>
                        <hr>
                        <h5><label>Burial Assistance</label></h5><br>
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = ['Burial', 'Financial', 'Funeral'];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">{{ $service }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <h5><label>Requirements</label></h5>
                    <div class="col">
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = ['Death Certificate', 'Funeral Contract', 'Valid ID', 'Proof Of Relation'];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">{{ $service }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <h5><label>Crisis Intervention Unit</label></h5><br>
                    <div class="col">
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = ['Crisis Intervention Unit = Valid ID', 'Barangay Clearance.', 'Medical Certificate.', 'Incident Report.', 'Funeral Contract.', 'Death Certificate.'];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">
                                    @if ($service === 'Crisis Intervention Unit = Valid ID')
                                    Valid ID
                                    @else
                                    {{ $service }}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <h5><label>Solo Parent Services</label></h5>
                    <div class="col">
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = [
                                'Solo Parent = Agency Referral',
                                'Residency Cert.',
                                'Medical Cert.',
                                'Billing Proof',
                                'Birth Cert.',
                                'ID Copy',
                                'Senior Citizen ID (60+)'
                            ];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">
                                    @if ($service === 'Solo Parent = Agency Referral')
                                    Agency Referral
                                    @else
                                    {{ $service }}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <h5><label>Pre-marriage Counseling</label></h5><br>
                    <div class="col">
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = [
                                'Pre-marriage Counseling = Valid ID',
                                'Birth Certificate',
                                'CENOMAR',
                                'Barangay Clearance',
                                'Passport-sized Photos',
                            ];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">
                                    @if ($service === 'Pre-marriage = Valid ID')
                                    Valid ID
                                    @else
                                    {{ $service }}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <h5><label>After-Care Services</label></h5><br>
                    <div class="col">
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = [
                                'After-Care Services = Valid ID',
                                'Birth Certificate.',
                                'Residence Certificate.',
                                'SCSR',
                                'Medical Records',
                            ];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">
                                    @if ($service === 'After-Care Services = Valid ID')
                                    Valid ID
                                    @else
                                    {{ $service }}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>
                    <h5><label>Poverty Alleviation Program</label></h5><br>
                    <div class="col">
                        <div class="form-check-row">
                            <?php
                            $clientServices = is_array($client->services) ? $client->services : json_decode($client->services, true);
                            $clientServices = is_array($clientServices) ? $clientServices : [];

                            $services = [
                                'Poverty Alleviation Program = Valid ID',
                                'Residence Certificate',
                                'Income Certificate',
                                'SCSR.',
                                'Application Form',
                            ];
                            ?>
                            @foreach($services as $service)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{ $service }}" id="{{ strtolower(str_replace(' ', '-', $service)) }}" {{ in_array($service, $clientServices) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '-', $service)) }}">
                                    @if ($service === 'Poverty Alleviation Program = Valid ID')
                                    Valid ID
                                    @else
                                    {{ $service }}
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="prevBtn3{{ $client->id }}"> <i class="fas fa-arrow-left"></i>Back</button>

                        <button type="button" class="btn btn-primary" id="nextBtn4{{ $client->id }}">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>


<div class="modal fade" id="nextModal5{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal5{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal5{{ $client->id }}Label">Data Gathering</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="home_visit">Home Visit Date</label>
                            <input type="date" name="home_visit" class="form-control" id="home_visit" value="{{ $client->home_visit }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="interviewee">Interviewee</label>
                            <input type="text" class="form-control" id="interviewee" name="interviewee" value="{{ $client->interviewee }}" placeholder="Enter Interviewee">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="interviewed_by">Interviewed By</label>
                            <input type="text" class="form-control" id="interviewed_by" name="interviewed_by" value="{{ $client->interviewed_by }}" placeholder="Enter Interviewed By">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="layunin">Layunin Ng Pagbisita</label>
                            <textarea name="layunin" class="form-control" id="layunin" placeholder="the social worker confirmed that the Applicant's household has stable electricity, clean running water with adequate pressure, and operational sanitation facilities. These findings will guide future support and interventions as necessary." style="width: 100%; height: 150px;">{{ $client->layunin }}</textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="resulta">Resulta Ng Pagbisita</label>
                            <textarea name="resulta" class="form-control" id="resulta" placeholder="Applicant resides in a one-bedroom apartment with adequate space and basic furnishings. The environment appears clean and well-maintained" style="width: 100%; height: 150px;">{{ $client->resulta }}</textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="initial_agreement">Initial Agreement</label>
                            <textarea name="initial_agreement" class="form-control" id="initial_agreement" placeholder="The initial agreement outlines that the organization will provide financial assistance for the funeral expenses. The family agrees to submit all required documentation and cooperate with the assessment process to ensure timely support." style="width: 100%; height: 150px;">{{ $client->initial_agreement }}</textarea>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="data_gather">Data Gathering</label>
                            <select name="data_gather" class="form-control" id="data_gather">
                                <option value="" disabled selected>Select Data Gathering</option>
                                <option value="Done" {{ $client->data_gather == 'Done' ? 'selected' : '' }}>✔️ Done</option>
                                <option value="Incomplete" {{ $client->data_gather == 'Incomplete' ? 'selected' : '' }}>❌ Incomplete</option>
                                <option value="Processing" {{ $client->data_gather == 'Processing' ? 'selected' : '' }}>🔄 Processing</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prevBtn4{{ $client->id }}">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <button type="button" class="btn btn-primary" id="nextBtn5{{ $client->id }}">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="nextModal6{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal6{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal6{{ $client->id }}Label">Assessment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <!-- Assessment Text Area -->
                        <div class="col-md-18 form-group">
                            <label for="assessment1">Assessment (may include psycho-social functioning, family functioning, environmental factors)</label>
                            <textarea name="assessment1" class="form-control custom-textarea" id="assessment1" style="width: 100%; height: 150px;" placeholder="The family is experiencing severe emotional distress and financial hardship due to a recent loss. Communication is strained, leading to conflicts, but there is a strong desire to support each other. Their living conditions are modest with limited access to resources and community services, further complicating their situation.">{{ $client->assessment1 }}</textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="assessment">Assessment</label>
                            <select name="assessment" class="form-control" id="assessment">
                                <option value="" disabled selected>Select Assessment</option>
                                <option value="Done" {{ $client->assessment == 'Done' ? 'selected' : '' }}>✔️ Done</option>
                                <option value="Incomplete" {{ $client->assessment == 'Incomplete' ? 'selected' : '' }}>❌ Incomplete</option>
                                <option value="Processing" {{ $client->assessment == 'Processing' ? 'selected' : '' }}>🔄 Processing</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prevBtn5{{ $client->id }}">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <button type="button" class="btn btn-primary" id="nextBtn6{{ $client->id }}">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="nextModal7{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="nextModal7{{ $client->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nextModal7{{ $client->id }}Label">Evaluation and Resolution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('social-worker.update', ['id' => $client->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 form-group">
                            <label for="case_management_evaluation">Case Management Evaluation</label>
                            <textarea name="case_management_evaluation" class="form-control" style="width: 100%; height: 150px;" id="case_management_evaluation" placeholder="Immediate financial assistance was provided for funeral expenses. Psycho-social support services were initiated, showing improved family communication and emotional stability. Continued financial support is recommended due to ongoing instability." style="width: 50%;">{{ $client->case_management_evaluation }}</textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="case_resolution">Case Resolution</label>
                            <textarea name="case_resolution" class="form-control" id="case_resolution" style="width: 100%; height: 150px;" placeholder="Financial aid for funeral costs was provided, and the family received counseling and community resource referrals. The family is now on a path to recovery and improved stability." style="width: 50%;">{{ $client->case_resolution }}</textarea>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="tracking">Case Status</label>
                            <select name="tracking" class="form-control" id="tracking">
                                <option value="" selected disabled>Select Case Status</option>
                                <option value="Approve" {{ $client->tracking == 'Approve' ? 'selected' : '' }}>Approve (and close this case)</option>
                                <option value="Re-access" {{ $client->tracking == 'Re-access' ? 'selected' : '' }}>Re-access (On-Going case)</option>
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="approving">Approving Officer</label>
                            <input type="text" class="form-control" id="approving" name="approving" value="{{ $client->approving }}" placeholder="Enter Approving Officer">
                        </div>

                        <div class="col-md-10 form-group">
                            <label for="eval">Evaluation</label>
                            <select name="eval" class="form-control" id="eval">
                                <option value="" disabled selected>Select Evaluation</option>
                                <option value="Done" {{ $client->eval == 'Done' ? 'selected' : '' }}>✔️ Done</option>
                                <option value="Incomplete" {{ $client->eval == 'Incomplete' ? 'selected' : '' }}>❌ Incomplete</option>
                                <option value="Processing" {{ $client->eval == 'Processing' ? 'selected' : '' }}>🔄 Processing</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prevBtn6{{ $client->id }}">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <button type="button" class="btn btn-success" id="saveBtn{{ $client->id }}">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('#viewClientModal{{ $client->id }}').on('hidden.bs.modal', function() {
            $('.modal-backdrop').remove();
        });

        $('#nextModal{{ $client->id }}').on('hidden.bs.modal', function() {
            $('.modal-backdrop').remove();
        });
    });

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
    $(document).ready(function() {
        $('[id^=nextBtn1]').on('click', function() {
            let clientId = $(this).attr('id').replace('nextBtn1', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let nextModalId = 'nextModal' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + nextModalId).modal('show');
            });
        });
    });

    $(document).ready(function() {
        $('[id^=nextBtn2]').on('click', function() {
            let clientId = $(this).attr('id').replace('nextBtn2', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let nextModalId = 'nextModal2' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + nextModalId).modal('show');
            });
        });
    });

    $(document).ready(function() {
        $('[id^=nextBtn3]').on('click', function() {
            let clientId = $(this).attr('id').replace('nextBtn3', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let nextModalId = 'nextModal4' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + nextModalId).modal('show');
            });
        });
    });

    $(document).ready(function() {
        $('[id^=nextBtn4]').on('click', function() {
            let clientId = $(this).attr('id').replace('nextBtn4', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let nextModalId = 'nextModal5' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + nextModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=nextBtn5]').on('click', function() {
            let clientId = $(this).attr('id').replace('nextBtn5', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let nextModalId = 'nextModal6' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + nextModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=nextBtn6]').on('click', function() {
            let clientId = $(this).attr('id').replace('nextBtn6', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let nextModalId = 'nextModal7' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + nextModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=prevBtn]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'openEditModal' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=prevBtn1]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn1', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'nextModal' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
    /*   $(document).ready(function() {
          $('[id^=prevBtn1]').on('click', function() {
              let clientId = $(this).attr('id').replace('prevBtn1', '');
              let currentModalId = $(this).closest('.modal').attr('id');
              let prevModalId = 'nextModal2' + clientId;

              $('#' + currentModalId).modal('hide');

              $('#' + currentModalId).on('hidden.bs.modal', function() {
                  $('#' + prevModalId).modal('show');
              });
          });
      }); */
    $(document).ready(function() {
        $('[id^=prevBtn2]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn2', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'nextModal2' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=prevBtn3]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn3', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'nextModal3' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=prevBtn4]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn4', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'nextModal4' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=prevBtn5]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn5', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'nextModal5' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
    $(document).ready(function() {
        $('[id^=prevBtn6]').on('click', function() {
            let clientId = $(this).attr('id').replace('prevBtn6', '');
            let currentModalId = $(this).closest('.modal').attr('id');
            let prevModalId = 'nextModal6' + clientId;

            $('#' + currentModalId).modal('hide');

            $('#' + currentModalId).on('hidden.bs.modal', function() {
                $('#' + prevModalId).modal('show');
            });
        });
    });
</script>
@endsection