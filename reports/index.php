<?php

	$title = "Daily Reports";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forms/Reports - <?php echo $title ?></title>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/head.php"); ?><!-- Viewport, Styling, Scripts -->

		<style>
			a {
				line-height: 16pt;
			}
		</style>

	</head>
	<body>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/header.php"); ?> <!-- #header -->

		<div id="content"><!-- #content -->
			<h1><?php echo $title ?></h1>
			<hr>
			<div class="col">
				<a name="office"></a>
				<!-- Office -->
				<h2>Office</h2>
				<p>
					<a href="office/oper_mgr.php">Operations Manager</a>
					<br>
					<a href="office/area_exp_mgr.php">Area Experience Manager</a>
					<br>
					<a href="office/region_exp_mgr.php">Regional Experience Manager</a>
					<br>
					<a href="office/region_qual_mgr.php">Regional Quality Manager</a>
					<br>
					<a href="office/exp_mgr.php">Experience Manager</a>
					<br>
					<a href="office/region_cust_rltns_mgr.php">Regional Customer Relations Manager</a>
					<br>
					<a href="office/cust_rltns_mgr.php">Customer Relations Manager</a>
					<br>
					<a href="office/rltn_cent_sup.php">Relationship Center Supervisor</a>
					<br>
					<a href="office/mgr.php">General Manager</a>
					<br>
					<a href="office/shift_lead_sr.php">Senior Shift Lead</a>
					<br>
					<a href="office/shift_lead.php">Shift Lead</a>
					<br>
					<a href="office/train_lead_sr.php">Senior Lead Trainer</a>
					<br>
					<a href="office/train_lead.php">Lead Trainer</a>
					<br>
					<a href="office/cee_sr.php">Senior Customer Experience Expert</a>
					<br>
					<a href="office/cee.php">Customer Experience Expert</a>
					<br>
					<a href="office/rltn_spec.php">Relationship Specialist</a>
					<br>
					<a href="office/proj_spec.php">Project Specialist</a>
					<br>
					<a href="office/live_chat.php">Live Chat Specialist</a>
					<br>
					<a href="office/call_list.php">Call Listening Expert</a>
					<br>
					<a href="office/host.php">Deck Host</a>
				</p>
				<a name="aquatics"></a>
				<!-- Aquatics -->
				<h2>Aquatics</h2>
				<p>
					<a href="aquatics/dir_train_dev.php">Director of Training & Development</a>
					<br>
					<a href="aquatics/mgr_reg.php">Regional Aquatics Manager</a>
					<br>
					<a href="aquatics/mgr.php">Aquatics Manager</a>
					<br>
					<a href="aquatics/mgr_site.php">Site Manager</a>
					<br>
					<a href="aquatics/mgr_quality.php">Quality Manager</a>
					<br>
					<a href="aquatics/train_lead.php">Lead Trainer</a>
					<br>
					<a href="aquatics/train.php">Training Report</a>
					<br>
					<a href="aquatics/inst_sr.php">Senior Instructor</a>
					<br>
					<a href="aquatics/inst.php">Swim Instructor</a>
					<br>
					<a href="aquatics/inst_resign.php">Instructor Resignation Report</a>
					<br>
					<a href="aquatics/deck_guard_sr.php">Senior Deck Guard</a>
					<br>
					<a href="aquatics/deck_guard.php">Deck Guard</a>
					<br>
					<a href="aquatics/lafit_mgr.php">LA Fitness/City Sports Manager</a>
					<br>
					<a href="aquatics/lafit_coor_site.php">LA Fitness/City Sports Site Coordinator</a>
					<br>
					<a href="aquatics/lafit_lead_inst.php">LA Fitness/City Sports Lead Instructor</a>
					<br>
					<a href="aquatics/lafit_inst.php">LA Fitness/City Sports Instructor</a>
				</p>
				<!-- New Hire/Trainee Surveys -->
				<a name="new"></a>
				<h2>New Hire/Trainee Survey</h2>
				<p>
					<a href="aquatics/shadow.php">First Day Shadow Survey</a>
					<br>
					<a href="aquatics/play_area.php">Play Area Interactions Survey</a>
				</p>
				<!-- Accounting -->
				<a name="acc"></a>
				<h2>Accounting</h2>
				<p>
					<a href="office/acc.php">Accounting Manager</a>
					<br>
					<a href="office/acc_mgr.php">Account Associate</a>
				</p>
				<!-- Employee Experience -->
				<a name="emp_exp"></a>
				<h2>Employee Experience</h2>
				<p>
					<a href="office/emp_exp_admin.php">Employee Experience Administrator</a>
					<br>
					<a href="office/emp_exp_assist.php">Employee Experience Administrative Assistant</a>
				</p>
			</div>
			<div class="col">
				<!-- Marketing -->
				<a name="marketing"></a>
				<h2>Marketing</h2>
				<p>
					<!--
					<a href="marketing/lead.php">Marketing Branch Lead</a>
					<br>
					-->
					<a href="marketing/coordinator_sr.php">Senior Marketing Coordinator</a>
					<br>
					<a href="marketing/coordinator.php">Marketing Coordinator</a>
				</p>
				<!-- Maintenance -->
				<a name="maint"></a>
				<h2>Maintenance</h2>
				<p>
					<a href="aquatics/maint.php">Maintenance</a>
					<br>
					<a href="aquatics/chem_test.php">Pool Chemistry</a>
				</p>
				<!-- IT -->
				<a name="it"></a>
				<h2>IT</h2>
				<p>
					<!--<a href="it/daily.php">IT Daily</a>
					<br>-->
					<a href="it/fac_eval.php">Facility Evaluation</a>
				</p>
				<!-- Swim Competition -->
				<a name="s_comp"></a>
				<h2>Swim Competition</h2>
				<p>
					<a href="office/scomp.php">Swim Competition</a>
				</p>
				<!-- Events -->
				<a name="events"></a>
				<h2>Events</h2>
				<p>
					<a href="office/event_host.php">Event Host</a>
					<br>
					<a href="office/event_coor.php">Event Coordinator</a>
					<br>
					<a href="office/event_comm.php">Community Event</a>
					<br>
					<a href="marketing/route_cashout.php">Marketing Route Cash Out</a>
				</p>
				<!-- Monthly Surveys -->
				<a name="monthly"></a>
				<h2>Internal Surveys</h2>
				<p>
					<a href="office/Qweek.php">Question of the Week</a>
					<br>
					<a href="office/feedback_srvy.php">Feedback Survey</a>
					<br>
					<a href="office/feedback_srvy_sr.php">Senior Manager Feedback Survey</a>
				</p>
				<!-- Trainee Surveys -->
				<a name="trainee"></a>
				<h2>Trainee Surveys </h2>
				<p>
					<a href="office/trainee.php">Office Trainee Survey</a>
					<br>
					<a href="aquatics/trainee.php">Aquatics Trainee Survey</a>
				</p>
				<!-- Evaluation Reports -->
				<a name="eval"></a>
				<h2>Evaluation Reports</h2>
				<p>
					<a href="aquatics/eval_deck_guard.php">Deck Guard Manager Evaluation</a>
					<br>
					<a href="aquatics/eval_mock_drown.php">Mock Drowning Evaluation</a>
				</p>
				<!-- Waterworks Assistance Program -->
				<a name="eval"></a>
				<h2>Waterworks Assistance Program</h2>
				<p>
					<a href="office/hardship_app.php">Employee Hardship Application</a>
				</p>
			</div>
		</div>

		<?php include ($_SERVER['DOCUMENT_ROOT']."/include/help.php"); ?><!-- IT ISSUES -->
		<?php include ($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?><!-- #footer -->

	</body>
</html>
