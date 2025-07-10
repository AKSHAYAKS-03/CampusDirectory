<?php

include('db_connect.php');

$query = "SELECT 
            users.Login_id AS RegNo,
            student_personal.Student_Name AS Name,
            student_personal.Student_Profile_Pic AS Photo,
            UPPER(SUBSTRING(users.Login_id, 3, 3)) AS Department,
            SUBSTRING(users.Login_id, 6 , 1) AS Section,
            SUBSTRING(users.Login_id, 1, 2) AS Year
        FROM  
            users
        JOIN 
            student_personal ON users.Login_id = student_personal.Student_Rollno;
        ";

$result = mysqli_query($conn, $query);

function getAcademicYear($year) {
    $admissionYear = intval("20" . substr($year, 0, 2));
    $currentYear = date("Y");

    $diff = $currentYear - $admissionYear + 1; 

    switch ($diff) {
        case 1: return "I";
        case 2: return "II";
        case 3: return "III";
        case 4: return "IV";
        default: return "-"; 
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <style>

   body {
    background-color: #f3f4f6;
    margin: 0;
    padding: 0;
}

.sidebar {
    height: 100vh;
    width: 250px;
    background-color:  rgb(95, 158, 164);
    color: white;
    padding: 20px;
    position: fixed;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
}

.sidebar h3, .sidebar h2 {
    margin-bottom: 15px;
}

.sidebar a {
    display: block;
    color: white;
    padding: 10px;
    background:  rgb(95, 158, 164);;
    margin-bottom: 10px;
    border-radius: 6px;
    text-align: center;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background:  rgb(95, 158, 164);;
}

.sidebar select,
.sidebar button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
}

.sidebar select {
    background: white;
    color: #333;
    font-weight: bold;
}

button {
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #d1d5db;
}

.hidden {
    display: none;
}

.content {
    margin-left: 270px;
    padding: 30px;
}

.table {
    width: 100%;
    background: white;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.table th {
    background-color:  rgb(95, 158, 164);;
    color: white;
    padding: 12px;
}

.table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #e5e7eb;
}

.table tr:hover {
    background-color: #f1f5f9;
    cursor: pointer;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    width: 100%;
}

.top {
    margin-bottom: 20px;
}

.logout a {
    background: #dc2626;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
}

.logout a:hover {
    background: #b91c1c;
}

.edit-btn,
.delete-btn {
    padding: 6px 12px;
    border-radius: 4px;
    font-weight: bold;
    font-size: 13px;
    transition: 0.2s;
}

.edit-btn:hover,
.delete-btn:hover {
    opacity: 0.9;
}

img {
    max-width: 60px;
    max-height: 60px;
}
.fulledit{
    display: flex;
    flex-direction: row;
}

    </style>
</head>
<body>
    
    <div class="sidebar">
        <h3>Student Actions</h3>
        <a href="add_student.php">➕ Add Student</a>

        <div class="filter">
            <h2>Filters</h2>
            <div class="category-label">Department</div>
            <select id="department">
                <option value="all" selected>All Departments</option>
                <option value="CSE">CSE</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
                <option value="MECH">MECH</option>
                <option value="CIV">CIV</option>
            </select>

            <div class="category-label">Section</div>
            <select id="section">
                <option value="all" selected>All Sections</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>

            <div class="category-label">Year</div>
            <select id="year">
                <option value="all" selected>All Years</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
            </select>
        </div>
        <br>
        <h2>Edit Students</h2>
        <button id="bulkEditBtn">✏ Edit Student</button>

        <div id="editOptions" class="hidden">
            <label>Select Column</label>
            <select id="columnSelect" class="form-control" placeholder="Select">            
                <option value="" disabled selected>Select</option>
                <option value="Department">Department</option>
                <option value="Section">Section</option>
                <option value="Year">Year</option>
            </select>

            <label>Select New Value</label>
            <select id="valueSelect" class="form-control" placeholder="Select">
            <option value="" disabled selected>Select</option>
            </select>

            <button class="btn btn-success mt-2" id="applyChanges">Apply Changes</button>
        </div>        
    </div>
    <div class="content">
        <h2>Student Management</h2>
        <div class="top" style="display:flex ;align-items: center;justify-content: space-between">
            <input type="text" id="searchInput" placeholder="Search students..." onkeyup="searchStudents()" style="width: 300px;">

            <div class="fulledit">
                    <button id="editSelected" class="btn btn-primary">Edit Selected</button>
                    <button id="saveEditedData" class="btn btn-success">Save Changes</button>
                    <button id="deleteSelected" class="btn btn-danger">Delete Selected</button>
            </div>    
            <div class="logout"><a href="logout.php">Logout</a></div>

        </div>
    
        <table class="table">
            <thead class="tabledark">
                <tr>
                    <th><input type="checkbox" id="selectAll" /></th> 
                    <th>Photo</th>
                    <th>RollNo</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="studentTable">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr data-regno="<?= $row['RegNo']; ?>" onclick = "window.location='Student_View.php?value=<?= $row['RegNo']; ?>'">
                    <td><input type="checkbox" name="select" value="<?= $row['RegNo']; ?>"></td>
                    <td><img src = "uploads/<?= $row['Photo']; ?>" alt="Profile Picture" style="max-width: 150px; max-height: 150px;"></td>
                    <td class="editable regNo"><?= $row['RegNo']; ?></td>
                    <td class="editable name"><?= $row['Name']; ?></td>
                    <td class="editable department"><?= $row['Department']; ?></td>
                    <td class="editable section"><?= $row['Section']; ?></td>
                    <?php $academicYear = getAcademicYear($row['Year']); ?>                          
                    <td class="editable year"><?= $academicYear ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" style="background-color: #1E3A8A;color:white;border:none">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" style="background-color: #1E3A8A;color:white;border:none">Delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<script>
     function searchStudents() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const table = document.getElementById("studentTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let row = rows[i];
            const cells = row.getElementsByTagName("td");
            let found = false;

            // Loop through all cells (ID, Name, Age, Class)
            for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                if (cell.textContent.toLowerCase().indexOf(input) > -1) {
                found = true;
                break;
                }
            }
            }

            // Show/hide row based on search match
            if (found) {
            row.style.display = "";
            } else {
            row.style.display = "none";
            }
        }
        }

