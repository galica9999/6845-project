<?php
//If loginError variable exists then user used an incorrect password or tried to create an account that already exists.
//Also loginError is used to let the user know that their user name or password is null
$loginError = filter_input(INPUT_POST, 'loginError');
if ($loginError == NULL) {
    $loginError = filter_input(INPUT_GET, 'loginError');
    if ($loginError == NULL) {
        $loginError = 'N';
    }
}
echo $loginError ;

?>

<div class="ui placeholder segment">
  <div class="ui two column stackable center aligned grid">
    <div class="ui vertical divider">Or</div>
    <div class="middle aligned row">
      <div class="column">
        <div class="ui header">
          Login
        </div>
    <!-- Error message handling when logging in in. -->
    <?php if ($loginError == 'badAcccountPW' ) { ?>
        <h2><font color ='red'>Error.  Username or password is incorrect</font></h2>
    <?php } else if ($loginError == 'userblank' ) { ?>
        <h2><font color ='red'>Error.  Username is blank.</font></h2>
    <?php } else if ($loginError == 'passblank' ) { ?>
        <h2><font color ='red'>Error.  Password is blank.</font></h2>
    <?php }  ?>
        <form class="ui form" method='POST'>
            <div class="field">
                <label>Username:</label>
                <input type="text" name="username" placeholder="username">
            </div>
            <div class="field">
                <label>Password:</label>
                <input type="password" name="password" placeholder="password">
            </div>
            <button class="ui primary button" type="submit">Login</button>
        </form>
      </div>
      <div class="column">
        <div class="ui header">
          Register
        </div>
    <!-- Error message handling when logging in in. -->
    <?php if ($loginError == 'userblank' ) { ?>
        <h2><font color ='red'>Error.  Username is blank.</font></h2>
    <?php } else if ($loginError == 'passblank' ) { ?>
        <h2><font color ='red'>Error.  Password is blank.</font></h2>
    <?php } else if ($loginError == 'retype_passblank' ) { ?>
        <h2><font color ='red'>Error.  Your password did not match.</font></h2>
    <?php } else if ($loginError == 'accountExists' ) { ?>
        <h2><font color ='red'>Error.  User name already exists.  Enter a different name.</font></h2>
    <?php } else if ($loginError == 'newAccountError' ) { ?>
        <h2><font color ='red'>Error.  An error occurred when creating your account. Please try again.</font></h2>
    <?php }  ?>
        <form class="ui form" method='POST' id='register-form'>
          <div class="field">
                <label>Name:</label>
                <input type="text" name="new-name" placeholder="Your name" id='name'>
            </div>
            <div class="field">
                <label>Username:</label>
                <input type="text" name="new-username" placeholder="username" id='username'>
            </div>
            <div class="field">
                <label>Password:</label>
                <input type="password" name="new-password" placeholder="password" id='password'>
            </div>
            <div class="field">
                <label id='confirm-label'>Confirm Password:</label>
                <input type="password" name="confirm-password" placeholder="password" id='verify-password' >
            </div>

            <button class="ui button" type="submit" disabled id='register'>Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <script
      src="loginHelpers.js"
    ></script>
