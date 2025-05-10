document.getElementById('submit-button').addEventListener('click', function() {
    const checkbox = document.getElementById('mark-completed');
    
    if (checkbox.checked) {
        const selectedAppointments = []; // Array to hold selected appointment IDs
        const tableRows = document.querySelectorAll("table tr"); // Select all rows in the table

        tableRows.forEach(row => {
            const cells = row.getElementsByTagName("td");
            if (cells.length > 0) { // Check if it is not a header row
                const aid = cells[0].textContent; // Get Appointment ID from the first column
                // Logic to include appointments based on some condition
                selectedAppointments.push(aid); // Add the appointment ID to the array
            }
        });

        // Perform AJAX request to mark the appointments as completed
        if (selectedAppointments.length > 0) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "appointment.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Handle success - maybe refresh the page or update the table
                    location.reload(); // Reload the page to see changes
                }
            };
            xhr.send("complete_aid=" + selectedAppointments.join(",")); // Send the selected IDs
        }
    } else {
        alert("Please select an appointment to mark as completed.");
    }
});
