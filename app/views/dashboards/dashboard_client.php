<!--profile-->
<div class="row">
    <?php
        $data['clientinfo'];
        $data['activities'];
        $index=0;
        $totalparticipants=0;
        $upcomingactivities=0;
        if($data['activities'])
        {
            foreach($data['activities'] as $activity):
                $index++;
                $totalparticipants=$totalparticipants+$activity->no_participants;
            endforeach; 
            foreach($data['upcomingActivities'] as $activity):
                $upcomingactivities++;
            endforeach; 
    }?>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
            <?php if(isset($data['clientinfo']->client_photo) && !empty($data['clientinfo']->client_photo)):?>
                                    <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$data['clientinfo']->client_photo; ?>'); width: 100px; height: 100px;margin-top: -10px; margin-left: -10px; "> <!-- Removed image-input-outline class -->
                                        <div class="image-input-wrapper w-80px h-80px rounded-circle " style="background-image: url('<?php echo URLROOT."/public/".$data['clientinfo']->client_photo; ?>');"></div>
                                    </div>
                                    <?php else:?>
                                    <div class="symbol symbol-80px me-5 rounded-circle overflow-hidden" style="margin-top: -10px; margin-left: -10px;">
                                        <img src="<?php echo URLROOT . "/public/assets/media/youth/default_cpfp.png" ?>" >
                                    </div>
                        <?php endif; ?>
            </div>
            <div class="col">
                <h5><?php echo $data['clientinfo']->client_organization; ?></h5>
                <p class="card-text" style="font-size: 12px;">
                <?php echo $data['clientinfo']->client_email; ?><br>
                <?php echo $data['clientinfo']->client_phone; ?></p>
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
      <p class="card-text" style="margin-left:5px;font-size: 10px; color:gray">Total Number of published activities </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
        <img src="data:image/png;base64,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" style="width: 35px; margin-bottom:8px;">
        <h4 class="card-title" style="margin-left:5px"><?php echo $totalparticipants ?></h4>
        <p class="card-text" style="margin-left:5px;font-size: 10px; color:gray">Total Number of participants </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="width:22rem; height:10rem">
      <div class="card-body">
        <img src="data:image/png;base64,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" style="width: 35px; margin-bottom:10px;">
        <h4 class="card-title" style="margin-left:5px"><?php echo $upcomingactivities ?></h4>
        <p class="card-text" style="margin-left:5px;font-size: 10px; color:gray">Number of Upcoming Activities</p>
      </div>
    </div>
  </div>
</div>
<!--end of profile-->

<br>

<!--start Top 10 Most Attended Activities-->
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Top 10 Most Attended Activities</h3>
    </div>
    <div class="card-body">
       
    <div class="table-responsive">
            <table id="kt_datatable_activity" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Activity</th>
                        <th style="width: 20%;">Description</th>
                        <th style="width: 15%;">Date</th>
                        <th style="width: 5%;">Duration</th>
                        <th style="width: 5%;">Given Marks</th>
                        <th style="width: 5%;">No. Participants</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if($data['activities']){
                  $index=1;
                    foreach($data['activities'] as $activity):  ?>
                    <tr>
                        <?php if($index<=10) {?>
                        <td style="width: 5%;"><?php echo $index++ . "."; ?></td>
                        <td style="width: 15%;"><?php echo $activity->act_name; ?></td>
                        <td style="width: 20%;"><?php echo $activity->act_des; ?></td>
                        <td style="width: 15%;"><?php echo date('d/m/y ', strtotime($activity->act_start)); ?> - <?php echo date('d/m/y ', strtotime($activity->act_end)); ?></td>
                        <td style="width: 5%;"><?php echo $activity->act_duration; ?></td>
                        <td style="width: 5%;"><?php echo $activity->act_mark; ?></td>
                        <td style="width: 5%;"><?php echo $activity->no_participants; ?></td>
                        <?php } ?>
                    </tr>
                    <?php endforeach; }
                    else ?>
                    <tr><td colspan="5"><?php echo "No recorded activities.";?></td></tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div style="text-align: right;">
                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="<?php echo URLROOT; ?>/activities">
                    To see all published activities->
                </a>
            </div>
        </div>
    </div>
</div>
<!--end Top 10 Most Attended Activities-->
        