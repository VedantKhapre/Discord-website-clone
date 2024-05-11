let userData = {
    points: 1000
};

// Function to display points
function displayPoints() {
    document.getElementById("pointsDisplay").textContent = userData.points;
}

// Function to earn points
function earnPoints() {
    userData.points += 1000;
    displayPoints();
    saveUserData();
}

// Function to buy items
function buyItem() {
    if (userData.points >= 500) {
        userData.points -= 500;
        displayPoints();
        saveUserData();
        alert("Item purchased!");
    } else {
        alert("Not enough points to buy this item!");
    }
}

// Function to save user data (this should be replaced with backend code)
function saveUserData() {
    // Simulate saving to backend (you should replace this with your backend logic)
    localStorage.setItem("userData", JSON.stringify(userData));
}

// Function to load user data (this should be replaced with backend code)
function loadUserData() {
    // Simulate loading from backend (you should replace this with your backend logic)
    let savedData = localStorage.getItem("userData");
    if (savedData) {
        userData = JSON.parse(savedData);
        displayPoints();
    }
}

// Load user data when the page loads
window.onload = loadUserData;