//Checking if the Passwords matches
function checkPassword(){
    if(document.getElementById("psw").value != document.getElementById("repsw").value){
        alert("Password mismatched! Please enter again.");
        return false;
    }else{
        return true;
    }
}

//Checking if User Agreed
function enableButton(){
    if(document.getElementById("checkbox").checked){
        document.getElementById("submitbtn").disabled = false;
    }else{
        document.getElementById("submitbtn").disabled = true;
    }
}

//Error message
function errorMessage(){
	alert("Attempt Exam feature is not available. This page is only for demonstration purposes");
}

//Delete confirmation
function confirmDelete() {
    var result = confirm("Are you sure you want to delete?");
    if (result) {
      return true;  
    } else{
      return false;
    }
}

//Checking Grades
function checkGrade(marks){

    if(marks >= 90 && marks <= 100){
        return "A+";
    }else if(marks >= 80 && marks < 90){
        return "A";
    }else if(marks >= 75 && marks < 80){
        return "A-";
    }else if(marks >= 70 && marks < 75){
        return "B+";
    }else if(marks >= 65 && marks < 70){
        return "B";
    }else if(marks >= 60 && marks < 65){
        return "B-";
    }else if(marks >= 55 && marks < 60){
        return "C+";
    }else if(marks >= 45 && marks < 55){
        return "C";
    }else if(marks >= 40 && marks < 45){
        return "C-";
    }else{
        return "F";
    }

}