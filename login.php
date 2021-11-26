
<div class="ui placeholder segment">
  <div class="ui two column stackable center aligned grid">
    <div class="ui vertical divider">Or</div>
    <div class="middle aligned row">
      <div class="column">
        <div class="ui header">
          Login
        </div>
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
        <form class="ui form" method='POST' id='register-form'>
          <div class="field">
                <label>Name:</label>
                <input type="text" name="name" placeholder="Mica" id='name'>
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
