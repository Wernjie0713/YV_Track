<style>
        .badge {
            filter: grayscale(100%);
            padding: 20px;
        }
        .achieved {
            filter: none;
            padding: 20px;
        }
        #badgeDetails {
            display: none;
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
            margin-top: 20px;
        }

        .custom-bg-color {
                background-color: #fcbd32; /* card color */
                color: #7c1c2b; /* Example text color */
                
                
        }

        .custom-btn-color{
            background-color: #183d64; /* Set your preferred button background color */
            color: #fff; 
        }

        .custom-card-color{
            background-color: #7c1c2b; /* Set your preferred button background color */
            opacity:1.5;
            color: #fff;
        }
</style>
<div class="card shadow-sm custom-card-color">
<div class="card-header ">
        <h3 class="card-title " style="color:#fff">List of rewards</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/rewards/create" class="btn custom-btn-color btn-float-right">Create</a>
            <?php endif; ?>
        </div>
</div>
</div><br>

<div class="row">
    <?php foreach($data['rewards'] as $reward): ?>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card hover-elevate-up shadow-sm custom-bg-color">
            <div class="achieved">
                <img src="<?php echo URLROOT . "/public/" . $reward->reward_badgeimg; ?>" class="card-img-top" alt="<?php echo $reward->reward_name; ?>">
            </div>
            <div class="card-body">
                <h3 style="text-align:center;text-transform:uppercase" class="card-title"><?php echo $reward->reward_name; ?></h3>
                <div class="d-grid">
                    <a href="<?php echo URLROOT . "/rewards/desc/" . $reward->reward_id;?>" class="btn custom-btn-color">See Details</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>