<!--profile-->
<div class="row">
    <?php
        $data['studentinfo'];
        $data['joinedActivities'];
        $index=0;
        $totalbadges=0;
        if($data['joinedActivities'])
        {
            foreach($data['joinedActivities'] as $activity):
                $index++;
            endforeach;
            foreach($data['claim'] as $activity):
                $totalbadges++;
            endforeach; 
    }?>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
        <div class="row">
                <div class="col-sm-5">
                <?php if(isset($data['studentinfo']->stu_photo) && !empty($data['studentinfo']->stu_photo)):?>
                                    <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$data['studentinfo']->stu_photo; ?>'); width: 150px; height: 150px;margin-top: -10px; margin-left: -10px; "> <!-- Removed image-input-outline class -->
                                        <div class="image-input-wrapper w-100px h-100px rounded-circle " style="background-image: url('<?php echo URLROOT."/public/".$data['studentinfo']->stu_photo; ?>');"></div>
                                    </div>
                                    <?php else:?>
                                    <div class="symbol symbol-100px me-5 rounded-circle overflow-hidden" style="margin-top: -10px; margin-left: -10px;">
                                        <img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
                                    </div>
                        <?php endif; ?>
                </div>
                <div class="col">
                    <h5><?php echo $data['studentinfo']->stu_name; ?></h5>
                    <p class="card-text" style="font-size: 12px;">
                    <?php echo $data['studentinfo']->stu_university; ?><br>
                    <?php echo $data['studentinfo']->stu_course; ?><br>
                    <?php echo $data['studentinfo']->stu_phone; ?> </p>
                </div>
            </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
        <img src="data:image/png;base64,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" style="width: 35px; margin-bottom:10px;">
        <h4 class="card-title" style="margin-left:5px"><?php echo $index ?></h5>
        <p class="card-text" style="margin-left:5px;font-size: 10px; color:gray">Number of participated activities </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
      <img src="data:image/png;base64,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" style="width: 35px; margin-bottom:9px;">
      <h4 class="card-title" style="margin-left:5px"><?php echo $totalbadges ?></h5>
      <p class="card-text" style="margin-left:5px;font-size: 10px; color:gray">Number of collected badges </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
        <img src="data:image/png;base64,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" style="width: 30px; margin-bottom:10px;">
        <h4 class="card-title" style="margin-left:5px"><?php echo $data['studentinfo']->stu_exp; ?></h4>
        <p class="card-text" style="margin-left:5px;font-size: 10px; color:gray">Experience level of the user </p>
      </div>
    </div>
  </div>
</div>
<!--end of profile-->
<br>

<!--start list of upcoming activities-->
<div class="card shadow-sm">
    <div class="card-header" style="margin-bottom: 0px;">
        <h3 class="card-title">Upcoming Activities</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead style="margin-top: 0px;">
                    <tr class="fw-bold fs-5 text-gray-800">
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Activity</th>
                        <th style="width: 40%;">Description</th>
                        <th style="width: 15%;">Date</th>
                        <th style="width: 10%;">Reward Points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; 
                    if($data['upcomingActivities'])
                    { ?>
                        <?php foreach($data['upcomingActivities'] as $activity): ?>
                        <tr class="fw-semibold fs-6" >
                            <?php if($index<=10){ ?>
                            <td style="width: 5%;"><?php echo $index++ . "."; ?></td>
                            <td style="width: 15%;"><?php echo $activity->act_name; ?></td>                        
                            <td style="width: 40%;"><?php echo $activity->act_des; ?></td>
                            <td style="width: 15%;"><?php echo date('d/m/y ', strtotime($activity->act_start)); ?> - <?php echo date('d/m/y ', strtotime($activity->act_end)); ?></td>
                            <td style="width: 10%;"><?php echo $activity->act_mark; ?></td>
                            <?php } ?>          
                        </tr>
                        <?php endforeach; ?>
                    <?php } 
                    
                    else {
                        ?><tr><td colspan="5"><?php echo "No upcoming activities.";?></td></tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div style="text-align: right;">
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?php echo URLROOT; ?>/activities/view_past">
                To see all activities->
            </a>
        </div>
    </div>
</div>
<!--end list of upcoming activity-->
        
<br>

<!--start list of rewards-->
<div class="card shadow-sm">
    <div class="card-header" style="margin-bottom: 0px;">
        <h3 class="card-title">List of Rewards</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_activity" class="table table-row-bordered gy-5">
            <tbody>
                    <?php if($data['claim'])
                    { $index = 1;?>
                        <div class="row" style="width: 100%;">
                            <?php foreach($data['claim'] as $claim):?>
                            <?php
                            if($index<=5)
                            {?>
                                <div class="col-sm-2">
                                    <img src="<?php echo URLROOT . "/public/" . $claim->reward_badgeimg; ?>" class="card-img-top" style="width: 150px;"  alt="<?php echo $claim->reward_name; ?>">
                                </div>
                            <?php } ?>
                            <?php if ($index>5&&$index<=10) { ?>
                                <div class="col-sm-2">
                                    <img src="<?php echo URLROOT . "/public/" . $claim->reward_badgeimg; ?>" class="card-img-top"  alt="<?php echo $claim->reward_name; ?>">
                                </div>
                            <?php } 
                            $index++;?>
                            <?php endforeach; ?>
                            
                        </div> 
                    <?php } 
                    
                    else {
                        ?><tr><td><?php echo "No reward claimed.";?></td></tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <?php if($index>10){ ?>
    <div class="card-footer">
        <div style="text-align: right;">
            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?php echo URLROOT; ?>/rewards/liststudent">
                To see all rewards->
            </a>
        </div>
    </div>
    <?php } ?>
</div>
<!--end list of rewards-->
