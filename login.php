



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
        <form class="ui form" method='POST'>
            <div class="field">
                <label>Username:</label>
                <input type="text" name="new-username" placeholder="username">
            </div>
            <div class="field">
                <label>Password:</label>
                <input type="password" name="new-password" placeholder="password">
            </div>
            <button class="ui button" type="submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "templates/footer.php";?>