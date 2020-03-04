<?php include('admin_header.php'); ?>

<div class="container"> 
    
    <br><h2> PAGES </h2> 
    <br><h4 class="text-danger"> (Dont design it - Its just for keeping track of process) </h4> 
    <p> List of All Pages Shown </p> 
    <br>

    <div class="row">
        <div class="col-lg-6">
        
            <h4>Home</h4>    
                <ol>
                    <li>Front Home Page <strong><?= anchor('proverb/', 'HERE'); ?></strong> </li>
                </ol>

                <h4>Proverbs</h4>
                <ol>
                    <li>Add Proverb <strong><?= anchor('proverb/add_proverb', 'HERE'); ?></strong>  </li>
                    <li>Proverb Details Page <strong><?= anchor('proverb/proverb_detail/7', 'HERE'); ?></strong> </li>                
                    <li>Edit Proverb  <strong><?= anchor('proverb/edit_proverb/7', 'HERE'); ?></strong> </li>                
                    <li>Link Two Proverbs  <strong><?= anchor('proverb/link_two_proverbs', 'HERE'); ?></strong> </li>                
                </ol>

                <h4>References</h4>
                <ol>
                    <li>All References <strong><?= anchor('reference', 'HERE'); ?></strong>  </li>
                    <li>Add Reference <strong><?= anchor('reference/add_reference', 'HERE'); ?></strong>  </li>
                    <li>Reference Details Page <strong><?= anchor('reference/reference_profile/2', 'HERE'); ?></strong> </li>                
                    <li>Edit Reference  <strong><?= anchor('reference/edit_reference/2', 'HERE'); ?></strong> </li>                
                
                </ol>

                <h4>Users</h4>
                <ol>
                    <li>Signup <strong><?= anchor('user/signup', 'HERE'); ?></strong>  </li>
                    <li>Login <strong><?= anchor('user', 'HERE'); ?></strong>  </li>
                    <li>My Profile <strong><?= anchor('user/user_profile/fWd82', 'HERE'); ?></strong>  </li>
                    <li>Any User Profile <strong><?= anchor('user/user_profile/ahmadkhan3', 'HERE'); ?></strong>  </li>
                    <li>Any User Contributions List <strong><?= anchor('user/contribution/ahmadkhan3', 'HERE'); ?></strong>  </li>
                    <li>My Favorite List <strong><?= anchor('favorites', 'HERE'); ?></strong>  </li>
                    <li>Dashboard for User <strong><?= anchor('dashboard', 'HERE'); ?></strong>  </li> 
                </ol>

                <h4>Admins</h4>
                <ol>
                    <li>Admin Dashboard <strong><?= anchor('user', 'HERE'); ?></strong>  </li>
                    <li>(For Admins) Create listview for showing Feedbacks <strong><?= anchor('admin/show_feedbacks', 'HERE'); ?></strong> </li>
                    <li>(For Admins) Create listview of newly registered members <strong><?= anchor('admin/show_users/', 'HERE'); ?></strong> </li>
                </ol>

                

                

        </div>

        <div class="col-lg-6"> 
            <h4>Contributors</h4>
                <ol>
                    <li>List of Contributors <strong><?= anchor('contributors', 'HERE'); ?></strong>  </li>
                    <li>Contributors Profile Page <strong><?= anchor('contributors', 'HERE'); ?></strong>  </li>
                    <li>Add Contributor <strong><?= anchor('contributors', 'HERE'); ?></strong>  </li>
                </ol>

                <h4>Feedback</h4>
                <ol>
                    <li>Add Feedbacks <strong><?= anchor('feedback', 'HERE'); ?></strong>  </li>
                </ol>

                <h4>Statistics</h4>
                <ol>
                    <li>Statistics Page <strong><?= anchor('statistics', 'HERE'); ?></strong>  </li>
                </ol>
                 
        </div>
    </div>
<HR>
</div>

<?php include('admin_footer.php'); ?>