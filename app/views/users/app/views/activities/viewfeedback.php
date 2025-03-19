<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">View Feedback</h3>
    </div>
<div class="card-body">

<div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th rowspan=2>No.</th>
                        <th rowspan=2>Student Name</th>
                        <th rowspan=2>What is your role in this activity?</th>
                        <th rowspan=2>What knowledge/skills have you gained about the topics presented in this activity?</th>
                        <th rowspan=2>How will you apply what you have learned to your field of study?</th>
                        <th colspan=3>The Content</th>
                        <th colspan=3>The Presentor(s)</th>
                        <th rowspan=2>Project Upload (if any)</th>
                    </tr>
                    <tr class="fw-semibold fs-6 text-muted">
                        <td>Was well organized</td>
                        <td>Was based on credible and up-to-date information</td>
                        <td>Was easy to understand</td>
                        <td>Was well prepared</td>
                        <td>Used appropriate teaching methods</td>
                        <td>Engaged the participants in learning</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach($data['feedback'] as $feedback): ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $feedback->stu_name; ?></td>
                        <td><?php echo $feedback->q1; ?></td>
                        <td><?php echo $feedback->q2; ?></td>
                        <td><?php echo $feedback->q3; ?></td>
                        <td><?php echo $feedback->q4; ?></td>
                        <td><?php echo $feedback->q5; ?></td>
                        <td><?php echo $feedback->q6; ?></td>
                        <td><?php echo $feedback->q7; ?></td>
                        <td><?php echo $feedback->q8; ?></td>
                        <td><?php echo $feedback->q9; ?></td>
                        <td>
                            <?php if (!empty($feedback->projectFile)): ?>
                                <a href="<?php echo URLROOT; ?>/public/files/feedback/<?php echo basename($feedback->projectFile); ?>" target="_blank">View file</a>
                            <?php else: ?>
                                No file uploaded
                            <?php endif; ?>
                        </td>                
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>


    </div>
    <div class="card-footer"></div>
</div>