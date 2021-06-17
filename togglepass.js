/* Toggle password visibility in both registration and login page */

// Select password input fields, toggle-password-visibility checkbox and eye icons
var passwordField = document.querySelectorAll('.show_hide_password');
var show = document.querySelector('.show');
var hide = document.querySelector('.hide');
var toggleFlag = document.querySelector('.toggle_pass_check');

/* We used eye icon in login page to toggle password visibility but checkbox in registration page, 
if we select something that doesn't exist  using query selector, 
we will get an error later on since we can't set onclick or onchange event on null type,
therefore we need to handle exception. 
Eg: In login page, the eye icons do not exist, so the 'hide' and 'show' variable will be null while toggleFlag will represent HTML elements,
so only the second part of the following code will be executed.
*/
if (show && hide){
    hide.onclick = function () {
        for (var i=0; i < passwordField.length; i++){
            passwordField[i].setAttribute("type", "password");
        };
        hide.style.display = "none";
        show.style.display = "inline";
    };
    
    show.onclick = function () {
        for (var i=0; i < passwordField.length; i++){
            passwordField[i].setAttribute("type", "text");
        };
        show.style.display = "none";
        hide.style.display = "inline";
    };
}else if (toggleFlag){
    toggleFlag.onchange = function() {
        if (toggleFlag.checked){
            for (var i=0; i < passwordField.length; i++){
                passwordField[i].setAttribute("type", "text");
            };
        }else{
            for (var i=0; i < passwordField.length; i++){
                passwordField[i].setAttribute("type", "password");
            };
        };
    };
};


