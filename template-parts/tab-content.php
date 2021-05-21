<?php global $current_user ; ?>

 <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">User</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">Faq</a>
                </li>
            </ul>
 <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="general-tab-content">
                        <div class="document-submission">
                            <div class="document-status">
                          <?php  $currnturl =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                            $my_escaped_url = htmlspecialchars( $currnturl, ENT_QUOTES, 'UTF-8' ); 
                            ?>
                                    <h2>Please continue your submission</h2>
                                <a href="<?php $my_escaped_url ?>" >Continue my submission</a>
                                
                            </div>
                        </div>
                        <div class="timeline-content">
                            <ul>
                                <li>
                                    <h2>Point 1</h2>
                                    <p>Complete your profile</p>
                                </li>
                                <li>
                                    <h2>Point 2</h2>
                                    <p>Agree to legal rules</p>
                                </li>
                                <li>
                                    <h2>Point 3</h2>
                                    <p>Upload documents</p>
                                </li>
                                <li>
                                    <h2>Point 4</h2>
                                    <p>Submit</p>
                                </li>
                                <li>
                                    <h2>Point 5</h2>
                                    <p>Success! Stay tuned for further updates and information via email</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <div class="user-account">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Enter Email Address" value="<?php echo $current_user->data->user_login ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" value="********" readonly>
                            <button class="change-password" data-toggle="modal" data-target="#changepasswordModal">Change password</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                    <div class="user-faq-content">
                       
                            <?php 
                           
                           global $wpdb;

                            $args = array(  
                                'post_type' => 'faq',
                                'post_status' => 'publish',
                                'posts_per_page' => 10, 
                                'orderby' => 'title', 
                                'order' => 'ASC', 
                            );

                            $my_query = new WP_Query( $args ); 
                                
                            while ($my_query->have_posts() ) : $my_query->the_post(); 
                                echo ' <div class="faq-box">';
                                echo '<div class="faq-question">';
                                echo '<h2>'. get_the_title().'</h2>'; 
                                echo '</div>';
                                echo '<div class="faq-answer">' .get_the_content().'</div>';
                                echo '</div>'; 
                            endwhile;
                        
                            wp_reset_postdata();
                            
                            
                            ?>
                        
                    </div>
                </div>
            </div>