<?php
$value = esc_attr(get_option( 'higuru_channel_uuid' ));

    if($value!=null) {

        $buttonCaption = "Update";
        $buttonState = "disabled";

    } else {

        $buttonCaption = "Save";
        $buttonState = "disabled";
    }

?>

<body onload="enableTokenbutton();">

    <h1></h1>

    <div class="welcomePage">
		
        <!--higuru-Welcome page-->

        <div class="leftWelcome">

            <!--higuru-Left-->
			
            <div class="innerLeft">

                <!--higuru-innerLeft-->

                <div><img id="guruFront" src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/images/Front.svg' ?>" />
                </div>

                <div>
                    <!--higuru-Welcome-->

                    <p><span><strong>Welcome</strong> to the hi.guru<br>WebMessage plugin dashboard<br></span></p>
                    <p>Insert your WebMessage token below to activate the chat widget on this site.</p>
                </div>

                <!--higuru-Welcome end-->

                <div class="tokenBox">
					
                    <!--higuru-tokenBox-->


					 <!--higuru-tokenForm-->
					
                    <form name="higuru_form" method="post">

                        <br>

                        <div class="guruTokenline">
                            <input type="hidden" name="higuru_login_updated" value="login" />
                            <?php 
						 wp_nonce_field( 'higuru_update', 'higuru_form' ); 
						
					?>
                            <input oninput="enableTokenbutton()" type="text" id="higuru_token" name="higuru_token"
                                value="<?php echo $value; ?>" placeholder="Add Token here" autofocus />
                            <?php
						
						?>
                            <input id="higuru_token_apply" name="higuru_token_apply" type="submit" class="higuru-button-token" value="<?php echo $buttonCaption; ?>"  <?php echo $buttonState; ?> /> <br>


                       </div>

                    </form>

               
                </div>
                <button id="resetGuru" onclick="removeToken();">Reset Token</button>
                <div class="higuru-infoText">
					
                    <!--higuru-infoText-->
					
                    <p>
                        Don't have a token? <a href="https://app.hi.guru/account/register" target="_blank"
                            style="text-decoration: underline;">Create Account</a>, add a
                        WebMessage channel and receive the token via email.
                    </p>
                </div>
				
                <!--higuru-infoText end -->
				
                <hr>


                <!--higuru-tokenBox end-->
				
                <div class="higuru-video-box-heading">
                    <p> Need help? Watch our video. </p>
                </div>


                <div class="higuru-videoBox">
					
                    <!--higuru-videobox-start-->
					
                    <div class="higuru-tutorial">
						
                        <!--higuru-videobox-tutorial-->
						
                        <iframe src="https://player.vimeo.com/video/356835810" width="680" height="360" frameborder="0"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>


                    </div>
					
                    <!--higuru-videobox-tutorial end -->
					
                </div>
				
                <!--higuru-videobox-end-->
				
                <div class="higuru-footer">

                    <p>
                        Get started free and create your account
                    </p>
                    <a href="https://app.hi.guru/account/register" target="_blank"><button class="higuru-button"> Create
                            Account
                        </button></a>

                </div>
                <!--higuru-footer-end-->

            </div>
            <!--higuru-innerLeft-->
        </div>
        <!--higuru-Left end-->

        <!--higuru-Right-->

        <div class="rightWelcome">

            <!--Social icons-->

            <div class="higuru-socialIcons">

                <a href="https://www.facebook.com/hi.guruchat/" target="_blank"><img
                        src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/images/facebook.svg' ?>"></a>

                <a href="https://twitter.com/higuruchat?lang=en" target="_blank"><img
                        src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/images/twitter.svg' ?>"></a>

                <a href="https://www.linkedin.com/company/hi-guru" target="_blank"><img
                        src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/images/linkedin.svg' ?>"></a>

            </div>
            <!--Social icons end-->
            <div>
                <h3>
                    Get Support
                </h3>

            </div>
            <div class="higuru-support">

            <!--Quick support form for hi.guru-->

            <form action="" method="POST" enctype="multipart/form-data">

            <label class="higuru-form-label" for="higuru-support-email">Your Email:</label><br>
            <input type="text" name="higuru-support-email"><br>
            <label class="higuru-form-label" for="higuru-support-message">Your Message:</label><br>
            <input rows="5" type="textarea" name="higuru-support-message" class="higuru-support-message"><br><br>
            <input type="hidden" name="action" value="submit">
            <input name="action" class="higuru-button" type="submit" value="Send email" />

            </form>
				
				<!--Email support form to hi.guru-->
				
				<?php	
					if (isset($_REQUEST['action'])) {
						deliver_mail();
					}
					function deliver_mail() {

					// if the submit button is clicked, send the email
					if ( isset( $_POST['action'] ) ) {

						// sanitize form values
						$to = get_option('admin_email');
						$subject = 'hi.guru plugin support';
						$email   = sanitize_email( $_POST['higuru-support-email'] );
						$headers = "From: <$email>" . "\r\n";
						$message = esc_textarea( $_POST['higuru-support-message'] );						

						// get the blog administrator's email address
						
						wp_mail( $to, $subject, $message, $headers);
						
						// If email has been process for sending, display a success message
						if ( wp_mail( $to, $subject, $message, $headers ) ) {
							echo '<div>';
							echo '<h2>Email Sent!</h2>';
							echo '</div>';
						} else {
							echo 'An unexpected error occurred';
						}
					}
				}
    ?>      
    

            </div>
            <br>

        </div>


        <!--higuru-Welcome page end-->