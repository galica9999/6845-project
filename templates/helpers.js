const checkSamePassword = () => {
  if ($('#verify-password').val() == $('#password').val()) {
    return true;
  } else {
    let confirmLabel = document.getElementById('confirm-label');
    confirmLabel.innerHTML =
      'Confirm Password: <span style="color:red">Passwords do not match</span>';
    return false;
  }
};

// jquery checks
$('#register-form').change(function () {
  $('#initial_5').change(function () {
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
});
