document.addEventListener("DOMContentLoaded", function () {
    const imageGrid = document.querySelector(".image-grid");
    const images = imageGrid.querySelectorAll("img");
    let currentIndex = 0;

    function showImage(index) {
        for (let i = 0; i < images.length; i++) {
            images[i].style.display = "none";
        }
        images[index].style.display = "block";
    }

    // Set the initial display for the first image
    showImage(currentIndex);

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    setInterval(nextImage, 3000); // Change image every 3 seconds
});



    // Add event listener to the radio button for Solo/Couple selection
    document.querySelectorAll('input[name="performerType"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            // Get the value of the selected option
            var selectedValue = this.value;

            // Get the partner fields container
            var partnerFields = document.getElementById('partnerFields');

            // Enable or disable partner fields based on the selection
            if (selectedValue === 'Couple') {
                partnerFields.style.display = 'block';
                // Enable the partner fields
                document.getElementById('partnerName').disabled = false;
                document.getElementById('partnerDob').disabled = false;
            } else {
                partnerFields.style.display = 'none';
                // Disable and clear the partner fields
                document.getElementById('partnerName').disabled = true;
                document.getElementById('partnerName').value = '';
                document.getElementById('partnerDob').disabled = true;
                document.getElementById('partnerDob').value = '';
            }
        });
    });

  
    function restrictInput(input) {
        // Remove any non-numeric characters
        input.value = input.value.replace(/[^0-9]/g, '');

        // Ensure the length is not more than 10 characters
        if (input.value.length > 10) {
            input.value = input.value.slice(0, 10);
        }
    }


    
    // script.js
function populateCountries() {
    // Array of countries
    const countries = [
        "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia",
        "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
        "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
        "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad",
        "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica", "Croatia", "Cuba", "Cyprus",
        "Czechia (Czech Republic)", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
        "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini ", "Ethiopia", "Fiji",
        "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea",
        "Guinea-Bissau", "Guyana", "Haiti", "Holy See", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran",
        "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya",
        "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
        "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
        "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco",
        "Mozambique", "Myanmar (formerly Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua",
        "Niger", "Nigeria", "North Korea", "North Macedonia (formerly Macedonia)", "Norway", "Oman", "Pakistan", "Palau",
        "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar",
        "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
        "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore",
        "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka",
        "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo",
        "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates",
        "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];

    // Get the select element
    const countrySelect = document.getElementById("country");

    // Populate the dropdown with countries
    countries.forEach(country => {
        const option = document.createElement("option");
        option.value = country;
        option.text = country;
        countrySelect.appendChild(option);
    });
}


    
    
    // Get the current date
// script.js
function setMinimumDate() {
    var currentDate = new Date();

    // Format current date as 'YYYY-MM-DD'
    var formattedDate = currentDate.toISOString().split('T')[0];

    // Set the minimum attribute of the date input to the current date
    document.getElementById('abhishekDate').setAttribute('min', formattedDate);
}



    
// script.js
function handlePerformerTypeChange() {
    // Add event listener to the radio button for Solo/Couple selection
    document.querySelectorAll('input[name="performerType"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            // Get the value of the selected option
            var selectedValue = this.value;

            // Get the partner fields container
            var partnerFields = document.getElementById('partnerFields');

            // Enable or disable partner fields based on the selection
            if (selectedValue === 'Couple') {
                partnerFields.style.display = 'block';
                // Enable the partner fields
                enablePartnerFields();
            } else {
                partnerFields.style.display = 'none';
                // Disable and clear the partner fields
                disableAndClearPartnerFields();
            }
        });
    });
}

function enablePartnerFields() {
    document.getElementById('partnerName').disabled = false;
    document.getElementById('partnerDob').disabled = false;
}

function disableAndClearPartnerFields() {
    document.getElementById('partnerName').disabled = true;
    document.getElementById('partnerName').value = '';
    document.getElementById('partnerDob').disabled = true;
    document.getElementById('partnerDob').value = '';
}

