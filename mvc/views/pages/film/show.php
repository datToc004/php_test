<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách phim</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách phim</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="Home/create" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm phim
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="fname" data-sortable="true">Tên phim</th>
						        <th data-field="dname"  data-sortable="true">Tên đạo diễn</th>
                                <th data-field="tname" data-sortable="true">Thể loại phim</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($data['listFilm'])){
                                        
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['director'] ?></td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td class="form-group">
                                            <a href="/php_test/Home/edit/<?php echo $row['id']; ?>"  class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/php_test/Home/del/<?php echo $row['id']; ?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa không')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                        
                                    </tr>
                                <?php }?>
                            </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->


    <script src="public/admin/js/bootstrap-table.js"></script>