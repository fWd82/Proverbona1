<?php include('admin_header.php'); ?>

<div class="container"> 
    
    <br><h2> TODO </h2>
    <br><h4 class="text-danger"> (Dont design it - Its just for keeping track of process) </h4> 

    <p> Following are the process shown </p> 
    <br>

    <div class="row">
        <div class="col-lg-6">
        
            <h4>Needs to be Done</h4>    
                <ol>
                    <li>Assign Points to Users</li>
                    <li>Settings / Preferences Page</li>
                    <li>=== # Separating #Tags for Proverbs</li>
                    <li>=== # Separating #References (Multiple) for Proverbs</li>
                    <li>=== Link Proverb</li>
                    <li>=== Fetch Linked Proverbs in Proverb Details Page</li>
                    <li> > table_preferences >  TIMESTAMP</li> 
                </ol>

                <h4>Bugs / Errors</h4>
                <ol>
                    <li>DONE - Contributions fetch just one user <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong>  </li>
                    <li>DONE - Favorites Proverb | Add to / Delete  <strong><?= anchor('favorites', 'HERE'); ?></strong> </li>                
                    <li>DONE - Display Favorites Proverb just once, as UNIQUE key is on table db.  <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>                
                    <li>Show feedback to user after adding proverb to Favorites <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>                
                    <li>Rate Proverb - Adding Stars Ajax <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>
                </ol>

                <h4>Future</h4>
                <ol>
                    <li>Frontend Designing</li>
                    <li>Send Notifications to Users</li>
                    <li>Making all communication to Ajax</li>
                    <li>APIs for app.</li>
                    <li>Email activation-link to who register <strong><a href="https://www.sourcecodester.com/tutorials/php/12087/codeigniter-signup-email-verification.html">HERE</a></strong></li>
                </ol>
        </div>

        <div class="col-lg-6">
            <h4>Done</h4>
                <ol>
                    <li>Create Form for adding References <strong> <?= anchor('reference/add_reference', 'HERE'); ?> </strong>  </li>
                    <li>Edit Form for adding References <strong><?= anchor('reference/edit_reference/1', 'HERE'); ?></strong>  </li>
                    <li>Create CardView for showing References <strong><?= anchor('reference/add_reference', 'HERE'); ?> </strong>  </li>
                    <li>Separating Contributors for Proverbs <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong>  </li>
                    <li>Pagination </li>
                    <li>Add to Favorite <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>
                    <li>Create listview for showing Favorites <strong><?= anchor('favorites', 'HERE'); ?></strong> </li>
                    <li>Filter different languages on front page</li>
                    <li>My Profile - User Profile Integrate <strong><?= anchor('user/user_profile/fWd82', 'HERE'); ?></strong></li>
                    <li>In My Profile - Show contributions <strong><?= anchor('user/user_profile/ahmadkhan3', 'HERE'); ?></strong> </li>
                    <li>(For Admins) Create listview for showing Feedbacks <strong><?= anchor('admin/show_feedbacks', 'HERE'); ?></strong> </li>
                    <li>(For Admins) Create listview of newly registered members <strong><?= anchor('admin/show_users/', 'HERE'); ?></strong> </li>
                    <li># Delete Favorites  <strong><?= anchor('favorites', 'HERE'); ?></strong></li>
                    <li>Display Image in Detailed References Page <strong><?= anchor('reference/reference_profile/1', 'HERE'); ?></strong> </li>
                    <li>Adding <i>Image_Upload </i> &nbsp; field to Add References Page <strong><?= anchor('reference/add_reference', 'HERE'); ?></strong> </li>
                    <li>My Favorite - Filter Languages <strong><?= anchor('favorites', 'HERE'); ?></strong> </li>
                    <li>(For Admins)  <u>[user, moderator, admin] </u> Option</li>
                    <li>(For Admins) <u>_isProtected</u> Proverb Option</li>
                    <li>(For Admins) Temporary Ban User from not contributing - <u> user_can_contribute</u></li>
                    <li>(For Admins) Delete Facility - Proverb</li>
                    <li>Contributors CardView + Profiles</li>
                </ol>
        </div>
    </div>
<HR>
</div>

<?php include('admin_footer.php'); ?>