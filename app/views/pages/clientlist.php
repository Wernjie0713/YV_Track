
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Client List</h3>
        <input type="text" id="searchInput" placeholder="Search for students...">

    </div>
    <div class="card-body">
    <div class="studentProfile">
    <table class="table">
            <tbody>
                
               
            <?php $loggedInClientEmail = $_SESSION['email']; // Fetch the logged-in user's email

                // Filter out the currently logged-in student's profile
                $filteredPages = array_filter($data['clientlist'], function ($clientlist) use ($loggedInClientEmail)
                {
                    return $clientlist->client_email !== $loggedInClientEmail;
                });

                foreach($filteredPages as $clientlist): ?>
                    <tr class="profileRow">
                        <td>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$clientlist->client_photo; ?>'); width: 150px; height: 150px;"> <!-- Removed image-input-outline class -->
                                        <div class="image-input-wrapper w-150px h-150px rounded-circle" style="background-image: url('<?php echo URLROOT."/public/".$clientlist->client_photo; ?>');"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $clientlist->client_organization; ?></h5>
                                            <p class="card-text"><?php echo $clientlist->client_des; ?></p>
                                            <p class="card-text"><small class="text-muted"><?php echo $clientlist->client_email; ?></small></p>
                                            <a href="<?php echo URLROOT; ?>/pages/cprofileview/<?php echo $clientlist->client_email; ?>" class="btn btn-secondary">View Profile</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
        </table>
                </div>    
        
    </div>
  
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>
        
        
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                const searchText = $(this).val().toLowerCase();
                $('.profileRow').each(function() {
                    const studentName = $(this).find('.card-title').text().toLowerCase();
                    const studentDesc = $(this).find('.card-text').text().toLowerCase();
                    const studentEmail = $(this).find('.text-muted').text().toLowerCase();
                    if (studentName.includes(searchText) || studentDesc.includes(searchText) || studentEmail.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>



    </div>
    <div class="card-footer">
        
    </div>
</div>


