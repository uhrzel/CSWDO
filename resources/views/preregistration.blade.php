<div class="header-container">
    Pre-Registration
</div>

@extends('layout')

@section('title', 'Pre-Registration')

@section('content')

@include('include.header2')
<style>
    /*   body {
        background: url('{{ asset(' img/taguig.png') }}') no-repeat center center fixed;
        background-size: cover;
    }
 */
    .text-right {
        margin-right: 200px;
    }

    .footer {
        background-color: #FFFFFF;
        padding: 20px;
        border-top: 1px solid #CCCCCC;
        font-size: 11.2px;
        clear: both;
        box-sizing: border-box;
    }

    .footer.container {
        max-width: none;
        padding-left: 15px;
        padding-right: 15px;
    }

    .footer p {
        margin-bottom: 10px;
        color: #666666;
    }

    .footer a {
        color: #337AB7;
        text-decoration: none;
    }

    .footer a:hover {
        color: #23527C;
        text-decoration: underline;
    }

    .footer.container {
        max-width: none;
        padding-left: 0;
        padding-right: 0;
    }
</style>
<div class="header-container">
    Pre-Registration
</div>

<link rel="stylesheet" href="{{ asset('css/preregistration.css') }}">
<script src="{{ asset('js/preregistration.js') }}" defer></script>

<div id="successModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="modalMessage"></p>
    </div>
</div>

