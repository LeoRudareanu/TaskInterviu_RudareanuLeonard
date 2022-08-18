function emptyDatas(){
    let email = document.form.email.value;
    let password = document.form.password.value;
    if(email == "" && password == ""){
        alert("Va rugam completati ambele campuri!");
        return false;
    }
    else
        if(email == ""){
            alert("Va rugam completati campul EMAIL!");
            return false;
        }
        else
            if(password == ""){
                alert("Va rugam completati campul PAROLA!");
                return false;
            }
            else{
                alert("done");
                window.location.href = "./SignUp.php";
                return true;
            }


}
