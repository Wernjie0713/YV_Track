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
    <div class="card shadow-sm custom-btn-color">
    <div class="card-header">
            <h3 class="card-title" style="color:#fff">List of rewards <i>(Experience earned:<?php echo $data['students']->stu_exp; ?>)</i></h3>
    </div>
    </div><br>

    <div class="row " >
        <?php
        $totalExp = $data['students']->stu_exp;
        $actMark3 = isset($data['act_mark3']) ? $data['act_mark3'] : 0;
        $actMark5 = isset($data['act_mark5']) ? $data['act_mark5'] : 0;
        $actMark7 = isset($data['act_mark7']) ? $data['act_mark7'] : 0;
        $thresholds = [19, 39, 69, 109];
        
        foreach ($data['rewards'] as $key => $reward) :
            $achievedClass = '';
    
            if ($key >= 4 && $key <= 6) {
                // Check if the reward is in the range of fifth to seventh
                if ((isset($actMark3) && is_object($actMark3)) && $key == 4) {
                    $achievedClass = 'achieved';
                } elseif ((isset($actMark5) && is_object($actMark5)) && $key == 5) {
                    $achievedClass = 'achieved';
                } elseif ((isset($actMark7) && is_object($actMark7)) && $key == 6) {
                    $achievedClass = 'achieved';
                }
                
            } else {
                // Check if the total experience is greater than or equal to the threshold
                if ($totalExp >= $thresholds[$key]) {
                    $achievedClass = 'achieved';
                }
            }

            // if ($totalExp <= $thresholds[0] * ($key + 1)) {
            //     // If the total experience is less than or equal to the current threshold * (key + 1)
            //     $achievedClass = ''; // Clear the achieved class
            // }
        ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 ">
                <div class="card hover-elevate-up shadow-sm custom-bg-color">
                    <div class="badge <?php echo $achievedClass; ?>" >
                        <img src="<?php echo URLROOT . "/public/" . $reward->reward_badgeimg; ?>" class="card-img-top"  alt="<?php echo $reward->reward_name; ?>">
                    </div>
                    <div class="card-body">
                        <h3 style="text-align:center;text-transform:uppercase" class="card-title"><?php echo $reward->reward_name; ?></h3>
                        <div class="d-grid ">
                            <?php
                            $buttonText = ($achievedClass === 'achieved') ? 'Available to claim' : 'See Details';
                            $buttonColour = ($achievedClass === 'achieved') ? 'btn btn-success' : 'btn custom-card-color';
                            ?>
                            <?php if($achievedClass == 'achieved') { ?>
                                <a href="<?php echo URLROOT . "/rewards/desc_canclaim/" . $reward->reward_id ?>" class="<?php echo $buttonColour; ?>"><?php echo $buttonText; ?></a>
                            <?php } else {?>
                                <a href="<?php echo URLROOT . "/rewards/desc/" . $reward->reward_id ?>" class="<?php echo $buttonColour; ?>"><?php echo $buttonText; ?></a>
                            <?php } ?>
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