<div class="container-fluid form-container-wrapper">
    <div class="form-container">
        <div class="form-content">
            <h2 style="text-align:left; color: #333;">Pre-Registration Form</h2>
            <form id="preRegistrationForm" action="{{ route('preregisters.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" Required>
                    </div>
                    <div class="col">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" Required>
                    </div>
                    <div class="col">
                        <label for="middle">Middle Name</label>
                        <input type="text" name="middle" class="form-control" id="middle" placeholder="Enter Middle Name" Required>
                    </div>
                    <div class="col">
                        <label for="suffix">Suffix</label>
                        <select name="suffix" class="form-control" id="suffix" required>
                            <option value="" selected disabled>Select Suffix</option>
                            <option value="Jr.">Jr. (Junior)</option>
                            <option value="Sr.">Sr. (Senior)</option>
                            <option value="II">II (Second)</option>
                            <option value="III">III (Third)</option>
                            <option value="IV">IV (Fourth)</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" id="age" placeholder="Enter Age" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                            <div class="invalid-feedback">Invalid age. Please enter only numbers.</div>
                        </div>
                        <div class="col">
                            <label for="sex">Sex</label>
                            <select name="sex" class="form-control" id="sex" Required>
                                <option value="" selected disabled>Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Enter Date of Birth" required>
                        </div>
                        <div class="col">
                            <label for="pob">Place of Birth</label>
                            <input type="text" name="pob" class="form-control" id="pob" placeholder="Enter Place of Birth" Required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="educational_attainment">Educational Attainment</label>
                        <select name="educational_attainment" class="form-control" id="educational_attainment" Required>
                            <option value="" disabled selected>Select Educational Attainment</option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                            <option value="College 1st Year">College 1st Year</option>
                            <option value="College 2nd Year">College 2nd Year</option>
                            <option value="College 3rd Year">College 3rd Year</option>
                            <option value="College 4th Year">College 4th Year</option>
                            <option value="College Graduate">College Graduate</option>
                            <option value="Postgraduate">Postgraduate</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="civil_status">Civil Status</label>
                        <select name="civil_status" class="form-control" id="civil_status" placeholder="Select Civil Status" Required>
                            <option value="" selected disabled>Select Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="religion">Religion</label>
                        <select name="religion" class="form-control" id="religion" onchange="toggleOtherReligion()" Required>
                            <option value="" selected disabled>Select Religion</option>
                            <option value="Catholic">Catholic</option>
                            <option value="Christianity">Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Judaism">Judaism</option>
                            <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col" id="otherReligion" style="display: none;">
                        <label for="other_religion">Other Religion</label>
                        <input type="text" name="other_religion" class="form-control" id="other_religion">
                    </div>
                    <div class="col">
                        <label for="nationality">Nationality</label>
                        <select name="nationality" class="form-control" id="nationality" onchange="toggleOtherNationality()" Required>
                            <option value="" selected disabled>Select Nationality</option>
                            <option value="Filipino">Filipino</option>
                            <option value="American">American</option>
                            <option value="British">British</option>
                            <option value="Canadian">Canadian</option>
                            <option value="Australian">Australian</option>
                            <option value="Indian">Indian</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col" id="otherNationality" style="display: none;">
                        <label for="other_nationality">Other Nationality</label>
                        <input type="text" name="other_nationality" class="form-control" id="other_nationality">
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <label for="monthly_income">Monthly Income</label>
                        <select class="form-control" id="monthly_income" name="monthly_income" Required>
                            <option value="" disabled selected>Select Monthly Income</option>
                            <option value="No Income">No Income</option>
                            <option value="100 PHP - 500 PHP">100 PHP - 500 PHP</option>
                            <option value="500 PHP - 1000 PHP">500 PHP - 1000 PHP</option>
                            <option value="1000 PHP - 2000 PHP">1000 PHP - 2000 PHP</option>
                            <option value="2000 PHP - 5000 PHP">2000 PHP - 5000 PHP</option>
                            <option value="5000 PHP - 6000 PHP">5000 PHP - 6000 PHP</option>
                            <option value="6000 PHP - 7000 PHP">6000 PHP - 7000 PHP</option>
                            <option value="7000 PHP - 8000 PHP">7000 PHP - 8000 PHP</option>
                            <option value="8000 PHP - 9000 PHP">8000 PHP - 9000 PHP</option>
                            <option value="9000 PHP - 10,000 PHP">9000 PHP - 10,000 PHP</option>
                            <option value="10,000 PHP - 20,000 PHP">10,000 PHP - 20,000 PHP</option>
                            <option value="Above 20,000 PHP">Above 20,000 PHP</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" Required>
                    </div>

                    <div class="col">
                        <label for="occupation">Occupation</label>
                        <input type="text" name="occupation" class="form-control" id="occupation" placeholder="Enter Occupation" Required>
                    </div>
                    <div class="col">
                        <label for="house_structure">House Structure</label>
                        <select name="house_structure" class="form-control" id="house_structure" placeholder="Select House Structure" Required>
                            <option value="" selected disabled>Select House Structure</option>
                            <option value="Wood">Wood</option>
                            <option value="Semi-concrete">Semi-concrete</option>
                            <option value="Concrete">Concrete</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <label for="floor">Floor/Lot Area (sqm)</label>
                        <select name="floor" class="form-control" id="floor" Required>
                            <option value="" disabled selected>Select Floor/Lot Area</option>
                            <option value="0-50">0-50 sqm</option>
                            <option value="51-100">51-100 sqm</option>
                            <option value="101-150">101-150 sqm</option>
                            <option value="151-200">151-200 sqm</option>
                            <option value="201-300">201-300 sqm</option>
                            <option value="301-400">301-400 sqm</option>
                            <option value="401-500">401-500 sqm</option>
                            <option value="501+">501+ sqm</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="source_of_referral">Source of Referral</label>
                        <input type="text" name="source_of_referral" class="form-control" id="source_of_referral" placeholder="Enter Source of Referral" Required>
                    </div>
                    <div class="col">
                        <label for="contact_number">Contact Number</label>
                        <input type="tel" name="contact_number" class="form-control" id="contact_number" placeholder="Enter Contact Number" oninput="this.value=this.value.replace(/[^0-9+#*]/g,'');" required>
                        <div class="invalid-feedback">Invalid contact number. Please enter only numbers, +, *, and #.</div>
                    </div>
                    <div class="col">
                        <label for="indicate">Indicate If The Applicant Is</label>
                        <select name="indicate" class="form-control" id="indicate" placeholder="Indicate If The Client Is" Required>
                            <option value="" selected disabled>Indicate If The Client Is</option>
                            <option value="House Owner">House Owner</option>
                            <option value="House Renter">House Renter</option>
                            <option value="Sharer">Sharer</option>
                            <option value="Settler">Settler</option>
                        </select>
                    </div>

                </div>
                <div class="row">

                    <div class="col">
                        <label for="number_of_rooms">Number Of Rooms</label>
                        <select name="number_of_rooms" class="form-control" id="number_of_rooms" Required>
                            <option value="" disabled selected>Select Number Of Rooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="monthly_expenses">Monthly Expenses</label>
                        <select name="monthly_expenses" class="form-control" id="monthly_expenses" Required>
                            <option value="" disabled selected>Select Monthly Expenses</option>
                            <option value="Below 1,000 PHP">Below 1,000 PHP</option>
                            <option value="1,000 PHP - 5,000 PHP">1,000 PHP - 5,000 PHP</option>
                            <option value="5,000 PHP - 10,000 PHP">5,000 PHP - 10,000 PHP</option>
                            <option value="10,000 PHP - 15,000 PHP">10,000 PHP - 15,000 PHP</option>
                            <option value="15,000 PHP - 20,000 PHP">15,000 PHP - 20,000 PHP</option>
                            <option value="20,000 PHP - 25,000 PHP">20,000 PHP - 25,000 PHP</option>
                            <option value="25,000 PHP - 30,000 PHP">25,000 PHP - 30,000 PHP</option>
                            <option value="30,000 PHP - 35,000 PHP">30,000 PHP - 35,000 PHP</option>
                            <option value="35,000 PHP - 40,000 PHP">35,000 PHP - 40,000 PHP</option>
                            <option value="40,000 PHP - 45,000 PHP">40,000 PHP - 45,000 PHP</option>
                            <option value="45,000 PHP - 50,000 PHP">45,000 PHP - 50,000 PHP</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="type">Type Of House</label>
                        <select name="type" class="form-control" id="type" placeholder="Select Type" onchange="toggleOtherType()" Required>
                            <option value="" selected disabled>Select Type</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Townhouse">Townhouse</option>
                            <option value="Single-Family Home">Single-Family Home</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col" id="otherType" style="display: none;">
                        <label for="other_type">Other Type Of House</label>
                        <input type="text" name="other_type" class="form-control" id="other_type">
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <label for="appliances">Appliances</label>
                        <div class="form-check-row" Required>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appliances[]" value="Refrigerator" id="refrigerator">
                                <label class="form-check-label" for="refrigerator">Refrigerator</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appliances[]" value="Washing Machine" id="washing-machine">
                                <label class="form-check-label" for="washing-machine">Washing Machine</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appliances[]" value="Television" id="television">
                                <label class="form-check-label" for="television">Television</label>
                            </div>
                        </div>
                        <div class="form-check-row">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appliances[]" value="Microwave" id="microwave">
                                <label class="form-check-label" for="microwave">Microwave</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appliances[]" value="Air Conditioner" id="air-conditioner">
                                <label class="form-check-label" for="air-conditioner">Air Conditioner</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="appliances[]" value="Electric Fan" id="electric-fan">
                                <label class="form-check-label" for="electric-fan">Electric Fan</label>
                            </div>

                        </div>
                        <div class="col">
                            <label for="other_appliances">Other Appliances</label>
                            <input type="text" name="other_appliances" class="form-control" id="other_appliances" placeholder="Other Appliances">
                        </div>
                    </div>
                </div>
        </div>
        <div class="col">
            <button type="submit" class="btn-primary">Submit</button>
            <button type="reset" class="btn-secondary">Reset</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
