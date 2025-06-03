
    // Update input when a year is selected from dropdown
    function updateInput() {
        const selectElement = document.getElementById("yearSelect");
        const inputField = document.getElementById("search-penghargaan");
        inputField.value = selectElement.value;
    }

    // Update select dropdown if input value matches a year
    function updateSelect() {
        const inputField = document.getElementById("search-penghargaan");
        const selectElement = document.getElementById("yearSelect");
        
        // Check if input is a valid year and update select
        if (inputField.value.match(/^\d{4}$/)) {
            selectElement.value = inputField.value;
        }
    }

    // Handle search action
    function handleSearch() {
        const searchInput = document.getElementById("search-penghargaan").value;
        alert("Anda mencari tahun: " + searchInput);
    }