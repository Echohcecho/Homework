function validate() {
  const firstName = document.getElementById('firstName');
  const lastName = document.getElementById('lastName');
  const emailAddress = document.getElementById('emailAddress');
  const phoneNumber = document.getElementById('phoneNumber');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirmPassword');

  let success = true;

  if (firstName.value.length > 0 && firstName.value.length < 50) {
    // good first name
    const el = document.getElementById('errFirstName');

    if (firstName.parentNode.parentNode.contains(el) === true) {
      firstName.parentNode.classList.remove('error');
      firstName.parentNode.parentNode.removeChild(el);
    }
  } else {
    // bad first name
    success = false;

    firstName.parentNode.classList.add('error');

    const err = document.createElement('span');
    err.setAttribute('id', 'errFirstName');
    err.classList.add('error');
    err.innerHTML = '<strong>&times;</strong> Required: Max 50 chars.';

    if (firstName.parentNode.parentNode.contains(document.getElementById('errFirstName')) === false) {
      firstName.parentNode.parentNode.appendChild(err);
    }
  }

  if (lastName.value.length > 0 && lastName.value.length < 50) {
    // good last name
    const el = document.getElementById('errLastName');

    if (lastName.parentNode.parentNode.contains(el) === true) {
      lastName.parentNode.classList.remove('error');
      lastName.parentNode.parentNode.removeChild(el);
    }
  } else {
    // bad last name
    success = false;

    lastName.parentNode.classList.add('error');

    const err = document.createElement('span');
    err.setAttribute('id', 'errLastName');
    err.classList.add('error');
    err.innerHTML = '<strong>&times;</strong> Required: Max 50 chars.';

    if (lastName.parentNode.parentNode.contains(document.getElementById('errLastName')) === false) {
      lastName.parentNode.parentNode.appendChild(err);
    }
  }

  if (emailAddress.value.match(/[^\s@]+@[^\s@]+\.[^\s@]+/) === null) {
    // invalid email
    success = false;

    emailAddress.parentNode.classList.add('error');

    const err = document.createElement('span');
    err.setAttribute('id', 'errEmail');
    err.classList.add('error');
    err.innerHTML = '<strong>&times;</strong> Required in format: you@example.com.';

    if (emailAddress.parentNode.parentNode.contains(document.getElementById('errEmail')) === false) {
      emailAddress.parentNode.parentNode.appendChild(err);
    }
  } else {
    const el = document.getElementById('errEmail');

    if (emailAddress.parentNode.parentNode.contains(el) === true) {
      emailAddress.parentNode.classList.remove('error');
      emailAddress.parentNode.parentNode.removeChild(el);
    }
  }

  if (phoneNumber.value.length > 0) {
    // good phone number
    const el = document.getElementById('errPhoneNumber');

    if (phoneNumber.parentNode.parentNode.contains(el) === true) {
      phoneNumber.parentNode.classList.remove('error');
      phoneNumber.parentNode.parentNode.removeChild(el);
    }
  } else {
    // bad phone number
    success = false;

    phoneNumber.parentNode.classList.add('error');

    const err = document.createElement('span');
    err.setAttribute('id', 'errPhoneNumber');
    err.classList.add('error');
    err.innerHTML = '<strong>&times;</strong> Required.';

    if (phoneNumber.parentNode.parentNode.contains(document.getElementById('errPhoneNumber')) === false) {
      phoneNumber.parentNode.parentNode.appendChild(err);
    }
  }

  if (password.value.length < 6 || password.value.match(/[A-Z]/) === null || password.value.match(/[a-z]/) === null) {
    // bad password
    success = false;

    password.parentNode.classList.add('error');

    const err = document.createElement('span');
    err.setAttribute('id', 'errPass');
    err.classList.add('error');
    err.innerHTML = '<strong>&times;</strong> Required: Min 6 chars, 1 uppercase, 1 lowercase.';

    if (password.parentNode.parentNode.contains(document.getElementById('errPass')) === false) {
      password.parentNode.parentNode.appendChild(err);
    }
  } else {
    const el = document.getElementById('errPass');

    if (password.parentNode.parentNode.contains(el) === true) {
      password.parentNode.classList.remove('error');
      password.parentNode.parentNode.removeChild(el);
    }
  }

  if (confirmPassword.value.length === 0 || confirmPassword.value !== password.value) {
    // password do not match
    success = false;

    confirmPassword.parentNode.classList.add('error');

    const err = document.createElement('span');
    err.setAttribute('id', 'errConfirm');
    err.classList.add('error');
    err.innerHTML = '<strong>&times;</strong> Must match password.';

    if (confirmPassword.parentNode.parentNode.contains(document.getElementById('errConfirm')) === false) {
      confirmPassword.parentNode.parentNode.appendChild(err);
    }
  } else {
    const el = document.getElementById('errConfirm');

    if (confirmPassword.parentNode.parentNode.contains(el) === true) {
      confirmPassword.parentNode.classList.remove('error');
      confirmPassword.parentNode.parentNode.removeChild(el);
    }
  }

  return success;
}
