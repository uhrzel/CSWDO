<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>General Intake Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;

            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            vertical-align: middle;
            width: 80px;
            height: auto;
        }

        .header .title {
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            margin: 0 20px;
        }

        .header .title h1 {
            margin: 5px 0;
            font-size: 20px;
        }

        .header .title h2 {
            margin: 0;
            font-size: 16px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section .label {
            display: inline-block;
            width: 30%;
            font-weight: bold;
            position: relative;
        }


        .form-section .label::after {
            content: ":";
            position: absolute;
            right: 15px;

        }

        .form-section .input {
            display: inline-block;
            width: 65%;
            border-bottom: 1px solid #000;
            padding-left: 5px;
            /* Adjust if needed for spacing */
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .form-table,
        .form-table th,
        .form-table td {
            border: 1px solid black;
        }

        .form-table th,
        .form-table td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            text-align: right;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="img/logo.png" width="120" height="120" alt="City of Taguig Logo">
        <div class="title">
            <h2>CITY SOCIAL WELFARE AND DEVELOPMENT OFFICE</h2>
            <h1>GENERAL INTAKE SHEET</h1>
        </div>
        <img src="img/logo2.png" width="100" height="90" alt="Right Logo">
    </div>
    <div class="container">
        <div class="form-date">
            <label class="label">Date & Time</label>
            <span class="input">{{ $client->date_time}}</span>
        </div>

        <div class="form-section">
            <h3>I. Identifying Information</h3>
            <div>
                <label class="label">Name</label>
                <span class="input">{{ $client->first_name }} {{ $client->last_name }}</span>
            </div>
            <div>
                <label class="label">Age</label>
                <span class="input">{{ $client->age }}</span>
            </div>
            <div>
                <label class="label">Sex</label>
                <span class="input">{{ $client->sex }}</span>
            </div>
            <div>
                <label class="label">Date of Birth</label>
                <span class="input">{{ $client->date_of_birth }}</span>
            </div>
            <div>
                <label class="label">Place of Birth</label>
                <span class="input">{{ $client->pob }}</span>
            </div>
            <div>
                <label class="label">Educational Attainment</label>
                <span class="input">{{ $client->educational_attainment }}</span>
            </div>
            <div>
                <label class="label">Civil Status</label>
                <span class="input">{{ $client->civil_status }}</span>
            </div>
            <div>
                <label class="label">Religion</label>
                <span class="input">{{ $client->religion }}</span>
            </div>
            <div>
                <label class="label">Nationality</label>
                <span class="input">{{ $client->nationality }}</span>
            </div>
            <div>
                <label class="label">Occupation</label>
                <span class="input">{{ $client->occupation }}</span>
            </div>
            <div>
                <label class="label">Monthly Income</label>
                <span class="input">{{ $client->monthly_income }}</span>
            </div>
            <div>
                <label class="label">Address</label>
                <span class="input">{{ $client->address }}</span>
            </div>
            <div>
                <label class="label">Contact Number</label>
                <span class="input">{{ $client->contact_number }}</span>
            </div>
            <div>
                <label class="label">Source of Referral</label>
                <span class="input">{{ $client->source_of_referral }}</span>
            </div>
        </div>

        <div class="form-section">
            <h3>II. Family/Household Composition</h3>
            <table class="form-table">
                <tr>
                    <th>Name</th>
                    <th>Relationship to the Client</th>
                    <th>Date of Birth, Age</th>
                    <th>Sex</th>
                    <th>Civil Status</th>
                    <th>Educational Attainment</th>
                    <th>Occupation, Monthly Income</th>
                </tr>
                @foreach($client->familyMembers as $member)
                <tr>
                    <td>{{ $member->fam_firstname }} {{ $member->fam_lastname }}</td>
                    <td>{{ $member->fam_relationship }}</td>
                    <td>{{ $member->fam_birthday }}</td>
                    <td>{{ $member->fam_gender }}</td>
                    <td>{{ $member->fam_status }}</td>
                    <td>{{ $member->fam_education }}</td>
                    <td>{{ $member->fam_income }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="footer">
            <p>Form 001_General Intake Sheet | Page 1 of 3</p>
        </div>
    </div>
</body>

</html>