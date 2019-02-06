<div id="userprofile">
    <div id="profileinfo">
    <?php 
    echo '<h2>Welcome '.$user['username'].' to your profile page</h2>
            <br> <h4> if you want you can log out or change some of your account details</h4>';
    echo '<br> <p> Your email: '.$user['email'].'<br> Your real name: '.$user['nome'].'<br>';
    ?>
    <a href="edit" class="btn btn-outline-primary">Edit Profile</a>
    </div>
    <a href="logout" class="btn btn-outline-warning">Sign Out</a>
</div>