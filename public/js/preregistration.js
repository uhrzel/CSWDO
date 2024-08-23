function toggleOtherNationality() {
    var nationalitySelect = document.getElementById("nationality");
    var otherNationalityDiv = document.getElementById("otherNationality");
    var otherNationalityInput = document.getElementById("other_nationality");

    if (nationalitySelect.value === "Other") {
        otherNationalityDiv.style.display = "block";
        otherNationalityInput.setAttribute("name", "other_nationality");
    } else {
        otherNationalityDiv.style.display = "none";
        otherNationalityInput.removeAttribute("name");
    }
}

function toggleOtherReligion() {
    var religionSelect = document.getElementById("religion");
    var otherReligionDiv = document.getElementById("otherReligion");
    var otherReligionInput = document.getElementById("other_religion");

    if (religionSelect.value === "Other") {
        otherReligionDiv.style.display = "block";
        otherReligionInput.setAttribute("name", "other_religion");
    } else {
        otherReligionDiv.style.display = "none";
        otherReligionInput.removeAttribute("name");
    }
}

function toggleOtherType() {
    var typeSelect = document.getElementById("type");
    var otherTypeDiv = document.getElementById("otherType");
    var otherTypeInput = document.getElementById("other_type");

    if (typeSelect.value === "Other") {
        otherTypeDiv.style.display = "block";
        otherTypeInput.setAttribute("name", "other_type");
    } else {
        otherTypeDiv.style.display = "none";
        otherTypeInput.removeAttribute("name");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("preRegistrationForm")
        .addEventListener("submit", function (event) {
            event.preventDefault();
            const formData = new FormData(this);

            console.log("Form submitted"); // Debug log
            fetch(this.action, {
                method: this.method,
                body: formData,
            })
                .then((response) => {
                    console.log("Response received:", response); // Debug log
                    if (response.ok) {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Form submitted successfully!",
                            timer: 2000,
                            timerProgressBar: true,
                            willClose: () => {
                                window.location.reload();
                            },
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "An error occurred while submitting the form.",
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error); // Debug log
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "An error occurred while submitting the form.",
                    });
                });
        });
});

document
    .getElementById("date_of_birth")
    .addEventListener("input", function (e) {
        var dateInput = e.target.value;
        var year = dateInput.split("-")[0];

        if (year.length > 4) {
            e.target.value = dateInput.slice(0, 4) + dateInput.slice(5);
            alert("Please enter a valid 4-digit year.");
        }
    });
