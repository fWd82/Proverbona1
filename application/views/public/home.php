<?php include('public_header.php'); ?>
    
<?php
    // echo "<pre>";
    // print_r($all_proverbs1);
    // exit();
?>

    <div class="container">
    
    <h2>Home Page</h2>
    <p>List of All Proverbs</p>
    <p class="text-right">
        <?php echo "Total: <strong>".count($all_proverb1)."</strong> Proverbs Found"; ?>
    </p>


    <table class="table table-striped table-hover">
        <thead>
            <th>Sr/ID. No</th>
            <th>Proverb</th>
            <th>Tags</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php if (count($all_proverb1)):?>
            <?php foreach ($all_proverb1 as $all_proverbss): ?>
            <tr>
                <td>
                    <?= $all_proverbss->proverb_id; ?>
                </td>
                <td>
                    <?= $all_proverbss->proverb_statement; ?>
                </td>
                <td>
                    <a href="#">
                        <?= $all_proverbss->proverb_tags; ?>
                    </a>
                </td>
                <td>View | Edit | Delete</td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
            <td colspan="4">No Record Found</td>
            </tr>

            <?php endif; ?>
        </tbody>
    </table>









</div>

<?php include('public_footer.php'); ?>
