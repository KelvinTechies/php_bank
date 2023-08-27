<?php $page = 'card';
include './header.php' ?>

<!-- ANALYTICS STARTS HERE -->
<div class="data">

	<div class="content-data">
		<div class="head">
			<h3>Card</h3>
		</div>

		<div class="card">
			<div class="card-inner">

				<div class="front">
					<img src="/map.png" class="map-img" alt="">
					<div class="row">
						<img src="/chip.png" alt="" width="60px">
						<img src="/visa.png" alt="" width="80px">
					</div>

					<div class="row card-num">
						<p><?php echo chunk_split(getUser('card_number', 4, ".")) ?></p>

					</div>

					<div class="row card-holder">
						<p>CARD HOLDER</p>
						<p>VALID TILL</p>
					</div>

					<div class="row name">
						<p><?php echo $_SESSION['user'] ?></p>
						<p>10 / 25</p>
					</div>
				</div>

				<div class="back">
					<img src="/map.png" class="map-img" alt="">
					<div class="bar"></div>
					<div class="row card-cvv">
						<div>
							<img src="/pattern.png" alt="">
						</div>
						<p><?php echo getUser('csv_number') ?></p>
					</div>
					<div class="row card-text">
						<p>Use this card to enrol on Citadel Online Banking platforms to manage your account, check
							balance, transfer money, pay bills, buy airtime and do much more</p>
					</div>
					<div class="row sign">
						<p> <img src="./signature/<?php echo getUser('signature') ?>" height="80px" width="80px" style="margin-top: -15px;" alt="">
						</p>

					</div>
				</div>

			</div>
		</div>

	</div>


</div>

<?php include './footer.php' ?>