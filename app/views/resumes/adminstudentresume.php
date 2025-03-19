<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<style>
	#button {
		border: 0px;
		border-radius: 5px;
		color: #fff;
		background-color:#7c1c2b;
	}

	.avatar-column {
        width: 1%; /* Adjust the width of the avatar column */
        white-space: nowrap; /* Prevent avatar from breaking into multiple lines */
    }

	.avatar-image {
        width: 150px; /* Adjust the width and height as needed */
        height: 150px; /* Adjust the width and height as needed */
        border-radius: 50%; /* Make the image circular */
        overflow: hidden; /* Hide overflow to maintain the circle shape */
    }

	.avatar-image img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Maintain aspect ratio and cover container */
    }

	.center {
		margin-left:auto;
		margin-right:auto;
		display:block;
	}

	td, tr {
		padding:15px;
		/* border:1px solid black; */
		font-family:"Times New Roman", Times, serif;
	}

	h4 {
		color:#0080ff;
	}

	hr {
		margin-left:30;
		margin-right:0;
		color:white;
	}

	.edit-button {
		color: #fff;
		background-color: #007bff;
		border-color: #007bff;
	}

	.edit-button:hover {
		background-color: #0056b3;
		border-color: #0056b3;
	}

	.custom-bg-color {
        background-color: #fcbd32; /* Replace 'yourCustomColor' with your preferred color code */
        /* You can also add other styles like text color, padding, border-radius, etc. */
        color: #7c1c2b; /* Example text color */
        /* Add any other styles to customize your card */
       
    }

    .custom-btn-color{
        background-color: #183d64; /* Set your preferred button background color */
        color: #fff; 
    }

    .custom-card-color{
        background-color: #7c1c2b; /* Set your preferred button background color */
        color: #fff;
    }
</style>


<div class="card shadow-sm ">
	<div class="card-header">
        <h3 class="card-title"><i style='font-size:24px' class='far'>&#xf2c2;</i>&nbsp;Your Resume</h3>
        <div class="card-toolbar">
			<button id="button" class="btn btn-primary">Generate PDF</button>
        </div>
    </div>
	<div class="card-body" id="makepdf">
	   	<div class="table-responsive">
		<table style="width:100%;height:100%">
			<tr>
				<td class="avatar-column" rowspan="2" style="text-align:center;width:35%;background-color:#1a3365;">
					<div class="avatar-image center">
					<?php if(isset($data['students']->stu_photo) && !empty($data['students']->stu_photo)):?>
                                <div class="image-input" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$data['students']->stu_photo; ?>'); width: 150px; height: 150px; "> <!-- Removed image-input-outline class -->
                                    <div class="image-input-wrapper w-150px h-150px rounded-circle " style="background-image: url('<?php echo URLROOT."/public/".$data['students']->stu_photo; ?>');"></div>
                                </div>
                                <?php else:?>
                                <div class="symbol symbol-150px me-5 rounded-circle overflow-hidden" >
                                    <img src="<?php echo URLROOT . "/public/assets/media/youth/default_stupfp.png" ?>" >
                                </div>
                    <?php endif; ?>
					</div>
				</td>
				<td style="width:65%;font-size:23px"><b><?php echo $data['students']->stu_name; ?></b></td>
			</tr>
			<tr>
				<td style="vertical-align:top;font-size:15px"><b>About Me</b><br><?php echo $data['students']->stu_des; ?></td>
			</tr>
			<tr>
				<td style="width:30%;background-color:#1a3365;color:white;vertical-align:top">
					<b style="margin-left:30;font-size:30px">Contact</b><hr>
					<b style="margin-left:30">Phone</b><br><div style="margin-left:30"><?php echo $data['students']->stu_phone; ?></div><br>
					<b style="margin-left:30">Email</b><br><div style="margin-left:30"><?php echo $data['students']->stu_email; ?></div><br>
					<b style="margin-left:30">Address</b><br><div style="margin-left:30"><?php echo $data['students']->stu_address; ?></div><br><br><br>
					<b style="margin-left:30;font-size:30px">Education</b><hr><div style="margin-left:30">Study <?php echo $data['students']->stu_course; ?> 
					in <?php echo $data['students']->stu_university; ?></div><br><br><br>
					<b style="margin-left:30;font-size:30px">Skills</b><hr><div style="margin-left:30"><?php echo $data['students']->stu_skill; ?></div><br><br><br>
					<b style="margin-left:30;font-size:30px">Language</b><hr><div style="margin-left:30"><?php echo $data['students']->stu_lan; ?></div><br><br><br>
				</td>
				<td style="width:70%;vertical-align:top">
					<b style="font-size:30px">Experience</b><hr style="margin-right:30;margin-left:0;color:black">
					<?php if(isset($data['combines'])): ?>
						<?php foreach($data['combines'] as $combines):?>
							<h3 style="font-family:Arial; opacity: 0.75" class="card-title"><?php echo $combines['act_name']; ?></h3>
							<p><?php echo date('d/m/y ', strtotime($combines['act_start'])); ?>-<?php echo date('d/m/y ', strtotime($combines['act_end'])); ?><br>
							<?php echo $combines['ans1']; ?><?php echo $combines['ans2']; ?><?php echo $combines['ans3']; ?>
						<?php endforeach; ?>
					<?php else: ?>
						<h3 style="font-family: Arial; color:#183d64;" class="card-title">No Activity Recorded.</h3>		
					<?php endif; ?>
					<?php if(isset($data['combines2'])): ?>
						<?php foreach($data['combines2'] as $combines2):?>
							<h3 style="font-family:Arial; opacity: 0.75" class="card-title"><?php echo $combines2['add_actname']; ?></h3>
							<p><?php echo $combines2['add_actstartdate']; ?>-<?php echo $combines2['add_actenddate']; ?><br>
							<?php echo $combines2['add_actans']; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
			</tr>
			



		</table>
		</div>
	</div>
	<a href="<?php echo URLROOT . "/resumes/adminupdate/" . $data['students']->stu_id ?>" class="btn btn-secondary edit-button" style="position: absolute; bottom: 10px; right: 10px; width: 70px; height: 50px; border-radius: 50%;">
        <img src="https://w7.pngwing.com/pngs/818/878/png-transparent-computer-icons-editing-symbol-symbol-miscellaneous-angle-text.png" alt="Edit" style="width: 43px; height: 25px">
    </a>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>


    </div>
</div>
</div>

<script>
    let button = document.getElementById("button");
    let makepdf = document.getElementById("makepdf");

    button.addEventListener("click", function () {
        // Options for the PDF generation
        let opt = {
            margin: 0,
            filename: 'resume.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        // Generate PDF from the 'makepdf' div content
        let pdf = html2pdf().from(makepdf).set(opt);

        // Open a new window for previewing the PDF
        let previewWindow = window.open("", "_blank");

        // Display a loading message while generating the PDF
        previewWindow.document.write("<p>Loading PDF preview...</p>");

        // After the PDF is generated, display it in the preview window
        pdf.toPdf().get('pdf').then(function (pdfObject) {
            let blob = pdfObject.output('bloburl');
            previewWindow.location.href = blob;
        });
    });
</script>