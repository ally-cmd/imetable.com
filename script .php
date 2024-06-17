// Sample timetable data
const timetableData = [
    { time: "16:00 - 17:00", monday: "Lecture IS048 C2/C3", tuesday: "Lecture IS021 B305", wednesday: "Tutorial IS024 B305", thursday: "Tutorial IS099 B305", friday: "Lecture IS042 B305" },
    { time: "18:00 - 18:55", monday: "IS024", tuesday: "IS014", wednesday: "IS014", thursday: "IS021", friday: "IS099" },
    { time: "19:00 - 19:55", monday: "IS048", tuesday: "IS042" }
];

let subjectCode = 'IS'; // Initial subject code

// Function to display the timetable
function displayTimetable() {
    const timetableContent = document.getElementById('timetableContent');
    timetableContent.innerHTML = ''; // Clear previous content

    const table = document.createElement('table');
    table.classList.add('timetable');

    // Create table header
    const headerRow = document.createElement('tr');
    const days = ['Time', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    days.forEach(day => {
        const th = document.createElement('th');
        th.textContent = day;
        headerRow.appendChild(th);
    });
    table.appendChild(headerRow);

    // Create table rows for timetable data
    timetableData.forEach(rowData => {
        const row = document.createElement('tr');
        Object.values(rowData).forEach(value => {
            const cell = document.createElement('td');
            cell.textContent = value.replace(/IS\d{3}/g, `${subjectCode}$&`); // Replace subject code
            row.appendChild(cell);
        });
        table.appendChild(row);
    });

    timetableContent.appendChild(table);
}

// Function to handle login form submission
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Here you can add logic to validate username and password
    // For simplicity, let's assume login is successful
    // Show timetable page and hide login page
    document.getElementById('loginPage').style.display = 'none';
    document.getElementById('timetablePage').style.display = 'block';

    // Display the timetable
    displayTimetable();
});

// Event listener for Home button
document.getElementById('homeBtn').addEventListener('click', function() {
    // Show login page and hide timetable page
    document.getElementById('loginPage').style.display = 'block';
    document.getElementById('timetablePage').style.display = 'none';
});

// Event listener for UDSM Website button
document.getElementById('udsmBtn').addEventListener('click', function() {
    // Open UDSM website in a new tab
    window.open('https://udsm.ac.tz', '_blank');
});

// Event listener for Change Subject Code button
document.getElementById('changeSubjectCodeBtn').addEventListener('click', function() {
    // Change subject code
    subjectCode = prompt('Enter new subject code (e.g., IT):') || 'IS';
    // Display the updated timetable
    displayTimetable();
});

// Initial display of timetable on page load
displayTimetable();
