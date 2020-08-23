<?php
	if (!empty($data)):
?>
	<div class="x_panel">
		<div class="x_content">
            <table class="table table-striped table-hover table-bordered dt-responsive nowrap dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Harga Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($data as $data):
                    ?>
                        <tr>
                            <td><?=date('d M Y', strtotime($data->transaction->tanggal));?></td>
                            <td><?=$data->transaction->no_inv;?></td>
                            <td><?=number_format($data->harga,0,',','.');?></td>
                        </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
		</div>
	</div>
<?php
	endif;
?>

