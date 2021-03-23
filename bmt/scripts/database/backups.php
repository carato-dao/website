<div class="bmt-page filemanager-page">
	<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered form-row-stripped" id="<?php echo $_GET['action']; ?>-<?php echo strtolower($datatype); ?>">
		<div class="portlet box blue">
			<div class="portlet-body form">
				<h4>Show database backup</h4>
				<div class="form-body">
					<?php
						$zipped=array();
						$backups=array();
						$dir='inc/db_backup';
						$dh = opendir($dir);
								
						while ($filename = readdir($dh)){
							if($filename!='.' && $filename!='..'){
								if (is_file($dir."/".$filename)){
									array_push($zipped, $filename);								
								}else{
									$today = opendir($dir."/".$filename);
									while ($sessions = readdir($today)){
										if($sessions!='.' && $sessions!='..'){
											$single_session = opendir($dir."/".$filename.'/'.$sessions);
											while ($session = readdir($single_session)){
												if($session!='.' && $session!='..'){
													if(!isset($backups[$filename][$sessions])){
														$backups[$filename][$sessions]=array();
													}
													array_push($backups[$filename][$sessions], $session);
												}
											}
										}
									}	
								}
							}
						} 
					?>
					<table class="table table-striped table-bordered table-hover dataTableInit">
						<thead>
							<tr>
								<th>DATE</th>
								<th>TIME</th>
								<th>FILENAME</th>
								<th>SESSION</th>
								<th style="text-align: center;">RESTORE</th>
								<th style="text-align: center;">PREVIEW</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($backups as $day => $backup){
									foreach($backup as $session => $baks){
										arsort($baks);
										foreach($baks as $file){
											$datetime=explode('_',$file);
											$h=substr($datetime[2], 0,2);
											$m=substr($datetime[2], 2,2);
											$s=substr($datetime[2], 3,2);
											$time=$h.':'.$m.':'.$s;
									?>
											<tr>
												<td><?php echo $day; ?></td>
												<td><?php echo $time; ?></td>
												<td><?php echo $file; ?></td>
												<td><?php echo $session; ?></td>
												<td style="width:100px; text-align: center;">
													<a href="javascript:validateRestore('<?php echo $day.'---'.$session.'---'.$file; ?>');" 
														class="bmt-small-button">
														<i class="fa fa-reply"></i>
													</a>
												</td>
												<td style="width:100px; text-align: center;">
													<a href="javascript:previewBackup('<?php echo $day.'/'.$session.'/'.$file; ?>');" 
														class="bmt-small-button">
														<i class="fa fa-file-o"></i>
													</a>
												</td>	
											</tr>
									<?php
										}
									}
								}
							?>
						</tbody>
					</table>
				</div><!--form-body-->
			</div><!--portlet-body-->
		</div><!--portlet-->
		<input type="hidden" name="new<?php echo strtolower($datatype); ?>" value="yes">
	</form>
</div>