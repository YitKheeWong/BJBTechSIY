function deleteActivity() //prompt to delete selected activity
{
    alert("Aktiviti telah berjaya dipadamkan.");
}

function insertActivity() //propmt to add new activity
{
    alert("Aktiviti telah berjaya ditambah.");
}

function updateActivity() //prompt to update current activity
{
    alert("Aktiviti telah berjaya dikemaskini.");
}

function approveActivity() //prompt to approve activity
{
    alert("Anda telah setuju dengan aktiviti ini.");
}

function colorInput(x)
{
    x.style.background="#F5FFFA";
}

function yesnoCheck(that) {
    if (that.value == "Terhad"){
    document.getElementById("ifYes").style.display = "block";
    } else {
    document.getElementById("ifYes").style.display = "none";
    }
}