const form = document.body.querySelector('form');
const url = window.location.pathname;
console.log(url);

var password = form.querySelector('#password');

const debounce = (callback, delay = 500) => {
    let timeout_id;
    return (...args) => {
        if(timeout_id){
            clearTimeout(timeout_id);
        }
        timeout_id = setTimeout(() => {
            callback.apply(this, args)
        }, delay);
    }
}

const isEmpty = (input) =>{
    return input.value === '';
}
const invalid = (input, msg) =>{
    let parent = input.parentElement;
    let span = parent.querySelector('span');
    parent.classList.remove('valid');
    parent.classList.add('invalid');
    span.innerHTML = msg;
    span.style.setProperty('opacity', 1);
    input.isvalid = false;
}
const valid = (input) =>{
    let parent = input.parentElement;
    let span = parent.querySelector('span');
    parent.classList.remove('invalid');
    parent.classList.add('valid');
    input.isvalid = true;
    span.style.setProperty('opacity', 0);
}



const check_unique = (input) => {
    let xhr = new XMLHttpRequest();
    
    let parent = input.parentElement;
    let span = parent.querySelector('span');
    console.log(input, parent, span);
    let data = JSON.stringify({
        check : 1,
        input_name : input.getAttribute('name'),
        input_value: input.value

    });
    xhr.open('POST', url);
    xhr.onload = (e) =>{
        if(xhr.DONE && xhr.status == 200){

            let response = JSON.parse(xhr.response);
            if(!response['unique']){

                invalid(input, `${input.name} is already taken`);
                
            }
            else{
                valid(input);
                
                
            }
            
            
            
       }
            
    }
    xhr.send(data);
}

const check_email = (input) =>{
    let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let msg;
    if(isEmpty(input)){
        msg = 'Email can not be blank';
        invalid(input, msg);
        return;
    }
    if(!pattern.test(input.value)){
        msg = 'Email is invalid';
        invalid(input, msg);
        return;
    }
    check_unique(input);

}

const check_username = (input) =>{
    let pattern = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,30}[a-zA-Z0-9]$/;
    let msg = 'Username is invalid';
    if(isEmpty(input)){
        msg = 'Username cannot be blank';
        invalid(input, msg);
        return;
    }
    if(!pattern.test(input.value)){
      
        invalid(input, msg);
        return;
    }
    check_unique(input);

}



const check_password = (input) => {
    let pattern = /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{8,})/;
    let msg = 'Password is invalid'
    if(isEmpty(input)){
        msg = 'Password can not be blank';
        invalid(password, msg);
        return;
    }
    if(!pattern.test(input.value)){
        invalid(password, msg);
        return;
    }

    valid(password);
}
const check_conf_password = (input) =>{
    
    let msg = "Password doesn't matched";
    if(isEmpty(input)){
        msg = 'Confirm your password'
        invalid(password, msg);
        return;
    }
    if(input.value != password.value){
        invalid(password, msg)
        return;
    }
    check_password(input);
}


form.oninput = debounce(({target}) =>{
    let input_id = target.id;

    switch(input_id){
        case 'username':
            check_username(target);
            break;
        case 'email':
            check_email(target);
            break;
        case 'password':
            check_password(target);
            break;
        case 'c-password':
            check_conf_password(target);
            break;
            
    }
})


