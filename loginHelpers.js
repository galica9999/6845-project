const checkSamePassword = () => {
  let confirmLabel = document.getElementById('confirm-label');
  if ($('#verify-password').val() == $('#password').val()) {
    confirmLabel.innerHTML =
      'Confirm Password: <span style="color:green">Passwords match</span>';
    return true;
  } else {
    confirmLabel.innerHTML =
      'Confirm Password: <span style="color:red">Passwords do not match</span>';
    return false;
  }
};

//event listeners
const verify = document.getElementById('verify-password');
verify.addEventListener('change', (event) => {
  checkSamePassword();
});
const password = document.getElementById('password');
password.addEventListener('change', (event) => {
  checkSamePassword();
});

//jquery listeners

$('#register-form').change(function () {
  if (
    $('#name').val() != '' &&
    $('#username').val() != '' &&
    $('#pasword').val() != '' &&
    $('#verify-password').val() != '' &&
    $('#password').val() == $('#verify-password').val()
  ) {
    $('#register').attr('disabled', false);
  } else {
    $('#register').attr('disabled', true);
  }
});
