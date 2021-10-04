
<div id="flex-div">
    <div id="main-content">           
            <h1 id="subs-text">Subscribe to newsletter</h1>
            <p id="main-p">Subscribe to our newsletter and get 10% discount on pineapple glasses</p>
            <form method="post">
                <div id="email-div">
                    <input type="text" name="email" id="email" placeholder="Type your email adress here...">
                    <span id='arrow' class='ic icon-ic-arrow'></span> 
                    <input type="submit" name="submit" value="submit" id="btn-submit">                                           
                </div>
                <p id="error-msg"> 
                    <?php 
                    if (isset($_POST["submit"]) && empty($_POST['email'])){
                    echo 'Email is required';
                    } else if(isset($_POST["submit"]) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
                        echo 'Please provide a valid e-mail address'; 
                    } 
                    ?>
                </p>           
                <div id="terms">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <span>I agree to <a href="#" id="tos">terms of service</a></span>
                </div>
            </form>                     
            <hr>
            <div id="social-media">
               <a href="#" id="fb-icon"><span class='ic icon-ic-facebook'></span></a> 
               <a href="#" id="ig-icon"><span class='ic icon-ic-instagram'></span></a> 
               <a href="#" id="tw-icon"><span class='ic icon-ic-twitter'></span></a> 
               <a href="#" id="yt-icon"><span class='ic icon-ic-youtube'></span></a>            
            </div>
    </div>
</div>
        