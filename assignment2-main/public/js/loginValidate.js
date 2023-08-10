function validate() {
  const emailAddress = document.getElementById('emailAddress');
  const password = document.getElementById('password');

  let success = true;

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

  return success;
}
