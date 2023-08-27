<?php $page = 'index';
include './header.php' ?>
<!-- ANALYTICS STARTS HERE -->
<div class="data">
	<div class="content-data">
		<div class="head">
			<h3>Report</h3>

		</div>
		<div class="chart">
			<div id="chart"></div>
		</div>
	</div>

	<div class="content-data">
		<div class="head">
			<h3>Chatbox</h3>
		</div>
		<!-- <div class="chat-box">
			<p class="day"><span>Today</span></p>
			<div class="msg">
				<img src="3.jpeg" alt="">
				<div class="chat">
					<div class="profile">
						<span class="username">Alan</span>
						<span class="time">18:30</span>
					</div>
					<p>Hello</p>
				</div>
			</div>
			<div class="msg me">
				<div class="chat">
					<div class="profile">
						<span class="time">18:30</span>
					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptatum
						eos quam
						dolores eligendi exercitationem animi nobis reprehenderit laborum!
						Nulla.</p>
				</div>
			</div>
			<div class="msg me">
				<div class="chat">
					<div class="profile">
						<span class="time">18:30</span>
					</div>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam,
						architecto!</p>
				</div>
			</div>
			<div class="msg me">
				<div class="chat">
					<div class="profile">
						<span class="time">18:30</span>
					</div>
					<p>Lorem ipsum, dolor sit amet.</p>
				</div>
			</div>
		</div>
		<form action="#">
			<div class="form-group">
				<input type="text" placeholder="Type...">
				<button type="submit" class="btn-send"><i class='bx bxs-send'></i></button>
			</div>
		</form> -->
		<div class="bxes">
			<?php All_Notifications() ?>
		</div>
	</div>
</div>

<?php include './footer.php' ?>