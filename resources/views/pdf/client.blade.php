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

        .form-date {
            margin-bottom: 20px;
        }

        .form-date .label {
            display: inline-block;
            width: 30%;
            font-weight: bold;
            position: relative;
        }


        .form-date .label::after {
            content: ":";
            position: absolute;
            right: 15px;

        }

        .form-date .input {
            display: inline-block;
            width: 40%;
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
            <h3>I. IDENTIFYING INFORMATION</h3> <br>
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
            <h3>II. FAMILY/HOUSEHOLD COMPOSITION</h3>
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

        .form-section-page2 {
            margin-bottom: 20px;
        }

        .form-section-page2 .label {
            display: inline-block;
            width: 30%;
            font-weight: bold;
            position: relative;
        }


        .form-section-page2 .label::after {
            content: ":";
            position: absolute;
            right: 15px;

        }

        .form-section-page2 .inputpage2 {
            display: inline-block;
            width: 100%;
            min-height: 20px;
            /* Ensures each line takes up space even if empty */
            border-bottom: 1px solid #000;
            padding-left: 5px;
            margin-bottom: 5px;
            /* Add space between lines */
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

    <div class="container">
        <div class="form-section-page2">
            <h3>III. CIRCUMSTANCES OF REFERAL
            </h3>
            <br><br>
            <span class="inputpage2">{{ $client->circumstances_of_referral }}</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <br>
            <h3>IV. FAMILY BACKGROUND
            </h3>
            <br>
            <span class="inputpage2">{{ $client->family_background }}</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <br>
            <h3>A. HEALTH HISTORY OF THE CLIENT
            </h3>
            <br>
            <span class="inputpage2">{{ $client->health_history }}</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <br>
            <h3>B. ECONOMIC SITUATION
            </h3>
            <br>
            <span class="inputpage2">{{ $client->economic_situation }}</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
            <span class="inputpage2">&nbsp;</span>
        </div>
    </div>


    <div class="footer">
        <p>Form 001_General Intake Sheet | Page 2 of 3</p>
    </div>
    </div>
</body>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form 001 - General Intake Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 100%;
            padding: 20px;
            background-color: #fff;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form-section {
            margin-bottom: 10px;
        }

        .input-line {
            display: inline-block;
            border: none;
            border-bottom: 1px solid #000;
            margin-left: 10px;
            padding: 2px;
            vertical-align: middle;
        }

        .form-left {
            width: 60%;
            float: left;
        }

        .form-right {
            width: 35%;
            float: right;
            margin-top: -20px;
            /* Adjust this as needed to position the right side section */
        }

        .appliances,
        .expenses {
            margin-bottom: 10px;
        }

        .appliances div,
        .expenses div {
            margin-bottom: 5px;
        }

        .appliances label,
        .expenses label {
            display: inline-block;
            width: 20%;
        }

        .appliances input,
        .expenses input {
            width: calc(100% - 100px);
            display: inline-block;
            border-bottom: 1px solid #000;
            margin-left: 10px;
            padding: 2px;
        }

        .signature-section {
            clear: both;
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .signature {
            width: 45%;
            text-align: center;
        }

        .signature-line {
            width: 100%;
            height: 30px;
            border-bottom: 1px solid #000;

        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
        }




        .inputpage3,
        .inputpage2 {
            display: inline-block;
            width: 100%;
            min-height: 20px;
            /* Ensures each line takes up space even if empty */
            border-bottom: 1px solid #000;
            padding-left: 5px;
            margin-bottom: 5px;
            /* Ensure padding and border are included in width/height */
        }

        /* Additional styles for specific sections if needed */
        .form-section-page3 {
            margin-top: 10px;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h3>C. HOME AND COMMUNITY ENVIRONMENT</h3>

        <!-- Left side of the form -->
        <div class="form-left">
            <div class="form-section">
                <label>1. House Structure:</label><br />
                <br>
                <input type="text" class="input-line" style="width: 20%;" /> Wood<br />
                <input type="text" class="input-line" style="width: 20%;" /> Semi-concrete<br />
                <input type="text" class="input-line" style="width: 20%;" /> Concrete<br />
                <input type="text" class="input-line" style="width: 20%;" /> Others<br />
            </div>

            <div class="form-section">
                <label>2. Floor/ Lot Area:</label> <br> <br>
                <input type="text" class="input-line" style="width: 30%;" />
            </div>

            <div class="form-section">
                <label>3. Type:</label><br /> <br>
                <input type="text" class="input-line" style="width: 20%;" /> Single/ Studio Type<br />
                <input type="text" class="input-line" style="width: 20%;" /> 2 Storey<br />
                <input type="text" class="input-line" style="width: 20%;" /> Others<br />
            </div>

            <div class="form-section">
                <label>4. Number of Rooms:</label> <br><br>
                <input type="text" class="input-line" style="width: 30%;" />
            </div>
        </div>

        <!-- Right side of the form -->
        <div class="form-right">
            <div class="form-section">
                <label>5. Appliances</label> <br> <br>
                <div class="appliances">
                    <div><label>a.</label><input type="text" class="input-line" style="width: 50%;" /></div>
                    <div><label>b.</label><input type="text" class="input-line" style="width: 50%;" /></div>
                    <div><label>c.</label><input type="text" class="input-line" style="width: 50%;" /></div>
                    <div><label>d.</label><input type="text" class="input-line" style="width: 50%;" /></div>
                    <div><label>e.</label><input type="text" class="input-line" style="width: 50%;" /></div>
                </div>
            </div>

            <div class="form-section">
                <label>6. Monthly Expenses</label> <br><br>
                <div>
                    <div><label>a. Electricity</label><input type="text" class="input-line" style="width: 40%;" /></div>
                    <div><label>b. Water</label><input type="text" class="input-line" style="width: 40%;" /></div>
                    <div><label>c. House Rent</label><input type="text" class="input-line" style="width: 40%;" /></div>
                    <div><label>d. Others</label><input type="text" class="input-line" style="width: 40%;" /></div>
                </div>
            </div>

            <div class="form-section">
                <label>7. Indicate if the client is:</label> <br><br>
                <div>
                    <input type="text" class="input-line" style="width: 30%;" /> <label>House owner</label><br />
                    <input type="text" class="input-line" style="width: 30%;" /> <label>House renter</label><br />
                    <input type="text" class="input-line" style="width: 30%;" /><label>Sharer</label><br />
                    <input type="text" class="input-line" style="width: 30%;" /> <label>Squatter</label>
                </div>
            </div>
        </div>

        <div class="form-section-page3">
            <div class="form-section">
                <h3>V. ASSESSMENT</h3>
                <div class="form-section-page3">
                    <span class="inputpage3">&nbsp;</span>
                    <span class="inputpage3">&nbsp;</span>
                    <span class="inputpage3">&nbsp;</span>
                    <span class="inputpage3">&nbsp;</span>

                </div>
            </div>
            <div class="form-section">
                <h3>VI. RECOMMENDATION</h3>
                <div class="form-section-page3">
                    <span class="inputpage3">&nbsp;</span>
                    <span class="inputpage3">&nbsp;</span>
                    <span class="inputpage3">&nbsp;</span>
                    <span class="inputpage3">&nbsp;</span>
                </div>
            </div>
        </div>
        <div class="signature-section">
            <div class="signature">
                <div class="signature-line"></div>
                Informant's Name and Signature
                <br> <br>
                <div class="signature-line"></div>
                Name of Social Worker
            </div>
        </div>
    </div>

    <div class="footer">
        Form 001_General Intake Sheet &nbsp;&nbsp;&nbsp; Page 3 of 3
    </div>
    </div>
</body>

</html>