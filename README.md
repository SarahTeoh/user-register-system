## User authentication and login system
A user authentication and login system using PHP, MySQL database. 

## Technologies used
- HTML: page layout and design
- Javascript: Frontend
- PHP: backend to communicate with DB
- MySQL : database to store users' data

## Details about pages
##### Registration page
- Registers user into DB
- Shows error message when password or username incorrect, when username is used
- Toggle password visibility using checkbox
- Navigate to login page if already registered

##### Login page
- Check whether username and password match the data in DB
- Toggle password visibility using font awesome eye icons
- Navigate to registration page if wish to register

##### Homepage
- Only logged in users can view the page

## Lessons learnt during project
- Best practice of using `<script>` tag is to put the tag before closing the body tag because
    - If you have code in your JavaScript that alters HTML as soon as the JavaScript code loads, there won’t actually be any HTML elements available for it to affect yet, so it will seem as though the JavaScript code isn’t working, and you may get errors.
    - If you have a lot of JavaScript, it can visibly slow the loading of your page because it loads all of the JavaScript before it loads any of the HTML.
Reference: [Best practice of using the `<script>` tag](https://levelup.gitconnected.com/all-about-script-87fea475b976)

- PHP is quite strict for `;`. (Finish the syntax structure first before writing the content!)

## Reference tutorials and blogs
#### About user registration system logic and algorithm
[User Registration System Using PHP And MySQL Database | PHP MySQL Tutorial | Edureka](https://www.youtube.com/watch?v=qjwc8ScTHnY&list=PL9MM1vRTitObJa_5ZRfNtb8nT3Z11qL5i&index=4&ab_channel=edureka%21edureka%21)

[Building a Simple Registration System With PHP](https://medium.com/swlh/building-a-simple-registration-system-with-php-89d6218a063c)

[PHP 8 MySQL Tutorial: Build Login and User Authentication System](https://www.positronx.io/build-php-mysql-login-and-user-authentication-system/)

#### About toggle password visibility function
[Toggle with eye icon from font awesome](https://www.youtube.com/watch?v=iA9ZxELnikM&ab_channel=LearnDesign)
[Toggle with checkbox](https://www.w3schools.com/howto/howto_js_toggle_password.asp)