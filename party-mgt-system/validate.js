function doValidate(){
    if(document.signup.pwd.value!=document.signup.pwd1.value){
        alert("Passwords do not match!");
        document.signup.pwd.focus();
        return false;
    }
    return true;
}
function confirmDelete(event) {
    if (!confirm("Are you sure you want to delete this package?")) {
        event.preventDefault(); 
    }
}