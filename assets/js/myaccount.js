function check_pswd(pswd_id, rep_pswd_id, err_list_id, form_id){
    var pswd_box = document.getElementById(pswd_id);
    var pswd_txt = pswd_box.value;
    var rep_pswd_txt = document.getElementById(rep_pswd_id).value;
    var weak_pswd = false;
    var err_list = document.getElementById(err_list_id);
    err_list.innerHTML = '';

    // checks length 
    if(pswd_txt.length < 8){
        err_list.innerHTML += '<li>Minimum length of password should be 8.</li>';
        weak_pswd = true;
    }
    // checks for atleast one character
    if(! /[A-Z a-z]/.test(pswd_txt)){
        err_list.innerHTML += '<li>Password should contain atleast on one alphabet(A-Z, a-z).</li>';
        weak_pswd = true;
    }
    // checks for atleast one uppercase character
    if(! /[A-Z]/.test(pswd_txt)){
        err_list.innerHTML += '<li>Password should contain atleast on one uppercase alphabet(A-Z).</li>';
        weak_pswd = true;
    }
    // checks for atleast one digit
    if(! /\d/.test(pswd_txt)){
        err_list.innerHTML += '<li>Password should contain atleast on one digit(0-9).</li>';
        weak_pswd = true;
    }
    // checks for atleast one special character
    if(! /[@ # $ % ^ & *]/.test(pswd_txt)){
        err_list.innerHTML += '<li>Password should contain atleast on one special character(@, #, $, %, ^, &, *).</li>';
        weak_pswd = true;
    }
    // checks for atleast one special character
    if(pswd_txt != rep_pswd_txt){
        err_list.innerHTML += "<li>Password doesn't match with Repeat Password.</li>";
        weak_pswd = true;
    }
    if(! weak_pswd){
        alert('yes');
        document.getElementById(form_id).submit();
    }
}