document.addEventListener("DOMContentLoaded", function () {

    // Function to toggle edit mode
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function () {
            let row = this.closest("tr");
            let isEditing = this.textContent === "Save";

            row.querySelectorAll(".editable").forEach(cell => {
                if (!isEditing) {
                    let text = cell.textContent.trim();
                    cell.innerHTML = `<input type="text" class="form-control form-control-sm" value="${text}">`;
                } else {
                    let input = cell.querySelector("input");
                    if (input) cell.textContent = input.value;
                }
            });

            this.textContent = isEditing ? "Edit" : "Save";
            this.classList.toggle("btn-warning");
            this.classList.toggle("btn-success");

            if (isEditing) {
                updateUser(row);
            }
        });
    });

// Function to update user in database
function updateUser(row) {
    let regNo = row.querySelector(".regNo").textContent.trim();
    let name = row.querySelector(".name").textContent.trim();
    let department = row.querySelector(".department").textContent.trim();
    let section = row.querySelector(".section").textContent.trim();
    let year = row.querySelector(".year").textContent.trim();

    let formData = new FormData();
    formData.append("RegNo", regNo);
    formData.append("Name", name);
    formData.append("Department", department);
    formData.append("Section", section);
    formData.append("Year", year);

    fetch("Edit_Student.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("User updated successfully!");
        } else {
            alert("Error updating user: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}

    // Delete Functionality
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function () {
            let row = this.closest("tr");
            let regNo = row.querySelector(".regNo").textContent.trim();

            if (confirm("Are you sure you want to delete student with Reg No: " + regNo + "?")) {
                deleteUser(regNo, row);
            }
        });
    });

        function deleteUser(regNo, row) {
            let formData = new FormData();
            formData.append("RegNo", regNo);

            fetch("Delete_Student.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.remove(); // Remove row from table
                    alert("User deleted successfully!");
                } else {
                    alert("Error deleting user: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        }
        

     // Get filter dropdown elements
    const departmentFilter = document.getElementById("department");
    const sectionFilter = document.getElementById("section");
    const yearFilter = document.getElementById("year");

    // Function to fetch and update the table
    function fetchFilteredData() {
        const department = departmentFilter.value;
        const section = sectionFilter.value;
        const year = yearFilter.value;

        // Send the filter values to the backend
        fetch("Fetch_Students.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `department=${department}&section=${section}&year=${year}`
        })
        .then(response => response.json())
        .then(data => {
            const studentTable = document.getElementById("studentTable");
            studentTable.innerHTML = ""; // Clear the table before adding new data

            if (data.length === 0) {
                studentTable.innerHTML = "<tr><td colspan='7'>No students found</td></tr>";
                return;
            }

            // Populate the table with filtered data
            data.forEach(student => {
                const row = document.createElement("tr");
                row.setAttribute("data-regno", student.RegNo); 
               
                row.innerHTML = `
                    <td><input type="checkbox" name="select" value="${student.RegNo}"></td>
                    <td class="editable regNo">${student.RegNo}</td>
                    <td class="editable name">${student.Name}</td>
                    <td class="editable department">${student.Department}</td>
                    <td class="editable section">${student.Section}</td>
                    <td class="editable year">${student.Year}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn">Delete</button>
                    </td>
                `;
                studentTable.appendChild(row);
            });
        })
        .catch(error => console.error("Error fetching students:", error));
    }

    // Attach event listeners to dropdowns
    departmentFilter.addEventListener("change", fetchFilteredData);
    sectionFilter.addEventListener("change", fetchFilteredData);
    yearFilter.addEventListener("change", fetchFilteredData);


    
    /////update bulk
    const editBtn = document.getElementById("bulkEditBtn");
    const editOptions = document.getElementById("editOptions");
    const columnSelect = document.getElementById("columnSelect");
    const valueSelect = document.getElementById("valueSelect");
    const applyChangesBtn = document.getElementById("applyChanges");

        editBtn.addEventListener("click", function () {
            editOptions.classList.toggle("hidden");
        });

        columnSelect.addEventListener("change", function () {
            const selectedColumn = columnSelect.value;
            updateValueOptions(selectedColumn);
        });

        function updateValueOptions(column) {
            let values = [];

            if (column === "Department") values = ["CSE", "ECE","EEE","IT", "MECH", "CIVIL"];
            else if (column === "Section") values = ["A", "B", "C"];
            else if (column === "Year") values = ["I", "II", "III", "IV"];

            valueSelect.innerHTML = `<option value="" disabled selected>Select</option>`;

            values.forEach(value => {
                let option = document.createElement("option");
                option.value = value;
                option.textContent = value;
                valueSelect.appendChild(option);
            });

            valueSelect.style.display = "block";
        }

        applyChangesBtn.addEventListener("click", function () {
            const selectedColumn = columnSelect.value;
            const newValue = valueSelect.value;

            if (!selectedColumn || !newValue) {
                alert("Please select both a column and a new value.");
                return;
            }

            if (confirm(`Are you sure you want to update the displayed students' ${selectedColumn} to "${newValue}"?`)) {
                updateTableColumn(selectedColumn, newValue);
                updateDatabase(selectedColumn, newValue);
            }
        });

        function updateTableColumn(column, value) {
            const headers = document.querySelectorAll("thead th");
            let columnIndex = -1;

            headers.forEach((th, index) => {
                if (th.textContent.trim() === column) columnIndex = index;
            });

            if (columnIndex === -1) {
                alert("Error: Column not found.");
                return;
            }

            const updatedRows = [];
            document.querySelectorAll("tbody tr").forEach(row => {
                if (row.style.display !== "none") { 
                    let cell = row.children[columnIndex];
                    if (cell) {
                        cell.textContent = value;
                        // console.log(row.dataset.regno);
                        updatedRows.push(row.dataset.regno); 
                    }
                }
            });
            console.log("updatedRows: " + updatedRows);

            return updatedRows;
        }

        function updateDatabase(column, value) {
            const updatedRows = updateTableColumn(column, value);

            if (updatedRows.length === 0) {
                alert("No rows to update.");
                return;
            }

            fetch("Bulk_Update.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ column: column, value: value, regNos: updatedRows })
            })
            .then(response => response.json())
            .then(text => {
                console.log(text);
            })
            .then(data => {
                if (data.success) {
                    alert("Database updated successfully!");
                } else {
                    console.log("DatabaseError updating database: " + data.error);
                }
            })
            .catch(error => {
                console.log("Request failed: " + error);
            });
        }

    //select all checkboxes    
    const selectAllCheckbox = document.getElementById("selectAll");
    const studentTable = document.getElementById("studentTable");

    // Function to update "Select All" checkbox state based on individual checkboxes
    function updateSelectAllState() {
        const checkboxes = document.querySelectorAll("#studentTable input[type='checkbox']");
        const allChecked = [...checkboxes].every(checkbox => checkbox.checked);
        selectAllCheckbox.checked = allChecked;
    }

    // Handle "Select All" checkbox
    selectAllCheckbox.addEventListener("change", () => {
        const checkboxes = document.querySelectorAll("#studentTable input[type='checkbox']");
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Event delegation: Handle checkbox clicks inside the studentTable
    studentTable.addEventListener("change", (event) => {
        if (event.target.type === "checkbox") {
            updateSelectAllState();
        }
    });       

    const editSelectedBtn = document.getElementById("editSelected");
    // const studentTable = document.getElementById("studentTable");
    const deleteSelectedBtn = document.getElementById("deleteSelected");

        editSelectedBtn.addEventListener("click", () => {
            document.querySelectorAll("#studentTable input[type='checkbox']:checked").forEach(checkbox => {
                let row = checkbox.closest("tr");
                
                // Make each cell editable (except checkbox and actions)
                row.querySelectorAll(".editable").forEach(cell => {
                    let currentValue = cell.textContent.trim();
                    cell.innerHTML = `<input type="text" value="${currentValue}" class="form-control">`;
                });
            });
        });

        // Function to save edited data (you can call this when a "Save" button is clicked)
        function saveEditedData() {
            let updatedData = [];

            document.querySelectorAll("#studentTable input[type='checkbox']:checked").forEach(checkbox => {
                let row = checkbox.closest("tr");
                let regNo = row.dataset.regno;

                let updatedRow = {
                    regNo: regNo,
                    name: row.querySelector(".name input").value,
                    department: row.querySelector(".department input").value,
                    section: row.querySelector(".section input").value,
                    year: row.querySelector(".year input").value
                };

                updatedData.push(updatedRow);
            });

            console.log(updatedData); // Check the data before sending

            // Send updated data to the server
            fetch("Update_Student.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(updatedData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Students updated successfully!");
                    location.reload(); 
                } else {
                    alert("Update failed!");
                }
            })
            .catch(error => console.error("Error updating students:", error));
        }

        const saveEditedDataBtn = document.getElementById("saveEditedData");
        saveEditedDataBtn.addEventListener("click", saveEditedData);
        
        //delete bulk
        deleteSelectedBtn.addEventListener("click", () => {
        const checkboxes = document.querySelectorAll("#studentTable input[type='checkbox']:checked");
        const regNos = [];

        checkboxes.forEach(checkbox => {
            let row = checkbox.closest("tr");
            let regNo = row.dataset.regno;
            regNos.push(regNo);
            // console.log("regNo: " + regNo);
        });

        if (regNos.length > 0) {
            if (confirm("Are you sure you want to delete the selected students?")) {
                fetch("Delete_Student_Bulk.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({ regNos: regNos })
                        })
                        .then(response => {
                            return response.json(); // Parse JSON
                        })
                        .then(data => {
                            console.log(data); // Inspect the parsed data
                            if (data.success) {
                                alert("Students deleted successfully!");
                                location.reload();
                            } else {
                                alert("Delete failed: " + data.error);
                            }
                        })
                        .catch(error => {
                            console.error("Error deleting students:", error);
                        });
            }
        }   

    });
    });

        
</script>

</body>
</html>