<div class="footer" style="width:99.2vw; margin-left:0px; padding-left:90px; margin-top: 50px; display:flex; justify-content:space-between;">
    <div>
        <p><b>KNOWLEDGE EXCHANGE CENTER</b></p>
        <span style="color: #505050;">
            <i class="fas fa-map-marker-alt"></i>
            <span style="font-family: Arial, sans-serif; font-size: 12px;">Gen. Luna st., Barangay Tuktukan, Taguig, Philippines</span>
            <p style="margin-top:10px;">
                <span style="color: #505050;">
                    <i class="fas fa-envelope"></i>
                    <span style="font-family: Arial, sans-serif; font-size: 13px; ">cswdotaguigcity@gmail.com</span>
            </p>
    </div>

    <div>
        <p><b>STAY CONNECTED</b></p>
        <a href="https://www.facebook.com/CSWDOTAGUIG" target="_blank"><i class="fab fa-facebook" style="font-size:24px; color:#4267B2; margin-right: 10px; "></i></a>
        <a href="https://taguig.gov.ph/?" target="_blank"><img src="img/logo.png" alt="Logo" style="width: 29px; height: 29px; margin-right: 920px; margin-bottom:10px;"></a>
    </div>
</div>

<div class="footer" style="width:99.2vw; margin-left:0px; padding-left:15px; background-color:#efefef; ">
    <div style="float:left; margin-left:100px; text-align:center;">
        <img src="img/rotp.png" alt="Form Image" style="max-height: 190px; width: auto;">
    </div>
    <div style="float:left; width:200px; margin-left:50px;">
        <p><b>REPUBLIC OF THE PHILIPPINES</b></p>
        <p>All content is in the public domain unless otherwise stated.</p>
    </div>
    <div style="float:left; width:250px; margin-left:100px;">
        <p><b>ABOUT GOVPH</b></p>
        <p>Learn more about the Philippine government, its structure, how government works and the people behind it.</p>
        <p style="margin-top:14px;"><a href="https://www.gov.ph/" style="margin-top:-15px; color:#505050; text-decoration:none;">GOV.PH</a></p>
        <p style="margin-top:-10px;"><a href="https://data.gov.ph/index/home" style="margin-top:-15px; color:#505050; text-decoration:none;">Open Data Portal</a></p>
        <p style="margin-top:-10px;"><a href="https://www.officialgazette.gov.ph/" style="margin-top:-15px; color:#505050; text-decoration:none;">Official Gazette</a></p>
    </div>
    <div style="float:left; width:200px; margin-left:100px;">
        <p><b>GOVERNMENT LINKS</b></p>
        <p style="margin-top:14px;"><a href="https://op-proper.gov.ph/" style=" color:#505050; text-decoration:none;">Office of the President</a></p>
        <p style="margin-top:-10px;"><a href="https://ovp.gov.ph/" style=" color:#505050; text-decoration:none;">Office of the Vice President</a></p>
        <p style="margin-top:-10px;"><a href="https://legacy.senate.gov.ph/" style=" color:#505050; text-decoration:none;">Senate of the Philippines</a></p>
        <p style="margin-top:-10px;"><a href="https://www.congress.gov.ph/" style=" color:#505050; text-decoration:none;">House of Representatives</a></p>
        <p style="margin-top:-10px;"><a href="https://sc.judiciary.gov.ph/" style=" color:#505050; text-decoration:none;">Supreme Court</a></p>
        <p style="margin-top:-10px;"><a href="https://ca.judiciary.gov.ph/" style=" color:#505050; text-decoration:none;">Court of Appeals</a></p>
        <p style="margin-top:-10px;"><a href="https://sb.judiciary.gov.ph/" style=" color:#505050; text-decoration:none;">Sandiganbayan</a></p>
    </div>
    <div style="float:right; margin-left:50px;">

    </div>
    <div style="clear:both;"></div>
    <div style="text-align:center; margin-top:20px;">
    </div>
</div>
<div class="notification" id="notification"></div>

@endsection