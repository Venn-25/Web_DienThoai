function registerSubmit() {
    var msv = document.getElementById('msv');
    var fullname = document.getElementById('fullname');
    var email = document.getElementById('email');
    var gender = document.getElementsByName('gender');
    var hobbies = document.getElementsByName('hobbies[]');
    var country = document.getElementById('country');
    var note = document.getElementById('note');

    //kiểm tra mã sinh viên
    if(msv.value.length < 1) {
        msv.style.backgroundColor = 'yellow';
    } else {
        msv.style.backgroundColor = '';
    }

    //Kiểm tra họ và tên
    if(fullname.value.length < 1) {
        fullname.style.backgroundColor = 'yellow';
    } else {
        fullname.style.backgroundColor = '';
    }

    //kiểm tra email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(emailPattern.test(email.value)) {
        email.style.backgroundColor = '';
    } else {
        email.style.backgroundColor = 'yellow';
    }

    //kiểm tra giới tính
    if(gender[0].checked == false && gender[1].checked == false) {
        document.querySelector('.radio-box').style.backgroundColor = 'yellow';
    } else {
        document.querySelector('.radio-box').style.backgroundColor = '';
    }
    
    //kiểm tra sở thích
    var hobbiesBox = document.querySelector('.check-box');
    var isChecked = false;
    for (var i = 0; i < hobbies.length; i++) {
        if(hobbies[i].checked) {
            isChecked = true;
            break;
        }
    }
    if(isChecked) hobbiesBox.style.backgroundColor = '';
    else hobbiesBox.style.backgroundColor = 'yellow';


    //kiểm tra quốc tịch
    if (country.value == 0) {
        country.style.backgroundColor = 'yellow';
    } else {
        country.style.backgroundColor = '';
    }

    //kiểm tra ghi chú
    if (note.value.length >= 200) {
        note.style.backgroundColor = 'yellow';
    } else {
        note.style.backgroundColor = '';
    }
}

