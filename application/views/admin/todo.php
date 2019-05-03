<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
    <br><h2> TODO </h2> 
    <p> The following are the tasks which needs to be done </p> 
    <br>

    <div class="row">
        <div class="col-lg-12">
        <h4>Done</h4>
            <ol>
                <li>Create Form for adding References <strong> <?= anchor('reference/add_reference', 'HERE'); ?> </strong>  </li>
                <li>Edit Form for adding References <strong><?= anchor('reference/edit_reference/1', 'HERE'); ?></strong>  </li>
                <li>Create CardView for showing References <strong><?= anchor('reference/add_reference', 'HERE'); ?> </strong>  </li>
                <li>Separating Contributors for Proverbs <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong>  </li>
                <li>Pagination.  <i>See Bugs Section Below</i></li>
                <li># Add to Favorite <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>
                <li># Create listview for showing Favorites <strong><?= anchor('proverbona1/user/my_favorites', 'HERE'); ?></strong> <i>See Bugs Section Below</i> </li>
            </ol>
        <h4>Needs to be Done</h4>    
            <ol>
                <li>Search Option | Filters for Languages etc</li>
                <li>Separating #Tags for Proverbs</li>
                <li>Link Proverb</li>
                <li># Delete Favorites</li>
                <li>In my profile - Show contributions</li>
                <li>Rate Proverb - Adding Stars Ajax</li>
                <li>Contributors CardView + Profiles</li>
                <li>Assign Points to Users</li>
                <li>Settings / Preferences Page</li>
                <li>isProtected Proverb Option</li>
                <li>isAdmin Option</li>
                <li>Delete Facility - Proverb (For Admins)</li>
                <li>Create listview for showing Feedbacks to admins</li>
            </ol>

            <h4>Bugs / Errors</h4>
            <ol>
                <li>Contributions fetch just one user <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong>  </li>
                <li>Pagination class not rendering correctly <strong><?= anchor('proverb', 'HERE'); ?></strong>  </li>
                <li>Show feedback to user after adding proverb to Favorites <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>                
                <li>Home Controller Redirect error on live server</li>
            </ol>

            <h4>Future</h4>
            <ol>
                <li>Frontend Designing</li>
                <li>Send Notifications to Users</li>
                <li>Making all communication to Ajax</li>
                <li>APIs for app.</li>
                <li>Email activation-link to who register</li>
            </ol>
        </div>
        https://www.sourcecodester.com/tutorials/php/12087/codeigniter-signup-email-verification.html
    </div>
<HR>
</div>

<?php include('admin_footer.php'); ?>