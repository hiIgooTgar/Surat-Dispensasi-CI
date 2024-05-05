	<!-- chart js -->
	<script src="<?= base_url(); ?>assets/template_a/js/plugins/chart.js"></script>

	<!-- js -->
	<script src="<?= base_url(); ?>assets/template_a/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/template_a/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/template_a/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/template_a/js/main.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>

	<!-- The javascript plugin to display page loading on top-->
	<script src="<?= base_url(); ?>assets/template_a/js/plugins/pace.min.js"></script>

	<!-- Page specific javascripts-->
    <script src="<?= base_url(); ?>assets/template_a/js/plugins/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_a/js/plugins/jquery-ui.custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_a/js/plugins/fullcalendar.min.js"></script>

	<!-- sweet alert js -->
	<script src="<?= base_url(); ?>assets/template_a/js/plugins/sweetalert.all.min.js"></script>

	 <!--Datatables -->
	<script src="<?= base_url() ?>assets/front-end/js/plugins/datatables/datatables.min.js"></script>
		<script src="<?= base_url() ?>assets/front-end/js/plugins/datatables/dataTables.responsive.min.js"></script>
		<script>
		$(document).ready(function() {

			var table = $('#tableMobileAdmin').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
		});
		</script>

	<!-- searching select option (select2)  -->
	<script>
		// bagian guru mapel
		$(document).ready(function() {
			$('#nama_guru').select2().on("select2:open", function() {
			$('.select2-container').css('z-index', '1');
			});
		});

		// bagian guru piket
		$(document).ready(function() {
			$('#nama_guru_piket').select2().on("select2:open", function() {
			$('.select2-container').css('z-index', '1');
			});
		});
	</script>




	<!-- ========================================================= -->

	<!-- isi tanggal / inputan type date secara otomatif -->
	<script>
	function getFormattedDate() {
		const now = new Date();
		const year = now.getFullYear();
		const month = String(now.getMonth() + 1).padStart(2, '0');
		const day = String(now.getDate()).padStart(2, '0');
		return `${year}-${month}-${day}`;
	}

	document.getElementById('tanggal').value = getFormattedDate();
	</script>


	<!-- assets sweet alert -->
	<script>
    <?php if ($this->session->flashdata('notif_login')): ?>
        Swal.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('notif_login') ?>',
            timer: 1500,
            footer: 'SIM E-Dispensasi',
            showCancelButton: false,
            showConfirmButton: false
        });
    <?php endif; ?>
	</script>


	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->



	<!-- sweet alert redirect -->

	<?php 
		$notif = $this->session->flashdata('notif');
		$sweetAlertType = $this->session->flashdata('sweet_alert');

		if (isset($notif)) {
			?>
			<script>
				Swal.fire({
					title: "Success",
					text: "<?= $notif ?>",
					icon: "<?= $sweetAlertType ?>",
				});
			</script>
			<?php
		}
	?>

<script>
		function confirmLogout(event, url) {
		event.preventDefault(); // Mencegah tindakan default dari link
		
		Swal.fire({
			title: 'Apakah kamu ingin Logout?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#0284c7',
			cancelButtonColor: '#dc3545',
			confirmButtonText: 'Logout',
			footer: 'SIM E-Dispensasi',
		}).then((result) => {
			if (result.isConfirmed) {
			// Redirect hanya jika konfirmasi diterima
			window.location.href = url;
			}
		});
		}
	</script>

	<!-- sweet alert confirmasi hanya untuk 1 deletean  -->
	<script>
    function confirmDelete(event, url) {
        event.preventDefault(); // Mencegah tindakan default dari link
        
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0284c7',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect hanya jika konfirmasi diterima
                window.location.href = url;
            }
        });
    }
</script>


<script>
    function confirmDitolak(event, url) {
        event.preventDefault(); // Mencegah tindakan default dari link
        
        Swal.fire({
            title: 'Apakah kamu yakin menolak dispensasi ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0284c7',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect hanya jika konfirmasi diterima
                window.location.href = url;
            }
        });
    }

    function confirmDiterima(event, url) {
        event.preventDefault(); // Mencegah tindakan default dari link
        
        Swal.fire({
            title: 'Apakah kamu yakin nerima dispensasi ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0284c7',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect hanya jika konfirmasi diterima
                window.location.href = url;
            }
        });
    }
</script>



<?php if ($this->session->flashdata('error_message')) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $this->session->flashdata('error_message') ?>',
        });
    </script>
<?php } ?>

<?php if ($this->session->flashdata('success_message')) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= $this->session->flashdata('success_message') ?>',
        });
    </script>
<?php } ?>


	<!-- sweet alert end js -->

</body>
</html>